function Solve(arr){

    var inpObj = {};
    for (var i in arr){
        var line = arr[i].split(/\s*\/\s*/);
        var homeTeam = line[0];
        line = line[1].split(/\s*:\s*/);
        var awayTeam = line[0];
        line = line[1].split(/\s*-\s*/);
        var homeGoals = Number(line[0]);
        var awayGoals = Number(line[1]);
         if (inpObj [homeTeam] == undefined){
            inpObj [homeTeam] = {'goalsScored':0,'goalsConceded':0,'matchesPlayedWith':[] }
        }
        if (inpObj [awayTeam] == undefined){
            inpObj [awayTeam] = {'goalsScored':0,'goalsConceded':0,'matchesPlayedWith':[] }
        }
        inpObj[homeTeam]['goalsScored'] += homeGoals;
        inpObj[awayTeam]['goalsScored'] += awayGoals;
        inpObj[homeTeam]['goalsConceded'] += awayGoals;
        inpObj[awayTeam]['goalsConceded'] += homeGoals;
        if (inpObj[homeTeam]['matchesPlayedWith'].indexOf(awayTeam) == -1 ){
            inpObj[homeTeam]['matchesPlayedWith'].push(awayTeam);
        }
        if (inpObj[awayTeam]['matchesPlayedWith'].indexOf(homeTeam) == -1 ){
            inpObj[awayTeam]['matchesPlayedWith'].push(homeTeam);
        }
    }
    var keys = Object.keys(inpObj);
    keys.sort();
    var outObj = {};
    for (var i=0; i<keys.length; i++){
        outObj[keys[i]] = inpObj[keys[i]];
        outObj[keys[i]]['matchesPlayedWith'].sort();
    }
    return JSON.stringify(outObj);
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
