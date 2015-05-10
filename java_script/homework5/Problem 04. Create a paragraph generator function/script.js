function createParagraph(id, text){
    var innerText = document.getElementById(id).innerHTML;
    innerText = innerText + '<p>'+ text + '</p>';
    document.getElementById(id).innerHTML = innerText;
}
