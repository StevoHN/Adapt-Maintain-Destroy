<?php
	session_start();
	
	if(!($_SESSION['active']) && !($_SESSION['permission_level'] == 10))
	{
		
	}
	else
	{
		header('location:adminpanel_.php');
		exit;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<?php include 'include/html_head.php'?>
	<script src="js/admin_functions.js"></script>
</head>

<body>
<?php include 'include/header.php'?>
<?php

	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$a_user = $_POST['admin_username'];
		$a_pass = $_POST['admin_pass'];
		if(!empty($a_user) && !empty($a_pass))
		{

			try {
				include '../db_cred.php';
				$conn = new PDO("mysql:host=$db_cred[host];dbname=$db_cred[database]",$db_cred[username],$db_cred[password]);
				$query = "SELECT name,lkjasd FROM administrators WHERE username = '" . $a_user . "'";
				$runQ = $conn->query("$query");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			
			catch(PDOException $err) {
				$loginErr = <<<LOGINERR
<p style="color:red;margin-top:5px;margin-bottom:10px;">Error Loading Users</p>
LOGINERR;
			}
			
			try {
				if(!empty($runQ)) {
					$r = $runQ->fetchAll();
					$a_pass = hash('sha512',$a_pass . hash('sha512',"!*s4ltsh1ps47s34#"));
					if($a_pass == $r[0][1])
					{
						$loginErr = "";
						$_SESSION['current_user'] = $r[0][0];
						$_SESSION['current_account'] = $a_user;
						$_SESSION['permission_level'] = 10;
						$_SESSION['active'] = true;
						header('location: adminpanel_.php');
						exit;
					}
				}
			}
			
			catch(PDOException $err) {
				$loginErr = "Error";
			}
		}
		else
		{
			$loginErr = <<<LOGINERR
<p style="color:red;margin-top:5px;margin-bottom:10px;">Please fill out all the fields</p>
LOGINERR;
		}
	}





?>
	<div class="container">
			
		<div id="loginBox">
			<form action="admin_.php" method="post" id="admin_form" onsubmit="return hashp();">
			
				<table style="text-align:center;">
					<tr>
						<td>
							<h2>Admin Login</h2>
						<?php
							echo $loginErr;
						?>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" placeholder="Username" name="admin_username" id="admin_username">
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" placeholder="Password" id="admin_pass">
							<input type="password" name="admin_pass" id="admin_pass2" hidden>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Login">
						</td>
					</tr>
				</table>
			</form>
		</div>
	
	</div>


<?php include 'include/footer.php'?>
</body>

</html>