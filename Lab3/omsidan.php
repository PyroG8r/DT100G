<?php
$page_title = "Startsida";
include("includes/header.php");
?>

<h3>Information</h3>
<ul>
    <li><b>Datum/Klockslag:</b> <?php echo date("Y-m-d H:i:s"); ?></li>
    <li><b>Din Ip-adress:</b> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
    <li><b>Sökväg/filnamn:</b> <?php echo $_SERVER['PHP_SELF']; ?></li>
    <li><b>Webbläsare:</b> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
</ul>

<?php
include("includes/sidebar.php");
include("includes/footer.php");