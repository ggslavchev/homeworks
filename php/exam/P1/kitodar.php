<?php
$data = explode(',',$_GET['data']);
$gold = 0;
$silver = 0;
$diamonds = 0;

foreach ($data as $line){
    $line = strtolower(trim($line));
    $lineData = preg_split('/\s+/',$line,-1,PREG_SPLIT_NO_EMPTY);
    if ($lineData[0] == 'mine' && isset($lineData[1]) && isset($lineData[2]) && isset($lineData[3])){
        if ($lineData[2] == 'gold') {$gold += $lineData[3];}
        if ($lineData[2] == 'silver') {$silver += $lineData[3];}
        if ($lineData[2] == 'diamonds') {$diamonds+= $lineData[3];}
    }
}
echo "<p>*Gold: $gold</p>";
echo "<p>*Silver: $silver</p>";
echo "<p>*Diamonds: $diamonds</p>";
