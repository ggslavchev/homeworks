<!DOCTYPE html>
<html>
<head>
    <title>String Modifier</title>
</head>
<body>
    <form action="">
        <input type="text" id="input-text" name="input" value="PHP is awesome!"/>
        <input type="radio" name="option" id="check-palindrome" checked = "check" value="palindrome"/>
        <label for="check-palindrome">Check Palindrome</label>
        <input type="radio" name="option" id="reverse-string" value="reverse"/>
        <label for="reverse-string">Reverse String</label>
        <input type="radio" name="option" id="split" value="split"/>
        <label for="split">Split</label>
        <input type="radio" name="option" id="hash-string" value="hash"/>
        <label for="hash-string">Hash String</label>
        <input type="radio" name="option" id="shuffle-string" value="shuffle"/>
        <label for="shuffle-string">Shuffle String</label>
        <input type="submit"/><br/>

        <?php
            if (isset($_GET["input"]) && ($_GET["input"] != "")){
                $result = "";
                $input = $_GET["input"];
                switch ($_GET["option"]){
                    case "palindrome": {
                        if ($input == strrev($input)){
                            $result = "{$input} is a palindrome.";
                        } else{
                            $result = "{$input} is not a palindrome.";
                        }

                    } break;
                    case "reverse": {
                        $result = strrev($input);
                    } break;
                    case "split": {
                        $result = implode(' ', preg_split('/[^a-zA-z]+/',$input,-1,PREG_SPLIT_NO_EMPTY));
                    } break;
                    case "hash": {
                        $result =  crypt($input,'$2y$10$usesomesillystringforsalt$');

                    } break;
                    case "shuffle": {
                        $result =str_shuffle($input);
                    } break;

                }
                echo $result;
            }
        ?>

    </form>

</body>