<?php

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
	case 'title_chosen' :
		include('./view/submit_new_review.php');
		break;
	default :
		include('./view/manage_reviews_choices.php');
		break;
}



