<?php
require ('./model/database.php');
require ('./model/books_db.php');
require ('./model/reviews_db.php');

$action = filter_input(INPUT_POST, 'action');
$manage_choice = filter_input(INPUT_POST, 'manage_choice');

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
			add_review($book_id, $rating, $review);		
			include('./view/submit_new_review.php');
		}
		break;
		
	//EDIT REVIEW CASES
	case 'title_chosen_edit_review' :
		include('./view/edit_existing_review.php');
		break;
	case 'review_chosen_edit_review' :
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
		include('./view/delete_existing_review.php');
		break;
	case 'review_chosen_delete_review' :		
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
