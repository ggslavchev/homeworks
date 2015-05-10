function Solve(args) {
    var result = '';
    var inpStr = args.join('');
    result = inpStr.match(/<\s*a (.*?)>/gi);
    for (var i in result) {
        result[i] = result[i].match(/href+\s*=+\s*.*/gi);
        for (var j in result[i]) {
            result[i][j] = result[i][j].trim();
            result[i][j] = result[i][j].replace('href', '');
            result[i][j] = result[i][j].trim();
            result[i][j] = result[i][j].substr(1);
            result[i][j] = result[i][j].trim();
            var s = result[i][j].trim();
            s = s.replace('>',' ');
            var stopChar = s[0];
            if (stopChar == "'" || stopChar == '"'){
                s = s.substring(1, s.indexOf(stopChar,1));
            }
            else {
                s = s.substring(0, s.indexOf(' ', 0));
            }
            console.log(s);
        }
    }
}

var arr = [];
var readline = require('readline');
var rl = readline.createInterface(process.stdin, process.stdout);
rl.on('line',function(line){
    arr.push(line);
    if (line=='') {
        arr.pop(); // remove last empty string
        console.log(Solve(arr));
        rl.close();
    }
}).on('close',function(){
    process.exit(0);
});