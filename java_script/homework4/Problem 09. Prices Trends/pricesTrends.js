function Solve(arr){
    var picture;
    console.log('<table>');
    console.log('<tr><th>Price</th><th>Trend</th></tr>');
    for (var i in arr){
        var price = Number(Number(arr[i]).toFixed(2));
        picture = 'fixed.png';
        if (prevPrice == undefined) { var prevPrice = price; }
        if (prevPrice > price) picture = 'down.png';
        if (prevPrice < price) picture = 'up.png';
        console.log('<tr><td>'+price.toFixed(2)+'</td><td><img src="'+picture+'"/></td></td>');
        prevPrice = price;
    }
    console.log('</table>');
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
