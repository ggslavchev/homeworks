function Solve(args){
    var inpObj = {};
    var outObj = {};
    var inpKeys = [];
    for (var i in args){
        var cLine = args[i].trim();
        cLine = cLine.split(/\s*\|\s*/g);
        if (inpObj[cLine[1]] == undefined){
            inpObj[cLine[1]] = {};
            inpObj[cLine[1]]['avgGrade'] = [];
            inpObj[cLine[1]]['avgVisits'] = [];
            inpObj[cLine[1]]['students'] = [];
        }
        inpObj[cLine[1]]['avgGrade'].push(cLine[2]);
        inpObj[cLine[1]]['avgVisits'].push(cLine[3]);
        if (inpObj[cLine[1]]['students'].indexOf(cLine[0]) == -1){
            inpObj[cLine[1]]['students'].push(cLine[0]);
        }
    }
    inpKeys = Object.keys(inpObj).sort();
    for (i in inpKeys){
        outObj[inpKeys[i]]={};
        outObj[inpKeys[i]]['avgGrade'] = average (inpObj[inpKeys[i]]['avgGrade']);
        outObj[inpKeys[i]]['avgVisits'] = average (inpObj[inpKeys[i]]['avgVisits']);
        inpObj[inpKeys[i]]['students'].sort();
        outObj[inpKeys[i]]['students'] = inpObj[inpKeys[i]]['students'];
    }
    return JSON.stringify(outObj);
    function average(arr){
        var sum = 0;
        for (var i in arr){
            sum += Number(arr[i]);
        }
        sum /= arr.length;
        return Number(sum.toFixed(2));
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