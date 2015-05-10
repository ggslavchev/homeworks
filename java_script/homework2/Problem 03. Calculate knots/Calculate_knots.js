var readline = require('readline');
var rl = readline.createInterface(process.stdin, process.stdout);

function calcKnots(kmPerHour){
    if (isNaN(kmPerHour)){
        return ("Invalid parameter")
    }

    var result = (kmPerHour * 1000)/3600; //in m/s
    result = result * 1.94384449244;
    return result.toFixed(2);2
}

process.stdout.write('To exit type [exit] \n\r');

rl.setPrompt('Enter speed [km/h] >');
rl.prompt();
rl.on('line', function(line) {
    if (line === "exit") rl.close();
    console.log(calcKnots(Number(line)));
    rl.prompt();

}).on('close',function(){
    process.exit(0);
});