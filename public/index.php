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
	<h6><u>PROVERBS CHAPTER 16</u></h6>
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

CHAPTER 16

1. To whom belong the preparations of the heart?
(A) wise man
(B) Man
(C) Father

2. Who has the answer of the tongue?
(A) The righteous
(B) Wise man
(C) The Lord

3. In the eyes of a man his ways are what?
(A) Pure
(B) Good
(C) Righteous

4. Who will judge the spirits?
(A) The high Judge
(B) The spiritual
(C) The Lord

5. In order to establish our hearts, we are to do what to the Lord?
(A) Commit one's works
(B) Praise His name
(C) recognize Him as Lord.

6. Who is made for the day of doom?
(A) The wicked
(B) The proud
(C) The Scofferer

7. Who is the everyone that is an abomination to the Lord?
(A) Everyone who is wicked
(B) Profane bubblers
(C) Everyone proud of heart

8. In what is atonement provided?
(A) In the house of the righteous
(B) In every shedding of blood
(C) In mercy and truth

9. By what does one depart from evil?
(A) By the fear of the Lord
(B) By moral standards
(C) Obedience

10. When can we expect God to make our enemies at peace with us?
(A) When we seek peace 
(B) When our ways please the Lord
(C) When conflicts are resolved

11. When is a 'little' better?
(A) With the right scale
(B)With righteousness
(C) When not stolen

12. If a man's heart plans, who is the one who ultimately directs?
(A) Wisdom
(C) The fear of the Lord
(C) The LORD

13. What is on the lips of the king?
(A) Power
(B) Divination
(C) Commands

14. What kind of weights and scales are the Lord's?
(A) Honest
(B) Peaceful
(C) Scales from above

15. By what is a throne established?
(A) Laws
(B) By kings
(C) Righteousness

16. What are the delight of kings? 
(A) Counselor's advise
(B)Righteous lips
(C) An Honest Cup

17. What will a wise man do to a king's wrath?
(A) Understand it
(B) Appease it
(C) Discern it

18. What is a king's favor like?
(A) Precious oil 
(B) burning incense mixed with oil
(C) A cloud of the latter rain

19. What should be chosen rather than silver?
(A) A Good name
(B) Understanding
(C) Gold

20. What does the upright do by keeping the highway of departing from evil?
(A) Guard his lips
(B) Righteousness
(C) Preserves his soul

21. What goes before a fall? 
(A) Haughty
(B) Pride
(C) Poverty

22. What is better than dividing spoil with the proud?
(A) Honest scale without contention
(B) Mastery
(C) A humble spirit with the lowly

23. Who is the happy person?
(A) Believing in one's heart
(B)Trusts in the LORD
(C) Wise Labour 

24. What increases learning?
(A) He who has dust from one's feet
(B) Knowledge
(C) Sweetness

25. What is a wellspring of life?
(A) Understanding
(B) Discernment
(C) Honesty

26. What teaches the mouth of the wise?
(A) One who has the fear of the LORD
(B) The heart
(C) The abandoned soul

27. What is sweetness to the soul?
(A) Honey
(B) Humility
(C) Pleasant words

28. The way of death may seem what to a man? 
(A) Life
(B) Right
(C) Broad

29. Who does a person labor for?
(A) Riches
(B) The LORD
(C) For himself

30. What is on the lips of an ungodly man like a burning fire?
(A) Evil
(B) Words
(C) Envy

31. Who separates the best of friends?
(A) His Maker
(B) An advisor
(C) A whisperer

32. Who entices and leads a person in a bad way?
(A) The Unsuccessful
(B) A violent man
(C) the whisperer

33. Why does he wink his eye?
(A) To gain false witness
(B) To cause separation
(C) To devise perverse things

34. The silver-haired head is a crown of glory only if it is found where?
(A) in good intimacy
(B) on the heard
(C) In the way of righteousness

35. He who rules his spirit is better than whom?
(A) his master
(B) He who takes a city
(C) the mighty

36. Who is the one who makes the final decision?
(A)  Judge 
(B) Cast of lap
(C) The LORD

 -->