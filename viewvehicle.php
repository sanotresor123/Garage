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
			<h1><u>View Vehicle</u></h1>
			<?php
			include "connect.php";
			$query=mysqli_query($con,"SELECT * FROM vehicle INNER JOIN client WHERE client.client_id=vehicle.client_id");
			echo "<table border=1>";
			echo "<tr>"."<th>"."NO"."</th>"."<th>"."Model"."</th>"."<th>"."Plate Number"."</th>"."<th>"."Type"."</th>"."<th>"."Client Name"."</th>"."<th>"."Action"."</th>"."</tr>";
			$a=1;
			while($row=mysqli_fetch_array($query))
			{
            echo "<tr>"."<td>".$a."</td>"."<td>".$row["model"]."</td>"."<td>".$row["plate_no"]."</td>"."<td>".$row["type"]."</td>"."<td>".$row["client_name"]."</td>"."<td>"."<a href=updatevehicle.php?vehicle_id=$row[vehicle_id]>UPDATE"."/<a href=deletevehicle.php?vehicle_id=$row[vehicle_id]>DELETE"."</td>"."</tr>";
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