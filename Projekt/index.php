<?php
$page_title = "Inlägg";
include("includes/config.php");
include("includes/header.php");
?>


<h2>Veckologgen</h2>

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
        <?php //include('includes/displayPosts.php'); ?>
    </div>
    <!-- /#inlägg -->
</div>
<!-- /.right -->

<?php
include("includes/footer.php");
?>