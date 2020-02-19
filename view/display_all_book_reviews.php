<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
<main>

	<ul>
 		<?php foreach ($books as $book) :
 			$book_id = $book['bookID'];
 			$reviews = get_reviews_by_book($book_id);
 			?>
			<li>
				<h2>
					<?php echo $book['bookTitle']; ?> 
					by: <?php echo $book['authorFirstName'] . ' ' . $book['authorLastName']; ?>
					(<?php echo $book['numPages']?> pgs.)
				</h2>
			</li>
			<ul>
				<?php if(count($reviews) == 0) : ?>
					<li>
						There are no reviews for this title.
					</li>
				<?php else: ?>
				
					<?php foreach ($reviews as $review) :?>
					<li>
						<h3>REVIEW:</h3>
						<p class="review">
							<?php echo $review['review']; ?>
						</p>
						<p>
							<span class="rating">User Rating: <?php echo $review['rating']; ?> STARS</span><br>
							<span class="review_date">(Posted on <?php echo $review['reviewDate']; ?>)</span>
						</p>
					</li>
					<?php endforeach; ?>
				<?php endif;?>
			</ul>
		<?php endforeach; ?>
	</ul>

</main>
<?php include './view/footer.php'; ?>