<?php
function get_books() {
    global $db;
    $query = 'SELECT * FROM books
              ORDER BY bookID';
    $books = $db->prepare($query);
    $books->execute();
    return $books;    
}


?>