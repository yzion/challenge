<!--KARIM KHAIRAT-->


<!DOCTYPE html> 
<html>
<style>
body{
 background-image:url(Spat.jpg);

}
</style>

<?php 
include(PROTO2START.php);
//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("localhost","root","0000","sqli");

// Check connection
if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}
$Spatula=$_GET['Spat']; 
$Type=$_GET['type'];
$Size=$_GET['Size'];

$Color=$_GET['Color'];
$Price = $_GET['Price'];
$string = "";
$numstr = 0;
//CHECK IF FIELD WAS ALTERED, IF IT WAS ADD TO STRING
if($Spatula)
{
	$string.="`Product Name` = '".$Spatula."'";
	$numstr ++;
}
if($Type!= 'selectType' && $numstr >0)
{
	$string.=" AND `Type` = '".$Type."'";
	$numstr ++;

}
elseif($Type!= 'selectType' && $numstr ==0)
{
	$string.="`Type` = '".$Type."'";
	$numstr ++;
}
if($Size&& $numstr >0)
{
	$string.=" AND `Size` = '".$Size."'" ;
	$numstr ++;
}
elseif($Size && $numstr ==0)
{
	$string.="`Size` = '".$Size."'" ;	
	$numstr ++;

}
if($Color&& $numstr >0)
{
	$string.=" AND `Colour` = '".$Color."'" ;
	$numstr ++;

}
elseif($Color && $numstr ==0)
{
	$string.="`Colour` = '".$Color."'";
	$numstr ++;

}
if($Price&& $numstr >0)
{
	$string.=" AND `Price` = '".$Price."'" ;

}
elseif($price && $numstr ==0)
{
	$string.="`Price` = '".$Price."'" ;
	$numstr ++;
}
//IF STRING ISN'T EMPTY DO:
if($string != ""){
	$Search = mysqli_query($con,"SELECT * FROM Spatulas WHERE ".$string.";");
}
//IF STRING IS EMPTY RETURN ALL ITEMS
else{
	$Search = mysqli_query($con,"SELECT * FROM Spatulas;");
}

if (mysqli_num_rows($Search)>0){
	while($table_row = mysqli_fetch_array($Search))
	{

		$Name = $table_row['ProductName'];
		$id = $table_row['idSpatula'];

		echo "<p><form method='get' action='DETAILS.php'>";
		echo "<a href='DETAILS.php?id=$id'>";
		echo $Name;
		echo"</a></form>";

	}
}
else
{
	echo"No matching results found"; 
	echo"<p> <a href='PROTO2START.php'>Go To Homepage</a>";

}
echo "</html>";
mysqli_close($con);
?>
