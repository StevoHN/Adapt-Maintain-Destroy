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
	<script>
		var i;
		var tempRoleTD;
		var roles;
		function addRole() {
			tempRoleTD = "<tr id='row" + i + "'><td><input type='text'/></td><td class='cRole'><select id='role" + i + "'><option value='' selected disabled>- Select Role -</option><option value='tank'>Tank</option>" +
						"<option value='healer'>Healer</option><option value='dps'>DPS</option></select></td><td><input id='button" + i + "' value='&#x2717;' type='button' onclick=\"deleteRow('row" + i + "')\"/></td></tr>";
			$("#rolesTable").append(tempRoleTD);
			i++;
		};
		function changeRow(row) {
			var tempNaRow = document.getElementById(row);
			var buttonId = row.replace("row","button");
			if(document.getElementById(row).parentNode.id == "unassignedRolesTable")
			{
				$("#rolesTable").append(tempNaRow);
				$("#" + buttonId).val("-");
			}
			else if(document.getElementById(row).parentNode.id == "rolesTable")
			{
				$("#unassignedRolesTable").append(tempNaRow);
				$("#" + buttonId).val("+");
			}
		};
		function deleteRow(row) {
			$("#" + row).remove();
		};
		
		function loadGuild(item) {
			var j = 0;
			var character;
			var memberObject;
			$.each(item.members,function(){
				character = item.members[j];
				if(character.rank == 0 || character.rank == 1 || character.rank == 2 || character.rank == 3) {
					if(Object.keys(roles).indexOf((character.character.name).toLowerCase()) >= 0) {
					}
					else {
						memberObject = 	"<tr id='row" + i + "'><td class='cName'><input type='text' value='" + (character.character.name).toLowerCase() + "'/></td>" +
										"<td class='cRole'><select id='role" + i + "'><option value='' selected disabled>- Select Role -</option><option value='tank'>Tank</option>" +
										"<option value='healer'>Healer</option><option value='dps'>DPS</option></select></td>" +
										"<td class='cTrigger'><input id='button" + i + "' value='+' type='button' onclick=\"changeRow('row" + i + "')\"/></td></tr>";
						$("#unassignedRolesTable").append(memberObject);
						i++;
					}
				};
				j++;
			});
		};
		
		function saveRoles() {
			var obj = {};
			var rolesObj = {};
			var rowCount = $("#rolesTable tr").length;
			var jsonChar;
			var jsonRole;
			for(x = 1;x<=rowCount;x++)
			{
				jsonChar = $("#rolesTable tr:nth-child(" + x + ") td:nth-child(1) input:nth-child(1)").val();
				jsonRole = $("#rolesTable tr:nth-child(" + x + ") td:nth-child(2) select:nth-child(1)").val();
				obj[jsonChar] = jsonRole;
			};
			rolesObj["roles"] = obj;
			console.log(rolesObj);
			var jsonString = JSON.stringify(rolesObj);
			console.log(jsonString);
			
			$("#jsonInput").val(jsonString);
			
			return true;
		};
		
		$(document).ready(function() {
		
			$.getJSON("json/roles.json", function(data) {
				roles = data.roles;
				var role;
				i = 0;
				$.each(roles,function(key,val){
					role = $("<tr id='row" + i + "'><td class='cName'><input type='text' value='" + key + "'/></td><td class='cRole'><select id='role" + i + "'><option value='tank'>Tank</option><option value='healer'>Healer</option><option value='dps'>DPS</option></select></td><td class='cTrigger'><input type='button' id='button" + i + "' value='-' onclick=\"changeRow('row" + i + "')\"/></td></tr>");
					$("#rolesTable").append(role);
					$("#role" + i).val(val)
					i++;
				});
			});
			
			$.ajax({
				url: "https://eu.api.battle.net/wow/guild/Ravencrest/Adapt%20Maintain%20Destroy?fields=members&locale=en_GB&jsonp=loadGuild&apikey=ExampleAPIKey",
				type: 'GET',
				dataType: 'jsonp'
			});
		});
	</script>
</head>

<body>
<?php include 'include/header.php'?>
	<div class="container">
		<div id="userTable">
			<table>
				<tr>
					<td class="cName">Character</td>
					<td class="cRole">Role</td>
					<td class="cTrigger">+/-</td>
				</tr>
			</table>
			<table id="rolesTable">
			</table>
			<table>
				<tr>
					<td><input type="button" onclick="cancel()" value="Cancel"/></td>
					<td><input type="button" onclick="addRole()" value="Add"/></td>
					<td><form action="saveRoles_.php" method="post" onsubmit="return saveRoles();"><input id="jsonInput" name="jsonInput" type="text" hidden /><input type="submit" value="Save"/></form></td>
				</tr>
			</table>
			<table id="unassignedRolesTable">
			
			</table>
		</div>
	</div>


<?php include 'include/footer.php'?>
</body>

</html>