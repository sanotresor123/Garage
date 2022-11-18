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
			<h2><u>RESET ACCOUNT</u></h2>
			<form action="" method="POST">
				<table border="0">
					<tr>
						<td><b>Enter An Old Password:</b></td>
						<td><input type="password" name="olp"></td>
					</tr>
					<tr>
						<td></td><td><input type="submit" name="send" value="SEND"></td>
					</tr>
				</table>
			</form>
			<?php
			if (isset($_POST["send"]))
			 {
			 	$password=$_POST["olp"];
				include "connect.php";
				$query=mysqli_query($con,"select * from users where password='$password'");
				if (mysqli_num_rows($query)==1)
				 {
					while ($row=mysqli_fetch_array($query))
					 {
						?>
						<form action="" method="POST">
							<table border="0">
								<tr>
									<td><b>UserName</b></td>
									<td><input type="text" name="un" value="<?php echo $row['username'];?>" required></td>
								</tr>
								<tr>
									<td><b>Enter New Password</b></td>
									<td><input type="password" name="password1" required></td>
								</tr>
								<tr>
									<td><b>Re-Enter New Password</b></td>
									<td><input type="password" name="password2" required></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="login" value="RESET"></td>
								</tr>
							</table>
						</form>
						<?php
					}
				}
				else{
					echo "PASSWORD NOT FOUND";
					header("refresh:2;");
				}
			}
			if (isset($_POST["login"]))
			 {
				include "connect.php";
				$username=$_POST['un'];
				$password1=$_POST['password1'];
				$password2=$_POST['password2'];
				if ($password1==$password2) 
				{
					$update=mysqli_query($con,"UPDATE users SET username='$username',password='$password1'");
					if ($update)
					 {
						echo "LOGIN CHANGED";
						header("refresh:3;");
					}
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