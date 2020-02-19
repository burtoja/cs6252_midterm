<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>

<main>
	<p>Choose a book below to read the reviews posted about it:</p>

	<ul>
 		<?php foreach ($books as $book) :?>
 			<?php $book_id = $book['bookID'];?>
			<li>
				<h2>
					<a href="./reviews.php?bookID=<?php echo $book_id; ?>">
						<?php echo $book['bookTitle']; ?> 
					</a>
				</h2>
				<?php if (!empty($_GET) && $_GET['bookID'] == $book['bookID']) : ?>
					by: <?php echo $book['authorFirstName'] . ' ' . $book['authorLastName']; ?>
					(<?php echo $book['numPages']?> pgs.)			
				<?php endif;?>				
				
			
				<?php if (!empty($_GET) && $_GET['bookID'] == $book['bookID']) : ?>
					<ul>
						<?php $reviews = get_reviews_by_book($book_id);?>
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
					<?php endif;?>
					
					
					
					
				
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

</main>
<?php include './view/footer.php'; ?>