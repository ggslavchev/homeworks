<!DOCTYPE html>
<html>
<head>
    <title>Primes in range</title>
</head>
<body>
<form action="">
    <label for="start-id">Enter Start Number</label>
    <input type="text" name="start" id="start-id"/>
    <br/>
    <label for="end-id">Enter End Number</label>
    <input type="text" name="end" id="end-id"/>
    <br/>
    <input type="submit"/>
    <br/>
    <?php
        if (isset($_GET["start"]) && isset($_GET["end"])){
            $start = $_GET["start"];
            $end = $_GET["end"];
            for ($i= $start; $i<=$end; $i++){
                if ($i > $start) {
                    printNumber(",".$i,isPrime($i));
                } else {
                    printNumber($i,isPrime($i));
                }

            }

        }

        function isPrime ($n){
            if ($n < 2) {
                return false;
            }
            for ($j = 2; $j < (int)sqrt($n)+1; $j++){
                if ($n % $j == 0) {
                    return false;
                }
            }
            return true;
        }

        function printNumber($text, $bold){
            if ($bold){
                echo "<span><strong>{$text}</strong></span>";
            } else {
                echo "<span>{$text}</span>";
            }
        }
    ?>


</form>
</body>
</html>