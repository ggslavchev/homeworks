
function Solve(arr){
    var result = '<ul>\n';
    var startNumber = parseInt(arr[0]);
    var stopNumber = parseInt(arr[1]);

    function checkDoubleRakiaNumbers(num){
        var inStr = num.toString();
        if (inStr.length<4) return false;
        for (var i=0; i<inStr.length-3;i++){
            var firstNumStr = inStr[i]+inStr[i+1];
            if (inStr.indexOf(firstNumStr,i+2) >= 0){
                return true;
            }
        }
        return false;
    }

    for (var rowCounter = startNumber; rowCounter <= stopNumber; rowCounter++){
        if (checkDoubleRakiaNumbers(rowCounter)){
          result += "<li><span class='rakiya'>"+rowCounter+
          '</span><a href="view.php?id='+rowCounter+'>View</a></li>\n';
        }
        else{
          result +="<li><span class='num'>"+rowCounter+"</span></li>\n";
        }
    }
    result += '</ul>';
    return result;
}

var arr = [];
var readline = require('readline');
var rl = readline.createInterface(process.stdin, process.stdout);
rl.on("line",function(line){
    arr.push(line);
    if (line=="") {
        arr.pop(); // remove last empty string
        console.log(Solve(arr));
        rl.close();
    }
}).on("close",function(){
    process.exit(0);
});