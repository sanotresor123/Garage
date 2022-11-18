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
				<h1><u>Update CarWasher</u></h1>
				<?php
            $id=$_GET["carwasher_id"];
            $query=mysqli_query($con,"SELECT * FROM client INNER JOIN vehicle INNER JOIN carwasher ON vehicle.vehicle_id=carwasher.vehicle_id and vehicle.client_id=client.client_id WHERE carwasher_id='$id'");
            while ($row=mysqli_fetch_array($query))
            {
            $model=$row["model"];
            $plate_number=$row["plate_no"];	
            $type=$row["type"];	
            $client_name=$row["client_name"];	
            $client_phone=$row["client_phone"];	
            $carwasher_name=$row["carwasher_name"];
            $carwasher_phone=$row["phone_no"];	
            $date=$row["date"];
            }
				?>
		
				<form action="" method="POST">
 		<table border="0">
 			<tr><td></td><td><input type="hidden" name="vehicle_id" value="<?php echo $rowchck['vehicle_id'];?>" readonly></td></tr>
 			<tr><td></td><td><input type="hidden" name="client_id" value="<?php echo $rowchck['client_id'];?>" readonly></td></tr>
 			<tr><td>model</td><td><input type="text" name="mdl" value="<?php echo $model;?>" readonly></td></tr>
				<tr><td>plate_number</td><td><input type="text" name="pln" value="<?php echo $plate_number;?>" readonly></td></tr>
				<tr><td>type</td><td><input type="text" name="typ" value="<?php echo $type;?>" readonly></td></tr>
				<tr><td>client name</td><td><input type="text" name="cln" value="<?php echo $client_name;?>" readonly></td></tr>
				<tr><td>client phone</td><td><input type="text" name="clp" value="<?php echo $client_phone;?>"readonly></td></tr>
			<tr><td>carwasher Name</td><td><input type="text" name="crn" value="<?php echo $carwasher_name;?>"></td></tr>
			<tr><td>Phone number</td><td><input type="text" name="cpn" value="<?php echo $carwasher_phone;?>"></td></tr>
			<tr><td>Date</td><td><input type="date" name="tm" value="<?php echo $date;?>"></td></tr>
			<tr><td></td><td><input type="submit" value="update carwasher" name="savebtn"></td></tr>	
			</table>
				
		</form>
	
<?php
if (isset($_POST['savebtn'])) {
			$carwasher=$_POST['crn'];
			$phonenumber=$_POST['cpn'];
			$time=$_POST['tm'];
            $vehicleid=$_POST['vehicle_id'];
			include "connect.php";
			$query=mysqli_query($con,"UPDATE carwasher SET carwasher_name='$carwasher',phone_no='$phonenumber',date='$time' WHERE carwasher_id='$id'");
			if ($query) {
				echo "CAR WASHER UPDATED";
				header("location:viewcarwasher.php");
			}
			else
			{
				echo "failed";
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