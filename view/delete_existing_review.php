<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
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
 		<br>
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