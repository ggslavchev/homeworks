var count = 0;
var game_over = 0;
function checkForWin(){
    var table = document.getElementById('tableID');
    for (var i=0; i<3; i++)
    {
        if ((table.rows[i].cells[0].innerHTML.localeCompare(table.rows[i].cells[1].innerHTML) == 0) &&
            (table.rows[i].cells[1].innerHTML.localeCompare(table.rows[i].cells[2].innerHTML) == 0) &&
            (table.rows[i].cells[0].innerHTML.length)) {

            table.rows[i].cells[0].style.color = "#00CE00";
            table.rows[i].cells[1].style.color = "#00CE00";
            table.rows[i].cells[2].style.color = "#00CE00";
            game_over = 1;
            document.getElementById('message').innerHTML = table.rows[i].cells[0].innerHTML + "- WIN";
            document.getElementById('message').style.backgroundColor = table.rows[i].cells[0].style.backgroundColor;
        }
    }
    for (var i=0; i<3; i++)
    {
        if ((table.rows[0].cells[i].innerHTML.localeCompare(table.rows[1].cells[i].innerHTML) == 0) &&
            (table.rows[1].cells[i].innerHTML.localeCompare(table.rows[2].cells[i].innerHTML) == 0) &&
            (table.rows[0].cells[i].innerHTML.length)) {

            table.rows[0].cells[i].style.color = "#00CE00";
            table.rows[1].cells[i].style.color = "#00CE00";
            table.rows[2].cells[i].style.color = "#00CE00";
            game_over = 1;
            document.getElementById('message').innerHTML = table.rows[0].cells[i].innerHTML + "- WIN";
            document.getElementById('message').style.backgroundColor = table.rows[0].cells[i].style.backgroundColor;
        }
    }
    if ((table.rows[0].cells[0].innerHTML.localeCompare(table.rows[1].cells[1].innerHTML) == 0) &&
        (table.rows[1].cells[1].innerHTML.localeCompare(table.rows[2].cells[2].innerHTML) == 0) &&
        (table.rows[0].cells[0].innerHTML.length)) {

        table.rows[0].cells[0].style.color = "#00CE00";
        table.rows[1].cells[1].style.color = "#00CE00";
        table.rows[2].cells[2].style.color = "#00CE00";
        game_over = 1;
        document.getElementById('message').innerHTML = table.rows[0].cells[0].innerHTML + "- WIN";
        document.getElementById('message').style.backgroundColor = table.rows[0].cells[0].style.backgroundColor;

    }
    if ((table.rows[0].cells[2].innerHTML.localeCompare(table.rows[1].cells[1].innerHTML) == 0) &&
        (table.rows[1].cells[1].innerHTML.localeCompare(table.rows[2].cells[0].innerHTML) == 0) &&
        (table.rows[0].cells[2].innerHTML.length)) {

        table.rows[0].cells[2].style.color = "#00CE00";
        table.rows[1].cells[1].style.color = "#00CE00";
        table.rows[2].cells[0].style.color = "#00CE00";
        game_over = 1;
        document.getElementById('message').innerHTML = table.rows[0].cells[2].innerHTML + "- WIN";
        document.getElementById('message').style.backgroundColor = table.rows[0].cells[2].style.backgroundColor;

    }
    if ((count > 8) && (game_over == 0)){
        document.getElementById('message').innerHTML = "DRAW";
        document.getElementById('message').style.backgroundColor = "#FCD209";
    }
}
function doMove(tableCell){
    if (game_over == 0) {
        if (tableCell.innerHTML == "") {
            if (count % 2 == 0) {
                tableCell.innerHTML = "o";
                tableCell.style.backgroundColor = "#FF0000";
            }
            else {
                tableCell.innerHTML = "x";
                tableCell.style.backgroundColor = "#0000FF";
            }
            count++;
        }
    }
}
function restartGame(){
    count = 0;
    game_over = 0;
    var table = document.getElementById('tableID');
    for (var i=0; i<3; i++){
        for(var j=0; j<3; j++){
            table.rows[i].cells[j].innerHTML="";
            table.rows[i].cells[j].style.color = "#000000";
            table.rows[i].cells[j].style.backgroundColor = "#FFFFFF";
        }
    }
    document.getElementById('message').innerHTML="";
    document.getElementById('message').style.backgroundColor = "#FFFFFF";
}