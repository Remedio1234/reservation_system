<div class="container">
    <div class="mt-5 mb-5">
        <section>
            <h4 class="section-title mb-2 h4">Reservation Details</h4>
            <table class="table table-stripped show-cart">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Catgory</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Day/s</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
        </table>

        <?php if(isset($_SESSION['customer']['isLoggedIn'])) : ?>
            <button type="submit" class="btn btn-success" id="user_checkout">Submit</button>
        <?php else : ?>
            <button type="submit" class="btn btn-success" id="guest_checkout">Continue</button>
        <?php endif ?>
        </section>
    </div>
</div>