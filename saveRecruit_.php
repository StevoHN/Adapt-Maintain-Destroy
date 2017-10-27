<?php
	
$json = "json/recruitment.json";
$jFile = fopen($json, "w") or die("can't open file");
$recruit = $_POST["jsonInput"];
fwrite($jFile,$recruit);
fclose($jFile);
	
header('location: editRecruit_.php');
exit;
?>

