<?php
    header('Content-Type: application/json');

    include('connect.php');
    $date = $_REQUEST['date'];
	
   
	
    $sth = $dbh->prepare("SELECT name FROM cars where ID_Cars not in (SELECT FID_Car from rent Where :date between Date_start and Date_end)");
    $sth->bindValue(':date', $date, PDO::PARAM_INT);
	

    $sth->execute();
    
    $result = $sth->fetchAll(PDO::FETCH_NUM);
    $res = [];


    
    
    foreach($result as $row) {
     $freeCars = $row[0];
	 $data = array('freeCars' => $freeCars);
	 $res[] = $data;
    }
    echo json_encode($res);
	
?>