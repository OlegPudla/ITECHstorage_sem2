<?php 
	require_once __DIR__ . "/vendor/autoload.php";
	$rent_collection = (new MongoDB\Client)->car_rent_db->rent;
	$cars_collection = (new MongoDB\Client)->car_rent_db->available_cars;
?>