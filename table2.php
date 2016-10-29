<?php

function swap(&$first, &$second)
{
	$sub = $first;
	$first = $second;
	$second = $sub;
}
function write($str, $mas, $count)
{
	echo "<br>"."$str"."<br>-----------<br>";
	for ($i=0; $i < $count; $i++) { 
	 	for ($j=0; $j < $count; $j++) { 
			echo $mas[$i][$j]." ";
		}
		echo "<br>";
	}
}

$uploaddir = 'C:/xampp/htdocs/Git/Lab4/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {    
	$string = file_get_contents(basename($_FILES['userfile']['name']));
	$string = preg_replace('/\s/', '', $string); // удаляем все пробелы
	$count = sqrt(strlen($string));  // размер матрицы
	$d=0; // номер символа в строке
	for ($i=0; $i < $count; $i++) { 
	 	for ($j=0; $j < $count; $j++) {
	 		$mas[$i][$j] = $string{$d};
	 		++$d;
		}
	}
	write("Исходная матрица",$mas, $count);
	// меняем попарно строки
	$mas_c = $mas; 
	for ($i=0; $i < $count-1; $i+=2) { 
	 	for ($j=0; $j < $count; $j++) { 
			swap($mas_c[$i][$j],$mas_c[$i+1][$j]);
		}
	}
	write("Меняем строки",$mas_c, $count);
	for ($i=0; $i < $count; $i++) { 
	 	for ($j=0; $j < $count-1; $j+=2) { 
			swap($mas[$i][$j],$mas[$i][$j+1]);
		}
	}
	write("Меняем столбцы",$mas, $count);
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
?>