<!DOCTYPE html>
<html>
<head>
	<title>Giulio's Script</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" media="mediatype and|not|only (media feature)" href="mystylesheet.css">
</head>
<body>
	<a href="index.php"><h1>Giulio's Script</h1></a>
	<form action="" method="POST">
 		<input type="text" name="text" placeholder="Insert Here" required=""><br>
 		<input type="submit" name="submit" value="Invio" id="submit">
	</form>

	<div class="loader_container">
		<div class="loader"></div>
	</div>

</body>
</html>

<?php
	if(isset($_POST['text'])) {

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
				echo "<div id=\"result\"><p>$final[$i]</p></div>";
			}
		}
	}
?>

