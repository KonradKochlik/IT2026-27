<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator trasy</title>
</head>
<body>

<div style="margin: 20px;">
	Zalogowany jako: <b><?php echo htmlspecialchars($role); ?></b>
	| <a href="<?php print(_APP_URL); ?>/app02/security/logout.php">Wyloguj</a>
</div>

<form action="<?php print(_APP_URL); ?>/app02/route_calc.php" method="post">
	<label for="id_paliwo">Ilość paliwa (litry): </label>
	<input id="id_paliwo" type="text" name="paliwo" value="<?php echo isset($form['paliwo']) ? htmlspecialchars($form['paliwo']) : ''; ?>" /><br />
	<label for="id_spalanie">Średnie spalanie paliwa (l/100km): </label>
	<input id="id_spalanie" type="text" name="spalanie" value="<?php echo isset($form['spalanie']) ? htmlspecialchars($form['spalanie']) : ''; ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>

<?php
if (isset($messages)) {
	if (count($messages) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ($messages as $key => $msg) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($dystans)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
Dystans (km): <?php echo $dystans; ?>
</div>
<?php } ?>

</body>
</html>
