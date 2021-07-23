<style>
/**********************
/***** Services *******
/*********************/
section{
	/* padding: 60px 0; */
}
section .section-title{
	text-align:center;
	color:#007b5e;
	margin-bottom:50px;
	text-transform:uppercase;
}
#what-we-do{
	background:#ffffff;
}
#what-we-do .card{
	padding: 1rem!important;
	border: none;
	margin-bottom:1rem;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#what-we-do .card:hover{
	-webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	-moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}
#what-we-do .card .card-block{
	padding-left: 50px;
    position: relative;
}
#what-we-do .card .card-block a{
	color: #007b5e !important;
	font-weight:700;
	text-decoration:none;
}
#what-we-do .card .card-block a i{
	display:none;
	
}
#what-we-do .card:hover .card-block a i{
	display:inline-block;
	font-weight:700;
	
}
#what-we-do .card .card-block:before{
	font-family: FontAwesome;
    position: absolute;
    font-size: 39px;
    color: #007b5e;
    left: 0;
	-webkit-transition: -webkit-transform .2s ease-in-out;
    transition:transform .2s ease-in-out;
}
#what-we-do .card .block-1:before{
    content: "\f0e7";
}
#what-we-do .card .block-2:before{
    content: "\f0eb";
}
#what-we-do .card .block-3:before{
    content: "\f00c";
}
#what-we-do .card .block-4:before{
    content: "\f209";
}
#what-we-do .card .block-5:before{
    content: "\f0a1";
}
#what-we-do .card .block-6:before{
    content: "\f218";
}
#what-we-do .card:hover .card-block:before{
	-webkit-transform: rotate(360deg);
	transform: rotate(360deg);	
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
</style>
<div class="container">
<div id="what-we-do">
  <form class="my-5" style="margin-bottom:10em!important;">
  <section>
    <h3>Contact Us</h3>
    <hr>

    <div class="row mt-5">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Firstname</label>
          <input type="text" class="form-control" placeholder="Enter firstname" id="firstname" name="firstname">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="last">Company</label>
          <input type="text" class="form-control" placeholder="Enter lastname" id="lastname" name="lastname">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="company">Phone Number</label>
          <input type="text" class="form-control" placeholder="Enter phone no." id="phone_no" name="phone_no">
        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">

        <div class="form-group">
          <label for="phone">Email address</label>
          <input type="tel" class="form-control" id="phone" placeholder="Enter Email address" id="email_address" name="email_address">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->

     <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="company">Message</label>
          <textarea class="form-control" rows="5" placeholder="Enter Message" id="message" name="message"></textarea>
        </div>


      </div>
     
    </div>
    <!--  row   -->
    <button type="submit" class="btn btn-primary">Submit</button>
    </section>
  </form>
  </div>
</div>