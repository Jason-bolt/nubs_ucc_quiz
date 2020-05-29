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

CHAPTER 28

1. What happens to a man who hardens his heart?
(A) Poverty
(B) Calamity
(C) Hatred

2. What is compared to the wicked who rules over poor people?
(A) Charging lion and a roaring beer
(B) Roaring lion and a charging beer
(C) None of the options above

3. A ruler who lacks understanding is
(A) Wicked
(B) Oppressor
(C) Contentious

4. What does a man who hates covetousness enjoy?
(A) Prolonged days
(B) Riches
(C) Happiness

5. Where does a man burdened with blood shed flees into?
(A) Place of refuge
(B) Trouble
(C) A pit

6. He who walks blamelessly will be
(A) Saved
(B) Blameless
(C) A ruler

7. What suddenly happens to a man who is pervese in his ways?
(A) A fall
(B) Death
(C) Anger

8. A man who tills his land will have plenty of what?
(A) Riches
(B) Bread
(C) Gain

9. A man who follows frivolity will what?
(A) Be Poor
(B) Flee
(C) Be wicked

10. Who abounds in blessings?
(A) The faithful
(B) The rich
(C) A ruler over righteous men

11. What will make a man to transgress?
(A) Contentions
(B) Piece of bread
(C) Partiality

12. What happens to a greedy(evil eye) man who tries to get rich quickly
(A) He suddenly falls
(B) He comes to Poverty
(C) He falls into contention

13. He who rebukes a man finds more favour than 
(A) The Contentious
(B) The Flatter
(C) The poor

14. Whoever robs his father or his mother, And says, "It is no transgression". Is no better than who
(A) A destroyer
(B) A charging lion and a roaring bear
(C) The poor

15. What happens when the wicked perishes?
(A) The righteous increase
(B) Wickedness will be no more
(C) Men rejoice

16. What does men do when the wicked arise
(A) They fall
(B) They hide
(C) They take a stand

17. What will happen to a man who hides his eyes to the needs of the poor?
(A) He will receive many curses
(B) He will be in need
(C) He will loose his riches

18. He who gives to the poor will
(A) Not lack
(B) Will give more
(C) Will receive 

19. A person who trusts in his own heart is
(A) Right in his own eyes
(B) A fool
(C) Self seeking

20. He who trust in the Lord 
(A) Will be delivered
(B) Will prosper
(C) Will take a stand

21. What stirs up strife?
(A) Proud heart
(B) Poverty
(C) Calamiy

22. Whoever walks wisely 
(A) Will be delivered
(B) Will prosper
(C) Will never lack

23. He who covers his sins will
(A) Never receive forgiveness
(B) Not prosper
(C) Will be guilty of
 sin

24. Whoever ........... his sins will have mercy
(A) Confesses
(B) Confesses and forsakes
(C) believes

25. Who is bold as a lion?
(A) The rich
(B) A ruler
(C) The righteous

26. When does the wicked flee?
(A) When no one pursue
(B) When the righteous pursue
(C) When no one is pursued

27. A
......... man who oppresses the poor, is like a.......... which leaves no food. 
(A) Wicked, driving rain
(B) Rich, driving rain
(C) Poor, driving rain

28. Those who keep the law contend with which people?
(A) The wicked
(B) Those who forsake the law
(C) Companion of gluttons

29. Those who seek the Lord understand what?
(A) Evil men
(B) Justice
(C) People

30. It is better to be poor with integrity(honesty) than to be
(A) Poor without integrity(honesty)
(B) Rich without intergrity(honesty)
(C) Rich with intergrity(honesty)

31. Whoever keeps the law is what?
(A) A Discerning son
(B) Obedient
(C) Faithful

32. When the righteous rejoice there is great
(A) Joy
(B) Happiness
(C) Glory

33. Whoever causes the upright to go 
astray in an evil way will fall into where
(A) Death
(B) His own pit
(C) Unpardonable punishment

34. Whose prayer is an abomination?
(A) Whoever turns his ears from hearing the law
(B) Companion of gluttons
(C) The rich who rules over the poor

35. Whoever increases wealth by taking interest or profit from the poor amasses it for another which kind of person?
(A) The rich
(B) Him who will pity the poor
(C) He who rebukes a man

 -->