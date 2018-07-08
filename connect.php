<?php
//database connection
$hostser = "localhost";
$usern = "root"; //"sorasvie";
$passw = ""; //"aABic@''123de1?";
$dbname = "requisition"; //"sorasvie_svap";
$conn = mysqli_connect($hostser, $usern, $passw, $dbname);

if (mysqli_connect_error($conn)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	//echo 'MYSQL CONNECTION SUCCESSFUL';
}

/* $conn= mysqli_connect($hostser,$usern,$passw)or die(mysqli_error());
$conn=mysqli_select_db($conn,$dbname) or die(mysqli_error());
echo mysqli_error($conn); */
//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$hostser.';dbname='.$dbname, $usern, $passw);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

?>