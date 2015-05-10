function replaceATag( str ){
    var result = [];
    var inATagBegin = false;

    for ( var i=0;  i<str.length; i++ ){
        if ((str[i] === '<') && (str[i+1] === 'a')){
            i += 1;
            result += '[URL';
            inATagBegin = true;
        } else if (inATagBegin && str[i]==='>') {
            result += "]";
            inATagBegin = false;
        }else if ((str[i] == '<') && (str[i + 1] == '/') && (str[i + 2] == 'a') && (str[i+3] =='>')) {
            i += 3;
            result += '[/URL]';
        }else{
            result += str[ i ];
        }
    }
    console.log ( result );
}
replaceATag('<ul>\n<li>\n<a href=http://softuni.bg>\n<div id="inner-div">\nsomething\n</div>\nSoftUni\n</a>\n</li>\n</ul>');