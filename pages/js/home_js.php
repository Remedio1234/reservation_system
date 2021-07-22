<script>
    $(document).ready(function() {  
    //     $('#dateFrom').dateTimePicker();
    //     $('#dateTo').dateTimePicker();
    //     var dateFrom = $("#dateFrom").text();
    //     var dateTo = $("#dateFrom").text();
    //     var a = dateFrom.replace(/(<([^>]+)>)/gi, "");
    //     var b = dateFrom.replace(/(<([^>]+)>)/gi, "");
    //     $("#txtDateFrom").val(a)
    //    $("#txtDateTo").val(b)

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
                // $.ajax({
                //         type: "POST",
                //          url: "<?php echo WEB_ROOT . 'execute/checker.php' ?>",
                //         dataType: "json",
                //         cache: false,
                //         success: function(data) {
                //             console.log(obj)
                            if(obj.type == 'Table' || obj.type == 'Chair'){
                                $("#label_quantity").show()
                                $("#label_name").hide()
                            } else {
                                $("#label_quantity").hide()
                                $("#label_name").show()
                            }
                            $("#input_amenity_id").val(obj.amenity_id)
                            $("#input_category_id").val(obj.category_id)
                            $("#input_quantity").val('')
                            $("#input_available").val(obj.available)
                            $("#input_name").val(obj.name)
                            $("#input_type").val(obj.type)
                            $("#input_date_from").val(obj.date_from)
                            $("#input_date_to").val(obj.date_to)
                            $("#input_total_days").val(obj.days)
                            $("#input_amount_day").val(obj.amount)
                            
                            var total = parseFloat(obj.days * obj.amount)


                            $("#input_total_amount").val(parseFloat(total).toFixed(2))
                            // if(data.login){
                            //     console.log('true')
                            // } else {
                            //     console.log('false')
                            // }
                            $("#reservationModal").modal({
                                backdrop: 'static',
                                keyboard: false
                            })
                    //     },
                    //     error: function(xhr, status, error) {
                    //         console.log("Error : " + xhr.status)
                    //     }
                    // });
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
            var price = $("#input_amount_day").val()
            var days = $("#input_total_days").val()

            var total = parseFloat(price) * parseFloat(days)

            if(parseInt(qty1) > 0){
                var final_total = parseFloat(total * qty1) 
                $("#input_total_amount").val(final_total)
            } else {
                $("#input_total_amount").val(total)
            }

            
        })

        var mapData = new myClass();
            mapData.loadMap({}); 
        // https://www.jqueryscript.net/other/Highly-Customizable-jQuery-Toast-Message-Plugin-Toastr.html
        $(document).on('click', '.book_now', function(e){
            e.preventDefault()

            var status      = $(this).data('status')
            var dateFrom    = $("#txtDateFrom").val(); 
            var dateTo      = $("#txtDateTo").val()
            var type        = $(this).data('type')
            var name        = $(this).data('name')
            var amount      = $(this).data('amount')
            var quantity    = $(this).data('quantity')
            var amenity_id  = $(this).data('amenityid')
            var category_id = $(this).data('categoryid')
            var available   = 0;
            if(type == 'Table' || type == 'Chair'){
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

            // $("#reservationModal").modal('show')
            // toastr.success('available', 'Success', {
            //     positionClass:'toast-bottom-right',
            // })

            const date1         = new Date(dateFrom);
            const date2         = new Date(dateTo);
            const diffTime      = Math.abs(date2 - date1);
            var diffDays        = parseInt(Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1); 
       
            mapData.checkAuth({
                type        : type,
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
            var dateFrom = $("#txtDateFrom").val(); 
            var dateTo   = $("#txtDateTo").val()
            $("#txt_result").hide()
            if(dateFrom != "" && dateTo != ""){
                var date1 = new Date(dateFrom);
                var date2 = new Date(dateTo);
                // if(date1.getTime() === date2.getTime()){
                //     toastr.error('Invalid date.Please try again!','Message',{
                //         positionClass:'toast-bottom-right',
                //     })
                //     return;
                // }

                // else 
                if(date1.getTime() > date2.getTime()){
                    toastr.error('Invalid date.Please try again!','Message',{
                        positionClass:'toast-bottom-right',
                    })
                    return;
                } else {
                    // $("#txt_result").show()
                    // $("#txt_date_from").text(dateFrom)
                    // $("#txt_date_to").text(dateTo)
                    // var total_hours = 1;
                    // var hours    = (date2 - date1) / 1000 / 60 / 60;
                    // if(parseFloat(hours) > 1 ){
                    //     total_hours = hours
                    // }
                    mapData.loadMap({
                        txtDateFrom: dateFrom,
                        txtDateTo  : dateTo
                    }); 
                    // $("#txt_total_hour").text(total_hours)
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