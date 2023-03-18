    <footer>
            <p>&copy; 2023 - Gästbok</p>
        </footer>
    </div>
    <!-- /.container -->

    <!--  Prevents user of reloading site and resubmitting form  -->
    <script>
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
    
    </script>
    <!--<script src="../js/scripts.js" defer></script>-->
    
</body>
</html>
