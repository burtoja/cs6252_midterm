<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
<main>
    <h1>Database Error</h1>
    <p class="error_message">There was an error connecting to the database.</p>
    <p class="error_message">Error message: <?php echo $error_message; ?></p>
</main>
<?php include './view/footer.php'; ?>