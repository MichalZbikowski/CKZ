<?php 
//usuwanie z tabeli
    ini_set("display_errors", 0);
    require_once 'dbconnect.php';
    $polaczenie = mysqli_connect($host, $user, $password);
    mysqli_query($polaczenie, "SET CHARSET utf8");
    mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
    mysqli_select_db($polaczenie, $database);

        $id2 = $_POST['id2'];
        $nazwa2 = $_POST['nazwa2'];
        $marka2= $_POST['marka2'];
        echo "$marka2";
        $sql3 = "DELETE FROM czesci WHERE nazwa='$nazwa2' or id='$id2'  or marka='$marka2'";
        mysqli_query($polaczenie,$sql3);
    
    $usuwaniepustych = "DELETE FROM czesci WHERE  marka='' or nazwa=''";
    mysqli_query($polaczenie,$usuwaniepustych);
    header("location: insert.php");
?>