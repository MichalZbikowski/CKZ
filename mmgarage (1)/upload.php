<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image']) && $_POST['submit'] == 'dodaj') {
	include "db_con.php";
	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1222225000) {
			$em = "Sorry, your file is too large.";
		    header("Location: insert.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

                $nazwa = $_POST['nazwa'];
		    	$marka = $_POST['marka'];
				$cena = $_POST['cena'];
		    	$kategoria = $_POST['kategoria'];
				$dostepnosc = $_POST['dostepnosc'];
		
				// Insert into Database
				
				$sql = "INSERT INTO `czesci`(nazwa, marka , image_url , cena , kategoria , dostepnosc) VALUES ( '".$nazwa."', '".$marka."', '".$new_img_name."','".$cena."','".$kategoria."','".$dostepnosc."')";
				echo $sql;
				mysqli_query($conn, $sql);
				
				header("Location: insert.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: insert.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: insert.php?error=$em");
	}

} else{
	header("Location: insert.php");
}
?>


