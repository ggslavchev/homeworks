<?php
    $year = date('Y');
    $month = date('n');
    $daysInMonth = date('t');

    for ($i = 1; $i<=$daysInMonth; $i++){
        $iTime = mktime(0,0,0,$month,$i,$year);
        if (date('w',$iTime) == 0){
            echo date('jS F, Y',$iTime), '<br>';
        }
    }
