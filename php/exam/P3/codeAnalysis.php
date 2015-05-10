<?php
$code = $_GET['code'];

$out = [
    'variables' => [],
    'loops' => [
        'while' => [],
        'for' => [],
        'foreach' => []
    ],
    'conditionals' => []
];
preg_match_all('/\$[\w]+/',$code,$vars);

foreach ($vars[0] as $v){

    if (array_key_exists($v,$out['variables'])){
        $out['variables'][$v]++;
    }
    else {
        $out['variables'][$v] =1; // [$v => 1];
    }
}

preg_match_all('/while\s*?\(.*?\)\s*?\{/s',$code, $vars);
foreach ($vars[0] as $v){
    $v = trim(substr($v,0,strlen($v)-1));
    $out['loops']['while'][] = $v;
}

preg_match_all('/for\s*?\(.*?\)\s*?\{/s',$code, $vars);
foreach ($vars[0] as $v){
    $v = trim(substr($v,0,strlen($v)-1));
    $out['loops']['for'][] = $v;
}

preg_match_all('/foreach\s*?\(.*?\)\s*?\{/s',$code, $vars);
foreach ($vars[0] as $v){
    $v = trim(substr($v,0,strlen($v)-1));
    $out['loops']['foreach'][] = $v;
}
preg_match_all('/[^e]if\s*?\(.*?\)\s*?\{/s',$code, $vars);
foreach ($vars[0] as $v){
    $v = trim(substr($v,0,strlen($v)-1));
    $out['conditionals'][] = $v;
}

preg_match_all('/elseif\s*?\(.*?\)\s*?\{/s',$code, $vars);
foreach ($vars[0] as $v){
    $v = trim(substr($v,0,strlen($v)-1));
    $out['conditionals'][] = $v;
}

echo json_encode($out);




//$code = $_GET['code'];
//
//$out = [
//    'variables' => [],
//    'loops' => [
//        'while' => [],
//        'for' => [],
//        'foreach' => []
//    ],
//    'conditionals' => []
//];
//preg_match_all('/\$[\w]+/',$code,$vars);
//
//foreach ($vars[0] as $v){
//
//    if (array_key_exists($v,$out['variables'])){
//        $out['variables'][$v]++;
//    }
//    else {
//        $out['variables'][$v] =1; // [$v => 1];
//    }
//}
//
//preg_match_all('/\s+while(\s+\((?:.*?)\))\s+\{/s',$code, $vars);
////dump_debug($vars);
//foreach ($vars[0] as $v){
//    $v1 = str_replace('(',"",$v);
//    $v1 = str_replace(')',"",$v1);
//    if (strlen($v1) == 0) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['loops']['while'][] = trim($v);
//}
//
//preg_match_all('/\s+for(\s+\((?:.*?)\))\s+\{/s',$code, $vars);
//foreach ($vars[0] as $v){
//    $v1 = str_replace('(',"",$v);
//    $v1 = str_replace(')',"",$v1);
//    if (strlen($v1) == 0) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['loops']['for'][] = trim($v);
//}
//
//preg_match_all('/\s+foreach(\s+\((?:.*?)\))\s+\{/s',$code, $vars);
//foreach ($vars[0] as $v){
//    $v1 = str_replace('(',"",$v);
//    $v1 = str_replace(')',"",$v1);
//    if (strlen($v1) == 0) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['loops']['foreach'][] = trim($v);
//}
//preg_match_all('/((?:else\s*)*if\s+\((?:[\s\S]+?)\))\s+\{/s',$code, $vars);
////dump_debug($vars);
//foreach ($vars[0] as $v){
//    $v1 = str_replace('(',"",$v);
//    $v1 = str_replace(')',"",$v1);
//    if (strlen($v1) == 0) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['conditionals'][] = trim($v);
//}
//
//echo json_encode($out);





//$code = $_GET['code'];
//
//$out = [
//    'variables' => [],
//    'loops' => [
//        'while' => [],
//        'for' => [],
//        'foreach' => []
//    ],
//    'conditionals' => []
//];
//preg_match_all('/\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/',$code,$vars);
//
//foreach ($vars[0] as $v){
//
//    if (array_key_exists($v,$out['variables'])){
//        $out['variables'][$v]++;
//    }
//    else {
//        $out['variables'][$v] =1; // [$v => 1];
//    }
//}
//
//preg_match_all('/\s+while(.*?)([\)]+[\)\s]+)./s',$code, $vars);
////dump_debug($vars);
//foreach ($vars[0] as $v){
//    if ($v[strlen($v)-1] != "{" ) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['loops']['while'][] = trim($v);
//}
//
//preg_match_all('/\s+for(.*?)([\)]+[\)\s]+)./s',$code, $vars);
//foreach ($vars[0] as $v){
//    if ($v[strlen($v)-1] != "{" ) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['loops']['for'][] = trim($v);
//}
//
//preg_match_all('/\s+foreach(.*?)([\)]+[\)\s]+)./s',$code, $vars);
//foreach ($vars[0] as $v){
//    if ($v[strlen($v)-1] != "{" ) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['loops']['foreach'][] = trim($v);
//}
//preg_match_all('/\s+if(.*?)([\)]+[\)\s]+).|\s+elseif(.*?)([\)]+[\)\s]+)./s',$code, $vars);
////dump_debug($vars);
//foreach ($vars[0] as $v){
//    if ($v[strlen($v)-1] != "{" ) {continue;}
//    $v = substr($v,0,strlen($v)-1);
//    $out['conditionals'][] = trim($v);
//}
//
//echo json_encode($out);

//dump_debug($vars);


//===================================================================================
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