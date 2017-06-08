<?php
session_start();
if(isset($_SESSION["walidacjaM"]))
   {$_SESSION["weszlo"]= true;}
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
<div id="logOut">
		Wyloguj
		</div>
<header>
<blockquote>Chciałoby się być bogatym, aby nie myśleć o pieniądzach, ale większość bogatych i tak nie myśli o niczym innym.
<p>- Abel Bonnard</p>
</blockquote>

</header>
	<nav>
		<ul>
			<li>Rozliczenie</li>
			<li>Propozycje grafiku</li>
			<li>Ustawienia</li>
		</ul>
	</nav>
	<section id="rozliczenie">
	<aside>
		<ul><li>Sty</li><li>Lut</li><li>Mar</li><li>Kwi</li><li>Maj</li><li>Cze</li><li>Lip</li><li>Sie</li><li>Wrz</li><li>Paź</li><li>Lis</li><li>Gru</li></ul>
	</aside>
	<main>
		<div>
			<h2>Rozliczenie</h2>
			<section id="forms">
			<form method="POST">
			<h3>Dane do dodatku</h3>
			<fieldset>
			<input type="text" name="suma" placeholder="Suma godzin pracy"/>
			</fieldset>
			<fieldset>
			<input type="text" name="kwota" placeholder="Kwota do podziału z Profemedu"/>
			</fieldset>
			<fieldset>
			<button type="submit">Wprowadź dane</button>
			</fieldset>
			</form>

			<?php
			$sql = "SELECT * FROM marzecfinish";
			$rezultat = pg_query($sql);
			if($rezultat){
				$wiersze = pg_fetch_all($rezultat);
				$suma = $wiersze[0]['suma'];
				$kwota = $wiersze[0]['kwota'];
				$_SESSION["suma"] = $suma;
				$_SESSION["kwota"] = $kwota;
			}
			if(isset($_POST["suma"])){
				$suma = $_POST["suma"];
				$kwota = $_POST["kwota"];

				$sql = "UPDATE marzecfinish SET suma='$suma', kwota='$kwota' WHERE id='1'";
				$rezultat = pg_query($sql);
				if ($rezultat){	
					echo "Dziękuję za wprowadzenie danych";
					$_SESSION["suma"] = $suma;
					$_SESSION["kwota"] = $kwota;
					}
					else {
					echo "Przepraszam, błąd połączenia z bazą.";
					}
				}
			?>

			<form method="POST">
			<h3>Dane LuxMed</h3>
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
			
			<form method="POST">
			<h3>Dane Profemed</h3>
			<fieldset>
				<select name="osobap" id="osobap">
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
				<input type="text" name="liczbahp" id="liczbahp" placeholder="Liczba godzin pracy np. 130.5"/></fieldset>
				<fieldset>
				<button id="buttonMarp" type="submit">Zapisz</button>
				</fieldset>
			</form>
			<form method="POST">
			<h3>Dane firmowe</h3>
			<fieldset>
				<select name="osobaFirma" id="osobaFirma">
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
				<input type="text" name="nazwaFirmy" id="nazwaFirmy" placeholder="Nazwa firmy"/></fieldset>
				<fieldset>
				<input type="text" name="adres" id="adres" placeholder="Ulica i numer"/></fieldset>
				<fieldset>
				<input type="text" name="kod" id="kod" placeholder="Kod i miasto"/></fieldset>
				<fieldset>
				<input type="text" name="nip" id="nip" placeholder="NIP w formacie xxx-xx-xx-xxx"/></fieldset>
				<fieldset>
				<button type="submit">Zapisz</button>
				</fieldset>
			</form>
			<?php
			if(isset($_POST["osobaFirma"])){
				$osobaFirma = $_POST["osobaFirma"];
				$nazwaFirmy = $_POST["nazwaFirmy"];
				$adres = $_POST["adres"];
				$kod = $_POST["kod"];
				$nip = $_POST["nip"];
				
				$sql = "UPDATE firma SET nazwaFirmy='$nazwaFirmy', adres='$adres', kod='$kod', NIP='$nip' WHERE login='$osobaFirma'";
				$rezultat = pg_query($sql);
				

				if ($rezultat == TRUE){	
					echo "Dziękuję za przesłanie danych.";
					}
					else {
					echo "Przepraszam, błąd połączenia z bazą.";
					}
				}
			?>
			</section>
			<section id="tables">
			<?php
			if(isset($_POST["liczbahp"])){
				$osobap = $_POST["osobap"];
				$liczbahp = $_POST["liczbahp"];

			$sql = "UPDATE marzec SET liczbahp='$liczbahp' WHERE login='$osobap'";
				$wynik = pg_query($sql);
				
				if ($wynik == TRUE){	
					}
					else {
					echo "Przepraszam, błąd połączenia z bazą.";
					}
				}
			?>
			</br></br>
			<table>
			<tr>
				<td>Suma godzin pracy</td>
				<td>Kwota Profemed</td>
			</tr>
			<?php
			if($_SESSION["suma"]){
			echo "<tr><td>".$_SESSION["suma"].'</td><td>'.$_SESSION["kwota"].'</td></tr>';}
			?>
			
			<?php
			$sql = "SELECT * FROM marzec";
			$rezultat = pg_query($sql);
			
			if ($rezultat)
		{	
			$wiersze = pg_fetch_all($rezultat);
		}
	else echo"Błąd połączenia z bazą.";
			$suma = "";
			foreach($wiersze as $tablica) {
				$suma = $suma + $tablica['liczbah'];
			}

			echo "<table><tr><td>Suma godzin pracy z tabeli</td></tr><tr><td>".$suma."</td></tr></table>";
			?>
			</br></br>
			<table id="tableMar">
			<tr>
				<td>Imię i nazwisko</td>
				<td>Liczba godzin LuxMed</td>
				<td>Liczba godzin Profemed</td>
				<td>Numer faktury</td>
				<td>Zgodność z 4netem</td>
				<td>Wypłata LuxMed</td>
				<td>Wypłata Profemed</td>
				<td>Dodatek Profemed</td>
				<td>Link do faktury</td>
			</tr>
			<?php
			foreach($wiersze as $tab){
						echo '<tr><td>'.$tab['login'].'</td><td>'.$tab['liczbah'].'</td><td>'.$tab['liczbahp'].'</td><td>'.$tab['faktura'].'</td><td>'.$tab['system'].'</td><td>'.number_format(($tab['liczbah']*$tab['stawka']*1.00),2,',','').'</td><td>'.number_format(($tab['liczbahp']*$tab['stawkap']*1.00),2,',','').'</td><td>'.number_format((($tab['liczbah']/($suma))*$_SESSION["kwota"]),2,',','').'</td><td><a href="faktury/'.$tab['login'].'.html" target="_blank">Rachunek</a></td></tr>';
					}
			?>
			</table>
			</section>

			<?php
			foreach($wiersze as $tablica){
			$osoba = $tablica['login'];
			$data ="31.03.2017 r.";
			$numer = $tablica['faktura'];
			$wyplataLux = number_format(($tablica['liczbah']*$tablica['stawka']*1.00),2,',','');
			$wyplataProfe = number_format((($tablica['liczbah']/($suma))*$_SESSION["kwota"]+$tablica['liczbahp']*$tablica['stawkap']*1.00),2,',','');
			$koniec = $tablica['liczbah']*$tablica['stawka']*1.00+$tablica['liczbah']/($suma)*$_SESSION["kwota"]*1.00+$tablica['liczbahp']*$tablica['stawkap']*1.00;
			$tysiace = floor($koniec/1000);
			$setki = floor(($koniec-$tysiace*1000)/100);
			$dziesiatki = floor(($koniec-$tysiace*1000-$setki*100)/10);
			$zlotowki = $koniec-$tysiace*1000-$setki*100-$dziesiatki*10;
			$zlotowkiF = floor($koniec-$tysiace*1000-$setki*100-$dziesiatki*10);
			$groszeG = number_format(($zlotowki-$zlotowkiF)*100,0,',','');
			$grosze = $groszeG;
			$slownie ="";

			if($tysiace == 1){$slownie = "jeden tysiąc";}
			if($tysiace == 2){$slownie = "dwa tysiące";}
			if($tysiace == 3){$slownie = "trzy tysiące";}
			if($tysiace == 4){$slownie = "cztery tysiące";}
			if($tysiace == 5){$slownie = "pięć tysięcy";}
			if($tysiace == 6){$slownie = "sześć tysięcy";}
			if($tysiace == 7){$slownie = "siedem tysięcy";}
			if($tysiace == 8){$slownie = "osiem tysięcy";}
			if($tysiace == 9){$slownie = "dziewięć tysięcy";}
			if($tysiace == 10){$slownie = "dziesięć tysięcy";}
			if($tysiace == 11){$slownie = "jedenaście tysięcy";}

			if($setki == 1){$slownie = $slownie." "."sto";}
			if($setki == 2){$slownie = $slownie." "."dwieście";}
			if($setki == 3){$slownie = $slownie." "."trzysta";}
			if($setki == 4){$slownie = $slownie." "."czterysta";}
			if($setki == 5){$slownie = $slownie." "."pięćset";}
			if($setki == 6){$slownie = $slownie." "."sześćset";}
			if($setki == 7){$slownie = $slownie." "."siedemset";}
			if($setki == 8){$slownie = $slownie." "."osiemset";}
			if($setki == 9){$slownie = $slownie." "."dziewięćset";}
			
			if($dziesiatki == 1){
				if($zlotowkiF == 1){$slownie = $slownie." "."jedenaście";}
				if($zlotowkiF == 2){$slownie = $slownie." "."dwanaście";}
				if($zlotowkiF == 3){$slownie = $slownie." "."trzynaście";}
				if($zlotowkiF == 4){$slownie = $slownie." "."czternaście";}
				if($zlotowkiF == 5){$slownie = $slownie." "."piętnaście";}
				if($zlotowkiF == 6){$slownie = $slownie." "."szesnaście";}
				if($zlotowkiF == 7){$slownie = $slownie." "."siedemnaście";}
				if($zlotowkiF == 8){$slownie = $slownie." "."osiemnaście";}
				if($zlotowkiF == 9){$slownie = $slownie." "."dziewiętnaście";}
				
				}
				else {
			if($dziesiatki == 2){$slownie = $slownie." "."dwadzieścia";}
			if($dziesiatki == 3){$slownie = $slownie." "."trzydzieści";}
			if($dziesiatki == 4){$slownie = $slownie." "."czterdzieści";}
			if($dziesiatki == 5){$slownie = $slownie." "."pięćdziesiąt";}
			if($dziesiatki == 6){$slownie = $slownie." "."sześćdziesiąt";}
			if($dziesiatki == 7){$slownie = $slownie." "."siedemdziesiąt";}
			if($dziesiatki == 8){$slownie = $slownie." "."osiemdziesiąt";}
			if($dziesiatki == 9){$slownie = $slownie." "."dziewięćdziesiąt";}
					
				if($zlotowkiF == 1){$slownie = $slownie." "."jeden";}
				if($zlotowkiF == 2){$slownie = $slownie." "."dwa";}
				if($zlotowkiF == 3){$slownie = $slownie." "."trzy";}
				if($zlotowkiF == 4){$slownie = $slownie." "."cztery";}
				if($zlotowkiF == 5){$slownie = $slownie." "."pięć";}
				if($zlotowkiF == 6){$slownie = $slownie." "."sześć";}
				if($zlotowkiF == 7){$slownie = $slownie." "."siedem";}
				if($zlotowkiF == 8){$slownie = $slownie." "."osiem";}
				if($zlotowkiF == 9){$slownie = $slownie." "."dziewięć";}
				}
				
				if($grosze>=1){$slownie = $slownie." "."i"." ".$grosze."/100";}
				
				$slownie = $slownie." "."pln";
				
			$sql = "SELECT * FROM firma WHERE login='$osoba'";
			$rezultat = pg_query($sql);
			
			if ($rezultat)
		{	
			$rows = pg_fetch_all($rezultat);
			if($rows){
			$nazwa = $rows[0]['nazwafirmy'];
			$adres = $rows[0]['adres'];
			$kod = $rows[0]['kod'];
			$nip = $rows[0]['nip'];
			}
		}
	else echo"Błąd połączenia z bazą.";
			$myfile = fopen("faktury/".$osoba.".html", "w");
			$txt = '<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="../style/stylep.css"> 
    <script type="text/javascript" src="vendor/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div>
Miejscowość: Warszawa </br>
Data sprzedaży: '.$data.'</br>
Data wystawienia: '.$data.'</br>
</div>
</br>
</br>
<h2>Faktura VAT nr '.$numer.'</h2>
<h3>Oryginał/Kopia</h3>

<table width="100%">
	<tr>
		<td>
			<h4>Sprzedawca:</h4> </br>
			'.$nazwa.'</br>
			'.$adres.'<br/>
			'.$kod.' <br/>
			NIP: '.$nip.'	
		</td>
		<td>
			<h4>Nabywca:</h4> <br/>
			Lux Med Sp. z o.o.<br/>
			ul. Postępu 21c <br/>
			02-676 Warszawa <br/>
			NIP: 527-252-30-80
		</td>
	</tr>
</table>
<br/>
<br/>
<br/>
<table width="100%">
	<tr>
		<td>LP</td>
		<td>Nazwa towaru lub usługi</td>
		<td>Symbol PKWiU</td>
		<td>JM</td>
		<td>Ilość</td>
		<td>Cena jednostkowa</td>
		<td>Stawka VAT</td>
		<td>Wartość netto</td>
		<td>Wartość VAT</td>
		<td>Wartość brutto</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Usługi fizjoterapeutyczne</td>
		<td>85.14.13</td>
		<td>szt.</td>
		<td>1</td>
		<td>'.$wyplataLux.'</td>
		<td>0,00</td>
		<td>'.$wyplataLux.'</td>
		<td>0,00</td>
		<td>'.$wyplataLux.'</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Usługi fizjoterapeutyczne</td>
		<td>85.14.13</td>
		<td>szt.</td>
		<td>1</td>
		<td>'.$wyplataProfe.'</td>
		<td>0,00</td>
		<td>'.$wyplataProfe.'</td>
		<td>0,00</td>
		<td>'.$wyplataProfe.'</td>
	</tr>
</table>
</br>
</br>
<table>
<tr>
	<td></td>
	<td>Wartość netto</td>
	<td>Wartość VAT</td>
	<td>Wartość brutto</td>
</tr>
<tr>
	<td>Razem</td>
	<td>'.number_format($koniec,2,',','').'</td>
	<td>0,00</td>
	<td>'.number_format($koniec,2,',','').'</td>
</tr>
</table>

<p>
<strong>Do zapłaty: </strong> '.number_format($koniec,2,',','').' PLN</br>
<strong>Słownie:</strong>'.' '.$slownie.' </br>
</br></br>
Sprzedaż zwolniona z podatku VAT na podstawie art. 43. ust.1, pkt 19 Ustawy z dnia 11 marca 2004 r. o podatku od towarów i usług

</p>


<table width="100%">
	<tr>
		<td>Fakturę wystawił</td>
		<td>Fakturę odebrał</td>
	</tr>
</table>
</body>
</html>';
			fwrite($myfile, $txt);
			fclose($myfile);
		}
			?>
		</div>
		
	</main>
	</section>
</body>
</html>