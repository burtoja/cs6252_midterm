<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
<?php include './view/star_generator.php'; ?>

<main>

	<h2>Read Book Reviews</h2>
	<p>Choose a book below to read the reviews posted about it:</p>

	<ul>
		<?php foreach ($books as $book) :?>
 			<?php $book_id = $book['bookID'];?>
			<li class="book_title_link">
				<h2>
					<a href="./reviews.php?bookID=<?php echo $book_id; ?>">
						<?php echo $book['bookTitle']; ?> 
					</a>
				</h2>
				<?php $rating = get_average_rating_for_book($book_id); ?>
				<span class="stars"><?php echo star_rating($rating)?></span>
				<?php if ($rating == 0.0) :?>
					<span class="average_rating">(No reviews yet for this book)</span>
				<?php else :?>
					<span class="average_rating">(Average Rating: <?php echo $rating; ?> stars)</span>
				<?php endif;?>
			</li>
			<?php if (!empty($_GET) && $_GET['bookID'] == $book['bookID']) : ?>
			<ul class="book_info">
				<li>Author: <?php echo $book['authorFirstName'] . ' ' . $book['authorLastName']; ?></li>
				<li>(<?php echo $book['numPages']?> pgs.)</li>
			</ul>			
			<?php endif;?>				
			
			<?php if (!empty($_GET) && $_GET['bookID'] == $book['bookID']) : ?>
			<ul class="book_info">
				<?php $reviews = get_reviews_by_book($book_id);?>
				<?php if(count($reviews) == 0) : ?>
					<li>
						There are no reviews for this title.
					</li>
					<?php else: ?>					
						<?php foreach ($reviews as $review) :?>
						<li>
							<h3>REVIEW:</h3>
							<span class="rating">User Rating: <?php echo $review['rating']; ?> STARS</span>
							<span class="stars"><?php echo star_rating($review['rating'])?></span><br>
							<span class="review"><?php echo $review['review']; ?></span><br>
							<span class="review_date">(Posted on <?php echo $review['reviewDate']; ?>)</span>	
						</li>
						<?php endforeach; ?>
					<?php endif;?>
				</ul>
				<?php endif;?>

			</li>
		<?php endforeach; ?>
	</ul>

</main>
<?php include './view/footer.php'; ?>