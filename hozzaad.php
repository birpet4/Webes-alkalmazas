<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="info2.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Hozzáadás</title>
	</head>
	<body>
		<div id="keret">
		<?php include('fejlec.html')?>
		<div id="lista">
		
			<?php
			include('kapcsolat.php');
			?>
		
			<form action="hozzaad.php" method="post">
				<h2 style="color: darkred;">Új alkalmazott</h2>
				<p>
					Név:* <input type="text" name="Nev" />    
				</p>
				<p>
					Cím:* <input type="text" name="Cim" />    
				</p>
				<p style="color: darkred;">
					Adószám:* <input type="text" name="Adoszam" />
				</p>
				<p>
					Születési idő:* <input type="date" name="Szuletesiido" />
				</p>
				<p>
					Nem:* <input type="text" name="Nem">
				</p>
				<h2 style="color: darkred">Munka dátuma:</h2>
				<p>
					Év:* <input type="number" name="Ev">
				</p>
				<p>
					Hónap:* <input type="number" name="Honap">
				</p>
				<p>
					Nap:* <input type="number" name="Nap">
				</p>
				<p>
					Ledolgozott órák száma: <input type="number" name="Ledolgozottora">
				</p>
				<p> 
					<input type="submit" value="Elküld" name="Uj" />
				</p>
				
				<?php
				if (isset($_POST['Uj']) and $_POST['Nev'] and $_POST['Cim'] and $_POST['Adoszam'] and $_POST['Szuletesiido'] and $_POST['Nem'] and $_POST['Ev'] and $_POST['Honap'] and $_POST['Nap']){
					$nev = mysqli_real_escape_string($link,$_POST['Nev']);
					$cim = mysqli_real_escape_string($link,$_POST['Cim']);
					$adoszam = mysqli_real_escape_string($link,$_POST['Adoszam']);
					$szuletesiido = mysqli_real_escape_string($link,$_POST['Szuletesiido']);
					$nem = mysqli_real_escape_string($link,$_POST['Nem']);
					$ev = mysqli_real_escape_string($link,$_POST['Ev']);
					$honap = mysqli_real_escape_string($link,$_POST['Honap']);
					$nap = mysqli_real_escape_string($link,$_POST['Nap']);
					$ledolgozottora = mysqli_real_escape_string($link,$_POST['Ledolgozottora']);
					$q = mysqli_query($link,"SELECT ID FROM alkalmazott WHERE Adoszam = '{$adoszam}'");
					if(empty($qu = mysqli_fetch_array($q))){
						$query=sprintf("INSERT INTO alkalmazott(Nev,Cim,Adoszam,Szuletesiido,Nem) VALUES('%s','%s','%s','%s','%s')"
									,$nev
									,$cim
									,$adoszam
									,$szuletesiido
									,$nem);
									mysqli_query($link, $query);
									$query2=mysqli_query($link,"SELECT ID FROM alkalmazott WHERE Adoszam = '{$adoszam}'");
									$query3=mysqli_query($link,"SELECT ID FROM munkaido WHERE Ev = {$ev} AND Honap = {$honap} AND Nap = {$nap}");
									if(empty($dat = mysqli_fetch_array($query3))){
											$query4=sprintf("INSERT INTO munkaido (Ev,Honap,Nap) VALUES(%d,%d,%d)"
														,$ev
														,$honap
														,$nap);
														mysqli_query($link, $query4);
									}
									$query5=mysqli_query($link,"SELECT ID FROM munkaido WHERE Ev = {$ev} AND Honap = {$honap} AND Nap = {$nap}");
									$alk = mysqli_fetch_array($query2);
									$mun = mysqli_fetch_array($query5);
									$query6 = sprintf("INSERT INTO ledolgozta(Alkalmazott_ID,Munkaido_ID,Ledolgozottora) VALUES(%d,%d,%d)"
														,$alk['ID']
														,$mun['ID']
														,$ledolgozottora);
									mysqli_query($link, $query6);
									mysqli_close($link);
									header("Location: alkalmazottak.php");
					}
					else{
						$que = mysqli_fetch_array($q);
						$quer = $qu['ID'];
						mysqli_close($link);
						header("Location: frissit.php?id={$quer}");
					}
				}
				?>
				<p>
					* kötelező megadni
				</p>
			</form>
		</div>
		<div id="kezelo">
			<img src="kamion-109.jpg" alt="Kamion" style="height:300px;width:400px;">
		</div>
		<?php include('lablec.html')?>
		</div>
	</body>
</html>