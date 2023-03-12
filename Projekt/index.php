<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors
// Check if the user is logged in, otherwise redirect to login page
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$page_title = "Inlägg";
include("config/config.php");




//Create new instance of guestbook class and add new post if content from form is filled
require_once 'classes/Veckologgen.class.php';
require_once 'config/databaseconfig.php';

$veckologgen = new Veckologgen($db);
if (isset($_POST['addPost'])) {
    //add new post to guestbook
    //get user id from session
    $uid = $_SESSION['uid'];
    $veckologgen->newPost($uid, $_POST['message'], date('Y-m-d H:i:s'));
    
    //unset post variable
    unset($_POST['addPost']);
}


//Delete post with index i, if button is pressed
if (isset($_POST['deletePost'])) {
    $veckologgen->deletePost($_POST['deletePost']);
    unset($_POST['deletePost']);
}
?>






<?php
include("includes/header.php");
?>
<h2>Veckologgen</h2>

<div class="left">
    <form id="form" action="index.php" method="post">
        
            

            <label for="message">Meddelande</label> <br>
            <textarea id="message" name="message" placeholder="Ditt meddelande" required></textarea>

            <input class="btn" type="submit" name="addPost" value="Skapa Inlägg">
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

<?php
include("includes/footer.php");
?>