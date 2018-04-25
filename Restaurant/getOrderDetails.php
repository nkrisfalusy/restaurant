<?php
	session_start();
	
	$orderID = $_GET['orderID'];
	
	include "includes.php";
	$tbl_name="orders"; // Table name 

	// Connect to server and select databse.
	$link = mysqli_connect("$mysqlhost", "$mysqluser", "$mysqlpass")or die("cannot connect"); 
	mysqli_select_db($link, "$mysqldb")or die("cannot select DB");
	
	$sql = "SELECT orderdetails.orderID, menu.displayname, orderdetails.quantity, menu.price, orders.fname, orders.lname, orders.streetadd, orders.city, orders.state, orders.zip, orders.ccnumber, orders.expmonth, orders.expyear, orders.cvv FROM ((orders JOIN orderdetails ON orders.id = orderdetails.orderID) JOIN menu ON orderdetails.menuID = menu.id) WHERE orders.id = $orderID;";
	
	$result=mysqli_query($link, $sql);


	
	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	$nameinfo = false;
	if($count == 0){
		echo "0";
	}
	else{
		while($row = mysqli_fetch_array($result))
		{
			if(!$nameinfo){
				echo $row['fname']."~".$row['lname']."~".$row['streetadd']."~".$row['city']."~".$row['state']."~".$row['zip']."~";
				$nameinfo=true;
			}
			echo $row['displayname']."~".$row['quantity']."~".$row['price']."~";
		}
	}

?>

