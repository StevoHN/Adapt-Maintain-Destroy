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
	
	
	<script>
	$(document).ready(function() {
		$("#createAdmin").click(function() {
			console.log("test");
			$("#createAdmin").css("height","200px");
		});
	});
	</script>
</head>

<body>
<?php include 'include/header.php'?>

	<div class="container">
		<div id="adminBox">
			<ul>
				<a href="postMsg_.php"><li>Post A New Message...</li></a>
				<a href="createAdmin_.php"><li>Create New Administrator...</li></a>
				<a href="editUsers_.php"><li>Edit Users...</li></a>
				<li>Edit Raid Boxes...</li>
				<a href="editRecruit_.php"><li>Edit Recruit Box...</li></a>
				<a href="editRoles_.php"><li>Edit Roles...</li></a>
				<li>Change Password...</li>
			</ul>
		</div>
	</div>


<?php include 'include/footer.php'?>
</body>

</html>