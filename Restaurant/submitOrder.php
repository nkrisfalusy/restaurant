<?php
include "includes.php";
$tbl_name="orders"; // Table name 

// Connect to server and select databse.
$link = mysqli_connect("$mysqlhost", "$mysqluser", "$mysqlpass")or die("cannot connect"); 
mysqli_select_db($link, "$mysqldb")or die("cannot select DB");

//get info from form
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$price = $_POST["price"];
$streetadd = $_POST["streetadd"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$ccnumber = $_POST["ccnumber"];
$expmonth = $_POST["expmonth"];
$expyear = $_POST["expyear"];
$cvv = $_POST["cvv"];

$allitems = $_POST["allitems"];
$allquantities = $_POST["allquantities"];

$sql = "INSERT INTO `$tbl_name` (`fname`, `lname`, `price`, `streetadd`, `city`, `state`, `zip`, `ccnumber`, `expmonth`, `expyear`, `cvv`) VALUES('$fname','$lname','$price','$streetadd','$city','$state','$zip','$ccnumber','$expmonth','$expyear','$cvv');";


$result=mysqli_query($link, $sql);

$last_id = mysqli_insert_id($link);

$tbl_name = "orderdetails";

$allitems = explode(",", $allitems);
$allquantities = explode(",", $allquantities);
$index=0;
foreach($allitems as &$value){
	if($allquantities[$index] != 0){	
		$sql = "INSERT INTO `$tbl_name` (`orderID`, `menuID`, `quantity`) VALUES('$last_id','$value','$allquantities[$index]');";
		$result=mysqli_query($link, $sql);
	}
	$index++;
}
session_start();
$_SESSION['orderID'] = $last_id;
header("location:orderDetails.php");
?>