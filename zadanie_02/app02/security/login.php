<?php
require_once dirname(__FILE__).'/../../config.php';


function getParamsLogin(&$form){
	$form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
	$form['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}


function validateLogin(&$form, &$messages){
	
	if ( ! (isset($form['login']) && isset($form['pass']))) {
		return false;
	}

	
	if ($form['login'] == "") {
		$messages[] = 'Nie podano loginu';
	}
	if ($form['pass'] == "") {
		$messages[] = 'Nie podano hasła';
	}

	if (count($messages) > 0) return false;

	
	if ($form['login'] == "osobowy" && $form['pass'] == "osobowy") {
		if (session_status() == PHP_SESSION_NONE) session_start();
		$_SESSION['role'] = 'osobowy';
		return true;
	}
	if ($form['login'] == "ciezarowy" && $form['pass'] == "ciezarowy") {
		if (session_status() == PHP_SESSION_NONE) session_start();
		$_SESSION['role'] = 'ciezarowy';
		return true;
	}

	$messages[] = 'Niepoprawny login lub hasło';
	return false;
}


$form = array();
$messages = array();


getParamsLogin($form);

if (!validateLogin($form, $messages)) {
	
	include _ROOT_PATH.'/app02/security/login_view.php';
} else {
	
	header("Location: "._APP_URL);
}
