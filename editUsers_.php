<?php
	session_start();

	if(!($_SESSION['active']) && !($_SESSION['permission_level'] == 10))
	{
		header('location:admin_.php');
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
	<style>
	table {
		width:40%;
		border:1px solid red;
	}
	td {
		
		border:1px solid red;
	}
	.id {
		width:19%;
		min-width:30px;
	}
	.name {
		width:40%;
		min-width:60px;
	}
	
	</style>
	<script type="text/javascript" src="js/admin_functions.js"></script>
</head>

<body>
<?php include 'include/header.php'?>
<?php
	include '../db_cred.php';
	$conn = new PDO("mysql:host=$db_cred[host];dbname=$db_cred[database]",$db_cred[username],$db_cred[password]);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if($_POST['action'] == "edit" || $_POST['action'] == "delete")
		{
			if(!empty($_POST['username']))
			{
				try
				{
					
					$a_user = $_POST['username'];
					$a_newname = $_POST['newName'];
					
					if($_POST['action'] == "edit")
					{
						if($_POST['change'] == "name")
						{
							$query = "UPDATE `administrators` SET `name`='" . $a_newname . "' WHERE `username` = '" . $a_user . "'";
							$runQ = $conn->prepare($query);
							$runQ->execute();
						}
					}
					else if($_POST['action'] == "delete")
					{
						$query = "DELETE FROM `administrators` WHERE `username` = '" . $a_user . "'";
						$runQ = $conn->prepare($query);
						$runQ->execute();
					}
				}
				catch(PDOException $err)
				{
					echo "An error occured while establishing connection to the database";
				}
			}
		}
	}
?>
	<div class="container">
		<div id="userTable">
			<table>
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Username</td>
					<td>Actions</td>
				</tr>
				<?php
					try
					{
						
						$query = "SELECT `id`, `name`, `username` FROM `administrators`";
						$runQ = $conn->prepare("$query");
						$runQ->execute();
						
						$r = $runQ->fetchAll();
						$rows = $runQ->rowCount();
						
						
						for($i = 0;$i<$rows;$i++)
						{
							$id = $r[$i][0];
							$name = $r[$i][1];
							$username = $r[$i][2];
							echo <<<TABLEDATA
<tr>
	<td class="id">$id</td>
	<td class="name">$name</td>
	<td class="username">$username</td>
	<td>
		<button style="display:inline-block;" onclick="editUser('$username')">Edit</button>
		<form action="editUsers_.php" method="post" style="display:inline-block;" onsubmit="return deleteUser('$username');">
			<input type="text" value="$username" name="username" hidden>
			<input type="text" value="delete" name="action" hidden>
			<input type="submit" value="Delete">
		</form>
	</td>
</tr>
TABLEDATA;
						}
					}
					catch(PDOException $err)
					{
						// echo $err;
					}
				?>
			</table>
		</div>
	</div>


<?php include 'include/footer.php'?>
</body>

</html>