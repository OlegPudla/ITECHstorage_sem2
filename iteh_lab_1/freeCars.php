<?php
    include('connect.php');

    $date = $_POST['date'];
	
   
	
    $sth = $dbh->prepare("SELECT name FROM cars where ID_Cars not in (SELECT FID_Car from rent Where :date between Date_start and Date_end)");
    $sth->bindValue(':date', $date, PDO::PARAM_INT);
	

    $sth->execute();
    
    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    $lenght = count($result);

    echo "<table border='1'>";
    echo "<tr><th>Свободные Автомобили</th></tr>";
    
    for ($i = 0; $i < $lenght; $i++) {
       echo "<tr><td>";
       print_r ($result[$i][0]);
       echo "</td></tr>";
    }
    
    echo "</table>";

?>