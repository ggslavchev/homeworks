function Solve(arr){
    var oShape = [
      [true,true],
      [true,true]
    ];
    var iShape = [
        [true],
        [true],
        [true],
        [true]
    ];
    var lShape = [
        [true,false],
        [true,false],
        [true,true]
    ];
    var jShape = [
      [false,true],
      [false,true],
      [true,true]
    ];
    var zShape = [
      [true,true,false],
      [false,true,true]
    ];
    var sShape = [
      [false,true,true],
      [true,true,false]
    ];
    var tShape = [
      [true,true,true],
      [false,true,false]
    ];

    function countShape(field,shape){
        var fieldHeight = field.length;
        var fieldWidth = field[0].length;
        var shapeHeight = shape.length;
        var shapeWidth = shape[0].length;
        if ((fieldHeight < shapeHeight) ||
            (fieldWidth < shapeWidth)) return 0;

        var counter = 0;
        var flag;
        for (var y = 0; y<=fieldHeight-shapeHeight; y++){
            for (var x=0; x<=fieldWidth-shapeWidth; x++){
                flag = true;
                for (var y1=0; y1<shapeHeight; y1++){
                    for (var x1=0; x1<shapeWidth; x1++){
                        if (shape[y1][x1] && field[y+y1][x+x1]=='-'){
                            flag = false;

                        }
                    }
                }
                if (flag) counter++;
            }
        }

        return counter;
    }

    var result = {};
    result['I'] = countShape(arr,iShape);
    result['L'] = countShape(arr,lShape);
    result['J'] = countShape(arr,jShape);
    result['O'] = countShape(arr,oShape);
    result['Z'] = countShape(arr,zShape);
    result['S'] = countShape(arr,sShape);
    result['T'] = countShape(arr,tShape);
    return JSON.stringify(result);
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