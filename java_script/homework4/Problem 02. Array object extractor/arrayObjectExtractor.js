function extractObjects(array){
    var result = [];
    array.forEach(function(emement){
        if (typeof emement == "object"){
            if (emement.constructor !== Array) {
                result.push(emement);
            }
        };
    });

    return result;
}



var args = [
    "Pesho",
    4,
    4.21,
    { name : 'Valyo', age : 16 },
    { type : 'fish', model : 'zlatna ribka' },
    [1,2,3],
    "Gosho",
    { name : 'Penka', height: 1.65}
];
console.log(extractObjects(args));

