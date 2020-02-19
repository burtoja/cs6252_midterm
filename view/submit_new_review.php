<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
<main>
	<h2>Submit New Review</h2>

	<!-- Select Title -->
	<?php if ($action != 'title_chosen_new_review'  && $action != 'final_submit_new_review') :?>
	<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="title_chosen_new_review">
		<label>Book Title:</label>
		<select name="book_id_for_review">
        	<?php foreach ($books as $book) : ?>
                 	<option value="<?php echo $book['bookID'];; ?>">
                 		<?php echo $book['bookTitle']; ?>
             		</option>
				<?php endforeach; ?>
 		</select>
 		<br>
		<input type="submit" value="Choose Title">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>
	
	<!-- Enter Rating and Review -->
	<?php if ($action == 'title_chosen_new_review') :?>
	<h3><?php echo $title_chosen ?></h3>
	<p>Star Rating:</p>
	<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="final_submit_new_review">
		<input type="hidden" name="book_id"
			value="<?php echo $book_id_chosen?>">

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

		<label for="review_text">Review:</label>
		<br>
		<textarea id="review_text" rows="8" cols="50" name="review_text"></textarea>
		<br>

		<input type="submit" value="Submit Review">
		<label>&nbsp;</label>
	</form>
	<?php endif; ?>
	
	<!-- Report After Submit New Review to DB -->
	<?php if ($action == 'final_submit_new_review') :?>
	<h3>Success! Your review has been successfully submitted. Thank you.</h3>
	<h3>Here is your review for <?php echo get_book_info($book_id)['bookTitle']?>:</h3>
	<p class="review"><?php echo $review; ?></p>
	<p>
		<span class="rating">User Rating: <?php echo $rating; ?> STARS</span>
		<br>
	</p>
	<?php endif; ?>


</main>
<?php include './view/footer.php'; ?>