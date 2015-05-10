var current_time = new Date();
var days = ['Sun','Mon','Tue','Wed','Thur','Fri','Sat'];
var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
var outString;

outString = days[current_time.getUTCDay()]+', ';
outString += current_time.getUTCDate()+' ';
outString += months[current_time.getUTCMonth()] +' ';
outString += current_time.getUTCFullYear() +' ';
outString += makeTwoDigit(current_time.getUTCHours())+':';
outString += makeTwoDigit(current_time.getUTCMinutes())+':';
outString += makeTwoDigit(current_time.getSeconds()) + ' GMT';

console.log(outString);

function makeTwoDigit (digit){
    var a = digit+'';
    if (a.length == 1){
        a = '0'+a;
    }
    return a;
}

