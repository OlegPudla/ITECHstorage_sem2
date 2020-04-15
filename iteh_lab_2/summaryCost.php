<?php
    include('connect.php');

    $date = $_REQUEST['date1'];
  
	
    $sth = $dbh->prepare("Select sum(cost) from rent where date_end < :date");
    $sth->bindValue(':date', $date, PDO::PARAM_STR);
    
    $sth->execute();
	
	$result = $sth->fetchAll(PDO::FETCH_NUM);
	$sum = $result[0][0];
    print_r ("<tr><td>$sum</td></tr>");
    

?>