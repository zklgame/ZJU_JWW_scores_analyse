//自动加载JS
function addLoadEvent(func) {
    var oldonload = window.onload;
    if(typeof oldonload != 'function') {
        window.onload = func;
    }else {
        window.onload = function() {
            oldonload();
            func();
        }
    }
}

function createActive() {
    if(!document.getElementById('key')) {
        return false;
    }
    var key = document.getElementById('key').value;
    var keys = document.getElementById('keys');
    var lis = keys.getElementsByTagName('li');
    if(key != 'a') {
        for(var i=0; i<lis.length; i++) {
            var lisclass = lis[i].getAttribute('class');
            if(key == lisclass) {                
                lis[i].setAttribute('class', 'active');
                break;
            }
        }
    }else {
        lis[0].setAttribute('class', 'active');
    }
}

function box_diaplay(id) {
    if(!document.getElementById(id)) {
	   return false;
    }
    var target = document.getElementById(id);
    target.onclick = function() {
        iid = id.substring(4);
        if(!document.getElementById(iid)) {
            return false;
        }
        var target2 = document.getElementById(iid);
        target2.style.display = "block";
    }
}
function box_cancle(id) {
    if(!document.getElementById(id)) {
	return false;
    }
    var target = document.getElementById(id);
    target.onclick = function() {
        iid = id.substring(7);
        if(!document.getElementById(iid)) {
            return false;
        }
        var target2 = document.getElementById(iid);
        target2.style.display = "none";
    }
}

function show_box_1() {
    box_diaplay("for_scores_list_upload");
}
function unshow_box_1() {
    box_cancle("cancle_scores_list_upload");
}

addLoadEvent(show_box_1);
addLoadEvent(unshow_box_1);

addLoadEvent(createActive);









