const cookie_box = document.getElementById('cookie_box'),
activeBtn = document.getElementById('activeBtn');

activeBtn.addEventListener('click' , function(){
    //UTC is time set by the world time standard
    document.cookie = "CookieBy=Beowulf; expires=" + new Date(2024,5,13).toUTCString();

    //This cookie expires after 30 days
    document.cookie = "FName=Seul; max-age="+60*60*24*30;
    document.cookie = "LName=Lobo; max-age="+60*60*24*30;

    if(document.cookie){
        cookie_box.classList.add('hide');
    }
    else{
        //if we block the cookie setting then show this message
        alert("Cookie not set! Please allow this site from your browser cookie setting."); 
    }
});

function getCookieName(name){
    var r = document.cookie.match("\\b" + name + "=([^;]*)\\b");
    return r ? r[1]:''; 
}

var getCookieName = getCookieName('CookieBy');

if(getCookieName == 'Beowulf'){
    //hide pop up all time
    cookie_box.classList.add('hide');
}