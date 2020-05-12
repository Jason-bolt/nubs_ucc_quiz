<?php

	include_once('db.php');

	$full_name = "Ju";

// checking to see if user exists
$checkquery = "SELECT * FROM users WHERE full_name = '$full_name' LIMIT 1";
$check = mysqli_query($connection, $checkquery);

if (mysqli_num_rows($check) > 0) {
	echo $full_name;
	$full_name = $full_name . "/";
	echo $full_name;
}

echo $full_name;

?>