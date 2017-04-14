<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>Temp Conversion Calculator</title>
	</head>    
    <body>
  		<form name="tempConvert" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			<h2>Enter value to convert</h2>
			<input type="text" name="initValue" id="initValue" size="15">
			<select name="initialType" id="initialType" size="1">
				<option disabled> Select a measurement type to start off with:</option>
				<option value="celsius">Celsius</option>
				<option value="fahrenheit">Fahrenheit</option>
				<option value="kelvin">Kelvin</option>                  
			</select>
			<h3>Convert to:</h3>
			<select name="convertType" id="convertType" size="1">
				<option disabled> Select a measurement type to convert to:</option>
				<option value="celsius">Celsius</option>
				<option value="fahrenheit">Fahrenheit</option>
				<option value="kelvin">Kelvin</option>
			</select>
			<input type="submit" name="btnConvert" id="btnConvert" value="Convert">
			<input type="reset" name="btnReset" id="btnReset" value="Reset">
		</form>

<?php

	function tempConvert($valueConvert, $convertType, $initValue, $initialType) {
	   if($convertType == "fahrenheit"){
		   $conversion = ((9/5) * $initValue) + (32);
	   }
		else if ($convertType == "celsius"){
		   $conversion = ($initValue - 32) * (5/9);

	   }

		else if ($convertType == "kelvin"){
		   $conversion = ($initValue - 32) * (5/9);

	   }


	   return $conversion;
	}




	$valueConvert = $_POST['valueConvert'];
	$convertType = $_POST['convertType'];
	$conversion = tempConvert($valueConvert, $convertType);

	echo "The initial temperature was $valueConvert degrees. The new temperature is $conversion degrees.";

?>
          
	</body>
</html>