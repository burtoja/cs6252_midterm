<?php
    $dsn = 'mysql:host=localhost;dbname=book_reviews';
    $username = 'reviewer';
    $password = 'review2020';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>