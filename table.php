<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Table</title>
</head>
<body>
	<?php 
		if (isset($_GET['count'])) 
		{
    	$count = $_GET['count'];
    	for ($i=0; $i < $count; $i++) { 
    	 	for ($j=0; $j < $count; $j++) { 
    	 		$mas[$i][$j]=rand(0, 9);
    	 	}
    	 }
    	echo "Матрица"."<br>-----------<br>";
		for ($i=0; $i < $count; $i++) { 
		 	for ($j=0; $j < $count; $j++) { 
				echo $mas[$i][$j]." ";
			}
			echo "<br>";
		}
		

		function determ($mas, $size)
		{
		  $i;
		  $j;
		  $det = 0;
		  if ($size == 1)
		  {
		    $det = $mas[0][0];
		  }
		  else if ($size == 2)
		  {
		    $det = $mas[0][0] * $mas[1][1] - $mas[0][1] * $mas[1][0];
		  }
		  else
		  {
		    $matr = array();
		    for ($i = 0; $i < $size; ++$i)
		    {
		      for ($j = 0; $j < $size - 1; ++$j)
		      {
		        if ($j < $i)
		          $matr[$j] = $mas[$j];
		        else
		          $matr[$j] = $mas[$j + 1];
		      }
		      $det += pow(-1, ($i + $j))*determ($matr, $size - 1)*$mas[$i][$size - 1];
		    }
		  }
		  return $det;
		}

		echo "-----------<br>"."Определитель: " . determ($mas, $count);
		}
		 		 
	?>

</body>
</html>