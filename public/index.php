<?php session_start();
	// header("Location: soon.php");
include('header.php');
include_once('db.php'); 
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
					<br />

					<p><strong>Are you a NUBS UCC member: </strong></p>
					
					<label><input required type="radio" name="is_nubs" value="1"> Yes</label>
					<label><input id="not" type="radio" name="is_nubs" value="0"> No</label>
					<br />

					<div>
			          <input required type="tel" name="phone_number" id="phone_number" placeholder="Phone number" disabled>
			          <p style="font-size: 13px; color: red;">Phone number is required for only non NUBS UCC participants</p>
			        </div>
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
		$_SESSION['is_nubs'] = $_POST['is_nubs'];
		if (isset($_POST['phone_number'])) {
			$_SESSION['phone_number'] = $_POST['phone_number'];
		}else{
			$_SESSION['phone_number'] = null;
		}

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


<script>
// Display other field
// $("#seeAnotherFieldGroup").change(function() {
//   if ($(this).val() == "0") {
//     $('#otherFieldGroupDiv').show();
//     $('#otherField1').attr('data-error', 'This field is required.');
//       } else {
//     $('#otherFieldGroupDiv').hide();
//     $('#otherField1').removeAttr('data-error');
//   }
// });
// $("#seeAnotherFieldGroup").trigger("change");

var radios = document.querySelectorAll('[name=is_nubs]');
Array.from(radios).forEach(function(r){
  r.addEventListener('click', function(){
    var phone = document.getElementById('phone_number');
    if(this.id == 'not')
      phone.removeAttribute('disabled');
    else
      phone.setAttribute('disabled', 'disabled');
  });
});


</script>


<!-- 

CHAPTER 21

1. The heart in the hands of the Lord is compared to?
(A) The rivers of water
(B) The sea
(C) Pool of blood

2. What kind of heart is in the hands of the Lord?
(A) A man's heart
(B) A person's heart
(C) A king's heart

3. In what is every way of a man right before?
(A) in his own eyes
(B) in The Lord
(C) in his wealth

4. To do what is better to the Lord than sacrifice?
(A) Seek peace
(B) Righteousness and Justice
(C) Obedience to all things

(5) Which of the following is NOT a sin?
(A) A haughty look
(B) The plowing of the wicked
(C) None of the above

(6) Getting treasures by lying tongue CAN be what?
(A) Death seeking
(B) Fleeting fantasy
(C) Sin

(7) What will destroy the wicked?
(A) Light
(B) His own violence
(C) The Lord

(8) What is the way of a guilty man?
(A) Death 
(B) Perverse
(C) Guilt

(9) Who makes it better to dwell in the corner of house top?
(A) An Angry woman
(B) A Contentious woman
(C) Both of the above

10. What does the soul of the wicked desires?
(A) Judgement
(B) Evil
(C) Rush words

11. A neighbour finds no favour in whose eyes?
(A) The simple
(B) The wise
(C) The wicked

12. What makes the simple wise?
(A) When the wise is instructed
(B) Words of wisdom
(C) When the scoffer is punished

13. What does the righteous God wisely considers?
(A) The ways of the Just
(B) The house of the righteous
(C) The house of the wicked

(14) What pacifies anger?
(A) Secret gifts
(B) Bribe behind the back
(C) The eyes of the Lord

(15) To whom shall the wicked be a ransom for?
(A) The righteous
(B) The upright
(C) The Unfaithful

(16) To dwell in the wilderness is better than dwelling with?
(A) A contentious woman
(B) An angry woman
(C) Both of the above

17. To whom does distraction comes to?
(A) Workers of iniquity
(B) The cruel
(C) The simple

18. To do justice is what to the just?
(A) Joy
(B) Known
(C) Wisdom

19. What happens to a man who wanders from the way of understanding?
(A) Wanders in the way of death
(B) Rest in the assembly of the dead
(C) Wanders in the assembly of the dead

20. What will happen to a man who loves wine and oil?
(A) He will be poor
(B) He will be mocked
(C) He will not be rich

21. What can be found in the house of the wise?
(A) Wisdom
(B) Desirable treasure and oil
(C) Understand

22. Righteousness and honour are found by
(A) The righteous and meciful
(B) The merciful and honourable
(C) The righteous and honourable

23. A wise man brings down
(A) The city of the mighty
(B)  Strong cities
(C) Trusted Stronghold

24. What does a person who guards his mouth and tongue keeps from trouble?
(A) His soul
(B) His lips
(C) His inheritance

25. What name is given to a proud and haughty man and how do they act?
(A) Name (arrogant proud), Act (haughty)
(B) Name(arrogant proud), Act (scoffer)
(C) Name(Scoffer), Act( arrogant proud)

26. What kills a lazy man?
(A) His own desire
(B) Hunger
(C) Poverty

27. A man who hears the speaking of a false witness shall.
(A) Perish
(B) Speak endlessly
(C) Bear false witness

28. If a wicked man hardens his face, what does the upright do?
(A) Establishes his way
(B) Prepares for the day
(C) Gives and does not spare

29. Which of the following are NOT against The Lord?
(A) Wisdom and councel
(B) Councel and Understanding
(C) All of the above

30. What will happen to one who loves pleasure?
(A) Will not be rich
(B) Will be poor
(C) None of the above

31. Who covet's greedy all day long?
(A) The proud
(B) The lazy
(C) None of the above

 -->