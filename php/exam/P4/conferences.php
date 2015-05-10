<?php
 preg_match_all('/\[(.*)\]/',($_GET['conferences']),$conferences);
$page = $_GET['page'];
$pageSize = $_GET['pageSize'];
$result = [];

date_default_timezone_set('Europe/Sofia');
foreach ($conferences[1] as $conf) {
    $lineData = explode(', ', $conf);
    if (count($lineData) != 6) continue;
    $date = $lineData[0];
    $hashTag = $lineData[1];
    $eventName = trim($lineData[2]);
    $eventLocation = $lineData[3];
    if (!is_numeric($lineData[4])) continue;
    if (!is_numeric($lineData[5])) continue;
    $tickets = intval($lineData[4] - $lineData[5]);
    //data check
    $temp = preg_split('/\//', $date);
    if (count($temp) < 3) $temp = preg_split('/\-/', $date);
    if (count($temp) != 3) continue;
    if (strlen($temp[0]) != 4 || strlen($temp[1]) != 2 || strlen($temp[2]) != 2) continue;
    //hashTag Check
    if ($hashTag == "" || $hashTag[0] != '#') continue;
    $temp = preg_replace('/[A-Za-z\.\-\#]/', "", $hashTag);
    if (strlen($temp) > 0) continue;
    //check event name
    if ($eventName[0] != "'" || $eventName[strlen($eventName) - 1] != "'") continue;
    //check event location
    $temp = preg_replace('/[A-Za-z\,\-\#]/', "", $eventLocation);
    if (strlen($temp) > 0) continue;

    $currentDate = date_create('2015-05-03');
    $date = date_create($date);
    $dayLeft =  date_diff($currentDate,$date)->days;
    if ($date < $currentDate) $dayLeft = '-' . $dayLeft; else  $dayLeft = '+' . $dayLeft;
    $dayLeft .= ' days';
    $result[] = [
        'date' => $date,
        'hashtag' => $hashTag,
        'name' => $eventName,
        'location' => $eventLocation,
        'tickets' => $tickets,
        'daysLeft' => $dayLeft
    ];
}
//dump_debug($result);

usort($result,function($a,$b){
    if ($a['date'] == $b['date']){
        if ($a['location'] == $b['location']){
            if ($a['tickets'] == $b['tickets']){
                return strcmp($a['name'],$b['name']);
            } else return ($a['tickets'] < $b['tickets'])?1:-1;
        } else return strcmp($a['location'],$b['location']);
    } else return ($a['date'] < $b['date'])?1:-1;
});
$startPage = ($page-1)*$pageSize;
$endPage = ($startPage + $pageSize);

$newResult = [];

for ($i = $startPage; $i < $endPage; $i++){
    if (isset($result[$i])){
        $newResult[] = [
            'date' => date_format($result[$i]['date'],'Y-m-d'),
            'name' =>  htmlentities(substr($result[$i]['name'],1,strlen($result[$i]['name'])-2)),
            'hash' => $result[$i]['hashtag'],
            'days' => $result[$i]['daysLeft'],
            'seats' => $result[$i]['tickets'].' seats left'
        ];
    }
}

if (empty($newResult)) {
    printEmptyTable();
}else {
    echo '<table border="1" cellpadding="5">';
    echo '<tr><th>Date</th><th>Event name</th><th>Event hash</th><th>Days left</th><th>Seats left</th></tr>';
    $d = $newResult[0];
    $i = 0;
    $out = [];
    $out[] = $d;
    $flag = false;
    do {

        $out = [];
        if (isset($newResult[$i])){
            $d = $newResult[$i];
            $out[] = $d;
            $i++;
        } else {
            break;
        }

        while (isset($newResult[$i]) && $newResult[$i]['date'] == $d['date']) {
            $d = $newResult[$i];
            $out[] = $d;
            $i++;
        }
        printRows($out);

    } while ($i < count($newResult));


    echo '</table>';
}
function printRows ($m){

    if (isset($m)) {
        if (count($m) == 1) {
            foreach ($m as $row) {
                echo "<tr><td>" . $row['date'] . "</td><td>" . $row['name'] . "</td><td>" . $row['hash'] .
                    "</td><td>" . $row['days'] . "</td><td>" . $row['seats'] . "</td></tr>";
            }
        } else {
            $row = $m[0];
            echo '<tr><td rowspan="'.count($m) .'">' . $row['date'] . "</td><td>" . $row['name'] . "</td><td>" . $row['hash'] .
                "</td><td>" . $row['days'] . "</td><td>" . $row['seats'] . "</td></tr>";
            for ($i = 1; $i < count($m); $i++){
                $row = $m[$i];
                echo "<tr><td>" . $row['name'] . "</td><td>" . $row['hash'] .
                    "</td><td>" . $row['days'] . "</td><td>" . $row['seats'] . "</td></tr>";

            }
        }
    }
}

