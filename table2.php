<?php
// В PHP 4.1.0 и более ранних версиях следует использовать $HTTP_POST_FILES
// вместо $_FILES.

$uploaddir = 'C:/xampp/htdocs/Git/Lab4/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    
	$string = file_get_contents(basename($_FILES['userfile']['name']));
		echo $string;
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}


?>