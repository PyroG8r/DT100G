<?php
include("includes/login.inc.php");

$page_title = "Login";
include("config/config.php");
include("includes/header.php");
?>
<div class="login center">
<h2>Logga in</h2>
        <p>Skriv in ditt användarnamn, lösenord.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Användarnamn</label>
                <input type="text" name="username" id="username" class="form-control <?= (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?= $username; ?>">
                <span class="invalid-feedback"><?= $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label for="password">Lösenord</label>
                <input type="password" name="password" id="password" class="form-control <?= (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?= $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div>
            <p>Har du inte ett konto ännu? <a href="signup.php">Signa upp</a>.</p>
        </form>
</div>
<?php
include("includes/footer.php");
?>