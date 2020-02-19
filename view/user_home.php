<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php' ?>
<main>

	<h2>Welcome to Bippity Boppity Book Reviews</h2>
	<p>This is your hub for the best bogus book reviews on the web.  
		Below you will find the titles youhave most recently reviewed (up to 3).
		Feel free to navigate the site to read other reviews, add more
		reviews, edit your previous reviews, or delete your previous reviews.</p>
	<ul>
		<?php if(count($reviews) == 0) : ?>
			<li>You have no reviews on record within the last year.</li>
		<?php else: ?>
	 		<?php foreach ( $reviews as $review ) :
				$book_id = $review ['bookID'];
				$book_info = get_book_info ( $book_id );
			?>
			<li>	
				<h2>	
					<?php echo $book_info['bookTitle']; ?> 
					by: <?php echo $book_info['authorFirstName'] . ' ' . $book_info['authorLastName']; ?>
					(<?php echo $book_info['numPages']; ?> pgs.)		
				</h2>			
			</li>		
			<li>		
				<h3>REVIEW:</h3>
				<p class="review">
					<?php echo $review['review']; ?>
				</p>
				<p>
					<span class="rating">User Rating: <?php echo $review['rating']; ?> STARS</span>
					<br>
					<span class="review_date">(Posted on <?php echo $review['reviewDate']; ?>)</span>
				</p>
			</li>
			<?php endforeach; ?>			
		<?php endif;?>				
	</ul>		
</main>		
<?php include 'footer.php'; ?>			
		
		


