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
	<h6><u>PROVERBS CHAPTER 14</u></h6>
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

CHAPTER 14

1. Who is the one that builds her house?
(A) a wise servant
(B) the wise woman
(C) the wise son

2. Who despises God?
(A) the one who eats lies
(B) one who does not know truth
(C) he who is perverse in his ways

3. What is in the mouth of a fool?
(A) a rod of pride
(B) a twig of wood
(C) book of insolence

4. What comes by the strength of an ox?
(A) little more
(B) many employees
(C) much increase

5. Who does not lie?
(A) a faithful witness
(B) a watchman
(C) perjured person

6. Who does not find wisdom?
(A) a scoffer
(B) one who bullies
(C) a poor person

7. What do you do when you perceive a foolish man talking?
(A) shut him up
(B) listen and rebuke him
(C) go from the presence

8. What is the wisdom of the prudent?
(A) leads in all things
(B) to forfeit all returns
(C) to understand his way

9. Who mock at sin?
(A) fools
(B) the misinformed
(C) rebels

10. A heart knows its own what?
(A) its gladness
(B) its own bitterness
(C) its own life

11. The tent of whom will flourish?
(A) the forlorn
(B) the upright
(C) the loving

12. The way that seems right to a man can end in what?
(A) eternity
(B) lack of bread
(C) death

13. Even in laughter the heart may do what?
(A) joy in occasions
(B) may sorrow
(C) bloom in youth

14. From whence is the good man`s satisfaction?
(A) from above
(B) into the mist
(C) within oneself

15. Who believes just any word?
(A)  the heartless
(B) the smartest of them
(C) the simple

16. Who fears and departs from evil?
(A) diligent person
(B) a wise man
(C) married man

17. How does a quick-tempered man act?
(A) with people of equal temper
(B) foolishly
(C) soberly

18. What is the prudent's crown?
(A) gold
(B) polished crown
(C)knowledge

19. Who will eventually lose to the good?
(A) the good
(B) the evil
(C) the gallant

20. Who has many friends?
(A) man of influence
(B) the good hearted
(C) the rich

21. Who is the happy one?
(A) he who has mercy on the poor
(B) the poor who return profits
(C) people who trust

22. What is the result of devising good?
(A) guidance into the aftermath
(B) judgments of the past
(C) mercy and truth will belong to them

23. Where is profit?
(A) in the garden of the rich
(B) in all labor
(C) in calmness

24. What is the riches of the wise?
(A) gold from one's feet
(B) the garments of humility
(C) a crown

25. Who delivers souls?
(A) a true witness
(B) one who is versed in the apologies
(C) a humble servant

26. There will be a place of refuge in the children of those that have what?
(A) justice for one and all
(B) the fear of the LORD
(C) a rod of fortunes

27. The fear of the Lord is a fountain of life because it does what?
(A) directs into the freedom
(B) delivers the merciful
(C) turns one away from the snares of death

28. The king's honor is in whose support?
(A) a older servants
(B) a multitude of people
(C) young advisers

29. What does the impulsive exalt?
(A) clever acts
(B) endearment
(C) folly

30. What is rottenness to the bones?
(A) envy
(B) fornication
(C) death

31. When one has mercy on the needy, he honors whom?
(A) his mother
(B) his good deeds
(C) his Maker

32. Where does the righteous have refuge?
(A) in success
(B) in his death
(C) in his life

33. Where does wisdom rest in the one who has understanding?
(A) in the blood
(B) in bowels of mercy
(C) in the heart

34. What exalts a nation?
(A) Strong men
(B) resisting harm
(C) righteousness

35. Sin is a reproach to whom?
(A) to the depths of Gehenna
(B) to any people
(C) to the lonely

36. The king's favor is toward whom?
(A) his visitor
(B) a just man
(C) a wise servant

 -->