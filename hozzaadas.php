<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="info2.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Ügyfél Hozzáadása</title>
		<style>
			body {
				background-image: url(images/background1.jpg);
			}
		</style>
	</head>
	
	<body>

		<?php include('fejlec.html')?>
		<div id="lista">
		
			<?php
			include('kapcsolat.php');
			?>
		
			<form action="hozzaadas.php" method="post">
				<h2 style="color: blue;">Ügyfél adatai</h2>
				<p>
					Vezetéknév: <input type="text" name="vnev" />    
				</p>
				<p>
					Keresztnév: <input type="text" name="knev" />    
				</p>
				<p>
					Cím:  
				</p>
				<p>
					Irsz: <input type="number" name="irsz" /> Város: <input type="text" name="varos" /> Utca: <input type="text" name="utca" /> Házszám: <input type="number" name="hazszam" />
				</p>
				<p style="color: darkred;">
					Azonosító szám: <input type="number" name="azon" />
				</p>
				<p>
					Születési idő: <input type="date" name="szuletesi" />
				</p>

				
				<p> 
					<input type="submit" value="Elküld" name="Uj" />
				</p>
				
				<?php
				if (isset($_POST['Uj']) and $_POST['vnev'] and $_POST['knev'] and $_POST['irsz'] and $_POST['varos'] and $_POST['utca'] and $_POST['hsz'] and $_POST['szuletesi'] and $_POST['azon']){
					$vnev = mysqli_real_escape_string($link,$_POST['vnev']);
					$knev = mysqli_real_escape_string($link,$_POST['knev']);
					$irsz = mysqli_real_escape_string($link,$_POST['irsz']);
					$adoszam = mysqli_real_escape_string($link,$_POST['azon']);
					$szuletesi = mysqli_real_escape_string($link,$_POST['szuletesi']);
					$varos = mysqli_real_escape_string($link,$_POST['varos']);
					$utca = mysqli_real_escape_string($link,$_POST['utca']);
					$hsz = mysqli_real_escape_string($link,$_POST['hsz']);
					
					
					$q = mysqli_query($link,"SELECT id FROM Ugyfel WHERE id = '{$azon}'");
					if(empty($qu = mysqli_fetch_array($q))){
						$query=sprintf("INSERT INTO ugyfel(id, vezeteknev, keresztnev, szuletesiDatum) VALUES('%d','%s','%s','%c')"
									,$azon
									,$vnev
									,$knev
									,$szuletesi);
									mysqli_query($link, $query);
									
									/*$query2=mysqli_query($link,"SELECT cim_id FROM Ugyfel WHERE id = '{$azon}'");									
									$query4=sprintf("INSERT INTO Cim (id,iranyitoszam,varos,Utca,Hazszam) VALUES(%d,%d,%s,%s,%d)"
														,$query2
														,$irsz
														,$varos
														,$utca
														,$hsz);
														mysqli_query($link, $query4);									
									header("Location: index.html");*/
					}
					
					/*else{
						$que = mysqli_fetch_array($q);
						$quer = $qu['ID'];
						mysqli_close($link);
						header("Location: frissit.php?id={$quer}");
					}*/
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