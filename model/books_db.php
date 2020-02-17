<?php
function get_books() {
    global $db;
    $query = 'SELECT * FROM books
              ORDER BY bookID';
    $books = $db->prepare($query);
    $books->execute();
    return $books;    
}

function get_book_info(int $book_id) {
	global $db;
	$query = 'SELECT * FROM books
              WHERE bookID = :book_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':book_id', $book_id);
	$statement->execute();
	$title = $statement->fetch();
	return $title;
}


?>