<?php
if (isset($_POST['text']) && isset($_POST['banlist'])) {
    if ($_POST['text'] != '' && $_POST['banlist']) {
        $text = $_POST['text'];
        $banlist = preg_split('/[\s,]+/', $_POST['banlist'], -1, PREG_SPLIT_NO_EMPTY);
        $filteredText = $text;
        foreach ($banlist as $banned) {
            $starsString = str_repeat('*', strlen($banned));
            $pattern = '/\b' . $banned . '\b/';
            $filteredText = preg_replace($pattern, $starsString, $filteredText);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Text Filter</title>
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
			<textarea name="text" id="text">It is not Linux, it is GNU/Linux. Linux is merely the kernel, while GNU adds the functionality. Therefore we owe it to them by calling the OS GNU/Linux!
Sincerely, a Windows client</textarea>
    <br />
    <label for="banlist">Enter banlist:</label>
    <br />
    <input type="text" name="banlist" id="banlist" value="Linux, Windows" />
    <br />
    <input type="submit" />
</form>
<p>
    <?php
    if (isset($filteredText)) {
        echo htmlentities($filteredText);
    }
    ?>
</p>
</body>
</html>
