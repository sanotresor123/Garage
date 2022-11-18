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
			<h1><u>View All Clients</u></h1>
			<?php
			include "connect.php";
			$query=mysqli_query($con,"select * from client order by client_name asc");
			echo "<table border='1'>";
			echo "<tr>"."<th>"."NO"."</th>"."<th>"."Client Name"."</th>"."<th>"."Client Phone"."</th>"."<th>"."Price"."</th>"."<th>"."action"."</th>"."</tr>";
			$i=1;
			while($row=mysqli_fetch_array($query))
			{
				echo "<tr>"."<td>".$i."</td>"."<td>".$row["client_name"]."</td>"."<td>".$row["client_phone"]."</td>"."<td>".$row["price"]."</td>"."<td>"."<a href=updateclient.php?client_id=$row[client_id]>UPDATE"."/<a href=deleteclient.php?client_id=$row[client_id]>DELETE"."</td>"."</tr>";
				$i++;
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