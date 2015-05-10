<?php
if (isset($_POST['text'])) {
    if ($_POST['text'] != '') {
        $text = $_POST['text'];
        $pattern = '/<a href=[\'\"]([^<>]+)[\'\"]>([^<>]+)<\/a>/';
        preg_match_all($pattern, $text);
        $text = preg_replace($pattern, '[URL=$1]$2[/URL]', $text);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>URL Replacer</title>
    <style>
        textarea {
            width: 250px;
            height: 200px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<form method="post">
    <label for="text">Enter text:</label>
    <br />
    <textarea name="text" id="text"><p>Come and visit <a href="http://softuni.bg">the Software University</a> to master the art of programming. You can always check our <a href="www.softuni.bg/forum">forum</a> if you have any questions.</p></textarea>
    <br />
    <input type="submit" />
</form>
<?php
if (isset($text)) {
    echo $text;
}
?>
</body>
</html>