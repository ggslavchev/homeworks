function calcCylinderVol(arr){
    var volume = Number(arr[0])*Number(arr[0])*Math.PI*Number(arr[1]);
    return volume.toFixed(3);
}

console.log("Cylinder with r = 2 and height = 4 has volume "+calcCylinderVol([2,4]));
console.log("Cylinder with r = 5 and height = 8 has volume "+calcCylinderVol([5,8]));
console.log("Cylinder with r = 12 and height = 3 has volume "+calcCylinderVol([12,3]));
