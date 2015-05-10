<?php

function dumpVar ($var){
    if (is_numeric($var)){
        var_dump($var);
        echo("<br>");
    }
    else {
        echo(gettype($var));
        echo("<br>");
    }
}

dumpVar("hello");
dumpVar(15);
dumpVar(1.234);
dumpVar([1,2,3]);
dumpVar((object)[2,34]);