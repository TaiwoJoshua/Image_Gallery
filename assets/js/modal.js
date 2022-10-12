const displayBlock = document.getElementById('blockdisplay');
const logouts = document.getElementById('logouts');
const iconmail = document.getElementById('iconmail');
const iemail = document.getElementById('emails');
const iconuser = document.getElementById('iconuser');
const iuser = document.getElementById('uName');
const iphone = document.getElementById('numbers');
const clickuser = document.getElementById('clickuser');
const clickemail = document.getElementById('clickemail');
const rsuccess = document.getElementById('rsuccess');

function myFunction(){
    displayBlock.style.zIndex = "4";
}

window.onclick = function(event) {
    if (event.target == displayBlock){
        displayBlock.style.zIndex = "-1";
        rsuccess.style.display = "none";
    }
}

function ourFunction(){
    displayBlock.style.zIndex = "-1";
    rsuccess.style.display = "none";
}

function remove(){
    logouts.style.visibility = "collapse";
    logouts.style.zIndex = "-1";
}

function logout(){
    logouts.style.visibility = "visible";
    logouts.style.zIndex = "4";
}

function searchFunction() {
    let input = document.getElementById('search').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('inputs');
    
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
            document.getElementById('notFound').style.display = "block";
        }
        else {
            x[i].style.display="list-item"; 
            document.getElementById('notFound').style.visibility = "hidden";                
        }
    }
};

function emailFunction(){
    iemail.className = "visible";
    iconmail.className = "visible";
    iuser.className = "invisible";
    iconuser.className = "invisible";
    clickuser.style.display = "block";
    clickemail.style.display = "none";
}

function userFunction(){
    iuser.className = "visible";
    iconuser.className = "visible";
    iemail.className = "invisible";
    iconmail.className = "invisible";
    clickemail.style.display = "block";
    clickuser.style.display = "none";
}

function home(){
    location.assign("../contents/imagegallery.php");
}


