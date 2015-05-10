function Solve(arr){
    var outArr = [];
    var maxStrLen = 0;
    var rotAngle = Number(arr[0].substring(7,arr[0].length-1));
    rotAngle %= 360;
    for (var i = 1; i < arr.length; i++){
        if (arr[i].length > maxStrLen) maxStrLen = arr[i].length;
        outArr.push(arr[i]);
    }
    for (var currRow in outArr) while (outArr[currRow].length < maxStrLen) outArr[currRow]+=' ';

    switch (rotAngle){
        case 0:
            for (currRow in outArr) console.log(outArr[currRow]);
        break;
        case 90:
            for (currRow = 0; currRow<maxStrLen; currRow++){
                var currRowStr = '';
                for (var currCol = outArr.length-1; currCol>=0; currCol--){
                    currRowStr += outArr[currCol][currRow];
                }
                console.log(currRowStr);
            }
        break;
        case 180:
            for ( currRow = outArr.length-1; currRow>=0; currRow-- )
                console.log(outArr[currRow].split('').reverse().join(''));
        break;
        case 270:
            for (currRow = maxStrLen-1; currRow >=0; currRow--){
                var currRowStr = '';
                for (var currCol = 0; currCol < outArr.length; currCol++){
                    currRowStr += outArr[currCol][currRow];
                }
                console.log(currRowStr);
            }
        break;
    }
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
