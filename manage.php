<?php
require ('./model/database.php');
require ('./model/books_db.php');
require ('./model/reviews_db.php');
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

$action = filter_input(INPUT_POST, 'action');
$manage_choice = filter_input(INPUT_POST, 'manage_choice');
$books = get_books ();

switch($action) {
	//CHOOSE WHAT TO DO
	case 'choose_manage_option' :
			switch($manage_choice) {
				case 'Add New':					
					include('./view/submit_new_review.php');
					break;
				case 'Edit Existing':
					include('./view/edit_existing_review.php');
					break;
				case 'Delete Existing':
					include('./view/delete_existing_review.php');
					break;
				default:
					include('./view/manage_reviews_choices.php');
					break;
			}
			break;
			
	//NEW REVIEW CASES
	case 'title_chosen_new_review' :
		$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
		$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
		include('./view/submit_new_review.php');
		break;
	case 'final_submit_new_review' :
		$book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT );
		$rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT );
		$review = filter_input(INPUT_POST, 'review_text');
		if ($book_id == NULL || $rating == NULL || $review == NULL) {
			$error_message = "Invalid review form data. Check all fields and try again.";
			include('./errors/database_error.php');
		} else {
			add_review($book_id, $rating, $review, $user_id);		
			include('./view/submit_new_review.php');
		}
		break;
		
	//EDIT REVIEW CASES
	case 'title_chosen_edit_review' :
		$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
		$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
		$reviews = get_reviews_by_book ( $book_id_chosen );
		include('./view/edit_existing_review.php');
		break;
	case 'review_chosen_edit_review' :
		$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
		$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
		$review_id_chosen = filter_input ( INPUT_POST, 'review_choice', FILTER_VALIDATE_INT );
		$review_info = get_review_info_by_id ( $review_id_chosen );
		$current_rating = $review_info['rating'];
		include('./view/edit_existing_review.php');
		break;
	case 'final_submit_edit_review' :
		$book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT );
		$review_id = filter_input(INPUT_POST, 'review_id', FILTER_VALIDATE_INT );
		$rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT );
		$review = filter_input(INPUT_POST, 'review_text');
		if ($book_id == NULL || $review_id == NULL || $rating == NULL || $review == NULL) {
			$error_message = "Invalid review form data. Check all fields and try again.";
			include('./errors/database_error.php');
		} else {
			edit_review($review_id, $rating, $review);
			include('./view/edit_existing_review.php');
		}
		break;
		
	//DELETE REVIEW CASES
	case 'title_chosen_delete_review' :
		$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
		$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
		$reviews = get_reviews_by_book ( $book_id_chosen );
		include('./view/delete_existing_review.php');
		break;
	case 'review_chosen_delete_review' :
		$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
		$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
		$review_id_chosen = filter_input ( INPUT_POST, 'review_choice', FILTER_VALIDATE_INT );
		$review_info = get_review_info_by_id ( $review_id_chosen );
		include('./view/delete_existing_review.php');
		break;
	case 'final_submit_delete_review' :
		$review_id = filter_input(INPUT_POST, 'review_id', FILTER_VALIDATE_INT );
		if ($review_id == NULL) {
			$error_message = "Invalid form data. Please try again";
			include('./errors/database_error.php');
		} else {
			delete_review($review_id);
			include('./view/delete_existing_review.php');
		}		
		break;
	//ALL ELSE DEFAULTS BACK TO THE CHOOSE YOUR TASK VIEW
	default :
		include('./view/manage_reviews_choices.php');
		break;
}
