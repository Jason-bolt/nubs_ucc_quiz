<!DOCTYPE html>
<html>
<head>
	
	<title>Admin</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

	<?php include_once('db.php'); ?>

<section class="container py-1 text-center">
	<h4><img src="nubs_logo.png" width="60">NUBS UCC - <span style="font-size: 20px;">BIBLE QUIZ</span></h4>
	<h6><u>ACTS CHAPTER 19</u></h6>
</section>

<section class="container text-center">
	<h3>Admin</h3>
</section>

<?php
	if (isset($_POST['submit']) && $_POST['password'] === "Administrators Only") {
		// password correct, admin logged in so display users and scores

		$query = "SELECT * FROM users WHERE is_nubs = 1 ORDER BY percentage DESC, duration ASC, start_time ASC";
		$results = mysqli_query($connection, $query);

		$query1 = "SELECT * FROM users WHERE is_nubs = 0 ORDER BY duration ASC";
		$results1 = mysqli_query($connection, $query1);
?>
	<section class="container">
		<h6>In order of highest score</h6>
		<table class="text-center table table-bordered">
		    <thead>
		      <tr>
			      <th class="text-center">Full name</th>
			      <th class="text-center">Score</th>
			      <th class="text-center">Percentage</th>
			      <th class="text-center">Start time</th>
			      <th class="text-center">End time</th>
			      <th class="text-center">Duration</th>
		      </tr>
		    </thead>
		  <tbody>
		  
		<?php
		  // perform query to get users and their scores
		    while($result = mysqli_fetch_assoc($results))
		  {

		  	// $startArray = explode(':', $result['start_time']);
		  	// $start1 = (int)$startArray[0];
		  	// $start2 = (int)$startArray[1];

		  	// $start = $start1 + $start2;

		  	// $end = explode(':', $result['end_time'])[0];
		  	// $end = (int)explode('(', $end)[1];

		  	// $duration = (int)$result['start_time'] - (int)$result['end_time'];
		?>
		    <tr>
			    <td ><?php echo $result['full_name']; ?></td>
			    <td ><?php echo $result['raw_score']; ?></td>
			    <td ><?php echo $result['percentage'] . '%'; ?></td>
			    <td ><?php echo $result['start_time']; ?></td>
			    <td ><?php echo $result['end_time']; ?></td>
			    <td ><?php echo $result['duration'] . " minutes"; ?></td>
		    </tr>
		    <?php
		  }
		    ?>
		  </tbody>
	  </table>
	</section>

	<br />

	<section class="container">
		<h6>In order of highest score (Non members)</h6>
		<table class="text-center table table-bordered">
		    <thead>
		      <tr>
			      <th class="text-center">Full name</th>
			      <th class="text-center">Score</th>
			      <th class="text-center">Percentage</th>
			      <th class="text-center">Start time</th>
			      <th class="text-center">End time</th>
			      <th class="text-center">Phone number</th>
		      </tr>
		    </thead>
		  <tbody>
		  
		  <?php
		  // perform query to get users and their scores
		    while($result1 = mysqli_fetch_assoc($results1))
		  {
		    ?>
		    <tr>
			    <td ><?php echo $result1['full_name']; ?></td>
			    <td ><?php echo $result1['raw_score']; ?></td>
			    <td ><?php echo $result1['percentage'] . '%'; ?></td>
			    <td ><?php echo $result1['start_time']; ?></td>
			    <td ><?php echo $result1['end_time']; ?></td>
			    <td ><?php echo $result1['phone_number']; ?></td>
		    </tr>
		    <?php
		  }
		    ?>
		  </tbody>
	  </table>
	</section>

<?php
	}else{
		// if not submitted or password is wrong show form
?>
	<section class="container">
		<div class="card px-3 py-3 text-center">
			<form action="admin.php" method="POST">
				<input type="password" name="password" placeholder="password...">
				&nbsp;
				<button type="submit" name="submit">Login</button>
			</form>
		</div>
	</section>
<?php
	}
?>

<br />

<section class="container">
	<a href="admin.php" class="btn btn-primary">Back</a>
</section>

</body>
</html>