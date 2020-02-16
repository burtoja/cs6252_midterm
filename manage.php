<?php

$manage_choice = filter_input(INPUT_POST, 'manage_choice');

switch($manage_choice) {
	case 'Add New':

		break;
	case 'Edit Existing':

		break;
	case 'Delete Existing':

		break;
	default:
		include('./view/manage_reviews_choices.php');
		break;
}


