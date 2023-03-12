<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors


//Create new instance of guestbook class and add new post if content from form is filled
require_once 'classes/Guestbook.class.php';
$guestbook = new Guestbook();
if (isset($_POST['addMessage'])) {
    //add new post to guestbook
    $guestbook->newPost($_POST['name'], $_POST['message'], date('Y-m-d H:i:s'));
    //unset post variable
    unset($_POST['addMessage']);

}


//Delete post with index i, if button is pressed
if (isset($_POST['deletePost'])) {
    $guestbook->deletePost($_POST['deletePost']);
    unset($_POST['deletePost']);
}

?>


<!DOCTYPE html>
<html lang="se">
<head>
    <title>Guestbook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
    <header id="mainheader">
        <div class="headercontainer">
            <h1 id="logo">Visitors</h1>
        </div>
        <!-- /.contain -->
    </header>

    <div class="container">
        <h2>Gästbok</h2>

        <div class="left">
            <form id="form" action="index.php" method="post">
                    <label for="name">Namn</label> <br>
                    <input type="text" id="name" name="name" placeholder="Ditt namn" required>

                    <label for="message">Meddelande</label> <br>
                    <textarea id="message" name="message" placeholder="Ditt meddelande" required></textarea>

                    <input class="btn" type="submit" name="addMessage" value="Skapa Inlägg">
            </form>

        </div>
        <!-- /.left -->

        <div class="right">
            <h2>Inlägg</h2>
            <div id="inlägg">
                <?php include('includes/displayPosts.php'); ?>
            </div>
            <!-- /#inlägg -->
        </div>
        <!-- /.right -->

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
    </script>


</body>

</html>
