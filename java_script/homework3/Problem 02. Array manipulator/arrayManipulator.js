function Solve(arr){

    var numArr = [];
    for (var i in arr){
        if (typeof arr[i] == 'number' ){
            numArr.push(arr[i]);
        }
    }
    numArr = numArr.sort(function(a,b) {return a<b;});

    var freqObj = {};
    for (var i in numArr){
        if (typeof freqObj[numArr[i]] === 'undefined'){
            freqObj[numArr[i]] = 1;
        }
        else{
            freqObj[numArr[i]]++;
        }
    }
    var maxFreqValue = 0;
    var maxFreqNumber = '';


    for (var i in freqObj){
        if (freqObj[i] > maxFreqValue){
            maxFreqNumber = i;
            maxFreqValue = freqObj[i];
        }
    }

    console.log('Min number: '+numArr[numArr.length-1]);
    console.log('Max number: '+numArr[0]);
    console.log('Most frequent number: '+maxFreqNumber );
    console.log(numArr);
    return;
}

Solve(["Pesho", 2, "Gosho", 12, 2, "true", 9, undefined, 0, "Penka", { bunniesCount : 10}, [10, 20, 30, 40]]);
