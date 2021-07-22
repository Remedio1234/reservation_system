<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>JS Shopping Cart | Webdevtrick.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css'>
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="row">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">JS Shopping Cart</a></h1>
            </li>
        </ul>
    </nav>
    <div class="medium-4  columns">
        <div class="cart">
            <h1>Cart items</h1>
            <div class="row">
                <div class="medium-6 columns">
                    <button class="tiny secondary" id="clear">Clear the cart</button>
                </div>
                <div class="medium-6 columns">
                    <button class="tiny disabled" title="Work in progress">Checkout</button>
                </div>
            </div>
            <div id="cartItems">Loading cart...</div>
            Total price: <strong id="totalPrice">0 $</strong>
        </div>
      
    </div>
    <div class="medium-8 columns">
        <h1>Products List</h1>
        <div class="products">
            <div class="product medium-4 columns" data-name="Vivobook" data-price="50000" data-id="0">
                <img src="https://webdevtrick.com/wp-content/uploads/vivobook.jpg" alt="" />
                <h3>Vivobook</h3>
                <input type="number" class="count" value="1" />
                <button class="tiny">Add to cart</button>
            </div>
            <div class="product medium-4 columns" data-name="Surface Pro" data-price="85000" data-id="1">
                <img src="https://webdevtrick.com/wp-content/uploads/surface.jpg" alt="" />
                <h3>Surface Pro</h3>
                <input type="number" class="count" value="1" />
                <button class="tiny">Add to cart</button>
            </div>
            <div class="product medium-4 columns" data-name="Predator" data-price="250000" data-id="2">
                <img src="https://webdevtrick.com/wp-content/uploads/predator.jpg" alt="" />
                <h3>Predator</h3>
                <input type="number" class="count" value="1" />
                <button class="tiny">Add to cart</button>
            </div>
        </div>
    </div>
</div>
<script type="text/template" id="cartT">
  <% _.each(items, function (item) { %> <div class = "panel"> <h3> <%= item.name %> </h3>  <span class="label">
<%= item.count %> piece<% if(item.count > 1)
{%>s
<%}%> for <%= item.total %>₹</span > </div>
<% }); %>
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'></script>
<script  src="function.js"></script>

</body>
</html>