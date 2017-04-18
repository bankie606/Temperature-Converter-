<?php

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

function convert($degree, $convertFrom, $convertTo) {
	if ($convertFrom == 'Fahrenheit' && $convertTo == 'Celsius') {
		$result = ($degree - 32) * (5 / 9);
	} else if ($convertFrom == "Fahrenheit" && $convertTo == "Kelvin") {
		$result = ($degree - 32) * (5 / 9) + 273.15;
	}	else if ($convertFrom == "Fahrenheit" && $convertTo == "Fahrenheit") {
		$result = $degree;
	} else if ($convertFrom == 'Celsius' && $convertTo == 'Fahrenheit') {
		$result = ($degree * 9 / 5) + 32;
	} else if ($convertFrom == "Celsius" && $convertTo == "Kelvin") {
		$result = $degree + 273.15;
	}	else if ($convertFrom == 'Kelvin' && $convertTo == 'Fahrenheit') {
		$result = ($degree - 273.15) * 9/5 + 32;
	} else if ($convertFrom == "Kelvin" && $convertTo == "Celsius") {
		$result = $degree - 273.15;
	} else if ($convertFrom == "Celsius" && $convertTo == "Celsius") {
		$result = $degree;
	}
	return round($result, 2);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Temperature Conversion</title>
		
 		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
 		<style>
			body {
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
			}

			#container {
				margin: 0 auto;
				max-width: 960px;
				padding: 0 20px;
			}

			fieldset {
				border: 0;
				margin: 0;
			}

			legend {
				font-size: 18px;
				font-weight: 400;
			}
		</style>
 	</head>
	<body>
		<div id="container">
			<div id="converter">
				<h1>Temperature Conversion</h1>
				<form name="convert" method="post" action="<?=THIS_PAGE?>">
					<fieldset>
						<legend>Value to convert</legend>
						<input type="number" name="value">
					</fieldset>
					<fieldset>
						<legend>Convert from</legend>
						<input type="radio" id="from-c" name="convertFrom" value="Celsius">
						<label for="from-c">Celsius</label>
						<input type="radio" id="from-f" name="convertFrom" value="Fahrenheit">
						<label for="from-f">Fahrenheit</label>
						<input type="radio" id="from-k" name="convertFrom" value="Kelvin">
						<label for="from-k">Kelvin</label>
					</fieldset>
					<fieldset>
						<legend>Convert to</legend>
						<input type="radio" id="to-c" name="convertTo" value="Celsius">
						<label for="to-c">Celsius</label>
						<input type="radio" id="to-f" name="convertTo" value="Fahrenheit">
						<label for="to-f">Fahrenheit</label>
						<input type="radio" id="to-k" name="convertTo" value="Kelvin">
						<label for="to-k">Kelvin</label>
					</fieldset>
					
					<br />
					<input type="submit" name="convert" value="Convert">
					<input type="reset" name="reset" value="Clear">
				</form>
	
<?php
				if (isset($_POST['convert']) && isset($_POST['convertFrom']) && isset($_POST['convertTo']) && is_numeric($_POST['value'])) {
					$degree = $_POST['value'];
					$convertFrom = $_POST['convertFrom'];
					$convertTo = $_POST['convertTo'];
					$conversion = convert($degree, $convertFrom, $convertTo);
					
					if ($convertFrom == 'Kelvin' && $convertTo != 'Kelvin') {
						echo "
						<h2>$degree $convertFrom is $conversion degree $convertTo</h2>
						";
					} else if ($convertFrom != 'Kelvin' && $convertTo == 'Kelvin') {
						echo "
						<h2>$degree degree $convertFrom is $conversion $convertTo</h2>
						";
					} else {
						echo "
							<h2>$degree degree $convertFrom is $conversion degree $convertTo</h2>
						";
					}
				} 
?>
			</div>
		</div>
	</body>
</html>