<?php
	session_start();

	if(!($_SESSION['active']) && !($_SESSION['permission_level'] == 10))
	{
		header('location:rules.php');
		exit;
	}
	else
	{
		
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
	$na_name = $_POST['na_name'];
	$na_user = $_POST['na_username'];
	$na_pass = $_POST['newadmin_pass'];
	$na_passr = $_POST['newadmin_pass2'];
	$loginErr = "running post, assigning values";
	if(!empty($na_name) && !empty($na_user) && !empty($na_pass) && !empty($na_passr))
	{
	$loginMsg = "no empty fields";
		if($na_pass == $na_passr)
		{
	$loginMsg = "passwords matching";
			try
			{
				include '../db_cred.php';
				$conn = new PDO("mysql:host=$db_cred[host];dbname=$db_cred[database]",$db_cred[username],$db_cred[password]);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = "SELECT * FROM administrators WHERE username = '" . $na_user . "'";
				$runQ = $conn->prepare("$query");
				$runQ->execute();
				$loginMsg = "Checked users";
			}
		
			catch(PDOException $err)
			{
				$loginMsg = "Error Loading Users";
			}
		
			try
			{
				$rows = $runQ->rowCount();
				// $loginMsg = "Query: " . $query . " - rows: " . $rows;
				if($rows == 0)
				{
				$loginMsg = "preparing query";
					$na_pass = hash('sha512',$na_pass . hash('sha512',"!*s4ltsh1ps47s34#"));
					$query = "INSERT INTO `administrators`(`name`, `username`, `lkjasd`) VALUES ('" . $na_name . "','" . $na_user . "','" . $na_pass . "')";
					$runQ = $conn->prepare("$query");
					$runQ->execute();
				$loginMsg = "query executed";
				}
			}
		
			catch(PDOException $err)
			{
				$loginMsg = "Error";
			}
		}
		else
		{
			$loginMsg = "Passwords doesn't match";
		}
	}
	else
	{
		$loginMsg = "all empty fields";
	}
}

$loginErr = <<<LOGINERR
<p style="color:red;margin-top:5px;margin-bottom:10px;">$loginMsg</p>
LOGINERR;

?>

	<div class="container">
		<a href="adminpanel_.php"><button>Back</button></a>
		<?php echo $loginErr; ?>
		<form action="createAdmin_.php" method="post" id="createAdminForm" onsubmit="return hashcp();">
			<input type="text" placeholder="Name" name="na_name">
			<input type="text" placeholder="Username" name="na_username">
			<input type="password" placeholder="Password" id="newadmin_pass">
			<input type="password" name="newadmin_pass" id="newadmin_passh" hidden>
			<input type="password" placeholder="Repeat Password" id="newadmin_pass2">
			<input type="password" name="newadmin_pass2" id="newadmin_passh2" hidden>
			<input type="submit" value="Create">
		</form>
	</div>


<?php include 'include/footer.php'?>
</body>

</html>