<!DOCTYPE html>
<html>
<head>
    <title>Car Randomizer</title>
    <style>
        table, th, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
    <form action="">
        <label for="text-input">Enter cars</label>
        <input type="text" name="cars" id="text-input"/>
        <input type="submit" value="Show Result"/>
        <?php
            if (isset($_GET["cars"]) && $_GET["cars"] != ""){
                $colors = ['red', 'green', 'blue', 'black', 'white', 'yellow'];
                $cars = preg_split('/[\s,]+/', $_GET["cars"]);
                echo "<table>";
                echo "<thead><tr><th>Car</th><th>Color</th><th>Count</th></tr></thead>";
                foreach ($cars as $car){
                    $count = rand(1,5);
                    $color = $colors[rand(0,count($colors)-1)];
                    $car = htmlentities($car);
                    echo "<tr><td>{$car}</td><td>{$color}</td><td>{$count}</td></tr>";
                }
                echo "</table>";
            }
        ?>

    </form>
</body>
</html>
