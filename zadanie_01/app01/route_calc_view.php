<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator trasy</title>
</head>
<body>
    <form action="<?php print(_APP_URL);?>/app01/route_calc.php" method="post">
	<label for="id_x">Ilość paliwa (litry): </label>
	<input id="id_x" type="text" name="x" value="<?php print($x); ?>" /><br />
	<label for="id_y">Średnie spalanie paliwa (l/100km): </label>
	<input id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	
<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($dystans)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$dystans; ?>
</div>
<?php } ?>
</body>
</html>
