<?php
include("includes/signup.inc.php");

$page_title = "Signup";
include("config/config.php");
include("includes/header.php");
?>
<div class="login center">
<h2>Signa Upp</h2>
        <p>Fyll i formuläret för att skapa ett konto.</p>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control <?= (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?= $username; ?>">
                <span class="invalid-feedback"><?= $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control <?= (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?= $password; ?>">
                <span class="invalid-feedback"><?= $password_err; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control <?= (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?= $confirm_password; ?>">
                <span class="invalid-feedback"><?= $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Submit">
            </div>
            <p>Har du redan ett konto? <a href="login.php">Logga in här</a>.</p>
        </form>
</div>
<?php
include("includes/footer.php");
?>