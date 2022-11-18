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
			?>
        </div>
		<div id="content">
				<h1><u>Record CarWasher</u></h1>
		<form action=""method="POST">
			<table border="0">
				<tr><td><select name="vehicle">
					<option>please select Vehicle PlateNumber</option>
					<?php
					 include "connect.php";
					 $query=mysqli_query($con,"select*from vehicle order by plate_no desc");
					 while ($row=mysqli_fetch_array($query))
					{
					?>
					<option><?php echo $row["plate_no"];?></option>
					<?php
				    }
					?>
						</select><td></td>
					<td><input type="submit" name="check" value="Check"></td>
				</tr>
			</table>
		</form>
		<?php
		if (isset($_POST["check"]))
		{
			$plate_number=$_POST['vehicle'];
			
			include "connect.php";
			$check=mysqli_query($con,"select * from vehicle  inner join client on client.client_id=vehicle.client_id and vehicle.vehicle_id=vehicle_id where plate_no='$plate_number'");
			while ($rowchck=mysqli_fetch_array($check)) {
				?>
				<form action="" method="POST">
 		<table border="0">
 			<tr><td></td><td><input type="hidden" name="vehicle_id" value="<?php echo $rowchck['vehicle_id'];?>" readonly></td></tr>
 			<tr><td></td><td><input type="hidden" name="client_id" value="<?php echo $rowchck['client_id'];?>" readonly></td></tr>
 			<tr><td>model</td><td><input type="text" name="mdl" value="<?php echo $rowchck['model'];?>" readonly></td></tr>
				<tr><td>plate_number</td><td><input type="text" name="pln" value="<?php echo $rowchck['plate_no'];?>" readonly></td></tr>
				<tr><td>type</td><td><input type="text" name="typ" value="<?php echo $rowchck['type'];?>" readonly></td></tr>
				<tr><td>client name</td><td><input type="text" name="cln" value="<?php echo $rowchck['client_name'];?>" readonly></td></tr>
				<tr><td>client phone</td><td><input type="text" name="clp" value="<?php echo $rowchck['client_phone'];?>"readonly></td></tr>
			<tr><td>carwasher Name</td><td><input type="text" name="crn"></td></tr>
			<tr><td>Phone number</td><td><input type="text" name="cpn" value="+250"></td></tr>
			<tr><td>Date</td><td><input type="date" name="tm"></td></tr>
			<tr><td></td><td><input type="submit" value="save carwasher" name="savebtn"></td></tr>	
			</table>
				
		</form>
		 <?php
}}
?>
<?php
if (isset($_POST['savebtn'])) {
			$carwasher=$_POST['crn'];
			$phonenumber=$_POST['cpn'];
			$time=$_POST['tm'];
            $vehicleid=$_POST['vehicle_id'];
			include "connect.php";
			$query=mysqli_query($con,"INSERT INTO `carwasher` (`carwasher_id`, `carwasher_name`, `phone_no`, `date`, `vehicle_id`) VALUES ('', '$carwasher', '$phonenumber', '$time', '$vehicleid')");
			if ($query) {
				echo "CAR WASHER INSERTED";
				header("refresh:3;");
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