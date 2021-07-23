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
                            <!-- <div id="dateFrom"> </div> -->
                            <input type="date" id="txtDateFrom" class="form-control" name="txtDateFrom" value="" />
                        </div>      
                    </div>      
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="date-to-name" class="control-label"><strong>Date To</strong></label>
                            <!-- <div id="dateTo"> </div> -->
                            <input type="date" id="txtDateTo" class="form-control" name="txtDateTo" value="" />
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
                <strong>Total Hour: </strong><span id="txt_total_hour"></span>
            </em>
        </p>
        </div>
        
        <div class="col-md-12" style="border: 1px solid #f3f3f3;background:#f9f9f9;">
            <div id="load_map"></div>
        </div>
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Reservation Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-reservation" id="form-reservation" method="post">
                    <input 
                        type="hidden" 
                        name="input_available" 
                        id="input_available"
                        />
                    <!-- <input 
                        type="hidden" 
                        name="input_category_id" 
                        id="input_category_id"
                        /> -->
                    <input 
                        type="hidden" 
                        name="input_amenity_id" 
                        id="input_amenity_id"
                        />
                    <div class="form-label-group mb-2">
                        <label for="input_category">Category</label>
                        <input 
                            type="text" 
                            id="input_category" 
                            name="input_category" 
                            class="form-control" 
                            style="background:#ffffff;"
                            readonly 
                            />
                    </div>

                    <div class="form-label-group mb-2" id="label_name">
                        <label for="input_name"><span id="name_number">Name</span></label>
                        <input 
                            type="text" 
                            id="input_name" 
                            name="input_name" 
                            class="form-control" 
                            style="background:#ffffff;"
                            readonly 
                            />
                    </div>

                    <div class="form-label-group mb-2">
                        <label for="input_date_from">Date From</label>
                        <input 
                            type="text" 
                            id="input_date_from" 
                            name="input_date_from" 
                            class="form-control" 
                            style="background:#ffffff;"
                            readonly 
                            />
                    </div>

                    <div class="form-label-group mb-2">
                        <label for="input_date_to">Date To</label>
                        <input 
                            type="text" 
                            id="input_date_to" 
                            name="input_date_to" 
                            class="form-control" 
                            style="background:#ffffff;"
                            readonly 
                            />
                    </div>

                    <div class="form-label-group mb-2">
                        <label for="input_amount_day">Price (Per Day)</label>
                        <input 
                            type="text" 
                            id="input_amount_day" 
                            name="input_amount_day" 
                            class="form-control" 
                            style="background:#ffffff;"
                            readonly 
                            />
                    </div>

                    <div class="form-label-group mb-2">
                        <label for="input_total_days">Total Day/s</label>
                        <input 
                            type="text" 
                            id="input_total_days" 
                            name="input_total_days" 
                            class="form-control" 
                            style="background:#ffffff;"
                            readonly 
                        />
                    </div>
                    
                    <div class="form-label-group mb-2" id="label_quantity">
                        <label for="input_quantity">Quantity</label>
                        <input 
                            id="input_quantity" 
                            name="input_quantity" 
                            class="form-control" 
                            placeholder="0"
                        />
                    </div>
    
                    <div class="form-label-group mb-2">
                        <label for="input_total_amount">Total</label>
                        <input 
                            type="text" 
                            id="input_total_amount" 
                            name="input_total_amount" 
                            class="form-control" 
                            readonly 
                            style="background:#ffffff;"
                        />
                    </div>

                        <button 
                            class="btn btn-lg btn-primary btn-block text-uppercase" 
                            type="submit">Reserve Now</button>
                    </form>
            </div>
            </div>
        </div>
    </div>