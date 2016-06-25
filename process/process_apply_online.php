<?php 
//load the function for db connection
require_once("../class/redirect.class.php"); 
require_once("../functions/db_connect.php");
//load the form value
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$address=$_POST['address'];
$phnumber=$_POST['phnumber'];
$mobnumber=$_POST['mobnumber'];
$email=$_POST['email'];
$colname=$_POST['colname'];
$plus2=$_POST['plus2'];
$board=$_POST['board'];
$prgm=$_POST['prgm'];
$abtcol=$_POST['abtcol'];

//prepare the sql 
$sql="INSERT INTO apply_online (firstname,lastname,address,phone,cell,email,collegename,plus2,board,program,about_colz) VALUES ('$fname','$lname','$address','$phnumber','$mobnumber','$email','$colname','$plus2','$board','$prgm','$abtcol')";

//execute the sql 
$res=mysqli_query($conxn,$sql) or trigger_error(mysqli_error($conxn));

//decisive paramater
$affRows=mysqli_affected_rows($conxn);
//decide true or false
if($affRows > 0){
	new Redirect("../index.php?success=Thank you for staying connected, we will get back to u shortly");
}else{
	new Redirect("../index.php?error=The information could not be submitted, Please try again later");
}




?>