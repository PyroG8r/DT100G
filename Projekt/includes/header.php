<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

//Create new instance of guestbook class and add new post if content from form is filled
require_once 'classes/Guestbook.class.php';
//$guestbook = new Guestbook();
if (isset($_POST['addPost'])) {
    //add new post to guestbook
    //$guestbook->newPost($_POST['name'], $_POST['message'], date('Y-m-d H:i:s'));
    //unset post variable
    unset($_POST['addPost']);
}


//Delete post with index i, if button is pressed
if (isset($_POST['deletePost'])) {
    //$guestbook->deletePost($_POST['deletePost']);
    unset($_POST['deletePost']);
}

?>


<!DOCTYPE html>
<html lang="se">
<head>
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
    <header id="mainheader">
        <div class="headercontainer">
            <h1 id="logo">Visitors</h1>
        </div>
    </header>
    <!-- Start of main container -->
    <div class="container">