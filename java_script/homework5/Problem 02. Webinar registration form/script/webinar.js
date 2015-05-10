function showHideInvoice(){
    var i,
        visibleMode,
        a = document.getElementsByClassName('invData');

    if (document.getElementById('invoice').checked){
        visibleMode = 'visible';
    }
    else {
        visibleMode = 'hidden';
    }
    for (i=0; i< a.length; i++){
        a[i].style.visibility = visibleMode;
    }
}/**
 * Created by HPLaptop on 31.3.2015 г..
 */
