<?php
    header('Content-Type: application/json');

    include('connect.php');
	$cursor = $cars_collection->distinct('model');
	
	
	echo json_encode($cursor);
 
	
?>