<?php
	session_start();
?>
<a href="index.php"><div class="header" style="margin:0 auto">
	<h1 class="headerText">Adapt Maintain Destroy</h1>
</div></a>

<div id="navbar_outer">
	<div id="navbar">
		<a href="index.php" id="index"><div>Home</div></a>
		<a href="roster.php" id="roster"><div>Roster</div></a>
		<a href="apply.php" id="apply"><div>Apply</div></a>
		<a href="rules.php" id="rules"><div>Rules</div></a>
		<?php

		if(!($_SESSION['active']) && !($_SESSION['permission_level'] == 10))
		{
			
		}
		else
		{
				echo "<a href='adminpanel_.php' id='adminpanel_'><div>Admin Panel</div></a>";
				echo "<a href='logout_.php' id='logout_'><div>Log Out</div></a>";
		}
		
		?>
	</div>
</div>