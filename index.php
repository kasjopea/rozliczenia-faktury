<?php
session_start();
if(isset($_SESSION["walidacja"])){
		header('Location: fizjo.php');
		exit();
	}
	
if(isset($_SESSION["walidacjaM"]))
{
		header('Location: marcin.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="vendor/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<header>
<blockquote>Chciałoby się być bogatym, aby nie myśleć o pieniądzach, ale większość bogatych i tak nie myśli o niczym innym.
<p>- Abel Bonnard</p>
</blockquote>
</header>
			<div id="logDiv">
			<form method="POST" id="log">
			<fieldset>
			<input type="text" name="user" placeholder="Podaj nazwę użytkownika"/>
			</fieldset>
			<fieldset>
			<input type="password" name="pass" placeholder="Podaj hasło"/>
			</fieldset>
			<fieldset>
			<button type="submit">Wyślij</button>
			</fieldset>
			</form>
			</div>

			<?php

			if(isset($_POST["user"])){
				$user = $_POST["user"];
			$pass = $_POST["pass"];
			
			if(($user =="M@rcin")&&($pass=="Med4cyn@")){
				$_SESSION["walidacjaM"]=true;
				header('Location: marcin.php');
				exit();
			}
			
			if(($user =="Luzmed")&&($pass=="Medycyna4")){
				$_SESSION["walidacja"]=true;
				header('Location: fizjo.php');
				exit();
			}
			
			}
			
			?>
			</body>
			</html>
				
				
				
				
				
				
				
				
				
				