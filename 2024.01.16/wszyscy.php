<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wszyscy uczniowie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="grid-container">
    <header>
    Wszyscy uczniowie
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
    <form action="" method="post">
    <div id="formSearchUczen"> 
    <p class="inputlabels">Wyszukaj Ucznia:</p> <input type="text" name="search_input"><br>
        <select name="klasa_select" id="selectWyborKlasy">
            <?php
            error_reporting(0);
                 $host = 'localhost';
                 $login = 'root';
                 $password = '';
                 $database = '2pb';
                 
                 $conn = mysqli_connect($host, $login, $password, $database);
                 $conn = mysqli_connect($host, $login, $password, $database);
             if(!$conn){
                 echo "blad";
             }else{
                 $sql = "SELECT * FROM klasy";
                 $result = mysqli_query($conn, $sql);
                 echo "<option>"."Wszyscy"."</option>";
                 while ($row = mysqli_fetch_array  ($result))
                 {
                    
                     echo "<option value='" .$row['klasa']."'>".$row['klasa']." ".$row['imie_wychowawcy']." ".$row['nazwisko_wychowawcy']." "."</option>";
                 
                 }
                 
            ?>
        </select>
    
        <input type="submit" id="submitSearchUcznia" value="WYSZUKAJ"></div>
    </form>
    <div id="tabelaDiv">
    <table>
    <th width="50" align="center" bgcolor="e5e5e5">imie</th>
    <th width="100" align="center" bgcolor="e5e5e5">nazwisko</th>
    <th width="100" align="center" bgcolor="e5e5e5">ulica</th>
    <th width="100" align="center" bgcolor="e5e5e5">numer_domu</th>
    <th width="100" align="center" bgcolor="e5e5e5">numer_lokalu</th>
    <th width="100" align="center" bgcolor="e5e5e5">miejscowosc</th>
    <th width="100" align="center" bgcolor="e5e5e5">klasa</th><tr>
    <?php
    


    $search_input= $_POST["search_input"];
    $klasa_select= $_POST["klasa_select"];
    if( $klasa_select == "Wszyscy" ){
        $klasa_select = "";
    }
    $sql = "SELECT * FROM `uczniowie` WHERE (imie like '".$search_input."%' or nazwisko like '".$search_input."%' or ulica like '".$search_input."%' or miejscowosc like '".$search_input."%') and klasa like '".$klasa_select."%'";
    $result = mysqli_query($conn,$sql);
    

    while($row = mysqli_fetch_assoc($result)){
        
        $imie  = $row['imie'];
        $nazwisko = $row['nazwisko'];
        $ulica = $row['ulica'];
        $numer_domu = $row['numer_domu'];
        $numer_lokalu = $row['numer_lokalu'];
        $miejscowosc= $row['miejscowosc'];
        $klasa = $row['klasa'];
      
        ?>

<td	width="50" align="center"><?=$imie?></td>
<td width="100" align="center"><?=$nazwisko?></td>
<td width="100" align="center"><?=$ulica?></td>
<td width="100" align="center"><?=$numer_domu?></td>
<td width="100" align="center"><?=$numer_lokalu?></td>
<td width="100" align="center"><?=$miejscowosc?></td>
<td width="100" align="center"><?=$klasa?></td>

</tr><tr>

		
<?php
	}}

?>


</tr></table></div>
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