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
require_once 'classes/Veckologgen.class.php';
require_once 'config/databaseconfig.php';

$veckologgen = new Veckologgen($db);
if (isset($_POST['addPost'])) {
    //add new post to guestbook
    //get user id from session
    $uid = $_SESSION['uid'];

    $newTagIds = array();
    //check if new tags are added
    if (isset($_POST['addTag']) && $_POST['addTag'][0] != "") {
        //add new tags to database
        $newTagIds = $veckologgen->newTags($_POST['addTag']);
    }
    //check if tags are selected
    if (isset($_POST['tags'])) {
        $_POST['tags'] = array_merge($newTagIds, $_POST['tags']);
        $veckologgen->newPost($uid, $_POST['description'], $_POST['message'], date('Y-m-d H:i:s'), $_POST['tags']);
    } else {
        $veckologgen->newPost($uid, $_POST['description'], $_POST['message'], date('Y-m-d H:i:s'), $newTagIds);
    }
    
    
}


//Delete post with index i, if button is pressed
if (isset($_POST['deletePost'])) {
    $veckologgen->deletePost($_POST['deletePost']);
}

?>


<?php
include("includes/header.php");
?>
<div class="postdisplay center">
    <h2>Inlägg</h2>
    <!-- The logged in users name -->
    <p class="username">Inloggad som: <?php echo htmlspecialchars($_SESSION["username"]); ?></p>



    <div id="inlägg">
        <?php include('includes/displayPosts.php'); ?>
    </div>
    <!-- /#inlägg -->
</div>
<!-- /.right -->

<div class="newpost center">
    <form id="form" action="index.php" method="post">
            <label for="description">Beskrivning</label> <br>
            <input type="text" id="description" name="description" placeholder="Beskrivning" required> <br>

            <!-- multiple choice dropdown menu for selecting tags -->
            <div id="list1" class="dropdown-check-list" tabindex="100">
                <span class="anchor">Välj taggar</span>
                <ul class="items">
                    <?php
                    //get all tags from database
                    $sql = "SELECT * FROM tags";
                    $result = $db->query($sql);
                    //loop through tags and add to dropdown menu
                    while ($row = $result->fetch_assoc()) {
                        echo "<li><input type='checkbox' name='tags[]' value='" . $row['tagid'] . "' id='" . $row['tagid'] . "'>";
                        echo "<label for='" . $row['tagid'] . "'>" . $row['name'] . "</label></li>";
                    }
                    ?>
                </ul>
                
            </div>

            <!-- Text box for adding tags and a button for adding more text boxes -->
            <div id="addTag">
                <button type="button" id="addtagBtn" class="btn">Lägg till en till</button>
                <label for="addTagText">Lägg till tagg</label>
                <input type="text" id="addTagText" name="addTag[]" placeholder="Ny tagg"> <br>
                
            </div>
            <!-- textarea for post message -->
            <label for="message">Meddelande</label> <br>
            <textarea id="message" name="message" placeholder="Ditt meddelande" required></textarea>


            <input class="btn" type="submit" name="addPost" value="Skapa Inlägg">
    </form>

</div>
<!-- /.left -->



<?php
include("includes/footer.php");
?>