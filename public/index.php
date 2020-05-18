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
	<h6><u>PROVERBS CHAPTER 17</u></h6>
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

CHAPTER 17

1. What is better than a house full of feasting with strife?
(A) A morsel taken in a dry
(B) A dry morsel with quietness
(C) A dry morsel without stinginess

2. What servant will share an inheritance among brothers?
(A) The oldest servant
(B) An obedient servant
(C) One who rules over a son that causes shame

3. Who tests the hearts?
(A) The Lord
(B) A humble soul
(C) One vest in love

4. Who listens eagerly to a spiteful tongue?
(A) The shrewd 
(B) A gossiper
(C) A liar

5. Who reproaches his Maker?
(A) He who mocks the poor
(B) A confused watchman
(C) One who reproaches morals

6. Who are the crown of old men?
(A) The children's children
(B) A Grey hair
(C) First borns

7. What kind of speech is not expected from a fool?
(A) A Famous speech
(B) An Astonishing speech
(C) An Excellent speech

8. What is a precious stone in the eyes of its possessor?
(A) A diamond
(B) A rock
(C) A present

9. Who will separate friends?
(A) He who repeats a matter
(B) he who covers transgressions
(C) Fools

10. What is ineffective on a fool?
(A) Rebuke
(B) A hundred blows
(C) Bitterness

11. What does an evil man seek?
(A) A cruel messenger
(B) Rebellion
(C) Aisle of the bliss

12. A fool in folly is worst than what kind of bear?
(A) one that chew her cuds
(B) Polar type
(C) One robbed of her cubs

13. When one rewards evil for good, what will not depart from his house?
(A) Death
(B) Evil
(C) Many sorrows

14. When should contention be best stopped?
(A) Before a quarrel starts
(B) Before it goes to court
(C) When it ends up in court

15. He who condemns the just is what to the Lord?
(A) wicked justice
(B) Simple 
(C) An abomination

16. Even a fool has in his hand the purchase price of what?
(A) Wickedness
(B) Wisdom
(C) Foolishness

17. When does a friend love you?
(A) When love abounds
(B) At all times
(C) At times of adversity

18. One is devoid of understanding when he becomes what?
(A) Ignorant
(B) so wise
(C) A surety for a friend

19. Who loves strife?
(A) He who exults his gates
(B) He who loves transgression
(C) The evil

20. Who finds no good?
(A) He who has perverse tongue.
(B) The unappreciative
(C) He who has a deceitful heart

21. Who has no joy?
(A) The father of a fool
(B) The poor who borrows
(C) He who begets sorrow 

22. What does good, like medicine?
(A) Being charitable
(B) Councel
(C) A merry heart

23. A wicked man accepts a bribe to pervert what?
(A) Intensions of labour
(B) The ways of justice
(C) Fruits of Labour

24. A foolish son is Bitterness to whom?
(A) His Father
(B) A crowned prince
(C) To her that bore him

25. It is not good to punish whom?
(A) The righteous
(B) A witness
(C) A true witness

26. What kind of spirit does a man of understanding have?
(A) Honey comb
(B) A calm one
(C) Secured

27. A fool is thought to be wise when he does what?
(A) Hold his peace
(B) gives councel to the poor
(C) Listens to advice

28. What does the eyes of the fool does?
(A) beholds evil
(B) beholds the end of the earth
(C) despises just desires

29. Where does a wicked man accept bribe?
(A) behind the back
(B) at corrupt places
(C) in deep darkness

30. What does a broken Spirit do?
(A) Dries the bones
(B) Dispatches depression
(C) Leads to anger

31. Why shouldn't a prince be strike?
(A) For their inheritance
(B) For their uprightness
(C) For their Judgement

32. A fool is considered as what, when he shuts his lips?
(A) Perspective
(B) Glorious
(C) Wise

 -->