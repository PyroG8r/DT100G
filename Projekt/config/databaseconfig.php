<?php
/* Attempt to connect to MySQL database */
$db = new mysqli("localhost", "root", "", "veckologgen") or die('Fel vid anslutning');
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . $db->connect_error);
}
?>