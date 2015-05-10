function Solve(inStr){
    var inObj = JSON.parse(inStr);
    for (var i in inObj){
        inObj[i]["score"] = Number((inObj[i]["score"]*1.1).toFixed(1));
        inObj[i]["hasPassed"] = true;
        if (inObj[i]["score"] < 100) inObj[i]["hasPassed"] = false;
    }
    var sortArr = [];
    for (var student in inObj){
        if (inObj[student]["hasPassed"]){
            sortArr.push([inObj[student]["name"],inObj[student]["score"]]);
        }
    }
    sortArr = sortArr.sort();
    var result = '[';
    for (var i in sortArr){
        result += '{"name":'+sortArr[i][0]+',"score":'+sortArr[i][1]+',"hasPassed":true}';
        if (i < sortArr.length) result+=',';
    }
    result +=']';
    console.log(result);
}

Solve('[{"name":"Пешо","score":91},{"name":"Лилия","score": 290},{"name":"Алекс","score":343}'+
    ',{"name":"Габриела","score":400},{"name":"Жичка","score" : 70}]');