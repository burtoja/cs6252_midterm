<?php
function get_reviews_by_book($book_id) {
    global $db;
    $query = 'SELECT * FROM reviews
              WHERE bookID = :book_id
              ORDER BY reviewID';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $reviews = $statement->fetchAll();
    $statement->closeCursor();
    return $reviews;
}

?>