<script>
    $(document).ready(function() {  
        $('#dateFrom').dateTimePicker();
        $('#dateTo').dateTimePicker();

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
            }

        var mapData = new myClass();
        mapData.loadMap({a:1}); 

        $(document).on('click', '#rooms_click', function(e){
            e.preventDefault()
            var status      = $(this).data('status')
            var dateFrom    = $("#txtDateFrom").val(); 
            var dateTo      = $("#txtDateTo").val()
            if(status == 0){
                alert("Not Available")
                return;
            }
            if(dateFrom == "" && dateTo == ""){
                alert("Please select a date")
                return;
            }

            alert('start')    
        })
        
        
        $(document).on('submit', '#frmBeachSearch', function(e){
            e.preventDefault()
            var dateFrom = $("#txtDateFrom").val(); 
            var dateTo   = $("#txtDateTo").val()

            if(dateFrom != "" && dateTo != ""){
                var date1 = new Date(dateFrom);
                var date2 = new Date(dateTo);
                if(date1.getTime() === date2.getTime()){
                    alert("Invalid date");
                    return;
                }

                else if(date1.getTime() > date2.getTime()){
                    alert("Invalid date");
                    return;
                } else {
                    var total_hours = 1;
                    var hours    = (date2 - date1) / 1000 / 60 / 60;
                    if(parseFloat(hours) > 1 ){
                        total_hours = hours
                    }

                    mapData.loadMap({
                        txtDateFrom: dateFrom,
                        txtDateTo  : dateTo
                    }); 
                }
            } else {
                alert("Please select a date")
                return
            }
        })
    });
</script>