<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie i usuwanie Klas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="grid-container">
    <header>
    Dodawnie i usuwanie klas
    </header>
    <div id="item4">
        
        
        

    </div id="item4">
    <main>

    <ul>
        <li><a href="main.php"> Strona Główna</a></li>
            <li>
                <a href="modyfikowanie.php">Dodawanie i usuwanie uczniów</a>
            </li>
            <li><a href="dodawanie_klas.php"> Dodawnie i usuwanie klas</a></li>
            <li><a href="wszyscy.php"> Wszyscy uczniowie</a></li>
        </ul>
<form type="text" method="POST" action = "insert_klasa.php">
	<div id="formAddKlasa"> 	
        <p class="inputlabels">Imie wychowawcy:</p><input type="text" name= "imie_wychowawcy">        
        <p class="inputlabels">Nazwisko wychowawcy:</p><input type="text" name= "nazwisko_wychowawcy"> 
        <p class="inputlabels">Klasa: </p><input type="text" name= "klasa"><br>
        <input id="submitAddKlasa" type="submit"  name="submit"value="DODAJ">
    </div>
</form>
<form type="text" method="POST" action = "delete_klasa.php">    
    <div id="formDeleteKlasa">     
        <p class="inputlabels">Usuwanie klasy:</p><input id="inputUsunwanieKlasy" type="text" name= "klasa2"> <br>
        <input id="submitUsunKlase" name="sumbit2"  type="submit" value="USUŃ" > <br>
    </div>
</form>
        
<form type="text" method="POST">
    <div id="formSearchKlasa"> 
        <p class="inputlabels">Wyszukaj Klase: </p><input type="text" id="inputSearchKlasa"name="search_input"><br><br> <br>
        <input type="submit" id="submitWyszukajKlase" value="WYSZUKAJ"name="submit2">
    </div>
</form>
<div id="tabelaDiv">
    <table>
        <th width="50" align="center" bgcolor="e5e5e5">klasa</th>
    <th width="50" align="center" bgcolor="e5e5e5">imie wychowawcy</th>
    <th width="100" align="center" bgcolor="e5e5e5">nazwisko wychowawcy</th>
  
    <?php
    error_reporting(0);
    $host = 'localhost';
    $login = 'root';
    $password = '';
    $database = '2pb';
    
    $conn = mysqli_connect($host, $login, $password, $database);
    
    $usuwaniePustychKlas = "DELETE FROM klasy WHERE  klasa='' or imie_wychowawcy='' or nazwisko_wychowawcy='' ";
    mysqli_query($conn, $usuwaniePustychKlas);
       
    

    
    $search_input= $_POST["search_input"];
    $sql = "SELECT * FROM `klasy` WHERE imie_wychowawcy like '".$search_input."%' or nazwisko_wychowawcy like '".$search_input."%' or klasa like '".$search_input."%'";
    
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
        $klasa = $row['klasa'];
        $imie  = $row['imie_wychowawcy'];
        $nazwisko = $row['nazwisko_wychowawcy'];
  
      
        ?><tr>
<td width="100" align="center"><?=$klasa?></td>
<td	width="50" align="center"><?=$imie?></td>
<td width="100" align="center"><?=$nazwisko?></td>


</tr>

		
<?php
	}

?>
</table>
</div>
    </main>
    <div id="rightBanner">

    </div>
    <div id="item7"></div>
    <footer>
    ZS6 Sobieski - email: aaaaa@aaaa.com, Numer Telefonu: 112
    </footer>
    <div id="item9"></div>
</div>

</body>
</html>
