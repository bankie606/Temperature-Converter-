<?php

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

function convert($degree, $convertFrom, $convertTo) {
	if ($convertFrom == 'fahrenheit' && $convertTo == 'celsius') {
		$result = ($degree - 32) * (5 / 9);
	} else if ($convertFrom == "fahrenheit" && $convertTo == "kelvin") {
		$result = ($degree - 32) * (5 / 9) + 273.15;
	}	else if ($convertFrom == "fahrenheit" && $convertTo == "fahrenheit") {
		$result = $degree;
	} else if ($convertFrom == 'celsius' && $convertTo == 'fahrenheit') {
		$result = ($degree * 9 / 5) + 32;
	} else if ($convertFrom == "celsius" && $convertTo == "kelvin") {
		$result = $degree + 273.15;
	}	else if ($convertFrom == 'kelvin' && $convertTo == 'fahrenheit') {
		$result = ($degree - 273.15) * 9/5 + 32;
	} else if ($convertFrom == "kelvin" && $convertTo == "celsius") {
		$result = $degree - 273.15;
	} else if ($convertFrom == "celsius" && $convertTo == "celsius") {
		$result = $degree;
	}
	return $result;
}

	if (isset($_POST['convert'])) {
		$degree = $_POST['value'];
		$convertFrom = $_POST['convertFrom'];
		$convertTo = $_POST['convertTo'];
		$conversion = convert($degree, $convertFrom, $convertTo);
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Temperature Converter</title>
	</head>
	<body>
		<form name="convert" method="post" action="<?=THIS_PAGE?>">
			<p>Convert from<br />
			<input type="radio" name="convertFrom" value="celsius">Celsius
			<input type="radio" name="convertFrom" value="fahrenheit">Fahrenheit
			<input type="radio" name="convertFrom" value="kelvin">Kelvin
			</p>

			<p>Convert to<br />
			<input type="radio" name="convertTo" value="celsius">Celsius
			<input type="radio" name="convertTo" value="fahrenheit">Fahrenheit
			<input type="radio" name="convertTo" value="kelvin">Kelvin
			</p>

			<p>Value to convert<br />
			<input type="number" name="value">
			</p>

			<input type="submit" name="convert" value="Convert">
			<input type="reset" name="reset" value="Clear">
		</form>
		<?php echo "$degree $convertFrom = $conversion $convertTo"; ?>
	</body>
</html>
<?php

?>
