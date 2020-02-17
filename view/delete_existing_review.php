<?php
$books = get_books ();

$action = filter_input ( INPUT_POST, 'action' );
if ($action == 'title_chosen_delete_review') {
	$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
	$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
	$reviews = get_reviews_by_book ( $book_id_chosen );
} else if ($action == 'review_chosen_delete_review') {
	$book_id_chosen = filter_input ( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
	$title_chosen = get_book_info ( $book_id_chosen ) ['bookTitle'];
	$review_id_chosen = filter_input ( INPUT_POST, 'review_choice', FILTER_VALIDATE_INT );
	$review_info = get_review_info_by_id ( $review_id_chosen );
}

?>

<?php include './view/header.php'; ?>
<main>
	<h2>Delete Existing Review</h2>

	<!-- Select Title -->
	<?php if ($action != 'title_chosen_delete_review' && $action != 'review_chosen_delete_review' && $action != 'final_submit_delete_review') :?>
		<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="title_chosen_delete_review">
		<label>Book Title:</label>
		<select name="book_id_for_review">
	        	<?php foreach ($books as $book) : ?>
	                 	<option value="<?php echo $book['bookID'];; ?>">
	                 		<?php echo $book['bookTitle']; ?>
	             		</option>
					<?php endforeach; ?>
	 		</select>
		<input type="submit" value="Choose Title">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>
	
	<!-- Select Review to Delete -->
	<?php if ($action == 'title_chosen_delete_review') :?>
		<h3><?php echo $title_chosen ?></h3>
	<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="review_chosen_delete_review">
		<input type="hidden" name="book_id_for_review"
			value="<?php echo $book_id_chosen; ?>">
			<?php foreach ($reviews as $review) :?>
				<br>
		<input type="radio" id="<?php echo $review['reviewID']?>"
			name="review_choice" value="<?php echo $review['reviewID']?>">
		<label for="<?php echo $review['reviewID']?>">
					<?php echo $review['review']?>
				</label>
		<br>
			<?php endforeach;?>
	
			<input type="submit" value="Delete Review">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>
	
	<!-- Confirm Delete for the Review -->
	<?php if ($action == 'review_chosen_delete_review') :?>
	<p>Press the button below after verifying that this is the review you
		wish to permanently delete:</p>
	<h3><?php echo $title_chosen ?></h3>
	<p>Review to delete:</p>
	<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="final_submit_delete_review">
		<input type="hidden" name="review_id"
			value="<?php echo $review_id_chosen?>">
		<p class="review"><?php echo $review_info['review']; ?></p>
		<br>

		<input type="submit" value="Delete Review">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>
	
	<!--Report After Deleting Review From  DB-->
	<?php if ($action == 'final_submit_delete_review') :?>
	<h3>Success! Your review has been successfully deleted. Thank you.</h3>
	<?php endif; ?>


</main>
<?php include './view/footer.php'; ?>