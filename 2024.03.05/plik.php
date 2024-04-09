<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>

    <div>
        <?php 

        $host = 'localhost';
        $user='root';
        $password='';
        $database='world';

        $conn = mysqli_connect($host, $user, $password, $database);
        $zapytanie = mysqli_query($conn, "Select * from country");

        while($wiersz = mysqli_fetch_assoc($zapytanie)){
            echo $wiersz['Name'] . " <br>";
        }

        mysqli_close($conn);
        ?>
    </div>
    </div>
    
</body>
</html>