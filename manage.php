<?php

$manage_choice = filter_input(INPUT_POST, 'manage_choice');

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


