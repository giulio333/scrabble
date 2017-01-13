<?php

	$word = strtolower($_POST['text']);

	$len = strlen($word);
	$a = 0;
	$ptr = 0;
	$corrispondenza = 0;
	$counter = 0;
	$temp = 0;
	$point = 0;

	//Apertura file
	$file = file("dictionary.txt");
	$count = count($file);
	
	for ($i=0; $i < $count; $i++) { 
		if (strlen($file[$i]) == ($len+1)) {
			$arr[$a] = strtolower($file[$i]);
			$arr1[$a] = strtolower($file[$i]);
			$a++;
		}
	}
	

	$a = 0;
	for ($i=0; $i < count($arr); $i++) { 
		while($ptr < $len) {
			$temp = $corrispondenza;
			$counter++;
			$letter = $word[$ptr];

			$point = 0;
			for ($k=0; $k < $len; $k++) { 
				if($arr[$i][$k] == $letter) {
					$corrispondenza++;

					if($point == 0) {
						$arr[$i][$k] = ".";
						$point++;
					}
				}
			}


			if(($corrispondenza - $temp) > 1) {
				$corrispondenza = $temp + 1;
			}
			$ptr++;
		}

		//echo "....".$corrispondenza."....";
		if($corrispondenza == $len) {
			$final[$a] = $arr1[$i];
			$a++;
		}


		$corrispondenza = 0;
		$ptr = 0;
		$temp = 0;
	}

	if(isset($final)) {
		for ($i=0; $i < count($final); $i++) { 
			echo $final[$i]."<br>";
		}
	}
?>
