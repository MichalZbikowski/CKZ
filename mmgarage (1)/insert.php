<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Rezultat zapytania</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            width:700px;
            max-width: 80%;
            margin:auto;
            
        }
        .check{
            margin:auto;
            width:160px;
        }
    </style>
</head>

<body>
<form type="text" method="POST" enctype="multipart/form-data">
		
        nazwa:<input id="nazwa" type="text" name= "nazwa">
		marka:<input id="marka" type="text" name= "marka">
        cena:<input id="cena" type="text" name= "cena">
        katergoria: <input id="kategoria" type="text" name= "kategoria">
        dostepność: <input id="dostepnosc" type="number" name= "dostepnosc">
        <input type="file" name="my_image">
        <input id="submit" type="submit" formaction = "upload.php" name="submit"value="dodaj"><br>
</form>
<form type="text" method="POST" enctype="multipart/form-data">        
        id:<input id="id2" type="text" name= "id2">
        nazwa:<input id="nazwa2" type="text" name= "nazwa2">
		marka:<input id="marka2" type="text" name= "marka2">
        <input id="submit" name="sumbit2" formaction = "delete.php"type="submit" value="usun" >
        </form>
        
<form type="text" method="POST" enctype="multipart/form-data">
        wyszukaj: <input type="text" name = "search" id="search">
        <input type="submit" id="submit" name="submit2">
</form>

<table width="500" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
<tr>
<?php 



ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_query($polaczenie, "SET CHARSET utf8");
mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);
// error_reporting(E_ALL);
// ini_set('display_errors', true);

 
 if (!$polaczenie) {
    die("<div class='check'>Connection failed:</div> " . mysqli_connect_error());
}
echo "<div class='check'>Connected successfully &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>";


    $nazwa = $_POST['search'];

    $zapytanie= "SELECT * FROM czesci WHERE nazwa  like '%".$nazwa."%' or  marka  like '%".$nazwa."%' ";

    $rezultat = mysqli_query( $polaczenie, $zapytanie,);

    $ile = mysqli_num_rows($rezultat);



if ($ile >=1) 
{
echo<<<END
<td width="7" align="center" bgcolor="e5e5e5">id</td>
<td width="35" align="center" bgcolor="e5e5e5">marka</td>
<td width="35" align="center" bgcolor="e5e5e5">nazwa</td>
</tr><tr>
END;


}

	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$id = $row['id'];
		$tresc = $row['marka'];
		$odpa = $row['nazwa'];
        $images = $row['image_url'];?>
		
<td width="7" align="center"><?=$id?></td>
<td width="35" align="center"><?=$tresc?></td>
<td width="35" align="center"><?=$odpa?></td>
<td width="50" align="center"><img width="100%" height="100%"src="uploads/<?=$images?>"></td>

</tr><tr>
<?php
    }


?>


</tr></table>

</body>
</html>