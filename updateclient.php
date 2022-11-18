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
			include "connect.php";
			?>
		</div>
		<div id="menu">
			<?php
			include "menu.php";
			?>
        </div>
		<div id="content">
			<h1><u>Update Client</u></h1>
			<?php
			$id=$_GET["client_id"];
			$select=mysqli_query($con,"select * from client where client_id=$id");
			while($rw=mysqli_fetch_array($select)){
				$clientn=$rw["client_name"];
				$clientp=$rw["client_phone"];
				$price=$rw["price"];

			}
			?>
			<form action="" method="POST">
				<table border="0">
					<tr>
						<td>Client Name</td>
						<td><input type="text" name="cn" value="<?php echo $clientn;?>"></td>
					</tr>
					<tr>
						<td>Client Phone</td>
						<td><input type="text" name="cp" value="<?php echo $clientp;?>"></td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type="number" name="p" value="<?php echo $price;?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="UpdateDriver" name="saved" ></td>
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
        $update=mysqli_query($con,"UPDATE client SET client_name='$client_name',client_phone='$client_phone',price='$price' WHERE client_id='$id'");
            	if($update)
            	{

            		echo "DATA UPDATED SUCCESSFULLY";
            		header("location:viewclient.php");
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