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
</head>

<body>
<?php include 'include/header.php'?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	echo "This is with post";
	$msgTitle = str_replace("'","\'",$_POST['msgTitle']);
	$msgAuthor = str_replace("'","\'",$_POST['msgAuthor']);
	$msgContent = str_replace("'","\'",nl2br($_POST['msgContent']));
	$date = date("o-m-d h:i:s");
	$loginMsg = "running post, assigning values";
	if(!empty($msgTitle) && !empty($msgAuthor) && !empty($msgContent))
	{
		$loginMsg = "no empty fields";
		try
		{
			include '../db_cred.php';
			$conn = new PDO("mysql:host=$db_cred[host];dbname=$db_cred[database]",$db_cred[username],$db_cred[password]);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "INSERT INTO `news`(`title`, `author`,`content`, `date`) VALUES ('$msgTitle','$msgAuthor','$msgContent','$date')";
			$runQ = $conn->prepare("$query");
			$runQ->execute();
			$loginMsg = "Query Run";
		}
	
		catch(PDOException $err)
		{
			$loginMsg = $err;
		}
	}
	else
	{
		$loginMsg = "all empty fields";
	}
}

$loginErr = <<<LOGINERR
<p style="color:red;margin-top:5px;margin-bottom:10px;">$loginMsg - $query</p>
LOGINERR;

?>

	<div class="container">
		
		<div id="postBox">
			<h2 style="text-align:center;">Skriv en ny besked:</h2>
			<form action="postMsg_.php" method="post">
				<table>
					<tr>
						<td>Titel:</td>
						<td><input type="text" name="msgTitle"></td>
					</tr>
					<tr>
						<td>Skribent:</td>
						<td><input type="text" name="msgAuthor" value="<?php echo $_SESSION['current_user'] ?>"></td>
					</tr>
				</table>
				<br>
				<label for="msgContent">Besked:</label>
				<br>
				<pre><textarea placeholder="Max 500 tegn" maxlength="500" rows="8" id="msgContent" name="msgContent"></textarea></pre>
				<br>
				<br>
				<input type="submit">
			</form>
			<br>
			<?php echo $loginErr ?>
		</div>
		
	</div>


<?php include 'include/footer.php'?>
</body>

</html>