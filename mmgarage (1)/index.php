<?php include "db_con.php"; ?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
	<meta name = "viewport" content="width=device-width, initial-scale: 1">
    <title>m&m-garage</title>
	<link rel="stylesheet" href="style.css">
	
</head>

<body>
	<header>
		<div id="headertop">
			<h1>M<span style="color: D00000">&</span>M GARAGE</h1> <h2>Kontakt: 909 092 909</h2>
		</div>
		<div id="headerdown">
    		<form type="text" method="POST" autocomplete="off">
				<select name="marki" id="select">
					<option value="a">WSZYSTKIE MARKI</option>
					<?php  
ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, $database);
mysqli_query($polaczenie, "SET CHARSET utf8");
mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");



//SEARCH BAR + SELECT Z MARKAMI


$sql = "SELECT marka FROM czesci";
$result = mysqli_query($polaczenie, $sql);

    while ($row = mysqli_fetch_array  ($result))
    {

        echo "<option>".$row['marka']."</option>";
      
    }
?>
				</select>
				<input id="search" type="text" name= "search" placeholder="WPROWADŹ NAZWE CZĘŚCI">

				<!-- <input id="submit" type="submit" name="sumbit" > -->
				<button id="submit" type="submit" name="sumbit">WYSZUKAJ</button>
			</form>  
		</div>
	</header>

<table width="900" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
<tr>
	
<?php
$marka = $_POST['marki'];
$nazwa = $_POST['search'];
if($marka == "a"){
	$zapytanie= "SELECT * FROM czesci WHERE nazwa  like '%".$nazwa."%'";
}else{
$zapytanie= "SELECT * FROM czesci WHERE nazwa  like '%".$nazwa."%' and marka like '".$marka."'";
}
$rezultat = mysqli_query( $polaczenie, $zapytanie,);

$ile = mysqli_num_rows($rezultat);

if ($ile>=1) 
{
echo<<<END
<td width="50" align="center" bgcolor="e5e5e5">id</td>
<td width="100" align="center" bgcolor="e5e5e5">marka</td>
<td width="100" align="center" bgcolor="e5e5e5">nazwa</td>
</tr><tr>
END;


}

	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$id = $row['id'];
		$tresc = $row['marka'];
		$odpa = $row['nazwa'];
		$images = $row['image_url'];
		
			?>

<td	width="50" align="center"><?=$id?></td>
<td width="100" align="center"><?=$tresc?></td>
<td width="100" align="center"><?=$odpa?></td>
<td width="100" align="center"><img width="100%" height="100%"src="uploads/<?=$images?>"></td>
</tr><tr>

		
<?php
	}

?>


</tr></table>



</body>
</html>