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
		background-color:white;
	}
	td {
		border:1px solid red;
	}
	input {
		width:100%;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	select {
		/*border:none;*/
		width:100%;
		height: 25px;
	}
	input[type="text"] {
		/*border:none;*/
		padding-left: 5px;
		height: 25px;
	}
	input[type="button"], input[type="submit"] {
		height:25px;
	}
	.cName {
		width:60%;
	}
	.cRole {
		width:30%;
	}
	.cTrigger {
		width:10%;
		text-align:center;
	}
	</style>
	<script type="text/javascript" src="js/admin_functions.js"></script>
	<script src="js/recruitment.js"></script>
</head>

<body>
<?php include 'include/header.php'?>
	<div class="container">
		<div id="userTable">
			<table>
				<tr>
					<td class="cClass">Class</td>
					<td class="cSpec">Specs</td>
				</tr>
			</table>
			<table id="classTable">
			
			</table>
			<table>
				<tr>
					<td><input type="button" onclick="cancel()" value="Cancel"/></td>
					<td><input type="button" onclick="addRole()" value="Add"/></td>
					<td><form action="saveRecruit_.php" method="post" onsubmit="return saveRecruit();"><input id="jsonInput" name="jsonInput" type="text" hidden /><input type="submit" value="Save"/></form></td>
				</tr>
			</table>
		</div>
	</div>


<?php include 'include/footer.php'?>
</body>

</html>