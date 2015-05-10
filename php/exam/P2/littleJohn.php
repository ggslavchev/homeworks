<?php

$in1 = $_GET['arrows'];
$in2 = $_GET['arrows1'];
$in3 = $_GET['arrows2'];
$in4 = $_GET['arrows3'];

$in1 = countLarge($in1); $in1 = countMedium($in1); $in1 = countSmall($in1);
$in2 = countLarge($in2); $in2 = countMedium($in2); $in2 = countSmall($in2);
$in3 = countLarge($in3); $in3 = countMedium($in3); $in3 = countSmall($in3);
$in4 = countLarge($in4); $in4 = countMedium($in4); $in4 = countSmall($in4);


$binCount = decbin(intval( $small . $medium . $large));
$out = bindec($binCount . strrev($binCount));
echo $out;



function countSmall ($str){
    global $small;
    $small += preg_match_all('/[^>]*>\-{5}>[^>]*/',$str);
}
function countMedium ($str){
    global $medium;
    $medium += preg_match_all('/[^>]*>>\-{5}>[^>]*/',$str);
    return preg_replace('/[^>]*>>\-{5}>[^>]*/',"",$str);
}
function countLarge ($str) {
    global $large;
    $large += preg_match_all('/[^>]*>>>\-{5}>>[^>]*/',$str);
    return preg_replace('/[^>]*>>>\-{5}>>[^>]*/',"",$str);
}