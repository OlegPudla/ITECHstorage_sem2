 <?php
    include('connect.php');
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Изучение расширения PDO</title>
	<script>
    
        const ajax = new XMLHttpRequest();
        const xhr = new XMLHttpRequest();
        const json = new XMLHttpRequest();

        function getFirst() {
            let date1 = document.getElementById("date1").value;
            ajax.open("GET", "summaryCost.php?date1=" + date1);
            ajax.onreadystatechange = update1;
            ajax.send(); 
        }

        function getSecond() {
            let vendorsName = document.getElementById("vendorsName").value;
            xhr.open("GET", "secondSelection.php?vendorsName=" + vendorsName);
            xhr.onreadystatechange = update2;
            xhr.send();
        }

        function getThird() {
            let date = document.getElementById("date2").value;
            json.open("GET", "freeCars.php?date=" + date);
            json.onreadystatechange = update3;
            json.send();
        }

        function update1() {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    document.getElementById("resultFirst").innerHTML = ajax.responseText;
                }
            }   
        }

        function update2() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    //console.dir(xhr.responseXML);
                    let res = document.getElementById("resultSecond");
                    let result = "";
                    let rows = xhr.responseXML.firstChild.children;
                        for (var i = 0; i < rows.length; i++){
                            result += "<tr>";
                            result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                            result += "</tr>";
                        }
                    res.innerHTML = result;
                }
            }
        }

        function update3() {
            if (json.readyState === 4) {
                if (json.status === 200) {
                
                var res = JSON.parse(json.responseText);
                let result3 = "";
                console.dir(res);
                        for (var j = 0; j < res.length; j++){
                            result3 += "<tr>";
                            result3 += "<td>" + res[j].freeCars + "</td>";
                            result3 += "</tr>";
                        }
                    document.getElementById("resultThird").innerHTML = result3;
                }
            }
        }
    
    </script>
</head>

<body>


<h5>Доход на выбранную дату</h5>

  
    
    Дата: <input type="date" name="date1" id = "date1">
	<br/><input value="Get" type="button" onclick="getFirst()">


<table border = "1">
    <thead>
        <tr>
            <th>Сумма</th>
        </tr>
    </thead>
    <tbody id="resultFirst">
    </tbody>
</table>





<h5>Автомобили выбранного производителя</h5>

    <select name="vendorsName" id = "vendorsName">
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
                print "Error!: something wrong with input data" . $e->GetMessage() . "<br/>";
                die();
            }
        ?>
        </select>
        <br/><input value="Get" type="button" onclick = "getSecond()">

<table border = "1">
    <thead>
        <tr>
            <th>Название</th>
        </tr>
    </thead>
    <tbody id="resultSecond">
    </tbody>
</table>




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
                print "Error!: something wrong with input data" . $e->GetMessage() . "<br/>";
                die();
            }
        ?>
    </select>
    <input type="number" name="newRace" placeholder="Новый пробег">

        <br/><input value="Get" type="submit"/>

</form>

<h5>Свободные автомобили на выбранную дату</h5>

    
    Дата: <input type="date" name="date2" id = "date2">
	

	<br/><input value="Get" type="button" onclick = "getThird()">



<table border = "1">
    <thead>
        <tr>
            <th>Свободные автомобили</th>
        </tr>
    </thead>
    <tbody id="resultThird">
    </tbody>
</table>


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