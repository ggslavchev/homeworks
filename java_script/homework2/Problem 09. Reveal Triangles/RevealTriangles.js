function Solve(arr){

    var result = "";
    var upLine = [];
    var downLine = [];

    if (arr.length <= 1) {
        result = arr[0];
        return result;
    }

    function strToArr(inStr){
        var res = [];
        for (var i in inStr){ res.push(inStr[i]);}
        return res;
    }

    function arrToStr(inArr){
        var res = "";
        for (var i in inArr){res += (inArr[i].length > 1)?"*":inArr[i];}
        return res;
    }

    upLine = strToArr(arr[0]);
    // main loop
    for (var rowCounter=1; rowCounter<arr.length; rowCounter++ ){
        downLine = strToArr(arr[rowCounter]);
        //check for triangles
        for (var j=0; j<downLine.length-2; j++){
            if ((downLine[j]!=undefined)&&
                (downLine[j+1]!=undefined)&&
                (downLine[j+2]!=undefined)&&
                (upLine[j+1]!=undefined)&&
                (downLine[j][0] == downLine[j+1][0]) &&
                (downLine[j+1][0] == downLine[j+2][0]) &&
                (downLine[j+1][0] == upLine[j+1][0])){
                downLine[j] += "*";
                downLine[j+1] += "*";
                downLine[j+2] += "*";
                upLine[j+1] += "*";
            }
        }
        //upLine is ready to output
        result += "\n";
        result += arrToStr(upLine);
        //for next row up Line is current down line
        upLine = downLine;
    }
    return result + "\n" + arrToStr(upLine);
}



//var arr = [];
//var readline = require('readline');
//var rl = readline.createInterface(process.stdin, process.stdout);
//rl.on("line",function(line){
//    arr.push(line);
//    if (line=="") {
//        arr.pop(); // remove last empty string
//        console.log(Solve(arr));
//        rl.close();
//    }
//}).on("close",function(){
//    process.exit(0);
//});
//
