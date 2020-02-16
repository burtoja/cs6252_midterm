<?php
require ('./model/database.php');
require ('./model/books_db.php');
require ('./model/reviews_db.php');

$books = get_books ();

$action = filter_input ( INPUT_POST, 'action' );
if ($action == 'title_chosen') {
	$title_chosen = filter_input ( INPUT_POST, 'book_title_for_review' );
}

?>

<?php include './view/header.php'; ?>
<main>
	<h2>Submit New Review</h2>

	<!-- Select Title -->
	<?php if ($action != 'title_chosen') :?>
		<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="title_chosen">
		<label>List:</label>
		<select name="book_title_for_review">
		        	<?php foreach ($books as $book) : ?>
		        		<?php $title = $book['bookTitle']; ?>
		                 	<option value="<?php echo $title; ?>">
		                 	<?php echo $title; ?>
		             		</option>
					<?php endforeach; ?>
		 		</select>
		<input type="submit" value="Choose Title">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>
	
	<!-- Enter Rating and Review -->
	<?php if ($action == 'title_chosen') :?>
	<h3><?php echo $title_chosen ?></h3>
	<p>Star Rating:</p>
	<form action="submit_new_review.php" method="post">
		<input type="hidden" name="action" value="final_submit_new_review">
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
		
		<label for="review_text">Review:</label><br>
		<textarea id="review_text" rows="8" cols="50"></textarea>
		<br>
		<input type="submit" value="Submit Review">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>

</main>
<?php include './view/footer.php'; ?>