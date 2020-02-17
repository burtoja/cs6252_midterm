<?php
require('../model/database.php');
require('../model/books_db.php');
require('../model/reviews_db.php');
require('../model/userids_db.php');

//Get userID from cookie or create a new one and set it in a cookie
if(isset($_COOKIE["userid"])) {
	$user_id = filter_input(INPUT_COOKIE, 'userid', FILTER_VALIDATE_INT);
} else {
	$name = 'userid';
	$value = (int)get_new_userID();
	$expire = strtotime('+1 year');
	$path = '/';
	setcookie($name, $value, $expire, $path);
	$user_id = $value;
}

	//Get reviews by user
	$reviews = get_review_info_by_user($user_id);
	$books = get_books();



?>

<?php include 'header.php'; ?>
<main>

	<ul>
		<?php if(count($reviews) == 0) : ?>
			<li>You have no reviews on record within the last year.</li>
		<?php else: ?>
	 		<?php foreach ($reviews as $review) :
		 		$book_id = $review['bookID'];
		 		$book_info = get_book_info($book_id);
		 		$title = $book_info['bookTitle'];
		 		$author = $book_info['authorFirstName'] . ' ' . $book_info['authorLastName'];
		 		$num_pages = $book_info['numPages']			
	 			?>
				<li>
					<h2>
						<?php echo $title; ?> 
						by: <?php echo $author; ?>
						(<?php echo $num_pages?> pgs.)
					</h2>
				</li>
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

</main>
<?php include 'footer.php'; ?>