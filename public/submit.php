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
	// putting the valuse in the session
	$_SESSION['user_answers'] = $user_answers;
	
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

$_SESSION['score'] = $score;


$full_name = $_SESSION['fullname'];


// insert name and score into users table
$sql = "INSERT INTO users(full_name, score) VALUES('$full_name', $score)";
mysqli_query($connection, $sql);

header("Location: result.php");



?>