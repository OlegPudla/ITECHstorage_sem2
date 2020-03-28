<?php
    include('connect.php');

    $id_vendors = $_POST['vendorsName'];
    
    $sth = $dbh->prepare("SELECT cars.name FROM cars WHERE fid_vendors = :id_vendors");
    $sth->bindValue(':id_vendors', $id_vendors, PDO::PARAM_INT);
    $sth->execute();
    
    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    $lenght = count($result);

    echo "<table border='1'>";
    echo "<tr><th>Автомобили</th></tr>";
    
    for ($i = 0; $i < $lenght; $i++) {
       echo "<tr><td>";
       print_r ($result[$i][0]);
       echo "</td></tr>";
    }
    
    echo "</table>";

?>