<!DOCTYPE html>
<html>
<head>
    <title>Sum of digits</title>
    <style>
        table, th, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
<form action="">
    <label for="text-input">Enter numbers</label>
    <input type="text" name="input" id="text-input"/>
    <input type="submit" value="Make Table"/>
</form>

<?php
    if (isset($_GET["input"]) && $_GET["input"] != ""){
        $numbers = preg_split("/[\s,]+/",$_GET["input"],-1,PREG_SPLIT_NO_EMPTY);
        echo "<table>";
        echo "<thead><tr><th>Number</th><th>Sum of digits</th></tr></tr></thead>";
        foreach ($numbers as $number){
            $sum = "";
            if (ctype_digit($number)){
                $number .= '';
                for ($i=0; $i<strlen($number); $i++){
                    $sum += $number[$i];
                }

            } else {
                $sum = "I cannot sum that";
            }
            $number = htmlentities($number);
            echo "<tr><td>{$number}</td><td>{$sum}</td></tr>";
        }
        echo "</table>";
    }
?>

</body>
</html>