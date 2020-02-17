<?php
function get_new_userID() {
	global $db;
	$query = 'INSERT INTO userids VALUES (NULL)';
	$statement = $db->prepare($query);
	$statement->execute();
	$statement->closeCursor();
	
	$query = 'SELECT MAX(userID) AS new_id FROM userids';
	$statement = $db->prepare($query);
	$statement->execute();
	$new_id = $statement->fetch(PDO::FETCH_ASSOC);
	return $new_id['new_id'];
}
