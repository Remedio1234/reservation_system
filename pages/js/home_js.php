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
                }
            }

        var mapData = new myClass();
        mapData.loadMap({a:1});   
    });
</script>