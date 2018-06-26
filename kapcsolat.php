<?php $link = mysqli_connect("localhost","root","")
			or die("Kapcsolódási hiba: ".mysqli_error());
		mysqli_select_db($link,"mydb");
		mysqli_set_charset($link,"utf8");
		mysqli_query($link,"set character_set_result='utf-8'");
?>