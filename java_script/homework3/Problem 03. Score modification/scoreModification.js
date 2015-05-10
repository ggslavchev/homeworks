function Solve(inArr){
    var outArr = [];

    // Може би има лека неточност в задачата, не става ясно
    // кога трябва да се филтрират данните - преди или след
    // намалчването с 20%. Съдейки по примерните данни е след
    // и така съм го направил

    for (var i in inArr){
        if ((inArr[i]>=0) && (inArr[i]<=480/*400 ако е преди*/  )) outArr.push(inArr[i]);
    }
    outArr = outArr.sort(function(a,b){return a>b});

    for (var i in outArr) {outArr[i] *= 0.8; outArr[i] = Number(outArr[i].toFixed(1)); }
    console.log(outArr);
}
Solve([200, 120, 23, 67, 350, 420, 170, 212, 401, 615, -1]);