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
    <header>
        Ciągi - ćwiczenia
    </header>


    <div class="item4"><a href="../" id="back"></a></div>
    <main>
        <form action="" method="post">
        <div class="form__group field">
            <input type="number" placeholder="podaj a" class="form__field" name="inputA">
            <label for="inputA" class="form__label">Podaj początek zakresu</label>
        </div>
        <div class="form__group field">
            <input type="number" placeholder="podaj a" class="form__field" name="inputB">
            <label for="inputB" class="form__label">Podaj koniec zakresu</label>
        </div>
        <div class="form__group field">
        <input type="number" placeholder="podaj a" class="form__field" name="inputC">
        <label for="inputC" class="form__label">Podaj ilosc wylosowanych liczb</label>
        </div>
         <input type="submit" value="Oblicz">
        </form>
        <div id="odpowiedzi">
        <?php
       $wszystkie=""; 
       $parzyste="";
       $nieparzyste="";
       $parzystePodzielne3="";
       $skomplikowane="";
    if(isset($_POST["inputA"])
    && isset($_POST["inputB"])
    && isset($_POST["inputC"])){
        $c = isset($_POST["inputC"])&& !empty($_POST["inputC"]) ? $_POST["inputC"] :null ;  

        if($c<=0){
            echo "dlugosc ciagu musi byc wieksza od zera!";
        }
        
        else{
    
        $a = isset($_POST["inputA"])&& !empty($_POST["inputA"]) ? $_POST["inputA"] :null ;   
        $b = isset($_POST["inputB"]) && !empty($_POST["inputB"]) ? $_POST["inputB"] :null ; 
            
 
    $zakres= $b-$a;
    echo "<script> console.log('".$a+($zakres*0.4).$a+($zakres*0.7)."')</script>";
    for($i = 0; $i<$c; $i++){
        $losowa = rand($a, $b);

        $wszystkie .= $losowa.", "; 
        if($losowa%2==0 ){
            $parzyste .= $losowa.", ";
        }else{
            $nieparzyste .= $losowa.", ";
        }

        if($losowa%2==0 && $losowa%3==0 ){
            $parzystePodzielne3 .= $losowa.", ";
        }
        if(($losowa%5==0)&&($losowa<$a+($zakres*0.4) ) || ($losowa%2==0)&&($losowa>=$a+($zakres*0.7)  )){
            $skomplikowane .= $losowa.", ";
        }
    }
 
    ?>
            <div id="wszystkie">
            <?php
            echo "Wszystkie liczby: " ;
            echo substr($wszystkie, 0, -2); ?><br><br>
            </div>
            <div id="parzyste">
            <?php 
            echo "Parzyste liczby: " ;
            echo substr($parzyste, 0, -2); ?><br><br>
            </div>
            <div id="nieparzyste">
            <?php 
            echo "Nieparzyste liczby: " ;
            echo substr($nieparzyste , 0, -2); ?><br><br>
            </div>
            <div id="parzyste_podzielne3">
            <?php 
            echo "Parzyste, jednocześnie podzielnie przez 3 liczby: " ;
            echo substr($parzystePodzielne3 , 0, -2); ?><br><br>
            </div>
            <div id="to_skomplikowane">
            <?php 
            echo "Liczby podzielne przez 5, ale mniejsze od 40% zakresu <br> oraz liczby parzyste, ale większe lub równe od 70% zakresu: " ;
            echo substr($skomplikowane , 0, -2);    ?>
            </div>
             <?php } } ?>
        </div>
        
    </main>
    <div class="item6"></div>
    <footer>AUTOR: Michał Żbikowski</footer>
</div>
</body>
</html>