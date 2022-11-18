<?php
session_start();
if(isset($_SESSION['password']))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div id="layout">
		<div id="banner">
			<?php
			include "title.php";
			?>
		</div>
		<div id="menu">
			<?php
			include "menu.php";
			include "connect.php";
			?>
        </div>
		<div id="content">
			<h1><u>Update Vehicle</u></h1>
			<?php
             $vid=$_GET["vehicle_id"];
             $select=mysqli_query($con,"select * from vehicle inner join client  on client.client_id=vehicle.client_id where vehicle_id='$vid'");
			while($rw=mysqli_fetch_array($select))
			{
				$clientn=$rw["client_name"];
				$Model=$rw["model"];
				$Plate_number=$rw["plate_no"];
				$phone_number=$rw["client_phone"];
				$price=$rw["price"];
				$type=$rw["type"];
            }
			?>
				<form action="" method="POST">
 		<table border="0">
 			<tr><td></td><td><input type="hidden" name="clientId" value="<?php echo $rowchck["client_id"];?>" readonly></td></tr>
            <tr><td>Client Name</td><td><input type="text" name="clientna" value="<?php echo $clientn;?>" readonly></td></tr>
				<tr><td>Client Phone</td><td><input type="text" name="clientpo" value="<?php echo $phone_number;?>" readonly></td></tr>
				<tr><td>Price</td><td><input type="number" name="price" value="<?php echo $price;?>" readonly></td></tr>
				<tr><td>Model</td><td><input type="text" name="mdl" value="<?php echo $Model;?>"></td></tr>
				<tr><td>Plate Number</td><td><input type="text" name="pltno" value="<?php echo $Plate_number;?>"></td></tr>
				<tr><td>Type</td><td><input type="text" name="typ" value="<?php echo $type;?>"></td></tr>
				<tr><td></td><td><input type="submit" value="Update Vehicle" name="savebtn"></td>
				</tr>	
			</table>
		</form>
		 
 <?php
 if (isset($_POST['savebtn'])) {
   $client_id=$_POST['clientId'];
   $model=$_POST['mdl'];
   $platenumber=$_POST['pltno'];
   $type=$_POST['typ'];
 	include "connect.php";
 	$query=mysqli_query($con,"UPDATE vehicle SET model='$model',plate_no='$platenumber',type='$type' WHERE vehicle_id='$vid'");
 	if ($query) 
 	{
 		
 		echo "VEHICLE UPDATED SUCCESSFULLY";
 		header("location:viewvehicle.php");
 	}
 }
 ?> 
    </div>
		<div id="footer">
			<?php
			include "footer.php";
			?>
		</div>
	</div>

</body>
</html>
<?php
}
else
{
header("location:loginform.php");
}
?>