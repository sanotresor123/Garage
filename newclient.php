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
			<h1><u>Record New Client</u></h1>
			<form action="newclient.php" method="POST">
				<table border="0">
					<tr>
						<td>Client Name</td>
						<td><input type="text" name="cn"></td>
					</tr>
					<tr>
						<td>Client Phone</td>
						<td><input type="text" name="cp" value="+250"></td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type="number" name="p"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="saveDriver" name="saved" ></td>
					</tr>
				</table>
			</form>
            <?php
            if (isset($_POST["saved"])) 
            {
            	$client_name=$_POST["cn"];
            	$client_phone=$_POST["cp"];
            	$price=$_POST["p"];
            	$con=mysqli_connect("localhost","root","","carwash");
        $insert=mysqli_query($con,"insert into client values('','$client_name','$client_phone','$price')");
            	if($insert){

            		echo "DATA INSERTED SUCCESSFULLY";
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