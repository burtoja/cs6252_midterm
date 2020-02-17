<?php
require ('./model/database.php');
require ('./model/books_db.php');
require ('./model/reviews_db.php');

$action = filter_input(INPUT_POST, 'action');
$manage_choice = filter_input(INPUT_POST, 'manage_choice');

switch($action) {
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
	case 'title_chosen_new_review' :
		include('./view/submit_new_review.php');
		break;
	case 'final_submit_new_review' :
		$book_id = filter_input(INPUT_POST, 'book_id');
		$rating = filter_input(INPUT_POST, 'rating');
		$review = filter_input(INPUT_POST, 'review_text');
		if ($book_id == NULL) {
			$error = "Invalid review form data. Check all fields and try again.";
			include('../errors/error.php');
		} else {
			add_review($book_id, $rating, $review);		
			include('./view/submit_new_review.php');
		}
		break;
	case 'title_chosen_edit_review' :
		include('./view/edit_existing_review.php');
		break;
	case 'review_chosen_edit_review' :
		include('./view/edit_existing_review.php');
		break;

	default :
		include('./view/manage_reviews_choices.php');
		break;
}
