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
			<h1><u>View Car Washer</u></h1>
			<?php
			include "connect.php";
			$query=mysqli_query($con,"SELECT * FROM client INNER JOIN vehicle INNER JOIN carwasher WHERE vehicle.vehicle_id=carwasher.vehicle_id and vehicle.client_id=client.client_id");
			echo "<table border='1'>";
			echo "<tr>"."<th>"."NO"."</th>"."<th>"."Model"."</th>"."<th>"."Plate Number"."</th>"."<th>"."type"."</th>"."<th>"."Client Name"."</th>"."<th>"."Client Phone"."</th>"."<th>"."Car Washer Name"."</th>"."<th>"."Phone Number"."</th>"."<th>"."Date"."</th>"."<th>"."Action"."</th>"."</tr>";
			$a=1;
			while ($row=mysqli_fetch_array($query))
			{
			echo "<tr>"."<td>".$a."</td>"."<td>".$row["model"]."</td>"."<td>".$row["plate_no"]."</td>"."<td>".$row["type"]."</td>"."<td>".$row["client_name"]."</td>"."<td>".$row["client_phone"]."</td>"."<td>".$row["carwasher_name"]."</td>"."<td>".$row["phone_no"]."</td>"."<td>".$row["date"]."</td>"."<td>"."<a href=updatecarwasher.php?carwasher_id=$row[carwasher_id]>UPDATE"."/<a href=deletecarwasher.php?carwasher_id=$row[carwasher_id]>DELETE"."</td>"."</tr>";
			$a++;
			}
         echo "</table>";
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