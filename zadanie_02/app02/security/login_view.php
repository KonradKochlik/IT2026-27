<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
</head>
<body>

<div style="margin: 20px;">

<form action="<?php print(_APP_URL); ?>/app02/security/login.php" method="post">
	<h3>Logowanie</h3>
	<label for="id_login">login: </label>
	<input id="id_login" type="text" name="login" value="<?php echo isset($form['login']) ? htmlspecialchars($form['login']) : ''; ?>" /><br />
	<label for="id_pass">hasło: </label>
	<input id="id_pass" type="password" name="pass" /><br />
	<input type="submit" value="Zaloguj" />
</form>

<?php

if (isset($messages)) {
	if (count($messages) > 0) {
		echo '<ol style="margin-top: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ($messages as $key => $msg) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

</div>

</body>
</html>
