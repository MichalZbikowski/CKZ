<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="grid-container">
        <div id="skarpeta"></div>
        <header> ŚWIĘTA Z PHP</header>
        <div class="item4"></div>
        <main>
            <form action="" method="post">
                Pierwsza liczba: <input type="number" name="numer1"><br>
                Druga liczba:<input type="number" name="numer2"><br>
                <input type="submit" value="WYŚLIJ">
            </form>
            <table id="tabelafor">
            <?php
             error_reporting(0);
            $liczba1 = $_POST["numer1"];
            $liczba2 = $_POST["numer2"];
            
            
            if(isset($_POST["numer1"]) && isset($_POST["numer2"])){
                if(($liczba1 <= 0) or ($liczba2<=0)){
                    echo "musisz podac liczby wieksze od zera";
                }else{
                for($i = 1; $i<=$liczba1;$i++){?>
                <tr>
                <?php
                ini_set('display_errors', 0);
                ini_set('display_startup_errors', 0);
             
                    for($j = 1; $j<=$liczba2;$j++){?> 
                    <td><?=$i*$j ?></td> 
                    <?php
                    }
                    ?></tr><?php
                }
            }
            }
            ?>
            </table><br><br>
            <table id="tabelawhile">
            <?php
            error_reporting(0);
            
            if(isset($_POST["numer1"]) && isset($_POST["numer2"])){
                if(($liczba1 <= 0) or ($liczba2<=0)){
                
                }else{
                $i=1;
                while($i<=$liczba1){?>
                <tr>
                <?php
                    $j = 1;
                    while( $j<=$liczba2){?> 
                    <td><?=$i*$j ?></td> 
                    <?php
                    $j++;
                    }
                    ?></tr><?php
                    $i++;
                }
            }
            }
            ?>
            </table><br><br>
            <table id="tabeladowhile">
            <?php
         
            if(isset($_POST["numer1"]) && isset($_POST["numer2"])){
                if(($liczba1 <= 0) or ($liczba2<=0)){
                
                }else{
     
                $i=1;
                do{?>
                <tr>
                <?php
                    $j = 1;
                    do{?> 
                    <td><?=$i*$j ?></td> 
                    <?php
                    $j++;
                    } while( $j<=$liczba2);
                    ?></tr><?php
                    $i++;
                }while($i<=$liczba1);
            }
            }
            ?>
            </table>
        </main>
        <div class="item6"></div>
        <footer>footer</footer>
    </div>
    
</body>
</html>




