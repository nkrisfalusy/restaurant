
<html lang="en">
  <head>
	<?php
		session_start();
		$orderID = 0;
		if(isset($_SESSION['orderID'])){
			$orderID = $_SESSION['orderID'];
			echo '<script type="text/javascript">',
				 'getOrder('.$orderID.')',
				 '</script>'
			;
		}
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Restaurant</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">Restaurant <span class="lite">Foos</span></a>
            <!--logo end-->


            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>    
                  <li>
                      <a class="" href="menu.php">
                          <i class="icon_genius"></i>
                          <span>Menu</span>
                      </a>
                  </li>	
				  <li>                     
                      <a class="" href="about.php">
                          <i class="icon_documents_alt"></i>
                          <span>About</span>
                      </a>          
                  </li>  				  
                  <li>                     
                      <a class="" href="contact.php">
                          <i class="icon_document_alt"></i>
                          <span>Contact</span>
                      </a>          
                  </li>  


                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
			<!-- game start -->
			<div class="row">
				<div class="col-lg-6">
					<h3 class="page-header">
					Order Details
					</h3>
				</div>
				<div class="col-lg-6">
					<h3 class="page-header" align="right">
						<div class="search-container">
							<form action="javascript:;" onsubmit="getOrder()">
							  <input type="text" placeholder="Order Number" name="search" id="search">
							  <button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</h3>
				</div>
			</div>
			 
			<div class="row">
			  	<div class="col-lg-4">
				</div>
				<div class="col-lg-4">
					<h3 class="page-header" align="center">
						<div id="orderidnum"></div>
					</h3>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-2">
				</div>
			  	<div class="col-lg-4">
					<h3 class="page-header" align="left">
						<div id="orderNameDetails"></div>
					</h3>
				</div>
				<div class="col-lg-6">
					<h3 class="page-header" align="left">
						<div id="orderItemDetails"></div>
					</h3>
				</div>
			</div>
			
			
		    </div>
		    <!-- game end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
	<script src="js/chance.js"></script>
	<script>
		function getOrder(orderID){
			var input;
			if(orderID == null){
				input = document.getElementById("search").value;
			}else{
				input = orderID;
			}
			
			var ordertitle = document.getElementById("orderidnum");
			var orderdetails = document.getElementById("orderItemDetails");
			var response = "";
			var xhttp = new XMLHttpRequest();
			var fname, lname, streetadd, city, state, zip;
			var detailstext;
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  response = xhttp.responseText;
				}
			  };
			xhttp.open("GET", "getOrderDetails.php?orderID="+input, false);
			xhttp.send();
			console.log(response);
			
			if(response == 0){
				ordertitle.innerHTML="Order Not Found";	
			}
			else{
				ordertitle.innerHTML = "Order Number " + input;
				var totalcost = 0;
				var split = response.split("~");
				fname = split[0];
				lname = split[1];
				streetadd = split[2];
				city = split[3];
				state = split[4];
				zip = split[5];
				document.getElementById("orderNameDetails").innerHTML = fname + " " + lname + "</br>" + streetadd + "</br>" + city + ", " + state + ", " + zip;
				var i=6;
				detailstext = "<table>";
				while((i+2)<split.length){
					console.log(i);
					var itemcost = split[i+2] * split[i+1];
					totalcost += itemcost;
					detailstext += "<tr><td>" + split[(i)] + "("+split[i+2]+")</td><td>&nbsp;&nbsp;x" + split[i+1] + "</td><td>&nbsp;&nbsp;&nbsp;"+itemcost+"</td></tr>";
					
					i=i+3;
				}
				detailstext += "<tr><td></td><td>Total:</td><td>&nbsp;&nbsp;&nbsp;"+totalcost+"</td></tr>";
				detailstext += "</table>";
				orderdetails.innerHTML = detailstext;
			}
		}
	</script>

  </body>
</html>









