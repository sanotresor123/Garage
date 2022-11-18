<div class="dropdown">
				<button class="dropbtn">Client</button>
				<div class="dropdown-content">
					<a href="newclient.php">New Client</a>
					<a href="viewclient.php">View Client</a>
					
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Vehicle</button>
				<div class="dropdown-content">
					<a href="newvehicle.php">New Vehicle</a>
					<a href="viewvehicle.php">View Vehicle</a>
		
				</div>
			</div>
				<div class="dropdown">
				<button class="dropbtn">Car Washer</button>
				<div class="dropdown-content">
					<a href="newcarwasher.php">New CarWasher</a>
					<a href="viewcarwasher.php">View CarWasher</a>
					
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Account</button>
				<div class="dropdown-content">
					<a href="resetaccount.php">Reset Account</a>
				</div>
			</div>
			<div class="dropdown">
				<form action="home.php" method="POST">
				<button class="dropbtn" name="logoutbtn">Logout</button>
				</form>
							<?php
			if(isset($_POST['logoutbtn']))
			{
			session_destroy();
			header("location:loginform.php");
		}
			?>
			
		    </div>