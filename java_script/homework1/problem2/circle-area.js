function calcCircleArea(r){
    return r * r * Math.PI;
}
/* default values */
var r = 7.0;
var output = document.getElementById("output").innerHTML;
output += "r=" + r.toString() + "; area=" + calcCircleArea(r)  +"<br>";
document.getElementById("output").innerHTML = output;
r = 1.5;
output += "r=" + r.toString() + "; area=" + calcCircleArea(r) + "<br>";
document.getElementById("output").innerHTML = output;
r = 20;
output += "r=" + r.toString() + "; area=" + calcCircleArea(r) + "<br>";
document.getElementById("output").innerHTML = output;
var radius = 0;
while(radius != null) {
    radius = prompt('Please input the radius');
    if (radius != null) {
        output = document.getElementById("output").innerHTML;
        var r = parseFloat(radius);
        if (!isNaN(r)) {
            output += "r=" + radius.toString() + "; area=" + calcCircleArea(r) + "<br>";
            document.getElementById("output").innerHTML = output;
        }
    }
}