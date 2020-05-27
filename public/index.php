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

CHAPTER 27

1. What reveals a man?
(A) His heart
(B) His words
(C) His friends

2. What reflects face?
(A) Water
(B) Mirror
(C) The Lord

3. What does a man who waits on his master receive?
(A) Honour
(B) Encouragement
(C) A gift and a present

4. Whoever keeps a fig tree will
(A) Eat Its fruit
(B) Will be eaten by its fruit
(C) Will be rich

(5) Whom does a man sharpens?
(A) His brother
(B) His friend
(C) Himself

(6) What does an iron sharpens?
(A) Iron
(B) Iron rod
(C) Rod

7. Whoever restrains a contentious woman does what?
(A) Grasp oil with his right hand
(B) Restrains the wind
(C) Both of the options above

8. What is likened to a contentious woman?
(A) A contentious woman
(B) A continual dripping on a very rainy day
(C) Both of the options above

9. A loud greeting or blessing in the early morning is counted as a
(A) Conversation
(B) Humour
(C) Curse

10. What does a prudent man do when he foresees evil?
(A) Hides
(B) Flee
(C) Pass on

11. What makes a heart glad?
(A) When one who reproaches is answered
(B) A pure heart
(C) A Wise son

12. Who is better than a brother?
(A) A friend
(B) A father
(C) A nearby neighbour

13. Whom are we advise not to forsake (abandon)?
(A) A friend- either yours or your father's
(B) A close neighbour
(C) A brother

14. It is advisable not to go to a brother when You are
(A) In solemn
(B) In anger
(C) Calamity

15. The sweetness of a friend gives delight. When can this delight be experience?
(A) From Ointment and perfume
(B) Hearty council
(C) Both of the options above

16. We are advise not to boast about what?
(A) Ourselves
(B) Tomorrow
(C) Riches

17. We should not praise ourselves with our own?
(A) Strings and Cymbals
(B) Enemies
(C) Mouth and lips

18. What is heavier than the stone and the sand?
(A) A fool's heart
(B) A fool's wrath
(C) A fool's foolishness

19. Jealousy is more dangerous than what?
(A) Wrath and anger
(B) Wrath and hatred
(C) Hatred and anger

20. Open rebuke is better than
(A) Concealed (unexpressed) love
(B) Hidden rebuke
(C) Gossip

21. If the wounds of a friend is faithful, what is the kisses of an enemy.
(A) Unfaithful
(B) Deceit
(C) Destruction

22. What is sweet to a hungry soul?
(A) Everything
(B) Everything bitter thing
(C) Honeycomb

23. How do You feel when You are far from home?
(A) Like a bird that wanders from its nest
(B) Without hope and unhappy
(C) Everyone is against You

24. The lambs will provide your clothing, And the goats ........
(A) Your shelter and housing
(B) The price of a field
(C) Both of the options above

25. You shall have enough milk, meat and nourishment for your household and maidservants from 
(A) The rich
(B) Lamb
(C) Goat

26. What will happen when the hay is removed, and the tender grass shows itself, And the herbs of the mountains are gathered in,
(A) There shall be ointment and perfume
(B) There shall be clothing, food and milk
(C) None of the options above

27. What is compared to the dissatisfaction of the eye?
(A) The never fullness of hell and destruction
(B) The dissatisfaction of hell and destruction
(C) The never fullness of hell and fire

28. Upon what is a man's value determined?
(A) His deeds
(B) His riches
(C) What others say of him

29. What will happen when a fool is grinded in a mortar with a pestle along with crushed grain
(A) He will die
(B) He will learn wisdom
(C) His foolishness will not depart from him

30. Riches are not what?
(A) Generational
(B) Wealth
(C) Forever

31. What kind of knowledge is a man expected to be diligent about?
(A) The state of their flocks
(B) Wisdom
(C) The understanding of a man

32. It is expected of a man to attend to what
(A) His flocks
(B) His herds
(C) His Lamb

 -->