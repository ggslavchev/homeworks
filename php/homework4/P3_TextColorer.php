<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Text Colorer</title>
    <style>
        textarea {
            width: 250px;
            height: 200px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<form action="">
    <textarea name="text">What a wonderful world!</textarea>
    <br />
    <input type="submit" value="Color text" />
</form>
<?php
    if (isset($_GET["text"]) && $_GET["text"] != "" ){
        $text = $_GET["text"];
        for ($i=0; $i<strlen($text); $i++){
            $char = ord($text[$i]);
            if ($char % 2 == 0){
                $color = "red";
            } else {
                $color = "blue";
            }
            echo "<span style='color: {$color};'>{$text[$i]} </span>";
        }
    }
?>

</body>
</html>