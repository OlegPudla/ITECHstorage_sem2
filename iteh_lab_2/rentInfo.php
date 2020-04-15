<?php
    include('connect.php');


	$carId = $_POST['carName'];
	$dateStart = $_POST['startDate'];
	$dateEnd = $_POST['endDate'];
	$timeStart =$_POST['startTime'];
	$timeEnd = $_POST['endTime'];
	$cost = $_POST['cost'];
	
	
	try
	{
		if($dateStart > $dateEnd)
		{
			throw new exception('Incorrect params');
		}
		else if($dateStart == $dateEnd and $timeStart >= $timeEnd)
		{
			throw new exception('Incorrect params');
		}
	}
	catch(PDOexception $e)
	{
		 print "Error!: something wrong with second task" . $e->GetMessage() . "<br/>";
         die();
	}
	
    $sth = $dbh->prepare("INSERT into rent (FID_car, Date_start, Time_start, Date_end, Time_end, cost) VALUES (:car_id, :startDate, :startTime, :endDate,
	:endTime, :cost)");
    $sth->bindValue(':car_id', $carId, PDO::PARAM_INT);
	$sth->bindValue(':startDate', $dateStart, PDO::PARAM_STR);
	$sth->bindValue(':startTime', $timeStart, PDO::PARAM_STR);
	$sth->bindValue(':endDate', $dateEnd, PDO::PARAM_STR);
	$sth->bindValue(':endTime', $timeEnd, PDO::PARAM_STR);
	$sth->bindValue(':cost', $cost, PDO::PARAM_INT);
    $sth->execute();
	


?>