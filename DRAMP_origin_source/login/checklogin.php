<?php

ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="maikongjian"; // Mysql password
$db_name="users"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
echo "$_POST[sign]";
exit;




// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword");

$home = $_SERVER["HTTP_REFERER"];

header("location:login_success.php?home=$home");
}
else {
	echo "<script>alert('Wrong Username or Password ');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}

ob_end_flush();
?>
