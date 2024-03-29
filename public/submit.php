<?php
session_start();
include_once('db.php');

$no_of_questions = 25;

// checking if quiz is submitted
if (!isset($_POST['submit'])) {
	header("Location: index.php");
}

$user_answers = []; // to hold correct answers
// score counter
$score = 0;

// // fetching results of user
for ($i=1; $i <= $no_of_questions; $i++) { 
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



// putting the values in the session
$_SESSION['user_answers'] = $user_answers;

$_SESSION['score'] = $score;

$per = ($score / $no_of_questions) * 100;

$percentage = round($per, 1);

$_SESSION['percentage'] = $percentage;

$full_name = $_SESSION['full_name'] . " (" . $_SESSION['gender'] . ")";

// getting timestamp
date_default_timezone_set("Etc/GMT-0");
$end_time = date("H:i:s");

$start_time = $_SESSION['start_time'];


//$time2=date_create("23:04:0");
//$hour=date_diff($date1,$date2);
//echo (int)$hour->format("%H");

// echo $start_time;
// echo "<br />";
// echo $end_time;

// Code for getting the duration
$start = date_create($start_time);
$end = date_create($end_time);
$minute = date_diff($start, $end);
$duration = $minute->format("%i");

$duration1 = $minute->format("%s");

$range = $duration . "." . idate('s', $duration1);


// echo "<br />";
// echo $duration;

// checking if participant is a nubs ucc member
$is_nubs = (int)$_SESSION['is_nubs'];
$phone_number = $_SESSION['phone_number'];

// insert name and score into users table
$sql = "INSERT INTO users(full_name, raw_score, percentage, start_time, end_time, duration, is_nubs, phone_number) VALUES('$full_name', '$score', $percentage, '$start_time', '$end_time', '$range', $is_nubs, '$phone_number')";
$result = mysqli_query($connection, $sql);


header("Location: result.php");



?>