<?php session_start();
	// header("Location: soon.php");
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
	<p style="color: blue; font-size: 13px;">Remember this is not a competition. Read the WORD to understand.</p>
	<h6><u>PROVERBS CHAPTER 18</u></h6>
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

CHAPTER 18

Who seeks his own desire?
 (A) A wise man who isolates himself
(B) A man who isolates himself
(C) A man who isolates not to himself

2. What does one who rages against all wise judgment seeks?
 (A) Foolish Judgement
 (B) Wise Judgement
(C) His own desire

3. Who has only a delight in expressing his own heart?
 (A) A fool
(B) The wicked
(C) person with pride

4. What comes with dishonor?
 (A) Contempt
(B) Wicked
(C) Reproach

5. What is compared to `deep waters`?
(A) The words of a man's mouth
(B) Well spring of wisdom
(C) Flowing brook

6. What is compared to a `flowing brook`?
 (A) The wellspring of wisdom
(B) The words of a man's month
(C) Deep waters

7. We should not show partiality to whom?
 (A) The righteous
(B) The Just
(C) The wicked

8. What enters into contention?
(A) Discontentment
(B) A fool's mouth
(C)A fool's lips

9. What is the snare of one`s soul?
 (A) The lips of a fool
(B) The mouth of a fool
(C) A wicked friend

10. Whose words are like tasty trifles?
(A) A gossiper
(B) A talebearer
(C) The wicked

11. Who is a brother to a great destroyer?
(A) The forlorn
(B)He who is slothful
(C) Deadly Lion

12. What is a strong tower for the righteous?
 (A) Righteous hands
(B) Righteousness
(C)The name of the LORD

13. What is a rich man's strong city?
 (A) City of gold
(B) His wealth
(C) His own esteem

14. What heart is before destruction?
(A) Haughty one
(B) Proud heart
(C) Grievous heart

15. What is answering a matter before one hears it?
(A) Partial Judgment
(B) Inadequate information
(C) Folly and shame

16. What spirit cannot sustain a man in sickness?
(A) The spirit of a man
(B)A broken one
(C) haughty one

17. What does the ear of the wise seek?
 (A) Concerns of the wise
(B)Knowledge
(C) Discernment

18. What brings one before great men?
 (A) Trouble
(B) A man's awareness and room
(C)A man's gift

19. Who seems right until he is examined?
 (A) The proud
(B) The first one to plead his cause
(C) The evil

20. What good is casting lots?
 (A) Helps you gamble
 (B)Makes the heart good
(C) Causes contentions to cease

21. Who is harder to win than a strong city?
 (A) A brother offended
(B) The poor who return profits
(C) He who has mercy on the poor

22. With what will a man's stomach be satisfied?
(A) Being charitable
(B) Produce of his lips
(C) The fruit of his mouth

23. In what is the power of life and death?
(A) Heaven and hell
(B) The tongue
(C) Hell

24. Who finds a good thing?
(A) He who has dust from one's feet
(B) A crowned prince
(C) He who finds a wife

25. What does a poor man use in speaking?
 (A) Entreaties
 (B) The words of the LORD
(C) A true witness

26. In order to have friends, one must be what?
(A) A good friend
(B) Friendly
(C) Seek friends

27. What will a eat if he loves the tongue?
(A) The fruit of the tongue
(B) The words of the tongue
(C) Lies

28. What does casting of lots do?
(A) Helps in gamble
(B) Keeps the mighty apart 
(C) Non of the above

29. In contrast to the poor man, how does the rich man answer?
(A) With confidence
(B) Roughly
(C) With deep voice

30. Where does a tale bearer goes to?
(A) innermost body
(B) To and fro
(C) Down to deep valleys

31. What is contention liken to?
(A) Bars of a castle
(B) War
(C) Discontentment

 -->