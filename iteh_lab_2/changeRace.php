<?php
    include('connect.php');

    $id_cars = $_POST['carName'];
    $newRace = $_POST['newRace'];

    $sth = $dbh->prepare("UPDATE cars SET cars.race = :newRace WHERE id_cars = :id_cars");
    $sth->bindValue(':newRace', $newRace, PDO::PARAM_INT);
    $sth->bindValue(':id_cars', $id_cars, PDO::PARAM_INT); 
    $sth->execute();

?>