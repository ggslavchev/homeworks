function findYoungestPerson(args){
    var result;
    var minAge = Number.MAX_VALUE;
    args.forEach(function(element){

        if ((element.hasSmartphone) && (element.age < minAge)){
            result = element.firstname+' '+element.lastname;
            minAge = element.age;
        }
    });
    result = 'The youngest person ' + result;
    return result;
}

var people = [
    { firstname : 'George', lastname: 'Kolev', age: 32, hasSmartphone: false },
    { firstname : 'Vasil', lastname: 'Kovachev', age: 40, hasSmartphone: true },
    { firstname : 'Bay', lastname: 'Ivan', age: 81, hasSmartphone: true },
    { firstname : 'Baba', lastname: 'Ginka', age: 40, hasSmartphone: false }
    ];
console.log( findYoungestPerson(people) );