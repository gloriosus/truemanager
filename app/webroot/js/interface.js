window.onload = function SetActive() {
    var links = document.getElementsByClassName('navigation-col2')[0].getElementsByTagName('a');
    
    /*for(var i = 0; i < links.length; i++) {
        if(window.location.href == links[i].href) {
            links[i].classList.add('active-link');
            break;
        }
    }*/
    
    for(var i = 0; i < links.length; i++) {
        if(window.location.href.indexOf(links[i].id) !== -1) {
            links[i].classList.add('active-link');
            break;
        }
    }
}