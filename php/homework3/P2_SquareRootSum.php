<!DOCTYPE html>
<html>
<head>
    <title>Square Root Sum</title>
    <style>
        table, th, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr><th>Number</th><th>Square Root</th></tr>
        </thead>
        <?php
            $sum = 0;
            for ($i=0; $i<=100; $i+=2){
                $sRoot = number_format((float)sqrt($i),2,'.','');
                $sum  += $sRoot;
                echo "<tr><td>{$i}</td><td>{$sRoot}</td>";
             }
            echo "<tr><td colspan='2'>Sum = {$sum}</td> </tr>";
        ?>

    </table>
</body>
</html>


