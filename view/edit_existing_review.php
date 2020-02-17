<?php
$books = get_books ();

$action = filter_input ( INPUT_POST, 'action' );
if ($action == 'title_chosen_edit_review') {
	$book_id_chosen = filter_input( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
	$title_chosen = get_book_info($book_id_chosen)['bookTitle'];
	$reviews = get_reviews_by_book($book_id_chosen);
} else if ($action == 'review_chosen_edit_review') {
	$book_id_chosen = filter_input( INPUT_POST, 'book_id_for_review', FILTER_VALIDATE_INT );
	$title_chosen = get_book_info($book_id_chosen )['bookTitle'];
	$review_id_chosen = filter_input( INPUT_POST, 'review_choice', FILTER_VALIDATE_INT );
	$review_info = get_review_info_by_id($review_id_chosen);
}

?>

<?php include './view/header.php'; ?>
<main>
	<h2>Edit Existing Review</h2>
	
	<!-- Select Title -->
	<?php if ($action != 'title_chosen_edit_review' && $action != 'review_chosen_edit_review') :?>
		<form action="./manage.php" method="post">
			<input type="hidden" name="action" value="title_chosen_edit_review">
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
	
	<!-- Select Review to Edit -->
	<?php if ($action == 'title_chosen_edit_review') :?>
		<h3><?php echo $title_chosen ?></h3>
		<form action="./manage.php" method="post">
			<input type="hidden" name="action" value="review_chosen_edit_review">
			<input type="hidden" name="book_id_for_review" value="<?php echo $book_id_chosen; ?>">
			<?php foreach ($reviews as $review) :?>
				<br>
				<input type="radio" id="<?php echo $review['reviewID']?>" name="review_choice" value="<?php echo $review['reviewID']?>">
				<label for="<?php echo $review['reviewID']?>">
					<?php echo $review['review']?>
				</label>
				<br>
			<?php endforeach;?>
	
			<input type="submit" value="Edit Review">
			<label>&nbsp;</label>
		</form>
	<?php endif; ?>
	
	<!-- Edit the Review -->
	<?php if ($action == 'review_chosen_edit_review') :?>
		<h3><?php echo $title_chosen ?></h3>
		<form action="./manage.php" method="post">
			<input type="hidden" name="action" value="finsl_submit_edit_review">
			
			<input type="radio" id="1-star" name="rating" value="1">
			<label for="1-star">1 Star</label>
			<br>
			<input type="radio" id="2-star" name="rating" value="2">
			<label for="2-star">2 Stars</label>
			<br>
			<input type="radio" id="3-star" name="rating" value="3">
			<label for="3-star">3 Stars</label>
			<br>
			<input type="radio" id="4-star" name="rating" value="4">
			<label for="4-star">4 Stars</label>
			<br>
			<input type="radio" id="5-star" name="rating" value="5">
			<label for="5-star">5 Stars</label>
			<br>
			<br>
			
			<label for="review_text">Review:</label>
			<br>
			<textarea id="review_text" rows="8" cols="50"><?php echo trim($review_info['review']) ?></textarea>
			<br>
	
			<input type="submit" value="Edit Review">
			<label>&nbsp;</label>
		</form>
	<?php endif; ?>








</main>
<?php include './view/footer.php'; ?>