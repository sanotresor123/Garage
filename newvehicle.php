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
			<h1><u>Record Vehicle</u></h1>
		<form action=""method="POST">
			<table border="0">
				<tr><td><select name="line">
					<option>please select ClientNames</option>
					<?php
					 include "connect.php";
					 $query=mysqli_query($con,"select*from client order by client_name asc");
					 while ($row=mysqli_fetch_array($query))
					{
					?>
					<option><?php echo $row["client_name"];?></option>
					<?php
				    }
					?>
					</select></td>
					<td><input type="submit" name="check" value="Check"></td>
				</tr>
			</table>
		</form>
		<?php
		if (isset($_POST["check"]))
		{
			$client_name=$_POST['line'];
			include "connect.php";
			$check=mysqli_query($con,"select * from client where client_name='$client_name'");
			while ($rowchck=mysqli_fetch_array($check)) {
				?>
				<form action="" method="POST">
 		<table border="0">
 			<tr><td></td><td><input type="hidden" name="clientId" value="<?php echo $rowchck['client_id'];?>" readonly></td></tr>
				<tr><td>Client Name</td><td><input type="text" name="clientna" value="<?php echo $rowchck['client_name'];?>" readonly></td></tr>
				<tr><td>Client Phone</td><td><input type="text" name="clientpo" value="<?php echo $rowchck['client_phone'];?>" readonly></td></tr>
				<tr><td>Price</td><td><input type="number" name="price" value="<?php echo $rowchck['price'];?>" readonly></td></tr>
				<tr><td>Model</td><td><input type="text" name="mdl"></td></tr>
				<tr><td>Plate Number</td><td><input type="text" name="pltno"></td></tr>
				<tr><td>Type</td><td><input type="text" name="typ"></td></tr>
				<tr><td></td><td><input type="submit" value="Save Vehicle" name="savebtn"></td>
				</tr>	
			</table>
		</form>
		 <?php
}}
?>
 <?php
 if (isset($_POST['savebtn'])) {
   $client_id=$_POST['clientId'];
   $model=$_POST['mdl'];
   $platenumber=$_POST['pltno'];
   $type=$_POST['typ'];
 	include "connect.php";
 	$query=mysqli_query($con,"insert into vehicle values('','$model','$platenumber','$type','$client_id')");
 	if ($query) {
 		echo "VEHICLE SAVED SUCCESSFULLY";
 		header("refresh:3;");
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