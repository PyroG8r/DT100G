    <footer>
            <p>&copy; 2023 - Veckologgen</p>
        </footer>
    </div>
    
    <!-- only load scritpts when in index.php -->
    <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
        <script src="js/scripts.js" defer></script>
    <?php } ?>
    
</body>
</html>
