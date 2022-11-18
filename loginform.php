<?php
session_start();
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
			<h2><u>Login Form</u></h2>
        </div>
		<div id="content">
		<form action="" method="POST">
			<table border="0">
				<tr><td>UserName:</td><td><input type="text" name="un"></td></tr>
				<tr><td>Password:</td><td><input type="password" name="pw"></td></tr>
				<tr><td></td><td><input type="submit" name="loginbtn" value="Login"></td></tr>
			</table>
		</form>
		<?php
		if (isset($_POST["loginbtn"])) {
			$username=$_POST["un"];
			$password=$_POST["pw"];
			include "connect.php";
			$query=mysqli_query($con,"select * from users where username='$username' and password='$password'");
			if(mysqli_num_rows($query)>0)
			{
             while ($row=mysqli_fetch_array($query))
              {
             	$_SESSION['password']=$row['password'];
             	header("location:home.php");
             }
			}
             else{
             	echo "username/password is incorrect";
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