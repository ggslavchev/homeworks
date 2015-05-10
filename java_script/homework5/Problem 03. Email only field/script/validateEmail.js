/**
 * Created by HPLaptop on 31.3.2015 г..
 */
function checkMail(){
    var input = document.getElementById('input').value;
    document.getElementById('output').innerHTML = input;
    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (regex.test(input)){
        document.getElementById('output').style.backgroundColor = "lightgreen";
    }
    else {
        document.getElementById('output').style.backgroundColor = "red";
    }

}