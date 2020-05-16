<?php session_start();
	header("Location: soon.php");
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Quiz</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php 
	include_once('db.php'); 
	
	$query = "SELECT * FROM questions";
	$questions = mysqli_query($connection, $query);
?>


<section class="container py-1 text-center">
	<h4><img src="nubs_logo.png" width="60">NUBS UCC - <span style="font-size: 20px;">BIBLE QUIZ</span></h4>
	<p style="color: red; font-size: 16px;">The quiz ends at 10pm</p>
	<h6><u>PROVERBS CHAPTER 15</u></h6>
</section>

<!-- name not inputted so display form -->
<?php
	if (!isset($_POST['submit'])) {
		// display name form

?>
	<section class="container text-center">
		<div class="card">
			<div class="card-header">
				Full Name
			</div>
			<div class="card-body">
				<form action="index.php" method="POST">
					<input required type="text" name="full_name" placeholder="John Doe">

					<br />
						<label><input required type="radio" name="gender" value="M"> Male</label>
					

						<label><input type="radio" name="gender" value="F"> Female</label>
					
					<br />
					<button type="submit" name="submit" class="btn btn-primary">Start quiz</button>
				</form>	
			</div>
		</div>
	</section>

	<br />

<?php
	}else{
		// name and gender is inputted, so show quiz
		$_SESSION['full_name'] = $_POST['full_name'];
		$_SESSION['gender'] = $_POST['gender'];
?>
	<section class="container">
	
	<form action="submit.php" method="POST">
		<?php
			$count = 0;
			while ($question = mysqli_fetch_assoc($questions)) {
		?>
			<div class="card">
				<!-- question -->
				<div class="card-header">
					Q.<?php echo ++$count; ?>. <?php echo $question['question']; ?>
				</div>	
				<!-- answers -->
				<div class="container">
					<div class="radio">
						<label><input required type="radio" name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option1']; ?></label>
					</div>
					<div class="radio">
						<label><input type="radio" name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option2']; ?></label>
					</div>
					<div class="radio">
						<label><input type="radio" name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option3']; ?></label>
					</div>
				</div>
			</div>

			<br />
		<?php
			}
		?>

			<button type="submit" name="submit" class="btn btn-primary">Submit</button>

		</form>

	<br />

	</section>

<?php
	}
?>


<footer class="text-center" style="font-family: Courier New; background-color: #ebebeb; padding: 10px; color: #999;">
	<cite>&copy;NUBS UCC DEVELOPERS</cite>
</footer>

</body>
</html>


<!-- 

CHAPTER 15

1. What will turn away wrath?
(A) a good answer
(B) soft answer
(C) an honest answer

2. How does the tongue of the wise use knowledge?
(A) with good report
(B) in abundance
(C) rightly

3. Where does the eyes of the Lord watch evil and good?
(A) every place
(B) in secret places
(C) above

4. What is a wholesome tongue?
(A) tongues of life
(B) fountain of life
(C) tree of life

5. Who is prudent?
(A) he who receives correction
(B) a person of knowledge
(C) a faithful witness

6. There is much of what in the house of the righteous?
(A) treasure
(B) encouragement
(C) wise men

7. What disperses knowledge?
(A) joining NUBS what's up page
(B) fountain of knowledge
(C) lips of the wise

8. Whose prayer is God`s delight?
(A) man of good countenance
(B) the well informed
(C) the upright

9. Whom does God love?
(A) follower of righteousness
(B) a witness
(C) good listener


10. What is due him who forsakes the way?
(A) death
(B) discipline
(C) bitterness

11. Whom does a scoffer NOT love?
(A) words of encouragement
(B) one who corrects him
(C) the upright

12. What does a merry heart makes?
(A) feast
(B) great gains
(C) cheerful countenance

13. What does the heart of understanding seek?
(A) discernment
(B) knowledge
(A) mercy and love

14. Who has a continual feast?
(A) he who is of a merry heart
(B) kings with great riches
(C) ones from above

15. Having a little can be better if it is with what?
(C) happy ones
(B) simple
(C) the fear of the LORD

16. Where is being a vegetarian better?
(A) with a wise man
(B) where love is
(C) in a house of the rich but wicked

17. Who allays contention?
(A)foolish ones
(B) he who is slow to anger
(C) those with good words

18. The road of the upright is a what?
(A) full of precious jewels
(B) knowledge
(C) highway

19. Who despises his mother?
(A) ungrateful son
(B) foolish man
(C) the evil

20. To whom is folly a joy?
(A) an unfaithful witness
(B) one who is easily angered
(C)one destitute of discernment

21. Plans are established by having what?
(A) multitude of counselors
(B) plans of wisdom
(C) good plans

22. When is a spoken word good?
(A) when in good words
(B) when in mercy and truth
(C) in due season

23. What is below?
(A) burried corpse
(B) hell
(C) valley

24. Who will destroy the house of the proud?
(A) he who has dust from one's feet
(B) a crowned prince
(C) the LORD

25. Whose words are pleasant to the Lord?
(A) the pure
(B) a great man
(C) a true witness

26. Who troubles his own house?
(A) one who has Little
(B) he who is greedy for gain
(C) the abandoned soul

27. Whose heart studies how to answer?
(A) the heart of good intuition
(B) one who has the truth
(C) righteous

28. Whose prayer does the Lord hear?
(A) men of knowledge
(B) righteous
(C) blameless men

29. What makes bones healthy?
(A) a faithful witness
(B) meal from above
(C) a good report

30. Who despises his own soul?
(A) he who disdains instruction
(B) a poor servant
(C) the soul pleaser

31. What comes before honour?
(A) discernment
(B) riches
(C) humility

 -->