<?php
require_once dirname(__FILE__).'/../config.php';


include _ROOT_PATH.'/app02/security/check.php';


function getParams(&$form){
	$form['paliwo'] = isset($_REQUEST['paliwo']) ? trim($_REQUEST['paliwo']) : null;
	$form['spalanie'] = isset($_REQUEST['spalanie']) ? trim($_REQUEST['spalanie']) : null;
}


function validate(&$form, &$messages){
	
	if ( ! (isset($form['paliwo']) && isset($form['spalanie']))) {
		return false;
	}

	
	if ($form['paliwo'] === "") {
		$messages[] = 'Nie podano ilości paliwa w litrach';
	}
	if ($form['spalanie'] === "") {
		$messages[] = 'Nie podano średniego spalania w litrach na 100 km';
	}

	if (count($messages) > 0) return false;

	
	if (! is_numeric($form['paliwo'])) {
		$messages[] = 'Ilość paliwa musi być liczbą, np. 45 lub 45.5';
	}
	if (! is_numeric($form['spalanie'])) {
		$messages[] = 'Średnie spalanie musi być liczbą, np. 6 lub 6.5';
	}

	if (count($messages) > 0) return false;

	
	if ($form['paliwo'] <= 0) {
		$messages[] = 'Ilość paliwa musi być większa od zera';
	}
	if ($form['spalanie'] <= 0) {
		$messages[] = 'Średnie spalanie musi być większe od zera';
	}

	if (count($messages) > 0) return false;
	else return true;
}


function process(&$form, &$messages, &$dystans){
	global $role;

	$form['paliwo'] = floatval($form['paliwo']);
	$form['spalanie'] = floatval($form['spalanie']);


	if ($role == 'osobowy' && $form['paliwo'] > 100) {
		$messages[] = 'Kierowca osobowy może wpisać maksymalnie 100 litrów. Większe ilości paliwa może przeliczyć tylko kierowca ciężarówki.';
		return;
	}
	if ($role == 'ciezarowy' && $form['paliwo'] > 2000) {
		$messages[] = 'Maksymalna ilość paliwa to 2000 litrów.';
		return;
	}

	
	$dystans = round(($form['paliwo'] / $form['spalanie']) * 100, 2);
}


$form = array();
$messages = array();
$dystans = null;


getParams($form);
if (validate($form, $messages)) {
	process($form, $messages, $dystans);
}


include 'route_calc_view.php';
