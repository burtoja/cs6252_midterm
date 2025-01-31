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

function get_review_info_by_id($review_id) {
	global $db;
	$query = 'SELECT * FROM reviews
              WHERE reviewID = :review_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':review_id', $review_id);
	$statement->execute();
	$review_info = $statement->fetch();
	$statement->closeCursor();
	return $review_info;
}

function get_review_info_by_user($user_id) {
	global $db;
	$query = 'SELECT * FROM reviews
              WHERE userID = :user_id
			  ORDER BY rating DESC, reviewDate DESC
			  ';
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->execute();
	$review_info = $statement->fetchAll();
	$statement->closeCursor();
	return $review_info;
}

function get_reviews_by_user_and_book_id($user_id, $book_id) {
	global $db;
	$query = 'SELECT * FROM reviews
              WHERE userID = :user_id
			  AND bookID = :book_id
			  ORDER BY rating DESC, reviewDate DESC
			  ';
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->bindValue(':book_id', $book_id);
	$statement->execute();
	$review_info = $statement->fetchAll();
	$statement->closeCursor();
	return $review_info;
}

function get_average_rating_for_book($book_id) {
	global $db;
	$query = 'SELECT AVG(rating) FROM reviews
              WHERE bookID = :book_id
			  ';
	$statement = $db->prepare($query);
	$statement->bindValue(':book_id', $book_id);
	$statement->execute();
	$average_rating = $statement->fetchColumn();
	$statement->closeCursor();
	return number_format($average_rating, 1);
}

function add_review($book_id, $rating, $review, $user_id) {
	global $db;
	$query = 'INSERT INTO reviews
                 (bookID, reviewDate, rating, review, userID)
              VALUES
                 (:bookID, NOW(), :rating, :review, :user_id)';
	$statement = $db->prepare($query);
	$statement->bindValue(':bookID', $book_id);
	$statement->bindValue(':rating', $rating);
	$statement->bindValue(':review', $review);
	$statement->bindValue(':user_id', $user_id);
	$statement->execute();
	$statement->closeCursor();
}

function edit_review($review_id, $rating, $review) {
	global $db;
	$query = '	UPDATE
				 	reviews
				SET
                 	review = :review,
					rating = :rating
				WHERE	
					reviewID = :reviewID
				';
	$statement = $db->prepare($query);
	$statement->bindValue(':reviewID', $review_id);
	$statement->bindValue(':rating', $rating);
	$statement->bindValue(':review', $review);
	$statement->execute();
	$statement->closeCursor();
}

function delete_review($review_id) {
	global $db;
	$query = 'DELETE FROM reviews
              WHERE reviewID = :review_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':review_id', $review_id);
	$statement->execute();
	$statement->closeCursor();
}

?>