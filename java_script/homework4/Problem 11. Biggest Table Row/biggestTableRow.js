function Solve(arr){
    var maxSum = -1000000;
    var maxSumNumbers = ['-','-','-','-','-','-','-','-'];
    var currentLine;
    var currentSum;

    for (var i=2; i<arr.length-1; i++){
        currentLine = arr[i].split(/<\/*td>/g);
        currentSum = Number(Number((currentLine[3]=='-')?'0':currentLine[3])+
            Number((currentLine[5]=='-')?'0':currentLine[5])+
            Number((currentLine[7]=='-')?'0':currentLine[7]));

        if (currentSum > maxSum){
            maxSum = currentSum;
            maxSumNumbers = currentLine;
        }
    }
    if ((maxSumNumbers[3] == '-') && (maxSumNumbers[5] == '-') && (maxSumNumbers[7] == '-')){
        console.log('no data');
        return;
    }
    else {
        console.log(maxSum + ' = ' + ((maxSumNumbers[3] == '-') ? '' : maxSumNumbers[3]) +
        ((maxSumNumbers[5] == '-') ? '' :(maxSumNumbers[3]=='-')?maxSumNumbers[5]:' + ' + maxSumNumbers[5]) +
        ((maxSumNumbers[7] == '-') ? '' :(maxSumNumbers[3]=='-' && maxSumNumbers[5]=='-')?maxSumNumbers[7]: ' + '
        + maxSumNumbers[7]));
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
