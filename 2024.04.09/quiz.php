<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
    <?php
    // function doLiczby($litera){
    //     $alfabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','W','X','Y','Z',);
    //     for($i = 0; $i<=count($alfabet);$i++){

    //     }
    // }

    //POŁĄCZENIE Z BAZĄ
    $host = 'localhost';
    $user='root';
    $password='';
    $database='quiz';

    $conn = mysqli_connect($host, $user, $password, $database);
    $zapytanie = mysqli_query($conn, "SELECT pytania.id, pytania.tresc, pytania.punktacja, pytania.wielokrotnego, odpowiedzi.idodp, odpowiedzi.idpytania, odpowiedzi.trescodp, odpowiedzi.poprawna, odpowiedzi.literaodp FROM `pytania` inner join odpowiedzi on pytania.id = odpowiedzi.idpytania;");
    $i=1;

    

    //WYŚWIETLANIE PYTAŃ RAZEM Z ODPOWIEDNIM INPUTEM

    //$wiersz[''] to pojedyńczy rekord z połączenia tabeli pytania i odpowiedzi
    while($wiersz = mysqli_fetch_array($zapytanie)){
        if($wiersz['wielokrotnego']==0){
            if($wiersz['literaodp']=="A" ){
                echo $wiersz['tresc'] . " <br>";
            }
                echo "<input type='radio' name='".$wiersz['idpytania']."'value='".$wiersz['literaodp']."'>".$wiersz['literaodp'] . ". ";
                echo $wiersz['trescodp'] . " ";
                echo $wiersz['poprawna'] . " <br>";
        }else{
            if($wiersz['literaodp']=="A" ){
                echo $wiersz['tresc'] . " <br>";
            }
            echo $wiersz['idpytania'];
                echo "<input type='checkbox' name='".$wiersz['idpytania']."[]'value='".$wiersz['literaodp']."'>".$wiersz['literaodp'] . ". ";
                echo $wiersz['trescodp'] . " ";
                echo $wiersz['poprawna'] . " <br>";
        }
        
    }   
    
    //POBRANIE DANYCH
    ?>
    <input type="submit" value="WYŚLIJ">
    </form>
    <?php
     $zapytanie = mysqli_query($conn, "SELECT pytania.id, pytania.tresc, pytania.punktacja, pytania.wielokrotnego, odpowiedzi.idodp, odpowiedzi.idpytania, odpowiedzi.trescodp, odpowiedzi.poprawna, odpowiedzi.literaodp FROM `pytania` inner join odpowiedzi on pytania.id = odpowiedzi.idpytania;");

    while($wiersz = mysqli_fetch_array($zapytanie)){
        if($wiersz['wielokrotnego']==0){
            if(($_POST[$wiersz['idpytania']]==$wiersz['literaodp']) && ($wiersz['poprawna']==1)){
                echo "UDAŁO CI SIE ";
            }
            
        }else{
            echo "<br>";
            foreach($_POST[$wiersz['idpytania']] as $value){
                if($_POST[$wiersz['idpytania']]==$wiersz['literaodp'] && $wiersz['poprawna']==1){
                    echo "kkkkkkkkkk";
                }
                
            }
        }
    }
    mysqli_close($conn);
    ?>
    
</body>
</html>