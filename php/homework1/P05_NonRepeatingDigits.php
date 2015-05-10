<?php

function printNonRepeatingDigit($n){
    $i = 0;
    $noResult = true;
    $upLimit = $n < 1000 ? $n : 999;
    if ($n < 100) {
        echo "no", "<br>";
    } else {
        for ($i = 100; $i <= $upLimit; $i++) {
            $d1 = $i % 10;
            $d2 = ($i / 10) % 10;
            $d3 = ($i / 100) % 10;
            if (($d1 != $d2) && ($d1 != $d3) && ($d2 != $d3)){
                if ($i != 102) {
                    echo ', ';
                }
                echo $i;
                $noResult = false;
            }
        }
        if ($noResult) {
            echo "no";
        }
        echo "<br>";

    }
}

printNonRepeatingDigit(1234);
printNonRepeatingDigit(145);
printNonRepeatingDigit(15);
printNonRepeatingDigit(247);