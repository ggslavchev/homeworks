function Solve(arr){
    var result = {};
    function sortObjectByKey (obj){
        var keys = [];
        var sorted_obj = {};
        for(var key in obj){
            keys.push(key);
        }
        keys.sort();
        for (var key in keys){
            sorted_obj[keys[key]] = obj[keys[key]];
        }
        return sorted_obj;
    };
    arr.forEach(function(row) {
        var data = row.split('|');
        for (var i = 0; i < data.length; i++) {
            data[i] = data[i].trim();
        }
        if (typeof(result[data[1]]) === "undefined") {
            result[data[1]] = {};
            result[data[1]][data[3]] = [data[0]];
        }
        else {
            if (typeof result[data[1]][data[3]] === "undefined") {
                result[data[1]][data[3]] = [data[0]];
            }
            else {
                if (result[data[1]][data[3]].indexOf(data[0]) <0){
                    result[data[1]][data[3]].push(data[0]);
                }
            }
        }
    });
    result = sortObjectByKey(result);
    for (var i in result){
        result[i] = sortObjectByKey(result[i]);
        for (var j in result[i]){
            result[i][j].sort();
        }
    }
    return (JSON.stringify(result));
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
