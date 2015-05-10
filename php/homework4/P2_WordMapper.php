<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Word Mapper</title>
    <style>
        textarea {
            width: 250px;
            height: 200px;
            margin-bottom: 5px;
        }
        table,td {
            border: solid 1px black;
        }

    </style>

</head>

<body>
<form action="">
    <textarea name="text" >The quick brows fox.!!! jumped over..// the lazy dog.!</textarea>
    <br />
    <input type="submit" value="Count words" />
</form>

<?php
    if (isset($_GET["text"]) && $_GET["text"] != ""){
        $text = strtolower($_GET["text"]);
        $wordsArr = preg_split("/\W+/",$text,-1,PREG_SPLIT_NO_EMPTY);
        $wordsCount = [];

        foreach ($wordsArr as $word){
            if (isset($wordsCount[$word])){
                $wordsCount[$word]++;
            }else {
                $wordsCount[$word] = 1;
            }
        }
        echo "<table><tbody>";
        foreach ($wordsCount as $word => $count){
            $word = htmlentities($word);
            echo "<tr><td>{$word}</td><td>{$count}</td></tr>";
        }
        echo "</tbody></table>";
    }
?>
</body>
</html>