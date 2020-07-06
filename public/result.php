<?php session_start(); 
	include('header.php');
	// including the database
	include_once('db.php');
?>
<?php
		// getting user's input array from session;
		$user_answers = $_SESSION['user_answers'];
		$score = $_SESSION['score'];
		$percentage = $_SESSION['percentage'];

		// questions query
		$query = "SELECT * FROM questions";
		$questions = mysqli_query($connection, $query);

	?>

<section class="container">
	
	<div class="card">
		<div class="card-header">
			<h3>Results</h3>
		</div>
		<div class="card-body">


			<!-- displaying score -->
			<h6 class="text-center">Score: <?php echo $score . " (" . $percentage . "%)"; ?></h6>
			
			<?php
			$count = 0;
				while ($question = mysqli_fetch_assoc($questions)) {
					// getting the answers from database
					$id = $question['id'];
					$query = "SELECT * FROM answers WHERE id={$id} LIMIT 1";
					$results = mysqli_query($connection, $query);
					if ($answer = mysqli_fetch_assoc($results)) {
			?>
			<div class="card">
				<!-- question -->
				<div class="card-header">
					Q.<?php echo ++$count; ?>. <?php echo $question['question']; ?>
				</div>	
				<!-- possible answers -->
				<div class="container">


<!--*************** The A option is correct *******************-->
					<?php
						if ($answer['answer'] == 'A') {
					?>
						<div class="radio">
							<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
						</div>

					<?php
						 // turning option B to red
						if ($user_answers[$id] == 'B') {
					?>
						<div class="radio">
							<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
						</div>
					<?php
						// turning option C to red
						}elseif ($user_answers[$id] == 'C'){
					?>
						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
						</div>
					<?php
						// turning option D to red
						}elseif ($user_answers[$id] == 'D'){
					?>
						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>

						<div class="radio">
							<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
						</div>
					<?php			
						// if answer is correct leave as is			
						}else{
					?>
						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
						</div>
					<?php
						}
					?>




<!--******************** The B option is correct ********************-->

					<?php
						}elseif ($answer['answer'] == 'B') {
					?>

						<?php
						 // turning option A to red
							if ($user_answers[$id] == 'A') {
						?>
							<div class="radio">
								<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
						// turning option C to red
							}elseif($user_answers[$id] == 'C'){
						?>
							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
						// turning option D to red
							}elseif($user_answers[$id] == 'D'){
						?>
							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
						// if answer is correct leave as is
							}else{
						?>
							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
							}
						?>

					




<!--******************** The C option is correct ********************-->

					<?php
						}elseif ($answer['answer'] == 'C') {
					?>

						<?php
						 // turning option A to red
							if ($user_answers[$id] == 'A') {
						?>
							<div class="radio">
								<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
						// turning option B to red
							}elseif($user_answers[$id] == 'B'){
						?>
							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
						// turning option D to red
							}elseif($user_answers[$id] == 'D'){
						?>
							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
						// if answer is correct leave as is
							}else{
						?>
							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
							</div>

							<div class="radio">
								<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
							</div>

							<div class="radio">
								<label><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
							</div>
						<?php
							}
						?>




<!--******************** The D option is correct ********************-->
					<?php
						}else{
							// turning option A to red
							if ($user_answers[$id] == 'A') {
					?>
						<div class="radio">
							<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>
					<?php
					// turning option B to red
							}elseif($user_answers[$id] == 'B'){
					?>
						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
						</div>

						<div class="radio">
							<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>
					<?php
					// turning option C to red
							}elseif($user_answers[$id] == 'C'){
					?>
						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label style="color: red;"><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>
					<?php
							}else{
								// if answer is correct leave as is
					?>
						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
						</div>

						<div class="radio">
							<label><input type="radio" disabled name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
						</div>
					<?php
							}
					?>
					
						<div class="radio">
							<label style="color: green;"><input type="radio" disabled name="question<?php echo $count; ?>" value="D"> D. <?php echo $question['option4']; ?></label>
						</div>

					<?php
							}
						}
					?>
					
				</div>
			</div>

			<br />
		<?php
			}
		?>

		</div>


	</div>

	<br />

	<a href="index.php" class="btn btn-primary">Done</a>

</section>

<br />

<footer class="text-center" style="font-family: Courier New; background-color: #ebebeb; padding: 10px; color: #999;">
	<cite>&copy;NUBS UCC DEVELOPERS</cite>
</footer>

</body>
</html>
