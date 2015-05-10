//***********************************************
//*  Има разминаване на входните и изходните    *
//*     данни в условието на задачата!          *
//***********************************************
// constructor for person object
function Person(first, last, age) {
    this.firstName = first;
    this.lastName = last;
    this.age = age;
}
//array of Person
var persons= [];
//fill array with some data
persons.push(new Person("Scott", "Guthrie", 38));
persons.push(new Person("Scott", "Johns", 40));
persons.push(new Person("Scott", "Hanselman", 36));
persons.push(new Person("Jesse", "Johns", 57));
persons.push(new Person("Jon", "Skeet", 36));

function group(personsArr,key){
    var groupArr = {};
    for (var i in personsArr){
        var  person = personsArr[i];
        if (groupArr[person[key]] === undefined){
            groupArr[person[key]] = [person];
        }
        else {
            groupArr[person[key]].push(person);
        }
    }
    return groupArr;
}

function printGroup(groupArr){
    for (var i in groupArr){
        var result = '';
        result = 'Group : ' + i +' [';
        for (var j in groupArr[i]){
            result += groupArr[i][j].firstName + ' ';
            result += groupArr[i][j]['lastName'] + '(age ';
            result += groupArr[i][j]['age'] + ')';
            if (j < groupArr[i].length-1) result+=', ';
            else result+=']';
        }
        console.log(result)
    }
}

printGroup(group(persons,'firstName'));
console.log();
printGroup(group(persons,'age'));
console.log();
printGroup(group(persons,'lastName'));