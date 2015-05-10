function sortLetters(str, direction){
    var result = str.split('');
    result.sort(function (a,b){
        return (direction)?a.toLocaleLowerCase() > b.toLowerCase():
            a.toLocaleLowerCase() < b.toLowerCase();
    });
    return result.join('');
}

console.log(sortLetters('HelloWorld', true));
console.log(sortLetters('HelloWorld', false));
