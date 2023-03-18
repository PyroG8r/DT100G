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
        <a href="index.php"><h1 id="logo">Veckologgen</h1></a>
            <div class="headerlinks">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                    <a href="logout.inc.php"><h3>Logga ut</h1></a>
                <?php }?>

        </div>
    </header>
    <!-- Start of main container -->
    <div class="container">