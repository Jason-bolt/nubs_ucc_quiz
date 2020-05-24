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

CHAPTER 23

1. Who will become poor?
(A) The drunkard
(B) The glutton
(C) Both of the options above

2. With whom are we advise not to associate with?
(A) Winebibbers and gluttonous eaters
(B) The rich and the miser
(C) Both of the options above

3. What will happen if a man hears proverbs?
(A) It can guides his heart
(B) He will gather discernment
(C) Both of the options above

4. Whose hope will not be cut off?
(A) Those who fear the Lord
(B) Wise men
(C) The Lord

(5) It is not enough NOT to envy sinners, we must also.
(A) Make them envy us
(B) Desire to be successful above them
(C) Be zealous for the fear of the Lord

(6) What will happen when a child is beaten with a rod?
(A) his soul will depart from hell
(B) He will receive knowledge
(C) He will be wise

7. Apply your........ to instruction, And 
your ........ to words of knowledge. 
(A) Heart , mind
(B) Heart, ears
(C) Mind, heart

8. Do not remove the ........, 
Nor enter the fields of the ........
(A) Ancient landmark, fatherless
(B) Fatherless, Ancient landmark
(C) None of the options above

9. Who despises wise words.
(A) A fool
(B) A glutton
(C) Both of the options above

10. They have struck me, but I was not hurt; They have beaten me, but I did not feel it. Who says these words?
(A) A drunkard
(B) A Strong man
(C) The mighty

11. From the chapter, who has plenty questions of problems? 
(A) Those who linger long time for wine
(B) A Glutton of meat
(C) A Harlot and seductress

12. Whose food will be vomit up when eaten?
(A) The rich
(B) A miser
(C) A ruler

13. Whose delicacies are known to be deceptive?
(A) The rich
(B) A miser
(C) A ruler

14. Whose bread are we advice not to eat?
(A) The rich
(B) The miser
(C) The ruler

15. Whose delicacies are we advise NOT to desire?
(A) A miser
(B) The rich
(C) None of the 
above

16. Whose delicacies are we advise NOT to desire?
(A) A miser
(B) The ruler
(C) Both of the options above

17. Whose delicacies are we advise NOT to desire?
(A) The rich 
(B) The ruler
(C) None of the options above

18. If you are a man given to appetite, where would you put your knife?
(A) Beside the plate
(B) Your throat
(C) Your chest

19. Do not overwork to be what?
(A) Rich
(B) Free of debts
(C) Righteous

20. What certainly make themselves wings?
(A) Unstable delicacies 
(B) Gluttony
(C) Riches

21. You should not do what to the ancient landmarks?
(A) Locate them
(B) Repeat them
(C) Remove them

22. Whose redeemer will plead their cause against you?
(A) The fatherless
(B) The Ancient landmark
(C) A wise son

23. When will my inmost being rejoice?
(A) When disobedience is no more
(B) When it is enraptured
(C) When my children speak right things

24. There is surely a what?
(A) A hereafter
(B) Angels in heaven
(C) Parents

25. What two classes of people will come to poverty?
(A) All knowing people and those ignorant
(B) The drunkard and the glutton
(C) Harlot and seductress

26. Do not despise your mother when she is what?
(A) Poor
(B) Old
(C) Sinning

27. What should you buy and sell not?
(A) Precious jewels
(B) Gold
(C) The truth

28. What shuld you let your father and mother be?
(A) Rest
(B) Glad
(C) Married

29. What is a seductress?
(A) A narrow well
(B) A deep pit
(C) She who has a flattery tongue

30. Do not look at wine when it does what in the cup?
(A) Is very still
(B) Sparkles
(C) Moves

31. When the drinker awakes, what does he seek?
(A) Delicacies of food
(B) Refuge
(C) Another drink

32. Who is a harlot?
(A) Rich
(B) Well
(C) Deep pit

 -->