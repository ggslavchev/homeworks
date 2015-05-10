var HTMLGenerator = {
    createParagraph:  function(id, text){
        var innerText = document.getElementById(id).innerHTML;
        innerText = innerText + '<p>'+ text + '</p>';
        document.getElementById(id).innerHTML = innerText;
    },

    createDiv: function (id, className){
        var innerText = document.getElementById(id).innerHTML;
        innerText = innerText + '<div class="' + className + '"></div>';
        document.getElementById(id).innerHTML = innerText;
    },

    createLink : function (id, text, url){
        var innerText = document.getElementById(id).innerHTML;
        innerText = innerText + '<a href="'+url+'">'+text+'</a>';
        document.getElementById(id).innerHTML = innerText;
    }
};

function testCreateParagraph (id, text){
    HTMLGenerator.createParagraph(id, text);
    printOutputHTML();
}

function testCreateDiv (id, className){
    HTMLGenerator.createDiv(id, className);
    printOutputHTML();
}
function testCreateLink (id, text, url){
    HTMLGenerator.createLink(id, text, url);
    printOutputHTML();
}


function printOutputHTML(){
    document.getElementById('showHTML').innerHTML =
        escapeHTML(document.getElementById('wrapper').outerHTML) + '<br />' +
        escapeHTML(document.getElementById('book').outerHTML);
}
var escapeHTML = function(unsafe) {
    return unsafe.replace(/[&<"']/g, function(m) {
        switch (m) {
            case '&':
                return '&amp;';
            case '<':
                return '&lt;';
            case '"':
                return '&quot;';
            default:
                return '&#039;';
        }
    });
};