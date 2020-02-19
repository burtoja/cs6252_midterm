<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
<main>
    <h1>Form Error</h1>
    <p class="error_message">Invalid information entered in the form.</p>
    <p class="error_message">Details: <?php echo $error_message; ?></p>
</main>
<?php include './view/footer.php'; ?>