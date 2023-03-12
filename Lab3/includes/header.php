<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $site_title . $divider . $page_title; ?></title>    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
    <div id="container">
        <header id="mainheader">
            <?php include("includes/mainmenu.php"); ?>
        </header>

        <section id="leftcontent">