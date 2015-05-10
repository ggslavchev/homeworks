<!DOCTYPE html>
<html>
<head>
    <title>Annual Expenses</title>
    <style>
        table, th, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
<form action="">
    <label for="text-input">Enter numbers of years:</label>
    <input type="text" name="years" id="text-input"/>
    <input type="submit" value="Show costs"/>
    <?php
    if (isset($_GET["years"]) && $_GET["years"] > 0){

        $years = (int)$_GET["years"];
        $currentYear = date("Y");
        echo "<table>";
        echo "<thead>";
        echo "<th>Year</th><th>January</th><th>February</th><th>March</th><th>April</th><th>May</th><th>June</th>" .
		 	 "<th>July</th><th>August</th><th>September</th><th>October</th><th>November</th><th>December</th><th>Total:</th>";
        echo "</thead>";
        for ($i=0; $i<$years; $i++){
            $year = $currentYear - $i;
            echo "<tr><td>{$year}</td>";
            $sum = 0;
            for ($j=0; $j<12; $j++){
                $cost = rand(0,999);
                $sum += $cost;
                echo "<td>{$cost}</td>";
            }
            echo "<td>{$sum}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>

</form>
</body>
</html>
