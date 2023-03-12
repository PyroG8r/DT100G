<?php 
header("Content-Type: text/plain");
var_dump(unserialize(file_get_contents("../../../writeable/data.txt")));
?>