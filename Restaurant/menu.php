<?php
			include "includes.php";
			$tbl_name="menu"; // Table name 			
			$link = mysqli_connect("$mysqlhost", "$mysqluser", "$mysqlpass")or die("cannot connect"); 
			mysqli_select_db($link, "$mysqldb")or die("cannot select DB");
			session_start();
				
			$sql="SELECT * FROM $tbl_name WHERE type='1'";
			$resultapps=mysqli_query($link, $sql);
			
			$sql="SELECT * FROM $tbl_name WHERE type='2'";
			$resultentree=mysqli_query($link, $sql);
			
			$sql="SELECT * FROM $tbl_name WHERE type='3'";
			$resultdessert=mysqli_query($link, $sql);
			
			$sql="SELECT * FROM $tbl_name WHERE type='4'";
			$resultdrink=mysqli_query($link, $sql);
			
			
				
			?>


<html lang="en">
  <head>

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
					Menu
					</h3>
				</div>
				<div class="col-lg-6">
					<h3 class="page-header" align="right">
					Total: <div id="totalprice">$0</div>
					</h3>
				</div>
			</div>
			 <div>
			 
			<div class="row">
			  	<div class="col-lg-4">
				</div>
				<div class="col-lg-4">
					<h3 class="page-header" align="center">
					Appetizers
					</h3>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
			
			<div id="appetizers">
				<?php while($row = mysqli_fetch_array($resultapps))
				{
				echo "</br>".$row['displayname']."&emsp;&emsp;$".$row['price']."<select name=\"".$row['id']."\" onchange=\"updateTotal(".$row['id'].",".$row['price'].",this)\"\">
																					  <option value=\"0\">0</option>
																					  <option value=\"1\">1</option>
																					  <option value=\"2\">2</option>
																					  <option value=\"3\">3</option>
																					</select></br>";
				}?>
			</div>
			
			<div class="row">
			  	<div class="col-lg-4">
				</div>
				<div class="col-lg-4">
					<h3 class="page-header" align="center">
					Entrees
					</h3>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
			
			<div id="Entrees">
				<?php while($row = mysqli_fetch_array($resultentree))
				{
					echo "</br>".$row['displayname']."&emsp;$".$row['price']."<select name=\"".$row['id']."\" onchange=\"updateTotal(".$row['id'].",".$row['price'].",this)\"\">
																					  <option value=\"0\">0</option>
																					  <option value=\"1\">1</option>
																					  <option value=\"2\">2</option>
																					  <option value=\"3\">3</option>
																					</select></br>";
				}?>
			</div>
			
			<div class="row">
			  	<div class="col-lg-4">
				</div>
				<div class="col-lg-4">
					<h3 class="page-header" align="center">
					Desserts
					</h3>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
			
			<div id="Desserts">
				<?php while($row = mysqli_fetch_array($resultdessert))
				{
					echo "</br>".$row['displayname']."&emsp;&emsp;$".$row['price']."<select name=\"".$row['id']."\" onchange=\"updateTotal(".$row['id'].",".$row['price'].",this)\"\">
																					  <option value=\"0\">0</option>
																					  <option value=\"1\">1</option>
																					  <option value=\"2\">2</option>
																					  <option value=\"3\">3</option>
																					</select></br>";
				}?>
			</div>
			
			<div class="row">
			  	<div class="col-lg-4">
				</div>
				<div class="col-lg-4">
					<h3 class="page-header" align="center">
					Drinks
					</h3>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
			
			<div id="Drinks">
				<?php while($row = mysqli_fetch_array($resultdrink))
				{
					echo "</br>".$row['displayname']."&emsp;&emsp;$".$row['price']."<select name=\"".$row['id']."\" onchange=\"updateTotal(".$row['id'].",".$row['price'].",this)\"\">
																					  <option value=\"0\">0</option>
																					  <option value=\"1\">1</option>
																					  <option value=\"2\">2</option>
																					  <option value=\"3\">3</option>
																					</select></br>";
				}?>
			</div>
			
		    </br>
			<div class="col-lg-12">
				<div align="center">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkoutModal">
					  Submit Order
					</button>
				</div>
			</div>
			
			<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Submit Order</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form action="submitOrder.php" method="post">
						<div class="form-group">
							<label for="name">First Name</label>
							<input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="">
						</div>
						<div class="form-group">
							<label for="name">Last Name</label>
							<input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="">
						</div>
						<div class="form-group">
							<label for="name">Street Address</label>
							<input type="text" class="form-control" id="streetadd" placeholder="Street Address" name="streetadd" value="">
						</div>
						<div class="form-group">
							<label for="name">City</label>
							<input type="text" class="form-control" id="city" placeholder="City" name="city" value="">
						</div>
						<div class="form-group">
							<label for="name">State</label></br>
							<select id="state" name="state">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
							</select>	
						</div>
						<div class="form-group">
							<label for="name">Zip Code</label>
							<input type="text" class="form-control" id="zip" placeholder="Zip Code" name="zip" value="">
						</div>
						<div class="form-group">
							<label for="name">Credit Card Number</label>
							<input type="text" class="form-control" id="ccnumber" placeholder="Credit Card Number" name="ccnumber" value="">
						</div>
						<div class="form-group">
							<label for="name">Exp Date</label></br>
							<select id="expmonth" name="expmonth">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
							<select id="expyear" name="expyear">
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
							</select>
						</div>
						<div class="form-group">
							<label for="name">CVV Code</label>
							<input type="text" class="form-control" id="cvv" placeholder="CVV Code" name="cvv" value="">
						</div>
						<input type="hidden" value="" id="hiddenprice" name="price" />
						<input type="hidden" value="" id="hiddenallitems" name="allitems" />
						<input type="hidden" value="" id="hiddenallquantities" name="allquantities" />
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				  </div>
				</div>
			  </div>
			</div>
			  <!-- MyForm -->
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
		var allitems = new Array();
		var allquantities = new Array();
		var allprices = new Array();
		function updateTotal(itemid, price, selectObject){
			var quantity = selectObject.value;
			if(allitems.indexOf(itemid) != -1)
			{
				allprices[allitems.indexOf(itemid)] = (parseFloat(quantity) * parseFloat(price))
				allquantities[allitems.indexOf(itemid)] = parseFloat(quantity);
			}
			else
			{
				allitems.push(itemid);
				allprices.push((parseFloat(quantity) * parseFloat(price)));
				allquantities.push(parseFloat(quantity));
			}
			var div = document.getElementById("totalprice");
			var total = allprices.reduce(getSum);
			total = Math.round(total*100)/100;
			console.log(total);
			div.innerHTML = "$" + total;
			document.getElementById("hiddenprice").value = total;
			document.getElementById("hiddenallitems").value = allitems;
			document.getElementById("hiddenallquantities").value = allquantities;
		}
		
		function getSum(total, num) {
			return total + num;
		}
		
		function submitOrder(){
			console.log(allitems);
			console.log(allprices);
			console.log(allquantities);
		}
		
		$('#popover').popover({ 
			html : true,
			title: function() {
			  return $("#popover-head").html();
			},
			content: function() {
			  return $("#popover-content").html();
			}
		});
	</script>

  </body>
</html>
