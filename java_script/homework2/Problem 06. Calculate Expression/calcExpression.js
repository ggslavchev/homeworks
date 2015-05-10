
function evalResult  (){
    var expr = document.getElementById("input").value;
    document.getElementById("output").innerHTML = eval(expr).toString();
}
