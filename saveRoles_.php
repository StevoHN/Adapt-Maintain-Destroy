<?php
	
$json = "json/roles.json";
$jFile = fopen($json, "w") or die("can't open file");
$roles = $_POST["jsonInput"];
fwrite($jFile,$roles);
fclose($jFile);
	
header('location: editRoles_.php');
exit;
?>

