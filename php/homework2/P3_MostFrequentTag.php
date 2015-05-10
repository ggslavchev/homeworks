
<form>
    <input type="text"  value="Pesho, homework, homework, exam, course, PHP" name="text"/>
    <input type="submit" value="Submit" name="submit"/>
</form>
<?php

    if (isset ($_GET['submit'])) {
        $text = $_GET["text"];
        $textArray = [];
        $textArray = preg_split("/, /",$text,-1,PREG_SPLIT_NO_EMPTY);
        $tagsArray = [];
        for ($i = 0; $i < count($textArray); $i++){
            if (!isset($tagsArray[$textArray[$i]])){
                $tagsArray[$textArray[$i]] = 0;
            }
            $tagsArray[$textArray[$i]]++;
        }

        function cmp($a, $b)
        {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? 1 : -1;
        }

        uasort($tagsArray,"cmp");

        foreach ($tagsArray as $key => $value) {
            echo "$key : $value times <br>";
        }

        reset($tagsArray);
        $mostFreq = key($tagsArray);
        echo "Most Frequent Tag is: $mostFreq";
    }
