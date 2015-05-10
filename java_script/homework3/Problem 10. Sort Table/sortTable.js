function Solve(arr){
    var obj = {};
    console.log(arr[0]);
    console.log(arr[1]);
    for (var i = 2; i<arr.length-1; i++){
        var product = '';
        var j=8;
        while(arr[i][j] != '<') {product+=arr[i][j]; j++};
        j = j + 9;
        var price = '';
        while(arr[i][j] != '<') {price+=arr[i][j]; j++};
        if (obj[price] == undefined){
            obj[price] = [];
        }
        if (obj[price][product] == undefined) {
            obj[price][product] = [i];
        }
        else obj[price][product].push(i);
    }
    var priceArr = Object.keys(obj).sort(function(a,b){return (parseFloat(a)-parseFloat(b))});
    for (i in priceArr){
        var productArr = Object.keys(obj[priceArr[i]]).sort();
        for (var j in productArr) {
            for (var z=0; z < obj[priceArr[i]][productArr[j]].length;z++)
                console.log(arr[obj[priceArr[i]][productArr[j]][z]]);
        }
    }
    console.log(arr[arr.length-1]);
}