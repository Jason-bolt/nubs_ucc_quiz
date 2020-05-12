<?php
session_start();
include_once('db.php');

// checking if quiz is submitted
if (!isset($_POST['submit'])) {
	header("Location: index.php");
}

$user_answers = []; // to hold correct answers
// score counter
$score = 0;

// fetcing results of user
for ($i=1; $i <= 33; $i++) { 
	$index = "question" . $i;
	${"question" . $i} = $_POST[$index];

	// keeping user answers
	$user_answers[$i] = $_POST[$index];
	
	// now compare answer result with database answers
	$query = "SELECT * from answers WHERE id = {$i} LIMIT 1";
	$results = mysqli_query($connection, $query);

	
	while ($result = mysqli_fetch_assoc($results)) {
		if ($_POST[$index] == $result['answer']) {
			// result is correct i.e right answer
			$score++; // increment by 1
		}
	}
}

// putting the valuse in the session
$_SESSION['user_answers'] = $user_answers;

$_SESSION['score'] = $score;

$percentage = round((($score / 39) * 100), 1);

$_SESSION['percentage'] = $percentage;

$full_name = $_SESSION['full_name'];

// checking the number of attempts
$checkQuery = "SELECT * FROM users_2 WHERE full_name LIKE '$full_name%'";
$check = mysqli_query($connection, $checkQuery);
if (mysqli_num_rows($check) > 0) {
	foreach ($check as $num) {
		$full_name = $full_name . "/";
	}
}


// insert name and score into users table
$sql = "INSERT INTO users_2(full_name, raw_score, percentage) VALUES('$full_name', $score, $percentage)";
mysqli_query($connection, $sql);

header("Location: result.php");



?>