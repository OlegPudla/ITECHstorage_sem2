<?php
    include('connect.php');

    $date = $_POST['date1'];
  

    $sth = $dbh->prepare("Select sum(cost) from rent where date_end < :date");
    $sth->bindValue(':date', $date, PDO::PARAM_STR);
    
    $sth->execute();
	
	$result = $sth->fetchAll(PDO::FETCH_NUM);
	   echo "<table border='1'>";
    echo "<tr><th>Сумма аренды</th></tr>";
     echo "<tr><td>";
    print_r ($result[0][0]);
    echo "</tr></td>";
     echo "</table>";

?>