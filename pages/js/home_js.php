<script>
    $(document).ready(function() {  
    // Restricts input for the given textbox to the given inputFilter.
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        });
    }

    setInputFilter(
        document.getElementById("input_quantity"), 
        function(value) {
            return /^-?\d*$/.test(value); 
        }
    );

    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    $('#txtDateTo').attr('min', minDate);
    $('#txtDateFrom').attr('min', minDate);

    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });

    document.getElementById('txtDateTo').value      = new Date().toDateInputValue();
    document.getElementById('txtDateFrom').value    = new Date().toDateInputValue();



    var myClass = function() {}
        myClass.prototype = {
            loadMap: function(formData) {
                this.formData = formData,
                    $.ajax({
                        type: "POST",
                            url: "<?php echo WEB_ROOT . 'execute/map.php' ?>",
                        dataType: "html",
                        data: this.formData,
                        cache: false,
                        success: function(data) {
                            $("#load_map").html(data)
                        },
                        error: function(xhr, status, error) {
                            console.log("Error : " + xhr.status)
                        }
                    });
                return false;
            },
            checkAuth: function(obj){
                console.log(obj)
                var qty = 0;
                if(['Table','Chair'].indexOf(obj.category) !== -1){
                    var qty = 1;
                    $("#label_quantity").show()
                    $("#label_name").hide()
                } else {
                    $("#label_quantity").hide()
                    $("#label_name").show()
                    if(obj.category == 'Function Hall'){
                        var qty = 1;
                         $("#label_name").hide()
                    }
                }
                $("#input_amenity_id").val(obj.amenity_id)
                $("#input_quantity").val(qty)
                $("#input_available").val(obj.available)
                $("#input_name").val(obj.name)
                $("#input_category").val(obj.category)
                $("#input_date_from").val(obj.date_from)
                $("#input_date_to").val(obj.date_to)
                $("#input_total_days").val(obj.days)
                $("#input_price_per_day").val(obj.amount)
                
                var total = parseFloat(obj.days * obj.amount)


                $("#input_total_amount").val(parseFloat(total).toFixed(2))
                
                $("#reservationModal").modal({
                    backdrop: 'static',
                    keyboard: false
                })
                return false
            }
        }

        $(document).on('input', '#input_quantity', function(e){
            e.preventDefault();
            var qty = $(this).val()
            var available = $("#input_available").val()
            if(parseInt(qty) > parseInt(available)){
                $(this).val(available)
            }

            var qty1 = $('#input_quantity').val()
            var price = $("#input_price_per_day").val()
            var days = $("#input_total_days").val()

            var total = parseFloat(price) * parseFloat(days)

            if(parseInt(qty1) > 0){
                var final_total = parseFloat(total * qty1) 
                $("#input_total_amount").val(final_total)
            } else {
                $("#input_total_amount").val(total)
            }

            
        })

        var dateFrom_default        = $("#txtDateFrom").val(); 
        var dateTo_default          = $("#txtDateTo").val()

        var mapData = new myClass();
            mapData.loadMap({
                txtDateFrom: dateFrom_default,
                txtDateTo  : dateTo_default
            });

        $(document).on('click', '.book_now', function(e){
            e.preventDefault()
            var dateFrom        = $("#txtDateFrom").val(); 
            var dateTo          = $("#txtDateTo").val()
            var date1         = new Date(dateFrom);
            var date2         = new Date(dateTo);
            
            var status      = $(this).data('status')
            var category    = $(this).data('category')
            var name        = $(this).data('name')
            var amount      = $(this).data('amount')
            var quantity    = $(this).data('quantity')
            var amenity_id  = $(this).data('amenityid')
            var category_id = $(this).data('categoryid')
            var available   = 0;
            if(['Table','Chair'].indexOf(category) !== -1){
                available = $(this).data('available')
            }
            
            if(status == 0){
                toastr.error('Not Available','Message', {
                    positionClass:'toast-bottom-right',
                })
                return;
            }

            if(dateFrom == "" && dateTo == ""){
                toastr.error('Please select a date','Message',{
                    positionClass:'toast-bottom-right',
                })
                return;
            }   

            if(date1.getTime() > date2.getTime()){
                toastr.error('Invalid date.Please try again!','Message',{
                    positionClass:'toast-bottom-right',
                })
                return;
            }

            const diffTime      = Math.abs(date2 - date1);
            var diffDays        = parseInt(Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1); 
       
            mapData.checkAuth({
                category    : category,
                name        : name,
                date_from   : dateFrom,
                date_to     : dateTo,
                amount      : amount,
                quantity    : quantity,
                amenity_id  : amenity_id,
                category_id : category_id,
                price       : 0,
                days        : diffDays,
                available   : available
            })
 
        })
        
        $(document).on('submit', '#frmBeachSearch', function(e){
            e.preventDefault()
            var dateFrom        = $("#txtDateFrom").val(); 
            var dateTo          = $("#txtDateTo").val()
            var date1         = new Date(dateFrom);
            var date2         = new Date(dateTo);
            $("#txt_result").hide()
            if(dateFrom != "" && dateTo != ""){
                if(date1.getTime() > date2.getTime()){
                    toastr.error('Invalid date.Please try again!','Message',{
                        positionClass:'toast-bottom-right',
                    })
                    return;
                } else {
                    mapData.loadMap({
                        txtDateFrom: dateFrom,
                        txtDateTo  : dateTo
                    }); 
                }
            } else {
                toastr.warning('Please select a date.','Message',{
                        positionClass:'toast-bottom-right',
                    })
                return
            }
        })
    });
</script>