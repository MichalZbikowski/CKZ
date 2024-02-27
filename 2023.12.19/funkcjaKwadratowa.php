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
        FUKNCJA KWADRATOWA
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
        <label for="inputA" class="form__label">Podaj koniec zakresu</label>
    </div>
    <div class="form__group field">
        <input type="number" placeholder="podaj a" class="form__field" name="inputC">
        <label for="inputA" class="form__label">Podaj C</label>
    </div>
  
        <input type="submit" value="Oblicz">
    </form>
    
    <div id="odpowiedzi">
    <?php

if(isset($_POST["inputA"])
&& isset($_POST["inputB"]) 
&& isset($_POST["inputC"])){

    $a = isset($_POST["inputA"])&& !empty($_POST["inputA"]) ? $_POST["inputA"] :null ;   
    
    if($a==0){
        echo "a musi być różne od zera!";
    }
    
    else{
        $b = isset($_POST["inputB"]) && !empty($_POST["inputB"]) ? $_POST["inputB"] :null ; 
        $c = isset($_POST["inputC"])&& !empty($_POST["inputC"]) ? $_POST["inputC"] :null ;
      if($b==0){
        $b=0;
    }
    if($c==0){
        $c=0;
    }
      $delta = ($b ** 2) - (4 * $a * $c);

      echo "a = " . $a . ", b = " . $b . ", c = " . $c . "<br>";
      echo "Delta= $b&#178- 4*$a*$c = ". $delta. "<br>";;
      if ($delta == 0) {
        ?>x0 = <?= (-$b)/(2*$a);
      } elseif ($delta > 1) {
        echo "x1 = ". ((-$b)-sqrt($delta))/(2*$a);
        echo "x2 = ". ((-$b)+sqrt($delta))/(2*$a);
      } else {
        echo "Delta jest mniejsza od zera, dlatego nie ma rozwiązań";
      }
    }
}



  ?>
    
    </main>
    <div class="item6"></div>
    <footer>AUTOR: Michał Żbikowski</footer>
</div>

    
</body>
</html>