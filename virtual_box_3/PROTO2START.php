<!--KARIM KHAIRAT-->


<!DOCTYPE html>
<html>
<style>
/* Background*/
body{
  background-image:url(Spat.jpg);

}
.header{
    color: white;
    width: 100%;
    padding: 0px;
    text-align: center;
    left:0;
    top:10%;
    font-size: 40px;
    font-style: bold;
    position: fixed;
    font-family: "verdana";
  }
.body{
	color: white;
	width: 100%;
	left:0;
	text-align: center;
	top:25%;
	font-size: 20px;
	position: fixed;
}
</style>

<div class='header'> Browse </div>

<div class = 'body'>
<!--PASSES THE VARIABLES TO THE NEXT PAGE WHICH 
CALLS SQL STATEMENT AND PRINTS PRODUCT NAMES AVAILABLE-->
<form method="get" action="PROTO2URLPAGE.php"> 
	Spatula Name: <input type ="text" name ="Spat" value = "">
	<p>
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
	Price($AU): <input type ="text" name ="Price" value = ""><p>
	<input type="submit">
</div>


<?php

?>

</html>
