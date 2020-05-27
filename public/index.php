<?php session_start();
	header("Location: soon.php");
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

CHAPTER 26

1. What is not fitting for a fool?
(A) Snow
(B) Wisdom
(C) Honour

2. In verse 1, when is snow?
(A) In summer
(B) In winter
(C) In harvest

3. What happens to a curse without  cause?
(A) Shall not alight
(B) Shall not cease
(C) Shall not flight

4. What is compared to curse without cause?
(A) Flying sparrow, flitting swallow
(B) Rain in the harvest
(C) Flitting sparrow, flying swallow

5. A ........ for the horse, A ........ for the  donkey, And a ........ for the fool's back.
(A) Bridle, whip, rod
(B) Whip, bridle, rod
(C) Bridle, rod, whip

6. Why should You NOT answer a fool?
(A) Lest You will be like him
(B)  He needs no answer
(C) Lest He will be wise in his own eyes

7. Why should You answer a fool?
(A) He needs an answer
(B) Lest You will be like him
(C) Lest He will be wise in his own eyes

8. Who cuts of his own feet and drinks violence?
(A) He who sends message by the hand of a fool
(B) A foolishness messenger
(C) Master of a foolish messenger

9. What is a proverb in the mouth of fool described?
(A) The legs of the lame that hang limp
(B) Like one who binds a stone in a sling
(C) A thorn that goes into the hand of the drunkard

10. To honour a fool is like
(A) The legs of the lame that hangs limp
(B) one who binds a stone in a sling
(C) A thorn that goes into the hand of a drunkard

11. A proverb in the mouth of a fool is like what?
(A) The legs of the lame that hang limp
(B) Like one who binds a stone in a sling
(C) A thorn that goes into the hand of a drunkard

12. The great God who formed everything 
Gives the fool his ........ and the 
transgressor his ........ 
(A) Hire, wages
(B) Wages, hire
(C) None of the options above

13. Who says this, "There is a lion in 
the road! A fierce lion is in the streets"
(A) A lazy man
(B) A fool
(C) Drunkard

14. What is compared to a fool who repeats his folly?
(A) A wise person who repeats his folly
(B) A dog that goes back to his vomit
(C) A mad person

15. Whose wickedness will be revealed before assembly of people?
(A) The lazy
(B) One who hates but disguises it with his lips
(C) Talebearer

16. What is the work of a flattering mouth?
(A) Rumour
(B) Ruin
(C) Lies

17. Who falls into a pit?
(A) Whoever digs a pit
(B) Whoever does not cover a pit
(C) Whoever opens a closed pit

18. A lazy man on his bed is like
(A) A lion in the street
(B) A door that turns on its hinges
(C) A cold water in cold weather

19. What is revealed when hatred is covered by deceit
(A) Hatred
(B) Truth
(C) Wickedness

20. There is more hope for a fool than 
(A) A lazy man who sleeps
(B) A man wise in his own eyes
(C) A poor man who begs in the time of harvest 

21. There are seven abominations in the heart 
(A) Of a Fool
(B) Full of hatred
(C) Of a Talebearer

22. What does a lying tongue hates?
(A) The truth
(B) Faithful witness
(C) Those who are crushed by it

23. Where does the words of a talebearer goes to?
(A) The ears
(B) Innermost body
(C) The mind

24. The words of a Talebearer is like what?
(A) Tasty triffles
(B) Seven abominations
(C) Deceit 

25. Who disguises with his lips. And lays up deceit within himself
(A) The Talebearer
(B) The lazy
(C) He who hates

26. As charcoal is to burning coals, and wood to fire, So is a contentious man to 
(A) Kindle strife
(B) Coal pot
(C) Quarrel

27. Where there is no wood, the fire goes out; And where there is no talebearer,
(A) Death ceases
(B) Strive ceases
(C) Lies ceases

28. A lazy man is wiser than seven men who can answer sensibly in what?
(A) His own eyes
(B) Wisdom
(C) Court

29. He who passes by and meddles in a quarrel not his own Is like who?
(A) One who binds a stone in a sling
(B) The legs of the lame that hang limp
(C) One who takes a dog by the ears

30. Where does a lazy man bury his hand
(A) In the grave
(B) In his bosom
(C) In the bowl

31. A man who deceives his neighbor, And says, "I was only joking!" is compared to who?
(A)  a madman who throws firebrands, 
arrows, and death
(B) One who hates but disguises it with his lips
(C) None of the above

 -->