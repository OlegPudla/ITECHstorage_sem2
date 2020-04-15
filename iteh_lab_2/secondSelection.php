<?php
	header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");
    include('connect.php');

    $id_vendors = $_REQUEST['vendorsName'];
    
    $sth = $dbh->prepare("SELECT cars.name FROM cars WHERE fid_vendors = :id_vendors");
    $sth->bindValue(':id_vendors', $id_vendors, PDO::PARAM_INT);
    $sth->execute();
    
    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    $lenght = count($result);

	echo '<?xml version="1.0" encoding="utf-8" ?>';
    echo "<root>";
	
    for ($i = 0; $i < $lenght; $i++) {
	   $temp_res  = $result[$i][0];
       print_r ("<row><CarName>$temp_res</CarName></row>");
    }
    echo "</root>";


?>