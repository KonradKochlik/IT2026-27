<?php

require_once dirname(__FILE__).'/../config.php';



$x = $_REQUEST['x'] ?? '';
$y = $_REQUEST['y'] ?? '';



// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($x) && isset($y))) {
	
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $x == "") {
	$messages [] = 'Nie podano wartości 1';
}
if ( $y == "") {
	$messages [] = 'Nie podano wartości 2';
}




if (empty ( $messages )) { 
    $dystans = ($x / $y) * 100 . ' kilometrów';
}
include 'route_calc_view.php';
?>