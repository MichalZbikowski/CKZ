<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie Klas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="grid-container">
    <header>
        Strona szkoły
    </header>
    <div id="item4">
        
        
        

    </div id="item4">
    <main>
    <ul>
    <li><a href="main.php"> Strona Główna</a></li>
            <li>
                <a href="modyfikowanie.php">dodawanie i usuwanie uczniow</a>
            </li>
            
            <li><a href="wszyscy.php"> wszyscy uczniowie</a></li>
        </ul>
        
    <form type="text" method="POST" action = "insert_klasa.php">
		
        imie wychowawcy:<input type="text" name= "imie_wychowawcy"><br>             
		nazwisko wychowawcy:<input type="text" name= "nazwisko_wychowawcy"> <br>
        klasa: <input type="text" name= "klasa"> <br>
        <input id="submit" type="submit"  name="submit"value="dodaj"><br> <br> <br>
</form>
<form type="text" method="POST" action = "delete_klasa.php">        
        usuwanie klasy:<input id="id2" type="text" name= "klasa2"> <br>
        <input id="submit" name="sumbit2"  type="submit" value="usun" > <br>
    </form>
        
<form type="text" method="POST">
wyszukaj klase: <input type="text" name="search_input"><br><br> <br>
        <input type="submit" id="submit" name="submit2">
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
        footer zrobione michal
    </footer>
    <div id="item9"></div>
</div>

</body>
</html>
