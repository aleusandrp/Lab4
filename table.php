<?php 
	if (isset($_GET['count'])) 
	{
    	$count = $_GET['count'];
    	for ($i=0; $i < $count; $i++) { 
    	 	for ($j=0; $j < $count; $j++) { 
    	 		$mas[$i][$j]=rand(1, 9);
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

		echo "-----------<br>"."Определитель: " . determ($mas, $count)."<br>";

		function obratka($matrix){ 
		    $a = $matrix; 
		    $e = array(); 
		    $count = count($a); 
		    for($i=0;$i<$count;$i++) 
		        for($j=0;$j<$count;$j++) 
		            $e[$i][$j]=($i==$j)? 1 : 0; 
		             
		    for($i=0;$i<$count;$i++){ 
		        $tmp = $a[$i][$i]; 
		        for($j=$count-1;$j>=0;$j--){ 
		            $e[$i][$j]/=$tmp; 
		            $a[$i][$j]/=$tmp; 
		        } 
	         
	        for($j=0;$j<$count;$j++){ 
	            if($j!=$i){ 
	                $tmp = $a[$j][$i]; 
	                for($k=$count-1;$k>=0;$k--){ 
	                    $e[$j][$k]-=$e[$i][$k]*$tmp; 
	                    $a[$j][$k]-=$a[$i][$k]*$tmp; 
	                } 
	            } 
	        } 
	    } 
	     
	    for($i=0;$i<$count;$i++) 
	     for($j=0;$j<$count;$j++) 
	       $a[$i][$j]=$e[$i][$j]; 
	        
	        echo "Обратная матрица"."<br>-----------<br>";
			for ($i=0; $i < $count; $i++) 
			{ 
		 		for ($j=0; $j < $count; $j++) {
					echo number_format($a[$i][$j], 2, '.', '')."|";
				}
				echo "<br>";
			}   
			} 
			obratka($mas);

		$otr = $mas;
		for ($i=0; $i<$count/2; $i++)
        for ($j=0; $j < $count; $j++) 
        { 
            $tmp = $otr[$i][$j];
            $otr[$i][$j] = $otr[$count-$i-1][$j];
            $otr[$count-$i-1][$j] = $tmp;
    	}		
    	echo "Горизонтальное отображение"."<br>-----------<br>";
		for ($i=0; $i < $count; $i++) { 
		 	for ($j=0; $j < $count; $j++) { 
				echo $otr[$i][$j]." ";
			}
			echo "<br>";
		}
		$otr = $mas;
		for ($i=0; $i < $count; $i++)
        for ($j=0; $j < $count/2; $j++) 
        { 
            $tmp = $otr[$i][$j];
            $otr[$i][$j] = $otr[$i][$count - $j - 1];
            $otr[$i][$count - $j - 1] = $tmp;
        }
        echo "Вертикальное отображение"."<br>-----------<br>";
		for ($i=0; $i < $count; $i++) { 
		 	for ($j=0; $j < $count; $j++) { 
				echo $otr[$i][$j]." ";
			}
			echo "<br>";
		}
		//открываем соединение с файлом на запись
		$f=fopen('my_file.txt','w');
		//в цикле считываем данные из массива и пишем их в файл
		foreach($mas as $k=>$v){
		$line= "";
		foreach($v as $value){
		$line.=$value."\t";
		}
		fputs($f,$line."\n");
		}
		//закраваем соединение с файлом
		fclose($f);
	}
?>
Скачать исходную матрицу? 
<a href="my_file.txt" download>Скачать файл</a>
<?php echo "<br>"; ?>
<form enctype="multipart/form-data" action="table2.php" method="POST">
    <input type="hidden" name="mas" value="30000" />
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить" />
</form>
<?php 
//	include "table2.php";
 ?>
