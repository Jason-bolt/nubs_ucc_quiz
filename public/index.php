<?php session_start();
include('header.php');
include_once('db.php'); 
	// header("Location: soon.php");
?>
<?php 
	
	$query = "SELECT * FROM questions";
	$questions = mysqli_query($connection, $query);
?>
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

		date_default_timezone_set("Etc/GMT-0");
		$start_time = " (" . date("h:i a") . ")";
		$_SESSION['start_time'] = $start_time;
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

CHAPTER 19

1. When is it better to be poor than one who is perverse in his lips?
(A) When you walk in your integrity
(B) When you admire intergrity
(C) When you know integrity

2. It is not good to be without what?
(A) Full obedience
(B) Knowledge
(C) Obedience

3. When one hastens with his feet, what does he do?
(A) He has pride
(B) He steps into folly
(C) He sins

4. What twists a man's way?
(A) His foolishness
(B) the way that leads to death
(C) A fret heart

5. What makes many `friends`?
(A) Good friends
(B) Wealth
(C) Honest Friends

6. Who will not escape his punishment?
(A) A false witness and liar
(B) one brought before court
(C) A scoffer

7. Who entreats the favor of the nobility?
(A) Many
(B) Every man
(C) The wise

8. Who hates a poor man?
(A) one who has many friends
(B) Rich people
(C) His brothers and his friends

9. Who loves his own soul?
(A) He who gets wisdom
(B) He who keeps understanding
(C) He who separates himself from multitude

10. What kind of punishment is due the liar?
(A) Lies
(B) Wrath
(C) He shall perish

11. It is not fitting for a servant to rule whom?
(A) His fellow servants
(B) The upright
(C) Princes

12. What is the glory of a man?
(A) His countenance
(B) To overlook transgression
(C) His hair

13. Whose favor is like dew on the grass?
(A) A good shepherd's
(B) A wife's
(C) A king's

14. What is the ruin of a father?
(A) Poverty
(B) The contention of a wife
(C) A Foolish son

15. What are a continual dipping?
(A) A foolish son
(B) Poverty
(C) The contentions of a wife

16. What is an inheritance from the Lord?
(A) Houses and riches
(B) A prudent wife
(C) A man's Childrens children

17. Who will suffer hunger?
(A) An idle person
(B) Laziness
(C) The poor who borrow

18. Who keeps his soul?
(A) one who knows the commandment
(B) One who listens to advice
(C) Keeper of the commandment

19. Who pays back that which is lent to the poor ?
(A) The Lord
(B) The rich
(C) The labour of the poor

20. When should one chasten his son?
(A) When You love him
(B) Before he does wrong
(C) While there is hope

21. Who will suffer punishment?
(A) The man of great wrath
(B) The man who knows great wrath
(C) The man that turns great wrath

22. What plan is sure to succeed?
(A) A good plan
(B) The plans of man
(C) The Lord's counsel

23. What is desired in a man?
(A) A good heart
(B) Believe
(C) Kindness

24. Who will not be visited with evil?
(A) The clean in heart
(B) A man with good morals
(C) The one with the fear of the Lord

25. Who buries his hand in the bowl?
(A) The poor
(B) A lazy man
(C) A man without understanding

26. What will happen when one rebukes one who has understanding?
(A) He accept with happiness
(B) He thinks
(C) He discerns knowledge

27. Which is the son who causes shame and reproach?
(A)  The one who is not successful
(B) The one who stays at home 
(C) The one who mistreats his father and chases away his mother

28. What happens to ones who ceases listening to instruction?
(A) He ceases good words
(B) He strays from the words of knowledge
(C) He ceases wise sayings

29. Who scorns justice?
(A) The mouth of the wicked
(B) A disreputable witness
(C) The endeared ones

30. Judgments are prepared for whom?
(A) Scoffers
(B) The back of fools
(C) The back of Scoffers

31. Which men are friends to ones who give gifts?
(A) Every man
(B) Many men
(C) Poor men

32. What makes man slow anger?
(A) His knowledge
(B) His discretion
(C) His discernment

33. What is compared to a kings wrath?
(A) King's heart
(B) Dew of grass
(C) Lion's roar

34. This not fitting for a fool?
(A) Luxury
(B) Wisdom
(C) Riches

 -->