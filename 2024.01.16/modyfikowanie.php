<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie uczniami</title><link rel="stylesheet" href="style.css">
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
                <a href="modyfikowanie.php">Dodawanie i usuwanie uczniow</a>
            </li>
            <li><a href="dodawanie_klas.php"> Dodawnie klas</a></li>
            <li><a href="wszyscy.php"> Wszyscy uczniowie</a></li>
        </ul>
    <form type="text" method="POST" action = "insert.php">
		<div id="formAddUczen">
            <p class="inputlabels">Imie:</p> <input type="text" name= "imie">                   
            <p class="inputlabels">Miejscowosc: </p><input type="text" name= "miejscowosc"> 
            
             
           
            <p class="inputlabels">Numer Domu: </p><input type="text" name= "numer_domu"> 
            <p class="inputlabels">Nazwisko:</p> <input type="text" name= "nazwisko"> 
            <p class="inputlabels">Kod Pocztowy:</p> <input type="text" name= "kod_pocztowy">
            <p class="inputlabels">Numer Lokalu:</p> <input type="number" name= "numer_lokalu"> 
            <p class="inputlabels">Klasa:</p>  <select name="klasa" id="">
                    <?php 
                    error_reporting(0);
                        $host = 'localhost';
                        $login = 'root';
                        $password = '';
                        $database = '2pb';
                        
                        $conn = mysqli_connect($host, $login, $password, $database);
                        
                    if(!$conn){
                        echo "blad";
                    }else{
                        $sql = "SELECT * FROM klasy";
                        $result = mysqli_query($conn, $sql);
                    
                        while ($row = mysqli_fetch_array  ($result))
                        {
                    
                            echo "<option>".$row['klasa']." ".$row['imie_wychowawcy']." ".$row['nazwisko_wychowawcy']." "."</option>";
                        
                        }
                        
                        
                    
                    ?>
            </select>
            <p class="inputlabels">Ulica:</p> <input type="text" name= "ulica"> 
            <input id="submitDodajUcznia" type="submit"  name="submit"value="DODAJ">
        </div>
       
</form>
<form type="text" method="POST" action = "delete.php">  
<div id="formDeleteUczen">      
<p class="inputlabels">ID:</p><input id="inputUsuwanieUcznia" type="text" name= "id2">
        <input id="submitUsunUcznia" name="sumbit2"  type="submit" value="USUŃ" >
        </form>
                    </div>  
<form type="text" method="POST">
<div id="formSearchUczen">    
<p class="inputlabels">Wyszukaj Ucznia:</p> <input id="inputSearchUcznia" type="text" name="search_input"><br> <br> <br>
        <input type="submit" id="submitSearchUcznia" name="submit2" value="WYSZUKAJ">
</div>
</form>
<div id="tabelaDiv">
    <table>
    <th width="50" align="center" bgcolor="e5e5e5">id</th>
    <th width="50" align="center" bgcolor="e5e5e5">imie</th>
    <th width="100" align="center" bgcolor="e5e5e5">nazwisko</th>
    <th width="100" align="center" bgcolor="e5e5e5">ulica</th>
    <th width="100" align="center" bgcolor="e5e5e5">numer_domu</th>
    <th width="100" align="center" bgcolor="e5e5e5">numer_lokalu</th>
    <th width="100" align="center" bgcolor="e5e5e5">miejscowosc</th>
    <th width="100" align="center" bgcolor="e5e5e5">klasa</th><tr>
    <?php
    
    $usuwaniepustych = "DELETE FROM uczniowie WHERE  imie='' or nazwisko='' ";
    mysqli_query($conn, $usuwaniepustych);
       
    

    
    $search_input= $_POST["search_input"];
    $sql = "SELECT * FROM `uczniowie` WHERE imie like '".$search_input."%' or nazwisko like '".$search_input."%' or ulica like '".$search_input."%' or miejscowosc like '".$search_input."%'";
    
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
        $id  = $row['id'];
        $imie  = $row['imie'];
        $nazwisko = $row['nazwisko'];
        $ulica = $row['ulica'];
        $numer_domu = $row['numer_domu'];
        $numer_lokalu = $row['numer_lokalu'];
        $miejscowosc= $row['miejscowosc'];
        $klasa = $row['klasa'];
      
        ?>
<td	width="50" align="center"><?=$id?></td>
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
        footer zrobione michal
    </footer>
    <div id="item9"></div>
</div>

   
</body>
</html> 