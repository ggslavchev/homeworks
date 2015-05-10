<?php

function makeTable ($name,$phone,$age,$address)
{
    echo '<style>';
    echo 'table {margin: 10px; padding: 2px}';
    echo 'table, th, td {border: 1px solid black;}';
    echo 'th {text-align: left; background-color: #FFA100;}';
    echo 'td {text-align: right;}';
    echo '</style>';
    echo '<table cellspacing="0" cellpadding="5">';
    echo '<tr>', '<th>', 'Name', '</th>', '<td>',$name,'</td>', '</tr>';
    echo '<tr>', '<th>', 'Phone Number ', '</th>','<td>',$phone,'</td>', '</tr>';
    echo '<tr>', '<th>', 'Age', '</th>', '<td>',$age,'</td>', '</tr>';
    echo '<tr>', '<th>', 'Address', '</th>', '<td>',$address,'</td>', '</tr>';
    echo '</table>';
}

makeTable('Gosho','0882-321-423','24','Hadji Dimitar');
makeTable('Pesho','0884-888-888','67','Suhata Reka');