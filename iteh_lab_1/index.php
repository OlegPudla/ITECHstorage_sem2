 <?php
    include('connect.php');
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Изучение расширения PDO</title>
</head>

<body>

<h5>Доход на выбранную дату</h5>
<form action="summaryCost.php" method="POST">

  
    
    Дата: <input type="date" name="date1">
	

	<br/><input value="Get" type="submit"/>

</form>




<h5>Автомобили выбранного производителя</h5>
<form action="secondSelection.php" method="POST">
    <select name="vendorsName">
        <?php
            try
            {
                $sql = 'SELECT ID_Vendors, Name FROM vendors';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[1];
                    $id_vendors = $row[0];
                    print "<option value = '$id_vendors'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with second task" . $e->GetMessage() . "<br/>";
                die();
            }
        ?>
        </select>
        <br/><input value="Get" type="submit"/>
</form>




<h5>Изменения данных о пробеге для выбранного автомобиля</h5>
<form action="changeRace.php" method="POST">
    <select name="carName">
        <?php
            try
            {
                $sql = 'SELECT id_cars, name FROM cars';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[1];
                    $id_cars = $row[0];
                    print "<option value = '$id_cars'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with nurse_ward" . $e->GetMessage() . "<br/>";
                die();
            }
        ?>
    </select>
    <input type="number" name="newRace" placeholder="Новый пробег">

        <br/><input value="Get" type="submit"/>

</form>

<h5>Свободные автомобили на выбранную дату</h5>
<form action="freeCars.php" method="POST">
    
    Дата: <input type="date" name="date">
	

	<br/><input value="Get" type="submit"/>

</form>


<h5>Ввод информации об аренде автомобиля</h5>
<form action="rentInfo.php" method="POST">
    <select name="carName">
        <?php
            try
            {
                $sql = 'SELECT ID_Cars, Name FROM cars';
                foreach ($dbh->query($sql) as $row)
                {
					$id_car = $row[0];
                    $name = $row[1];
                    print "<option value = '$id_car'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with second task" . $e->GetMessage() . "<br/>";
                die();
            }
        ?>
	</select>	
		<br/>Дата начала:<input type = "date" name = "startDate">
		<br/>Дата конца:<input type = "date" name = "endDate">
		<br/>Время начала:<input type = "time" name = "startTime">
		<br/>Время кконца:<input type = "time" name = "endTime">
		<br/>Цена аренды: <input type = "number" name = "cost">
		<br/><input value="Get" type="submit"/>
</form>

</html>