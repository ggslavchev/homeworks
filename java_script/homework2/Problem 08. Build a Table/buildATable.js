function SolveS(arr){

    function isFib(inp){
        var a = 1;
        var b = 1;
        var current = a+b;
        if (inp == 1){
            return "yes";
        }
        while (current<inp){
            current = a+b;
            a = b;
            b = current;
        }
        if (current == inp){
            return "yes";
        }
        else {
            return "no";
        }
    }

    var result = "<table>\n<tr><th>Num</th><th>Square</th><th>Fib</th></tr>\n";
    var start = Number(arr[0]);
    var stop = Number(arr[1]);
    for (var i = start; i<=stop; i++){
      result = result + "<tr><td>"+i+"</td><td>"+i*i+"</td><td>"+isFib(i)+"</td></tr>\n";
    }
    result = result + "</table>";
    return result;
}

var arr = [];
console.log("To exit from input mode press only Enter key.");
var readline = require('readline');
var rl = readline.createInterface(process.stdin, process.stdout);
rl.on("line",function(line){
    arr.push(line);
    if (line=="") {
        console.log(SolveS(arr));
        rl.close();
    }
}).on("close",function(){
   process.exit(0);
});
