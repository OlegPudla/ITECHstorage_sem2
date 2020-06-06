<?php
    include('connect.php');
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>MongoDB</title>
	<script>
    

        const json = new XMLHttpRequest();

        function getThird() {
    
            json.open("GET", "freeCars.php");
            json.onreadystatechange = update3;
            json.send();
        }

        function getSecond() {
            let kms = document.getElementById("Km").value;
            json.open("GET", "secondSelection.php?kms=" + kms);
            json.onreadystatechange = update2;
            json.send();
        }

        function getFirst() {
            let date = document.getElementById("date").value;
            json.open("GET", "summaryCost.php?date=" + date);
            json.onreadystatechange = update1;
            json.send();
        }

        function update1() {
            if (json.readyState === 4) {
                if (json.status === 200) {
                
                var res = JSON.parse(json.responseText);
                let result1 = "";
                console.dir(res);
                        result1 += "<tr>";
                        result1 += "<td>" + res + "</td>";
                        result1 += "</tr>";
                    document.getElementById("resultFirst").innerHTML = result1;
                }
            }
        }

        function update2() {
             if (json.readyState === 4) {
                if (json.status === 200) {
                
                var res = JSON.parse(json.responseText);
                let result2 = "";
                console.dir(res);
                        for (var j = 0; j < res.length; j++){
                            result2 += "<tr>";
                            result2 += "<td>" + res[j] + "</td>";
                            result2 += "</tr>";
                        }
					localStorage.setItem("selected_cars", result2);
                    document.getElementById("resultSecond").innerHTML = localStorage.getItem('selected_cars');
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
                            result3 += "<td>" + res[j] + "</td>";
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

  
    
    Дата: <input type="date" name="date" id = "date">
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





<h5>Автомобили с пробегом ниже указанного</h5>

	<input type = "number" name = "Km" id = "Km">
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




<h5>Свободные автомобили </h5>


	<br/><input value="Get" type="button" onclick = "getThird()">



<table border = "1">
    <thead>
        <tr>
            <th>Название</th>
        </tr>
    </thead>
    <tbody id="resultThird">
    </tbody>
</table>


</html>