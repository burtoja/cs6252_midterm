<?php
function star_rating($rating) {
	$rounded_rating = round ( $rating * 2 ) / 2;
	if ($rounded_rating <= 0.5 && $rounded_rating > 0) {
		return '<i class="fas fa-star-half-alt"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 1 && $rounded_rating > 0.5) {
		return '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 1.5 && $rounded_rating > 1) {
		return '<i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 2 && $rounded_rating > 1.5) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 2.5 && $rounded_rating > 2) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 3 && $rounded_rating > 2.5) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 3.5 && $rounded_rating > 3) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 4 && $rounded_rating > 3.5) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
	} else if ($rounded_rating <= 4.5 && $rounded_rating > 4) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i>';
	} else if ($rounded_rating <= 5 && $rounded_rating > 4.5) {
		return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
	}
}
?>