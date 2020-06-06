<?php
	header('Content-Type: application/json');
   
    include('connect.php');

    
	
	$cond = array('Km' => array('$lt' => floatval($_REQUEST['kms'])));
	$cursor = $cars_collection->find($cond);
	
	$data = [];
	foreach($cursor as $row)
	{
		$data[] = $row["model"];
	}
	
	echo json_encode($data);
	
	


?>
