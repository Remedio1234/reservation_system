<div class="container">
    <header class="jumbotron my-5 header-jombo">
        <div class="row">
            <div class="col-md-12 search-form">
            <h4 class="text-center text-secondary mb-3">Happiness is a day at the beach. Book Now!</h4>
                <form action="" method="post" name="frmBeachSearch" id="frmBeachSearch">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="date-from-name" class="control-label"><strong>Date From</strong></label>
                            <div id="dateFrom"> </div>
                            <input type="hidden" id="txtDateFrom" name="txtDateFrom" value="" />
                        </div>      
                    </div>      
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="date-to-name" class="control-label"><strong>Date To</strong></label>
                            <div id="dateTo"> </div>
                            <input type="hidden" id="txtDateTo" name="txtDateTo" value="" />
                        </div>       
                    </div>   
                    <div class="col-md-2">
                    <label for="date-to-name" class="control-label"><strong>&nbsp;</strong></label>
                        <button type="submit" name="btn_submit_venue" class="btn btn-block btn-primary btn-lg">Check</button>
                    </div>             
                </div>  
                </form>
            </div>
        </div>
    </header>
    <div class="row mb-5">
        <div class="col-md-4">
            <h1>Beach Map</h1>
        </div>
        <div class="col-md-8">
        <p id="txt_result" style="display:none;font-size:18px;">
            <em>
                Search Result:
                <strong>Date From: </strong><span id="txt_date_from"></span>
                <strong>Date To: </strong><span id="txt_date_to"></span>
            </em>
        </p>
        </div>
        
        <div class="col-md-12" style="border: 1px solid #f3f3f3;background:#f9f9f9;">
            <div id="load_map"></div>
        </div>
    </div>
</div>