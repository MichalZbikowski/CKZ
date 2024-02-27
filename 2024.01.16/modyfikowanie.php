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
            <li>
                <a href="main.php">Strona Główna</a>
            </li>
            <li><a href="dodawanie_klas.php"> dodawnie klas</a></li>
            <li><a href="wszyscy.php"> wszyscy uczniowie</a></li>
        </ul>
    <form type="text" method="POST" action = "insert.php">
		<div id="inputAddDiv">
            <p class="inputlabels">imie:</p> <input type="text" name= "imie">                   
            <p class="inputlabels">nazwisko:</p> <input type="text" name= "nazwisko"> 
            <p class="inputlabels">klasa:</p>  <select name="klasa" id="">
                    <?php 
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
            <p class="inputlabels">kod pocztowy:</p> <input type="text" name= "kod_pocztowy"> <br>
            miejscowosc: <input type="text" name= "miejscowosc"> <br>
            numer domu: <input type="text" name= "numer_domu"> <br>
            numer lokalu: <input type="number" name= "numer_lokalu"> <br>
            ulica: <input type="text" name= "ulica"> <br>
            <input id="submitDodaj" type="submit"  name="submit"value="dodaj"><br> <br> <br>
        </div>
       
</form>
<form type="text" method="POST" action = "delete.php">  
<div id="inputDeleteDiv">      
        id:<input id="klasa_usuwanie" type="text" name= "id2"> <br>
        <input id="submit" name="sumbit2"  type="submit" value="usun" > <br>
        </form>
                    </div>  
<form type="text" method="POST">
        wyszukaj ucznia: <input type="text" name="search_input"><br> <br> <br>
        <input type="submit" id="submit" name="submit2">
</form>
    <table>
    <td width="50" align="center" bgcolor="e5e5e5">id</td>
    <td width="50" align="center" bgcolor="e5e5e5">imie</td>
    <td width="100" align="center" bgcolor="e5e5e5">nazwisko</td>
    <td width="100" align="center" bgcolor="e5e5e5">ulica</td>
    <td width="100" align="center" bgcolor="e5e5e5">numer_domu</td>
    <td width="100" align="center" bgcolor="e5e5e5">numer_lokalu</td>
    <td width="100" align="center" bgcolor="e5e5e5">miejscowosc</td>
    <td width="100" align="center" bgcolor="e5e5e5">klasa</td><tr>
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


</tr></table>
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