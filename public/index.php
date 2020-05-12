<?php session_start(); ?>
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
	<h6><u>PROVERBS CHAPTER 11</u></h6>
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
					<input required type="text" name="fullname" placeholder="John Doe">
					<button type="submit" name="submit" class="btn btn-primary">Start quiz</button>
				</form>	
			</div>
		</div>
	</section>

	<br />

<?php
	}else{
		// name is inputted so show quiz
		$_SESSION['fullname'] = $_POST['fullname'];
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
	PROVERBS CHAPTER 11

Dishonest scales are what to the Lord?
(A) wise
(B) an abomination
(C) a foolish son

2. What comes with pride?
(A) death
(B) righteousness
(C) shame

3. The perversity of the unfaithful is contrasted with what?
(A) integrity of the upright
(B) his own wickedness
(C) the righteous soul

4. Riches cannot buy deliverance from what?
(A) his own wickedness
(B) the hand of the diligent
(C) death

5. What causes the wicked to fall?
(A) his own wickedness
(B) when a wicked man dies
(C) blessings

6. What `catches` the unfaithful?
(A) his own wickedness
(B) an abomination
(C) enemies near the door of her house

7. Hope and expectation for the wicked and unjust stops at what time?
(A) your labors go to a foreigner
(B) wise
(C) when a wicked man dies

8. Being righteous delivers one from what?
(A) when it goes well
(B) obeying the voice
(C) trouble

9. By what means will the righteous be delivered?
(A) through knowledge
(B) the mouth of the wicked
(C) consuming the body

10. What happens to the righteous that makes a happy ending for the city?
(A) his peace
(B) when it goes well
(C) drinking from his own cistern

11. What overthrows a city?
(A) a faithful one
(B) the mouth of the wicked
(C) love

12. With what should a man of understanding hold his neighbor?
(A) in the multitude of counselors
(B) rod
(C) his peace

13. What spirit conceals secrets?
(A) being surety
(B) a faithful one
(C) hatred

14. Where is the source of safety?
(A) in the multitude of counselors
(B) honor
(C) wise people

15. One way of being safe is if one hates what?
(A) riches
(B) wisdom
(C) being surety

16. What does a gracious woman retain?
(A) the labor of the righteous
(B) honor
(C) death

17. The object of ruthless men is to retain what?
(A) a fool
(B) riches
(C) integrity of the upright

18. A merciful man does good to whom?
(A) shame
(B) the foolish
(C) his own soul

19. Who troubles his own flesh?
(A) an abomination
(B) he who is cruel
(C) righteous one

20. Who has a certain reward?
(A) evil
(B) shame
(C) sower of righteousness

21. Whose work is deceptive?
(A) wicked man
(B) an abomination
(C) diligence

22. What leads to life?
(A) sower of righteousness
(B) the blessing of the LORD
(C) righteousness

23. Who in their ways are the Lord`s delight?
(A) the weary
(B) the blameless
(C) the righteous

24. The posterity of whom shall be delivered?
(A) the strong
(B) vinegar and smoke
(C) the righteous

25. A lovely woman without discretion is compared to a ring of gold in what?
(A) a swine's snout
(B) an abomination
(C) clothes of purple

26. What is the desire of the righteous?
(A) destruction
(B) only good
(C) integrity of the upright

27. The one who scatters does what?
(A) shame
(B) promotes the way of the Lord
(C) increases more

28. He who waters will be what?
(A) an abomination
(B) watered himself
(C) wicked

29. Which is blessed if he has grain?
(A) a perverse one
(B) shame
(C) he who sells it

30. Which seeker finds favor?
(A) he who earnestly seeks good
(B) an abomination
(C) ambitious to succeed

31. He who trusts in his riches will what?
(A) he who sells it
(B) shepherd
(C) fall

32. Who inherits the wind?
(A) righteous one
(B) he who troubles his own house
(C) investor in prime stock

33. He who wins souls is what?
(A) a hard worker
(B) clamorous
(C) wise
 -->