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
	<h6><u>PROVERBS CHAPTER 13</u></h6>
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
					<button type="submit" name="submit" class="btn btn-primary">Start quiz</button>
				</form>	
			</div>
		</div>
	</section>

	<br />

<?php
	}else{
		// name is inputted so show quiz
		$_SESSION['full_name'] = $_POST['full_name'];
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

PROVERBS CHAPTER 13

1. Who heeds the father's instruction?
(A) the righteous
(B) a wise son
(C) the blameless

2. What is the food of the unfaithful?
(A) destruction
(B) complains
(C) violence

3. Who preserves his life?
(A) the one who guards his mouth
(B) the good shepherd
(C) the righteous soul

4. If one opens wide his lips, what will he have?
(A) rich
(B) the hand of the diligent
(C) destruction

5. What does the soul of the lazy man have?
(A) nothing
(B) shame
(C) anger

6. What will the soul of the diligent be made?
(A) rich
(B) spirit
(C) cold

7. A righteous man hates lying while a wicked man comes to what?
(A) nothing
(B) a sinner
(C) shame

8. What guards him whose way is blameless?
(A) great riches
(B) men of valour
(C) righteousness

9. When some make themselves rich, they have what?
(A) nothing
(B) great riches
(C) many proverbs

10. Some who make themselves poor have what?
(A) wisdom
(B) great riches
(C) many neighbours

11. The ransom of a man`s life is what?
(A) wisdom
(B) his riches
(C) love

12. Whose lamp will be put out?
(A) the foolish virgin
(B) one who lacks bread
(C) the wicked

13. What comes to the well-advised?
(A) desire 
(B) wisdom
(C) passion

14. What will happen to wealth that`s gained by dishonesty?
(A) diminished
(B) rewarded
(C) accounted for

15. What is as a tree of life?
(A) the law of the wise
(B) wisdom
(C) when the desire comes

16. The one who fears the commandment will be what?
(A) diligent
(B) rewarded
(C) command multitudes

17. What is a `fountain of life`?
(A) baptism
(B) the law of the wise
(C) the one who guards his mouth

18. The law of the wise turns one away from what?
(A) violence
(B) the foolish
(C) the snares of death.

19. What gains favor?
(A) a wise son
(B) good understanding
(C) one with multitude of words

20. The way of the unfaithful is what?
(A) full of spectators
(B) violence
(C) hard

21. With what does a prudent man act?
(A) with knowledge
(B) with a wise son
(C) with no excuses

22. What brings health?
(A) the Word
(B) natural and organic
(C) a faithful ambassador

23. Who will be honored?
(A) the one who laughs
(B) he who regards a rebuke
(C) the one who likes himself

24. What is sweet to the soul?
(A) confusion that is resolved
(B) vinegar that is taken
(C) a desire accomplished

25. Who will be wise?
(A) he who walks with wise men
(B) one who learns from others mistakes
(C) the one who hate lies

26. Who will be destroyed?
(A) followers of debtors
(B) the companion of fools
(C) the one who shouts

27. To whom is good repaid?
(A) the hard worker
(B) the passionate ones
(C) the righteous

28. To whom does a good man leave an interitance?
(A) to the government
(B) to his children's children
(C) to holy men

29. For whom is the wealth of the sinner stored?
(A) for a sinner
(B) for the one who saves
(C) for the righteous

30. Where is much food?
(A) in the fallow ground of the poor
(B) in success
(C) in the fallow ground of the rich

31. He who loves his son does what?
(A) gives him his desire
(B) disciplines him promptly
(C) makes him apologize

32. Who eats to the satisfying of his soul?
(A) the hungry as a lion
(B) the righteous
(C) the soul pleaser

 -->