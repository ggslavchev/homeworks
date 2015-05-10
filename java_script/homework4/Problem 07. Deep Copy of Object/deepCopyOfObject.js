function clone(obj) {
    var result = {};
    for(var key in obj) {
       result[key] = obj[key];
    }
    return result;
}
function compareObjects(obj, objCopy){
    return (obj ==  objCopy );
}

var a = {name: 'Pesho', age: 21}
var b = clone(a); // a deep copy
console.log('a == b --> ' + compareObjects(a, b));
var a = {name: 'Pesho', age: 21} ;
var b = a; // not a deep copy
compareObjects(a, b);
console.log('a == b --> ' + compareObjects(a, b));