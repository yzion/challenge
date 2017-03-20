<!--KARIM KHAIRAT-->
<!DOCTYPE html> 
<html>
<style>
/* Background*/
body{
  background-image:url(Spat.jpg);

}

.body{
	color: white;
	width: 100%;
	left:0;
	top:25%;
	font-size: 20px;
	position: fixed;
}
table,th,td{
	border:2px solid black;
	border-collapse: collapse;
	background-color: orange;
}
th,td{
	padding: 4px;
}
</style>

<div class = 'body'>
<!--PASSES THE VARIABLES TO THE NEXT PAGE WHICH 
CALLS SQL STATEMENT AND PRINTS PRODUCT NAMES AVAILABLE-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	First Name: <input type ="text" name ="Spat" value = "">
	<!--<p>
	<select name="type">
	<option value = "selectType">Select Type</option>
	<option value = "Drugs">Drugs</option>
	<option value = "Food">Food</option>
	<option value = "Paint">Paint</option>
	<option value= "Plaster">Plaster</option>
	</select>
	<p>
	Size: <input type ="text" name ="Size" value = ""><p>
	Colour :<input type ="text" name ="Color" value = ""><p>
	Price($AU): <input type ="text" name ="Price" value = ""><p>-->
	<input type="submit">
</div>

<?php 
include(PROTO2START.php);
include(PROTO2URLPAGE.php);

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("localhost","root","0000","sqli");

// Check connection
if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}

$id=$_GET['id'];
$spat = $_POST["Spat"];
//$sql_query = "SELECT * FROM users WHERE first_name LIKE '%".$spat."%';";
$sql_query = "SELECT * FROM users INNER JOIN balance ON users.id=balance.id WHERE first_name LIKE '%".$spat."%' LIMIT 10";
$SQL=  mysqli_query($con,$sql_query);
//echo $sql_query;

	
		
	
echo"<center><p> <b><a href='PROTO2START.php'>Go To Homepage</a></b></center>";


echo "<center>";

//$SQL=  mysqli_query($con,"SELECT * FROM Spatulas WHERE `idSpatula` = ".$id.";");

$fields_num = mysqli_num_fields($SQL);

echo "<h1>Table: {$table}</h1>";
echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysqli_fetch_field($SQL);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysqli_fetch_row($SQL))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}

echo"</center>";

echo "</html>";
mysqli_close($con);
?>
