<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            if (!isset($_SESSION['scoreCounter'])){
                $_SESSION['scoreCounter'] = 0;
            }
            if (!isset($_SESSION['result'])) {
                $_SESSION['result'] = ' ';
            }
            $input = '';
         $htmlTagsArray = [
            "!--","!DOCTYPE","a","abbr","address","area","article","aside","audio",
            "b","base","bdi","bdo","blockquote","body","br","button",
            "canvas","caption","cite","code","col","colgroup",
            "datalist","dd","del","details","dfn","dialog","div","dl","dt",
            "em","embed",
             "fieldset","figcaption","figure","font","footer","form",
            "h1","h2","h3","h4","h5","h5","heat","header","hr","html",
            "i","iframe","img","input","ins",
            "kbd","keygen",
            "label","legend","li","link",
            "main","map","mark","menu","menuitem","meta","meter",
            "nav","noscript",
            "object","ol","optgroup","option",
            "p","param","pre","progress",
            "q","rp","rt","ruby",
            "s","samp","script","section","select","small","source","span","strong","style","sub","summary","sup",
            "table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track",
            "u","ul",
            "var","video",
            "wbr"
        ];

        if (isset($_GET["submit"])){
            $input = $_GET["text"];
            $input = trim($input);
            if (in_array($input, $htmlTagsArray, true)) {
                $_SESSION['result'] ='Valid HTML tag!';
                $_SESSION['scoreCounter']++;
            } else {
                $_SESSION['result'] = 'Invalid HTML tag!';
            }
            header('Location:P5_HTMLTagsCounter.php');
         }
        ?>


        <title>HTML Tags Counter</title>
        <style>
            form {
                width: 250px;
                height: 150px;
                border: 1px solid black;
                background-color: aqua;
                padding: 20px;
            }
            div {
                margin: 10px 0px 10px 0px;
            }
            label {
                font-weight: bold;
            }
            p {
                font-size: 20px;
                font-weight: bold;
                margin: 10px 0px;
                padding: 0px;
            }
        </style>
    </head>
    <body>
    <form method="get">
        <div><label for="input">Enter HTML Tags:</label></div>
        <input type="text" id="input" name="text"/>
        <input type="submit" id="input" name="submit"  value="Submit"/>
        <p>
            <?php echo $_SESSION['result']; ?>
        </p>

        <p>Score:
            <?php echo $_SESSION['scoreCounter'];  ?>
        </p>
     </form>

    </body>
</html>