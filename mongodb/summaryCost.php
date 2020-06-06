<?php
    header('Content-Type: application/json');
   
    include('connect.php');

    
	
    $date = new MongoDB\BSON\UTCDateTime(strtotime($_REQUEST['date']) * 1000);
	$cursor = $rent_collection->find(['end_date' => ['$lt' => $date]]);
	$data = 0;
	foreach($cursor as $row)
	{
		$data += $row["rent_price"];
	}
	
	echo json_encode($data);
  
	
    

?>