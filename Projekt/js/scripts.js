
document.addEventListener("DOMContentLoaded", function(){ 
    /*Prevents user of reloading site and resubmitting form */
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    var checkList = document.getElementById('list1');
    checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
    if (checkList.classList.contains('visible'))
        checkList.classList.remove('visible');
    else
        checkList.classList.add('visible');
    }
});