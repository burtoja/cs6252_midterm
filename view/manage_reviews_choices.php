<?php include './view/header.php'; ?>
<?php include './view/nav_menu.php'; ?>
<main>
	<h2>Manage Book Reviews</h2>

	<p>Select an option below:</p>
	<form action="./manage.php" method="post">
		<input type="hidden" name="action" value="choose_manage_option">
		<input type="radio" id="new" name="manage_choice" value="Add New">
			<label for="new">Submit a new review</label><br>
		<input type="radio" id="edit" name="manage_choice" value="Edit Existing">
			<label for="new">Edit an existing review</label><br>
		<input type="radio" id="delete" name="manage_choice" value="Delete Existing">
			<label for="new">Delete an existing review</label><br>
			<br>
		<input type="submit" value="Choose Option">
			<label>&nbsp;</label>
	</form>
</main>
<?php include './view/footer.php'; ?>