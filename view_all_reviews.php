<?php
require('./model/database.php');
require('./model/books_db.php');
require('./model/reviews_db.php');

$books = get_books();
include('./view/display_book_reviews.php');
