<form>
    <input type="text"  value="Pesho, homework, homework, exam, course, PHP" name="text"/>
    <input type="submit" value="Submit" name="submit"/>
</form>
<?php

    if (isset ($_GET['submit'])) {
        $text = $_GET["text"];
        $textArray = [];
        $textArray = preg_split("/, /",$text,-1,PREG_SPLIT_NO_EMPTY);
        for ($i = 0; $i < count($textArray); $i++){
            echo $i.' : '.$textArray[$i]."<br>";
        }
    }