function printEmptyTable (){
    echo '<table border="1" cellpadding="5">';
    echo '<tr><th>Date</th><th>Event name</th><th>Event hash</th><th>Days left</th><th>Seats left</th></tr>';
    echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
    echo '</table>';
}



//dump_debug($result);



//================================================================================================================

function dump_debug($input, $collapse=false) {
    $recursive = function($data, $level=0) use (&$recursive, $collapse) {
        global $argv;

        $isTerminal = isset($argv);

        if (!$isTerminal && $level == 0 && !defined("DUMP_DEBUG_SCRIPT")) {
            define("DUMP_DEBUG_SCRIPT", true);

            echo '<script language="Javascript">function toggleDisplay(id) {';
            echo 'var state = document.getElementById("container"+id).style.display;';
            echo 'document.getElementById("container"+id).style.display = state == "inline" ? "none" : "inline";';
            echo 'document.getElementById("plus"+id).style.display = state == "inline" ? "inline" : "none";';
            echo '}</script>'."\n";
        }

        $type = !is_string($data) && is_callable($data) ? "Callable" : ucfirst(gettype($data));
        $type_data = null;
        $type_color = null;
        $type_length = null;

        switch ($type) {
            case "String":
                $type_color = "green";
                $type_length = strlen($data);
                $type_data = "\"" . htmlentities($data) . "\""; break;

            case "Double":
            case "Float":
                $type = "Float";
                $type_color = "#0099c5";
                $type_length = strlen($data);
                $type_data = htmlentities($data); break;

            case "Integer":
                $type_color = "red";
                $type_length = strlen($data);
                $type_data = htmlentities($data); break;

            case "Boolean":
                $type_color = "#92008d";
                $type_length = strlen($data);
                $type_data = $data ? "TRUE" : "FALSE"; break;

            case "NULL":
                $type_length = 0; break;

            case "Array":
                $type_length = count($data);
        }

        if (in_array($type, array("Object", "Array"))) {
            $notEmpty = false;

            foreach($data as $key => $value) {
                if (!$notEmpty) {
                    $notEmpty = true;

                    if ($isTerminal) {
                        echo $type . ($type_length !== null ? "(" . $type_length . ")" : "")."\n";

                    } else {
                        $id = substr(md5(rand().":".$key.":".$level), 0, 8);

                        echo "<a href=\"javascript:toggleDisplay('". $id ."');\" style=\"text-decoration:none\">";
                        echo "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>";
                        echo "</a>";
                        echo "<span id=\"plus". $id ."\" style=\"display: " . ($collapse ? "inline" : "none") . ";\">&nbsp;&#10549;</span>";
                        echo "<div id=\"container". $id ."\" style=\"display: " . ($collapse ? "" : "inline") . ";\">";
                        echo "<br />";
                    }

                    for ($i=0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    echo $isTerminal ? "\n" : "<br />";
                }

                for ($i=0; $i <= $level; $i++) {
                    echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }

                echo $isTerminal ? "[" . $key . "] => " : "<span style='color:black'>[" . $key . "]&nbsp;=>&nbsp;</span>";

                call_user_func($recursive, $value, $level+1);
            }

            if ($notEmpty) {
                for ($i=0; $i <= $level; $i++) {
                    echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }

                if (!$isTerminal) {
                    echo "</div>";
                }

            } else {
                echo $isTerminal ?
                    $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                    "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";
            }

        } else {
            echo $isTerminal ?
                $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " :
                "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";

            if ($type_data != null) {
                echo $isTerminal ? $type_data : "<span style='color:" . $type_color . "'>" . $type_data . "</span>";
            }
        }

        echo $isTerminal ? "\n" : "<br />";
    };

    call_user_func($recursive, $input);
}