<?php
	
$person = [
	fornavn => $_POST['fornavn'],
	ign => $_POST['ign'],
	battletag => $_POST['battletag'],
	wow_class => $_POST['class'],
	mainspec => $_POST['main-specialization'],
	offspec => $_POST['off-specialization'],
	armory => $_POST['armoryLink'],
	reason => $_POST['commentReason'],
	comment => $_POST['commentOther']
];
	
	
	
$recipient = "recruit@adaptmaintaindestroy.dk";
$subject = "New Recruit Application: " . $_POST['battletag'];
$message = <<<MESSAGE
Du har modtaget en ansøgning fra $person[battletag]

Fornavn: $person[fornavn]
Battletag: $person[battletag]

IGN: $person[ign]
Class: $person[wow_class]
Main-spec: $person[mainspec]
Off-spec: $person[offspec]
Armory: $person[armory]

Hvorfor vil du gerne være med i guilden?
$person[reason]

Denne mail blev sendt via. en ansøgningsformular.

Adapt Maintain Destroy
MESSAGE;

$headers = "From: Recruit@adaptmaintaindestroy.dk";

mail($recipient, $subject, $message, $headers);
header('location: index.php');
exit;
?>

