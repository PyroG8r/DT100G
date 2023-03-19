"use strict";

/*var baseURL = "https://www.forsakringskassan.se/fk_apps/MEKAREST/public/v1/";*/

/*if statement - does not run in login.php or signup.php*/


 

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
    
    // Clicking addtagBtn adds a new text box for adding tags
    var addtagBtn = document.getElementById('addtagBtn');
    addtagBtn.addEventListener('click', function() {
        var addTag = document.getElementById('addTag');
        var newTag = document.createElement('input');
        newTag.setAttribute('type', 'text');
        newTag.setAttribute('id', 'addTag');
        newTag.setAttribute('name', 'addTag[]');
        newTag.setAttribute('placeholder', 'Lägg till tagg');
        addTag.appendChild(newTag);
    });

    


    /*let url = baseURL + "sjp-startade-manad/SJPStartadeSjukfallAlder.json";
    fetch(url, {method: 'GET'})
        .then(response => response.text())
            .then(data => {
                var jsonData = JSON.parse( data );
                jsonData[0].observations.antal.value;
                document.getElementById("mainheader").innerHTML += jsonData[0].observations.antal.value;
            })
            .catch(error => {
                alert('There was an error '+error);
            });*/
});



