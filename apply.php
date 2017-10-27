<!DOCTYPE HTML>
<html>
<head>
	<?php include 'include/html_head.php'?>
	
	<style>
	textarea, input, select {
		width: 100%;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	
	td {
		width: 50%;
	}
	
	</style>
</head>

<body style="padding:0;">

<?php include 'include/header.php'?>
	<div class="container">
	
		<div class="pageBox" id="applyBox">
			<form action="send_mail.php" method="post">
			
				<table style="width:373px;">
					<tr>
						<td><label for="fornavn">First Name:</label></td>
						<td><input type="text" id="fornavn" name="fornavn"></td>
					</tr>
					<tr>
						<td><label for="battletag">Battle Tag:</label></td>
						<td><input type="text" id="battletag" name="battletag"></td>
					</tr>
					<tr>
						<td><label for="ign">In-game name:</label></td>
						<td><input type="text" id="ign" name="ign"></td>
					</tr>
					<tr>
						<td><label for="class">Class:</label></td>
						<td>
							<select id="class" name="class">
								<option value="" disabled selected>- Select Class -</option>
								<option value="Warrior">Warrior</option>
								<option value="Paladin">Paladin</option>
								<option value="Hunter">Hunter</option>
								<option value="Rogue">Rogue</option>
								<option value="Priest">Priest</option>
								<option value="Death Knight">Death Knight</option>
								<option value="Shaman">Shaman</option>
								<option value="Mage">Mage</option>
								<option value="Warlock">Warlock</option>
								<option value="Monk">Monk</option>
								<option value="Druid">Druid</option>
								<option value="Demon Hunter">Demon Hunter</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="main-specialization">Main-spec</label></td>
						<td>
							<select id="main-specialization" name="main-specialization">
								
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="off-specialization">Off-spec</label></td>
						<td>
							<select id="off-specialization" name="off-specialization">
								
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="armoryLink">Armory link:</label></td>
						<td><input type="text" id="armoryLink" name="armoryLink"></td>
					</tr>
				</table>
				<br>
				<label for="commentReason">Why do you want to join the guild?</label>
				<br>
				<textarea placeholder="Max 250 characters" maxlength="250" rows="4" id="commentReason" name="commentReason"></textarea>
				<br>
				<br>
			
				<input type="submit" value="Apply">
				
			</form>
		</div>
	</div>

<?php include 'include/footer.php'?>
</body>

</html>