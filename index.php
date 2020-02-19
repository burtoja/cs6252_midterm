<?php
require('./model/database.php');
require('./model/books_db.php');
require('./model/reviews_db.php');
require('./model/userids_db.php');

//Get userID from cookie or create a new one and set it in a cookie
if(isset($_COOKIE["userid"])) {
	$user_id = filter_input(INPUT_COOKIE, 'userid', FILTER_VALIDATE_INT);
} else {
	$name = 'userid';
	$value = (int)get_new_userID();
	$expire = strtotime('+1 year');
	$path = '/';
	setcookie($name, $value, $expire, $path);
	$user_id = $value;
}

	//Get reviews by user
	$reviews_raw = get_review_info_by_user($user_id);
	$books = get_books();
	
	$reviewNumber = 0;
	$selectedBookID[0] = 0;
	$selectedBookID[1] = 0;
	$selectedBookID[2] = 0;
	foreach ( $reviews_raw as $review ){
		if ($reviewNumber < 3 
				&& $review['bookID'] != $selectedBookID[0]
				&& $review['bookID'] != $selectedBookID[1]
				&& $review['bookID'] != $selectedBookID[2]) {
			$reviews[$reviewNumber] = $review;
			$selectedBookID[$reviewNumber] = $review ['bookID'];
			$reviewNumber++;
		}
	}
	
include './view/user_home.php'; 

?>