<?php
session_start();
	if(isset($_SESSION["walidacja"])){
		$_SESSION["weszlo"]=true;
	}
	else {
		header('Location: index.php');
		exit();
	}

	$polaczenie = pg_connect("host='localhost' dbname='smadej' user='smadej' password='xxx'");
	
	if (!($polaczenie))
	{
		echo "Error: ".$polaczenie->connect_errno;
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
	<nav>
		<ul>
			<li>Rozliczenie</li>
			<li>Propozycje grafiku</li>
			<li>Czat</li>
		</ul>
	</nav>
	<section id="rozliczenie">
	<aside>
		<ul><li>Sty</li><li>Lut</li><li>Mar</li><li>Kwi</li><li>Maj</li><li>Cze</li><li>Lip</li><li>Sie</li><li>Wrz</li><li>Paź</li><li>Lis</li><li>Gru</li></ul>
	</aside>
	<main>
		<div>
			
			<h2>Rozliczonko</h2>
			<form method="POST">
			<h3>Formularz dodawania danych do bazy</h3>
			<fieldset>
				<select name="osoba" id="osoba">
					<option disabled selected>--Wybierz osobę--</option>
					<option value="blagoz">Błażej</option>
					<option value="annkus">Ania</option>
					<option value="fabmik">Fabian</option>
					<option value="markon">Marta</option>
					<option value="slamad">Sława</option>
					<option value="pioign">Piotrek I.</option>
					<option value="lukzos">Łukasz Z.</option>
					<option value="blasad">Blanka</option>
					<option value="macdym">Maciek</option>
					<option value="walizd">Bogdan</option>
					<option value="andlah">Andrzej</option>
					<option value="lukpaw">Łukasz P.</option>
					<option value="grzkor">Grzesiek</option>
					<option value="magmos">Magda</option>
					<option value="mikpol">Mikołaj</option>
					<option value="jansro">Janek</option>
					<option value="robwal">Robert</option>
					<option value="klakra">Klara</option>
					<option value="joakra">Asia</option>
					<option value="katgrz">Kasia</option>
					<option value="piosol">Piotrek S.</option>
					
				</select>
				</fieldset>
				<fieldset>
				<input type="text" name="liczbah" id="liczbah" placeholder="Liczba godzin pracy np. 130.5"/></fieldset>
				<fieldset>
				<input type="text" name="faktura" id="faktura" placeholder="Numer faktury"/></fieldset>
				<fieldset>
				<select name="opcja" id="system">
					<option disabled selected>--Zgodność wypłaty z systemem--</option>
					<option value="tak">Zgadza się.</option>
					<option value="nie"> Nie zgadza się.</option>
					<option value="nie wiem">Nie wiem.</option>
				</select>
				</fieldset>
				<fieldset>
				<button id="buttonMar" type="submit">Zapisz</button>
				</fieldset>
			</form>
			<?php
			if(isset($_POST["liczbah"])){
				$osoba = $_POST["osoba"];
				$liczbah = $_POST["liczbah"];
				$opcja = $_POST["opcja"];
				$faktura = $_POST["faktura"];
				
				$sql = "UPDATE marzec SET liczbah='$liczbah', system='$opcja', faktura='$faktura' WHERE login='$osoba'";
				$wynik = pg_query($sql);
				
				if ($wynik == TRUE){	
					}
					else {
					echo "Przepraszam, błąd połączenia z bazą.";
					}
				}
			?>
			<h3>Dane do faktur</h3>
			<table id="tableMar">
			<tr>
				<td>Imię i nazwisko</td>
				<td>Liczba godzin</td>
				<td>Numer faktury</td>
				<td>Zgodność z 4netem</td>
			</tr>

			<?php
			$sql = "SELECT * FROM marzec";
			$rezultat = pg_query($sql);
			$wiersze = pg_fetch_all($rezultat);
			if($wiersze){
			foreach($wiersze as $tablica) {
						echo "<tr><td>".$tablica['login']."</td><td>".$tablica['liczbah']."</td><td>".$tablica['faktura']."</td>
						<td>".$tablica['system']."</td></tr>";
					}
			} else echo"Błąd połączenia z bazą.";
			?>
				</table>
		</div>
	</main>
	</section>
	<section id="grafik">
	</section>
	<section id="czat">
	</section>

</body>
</html>