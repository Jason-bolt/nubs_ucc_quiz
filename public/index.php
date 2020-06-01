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
		$start_time = date("h:i a");
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

CHAPTER 31

1. Proverbs 31:9 says, "Open your mouth, judge righteously, 
And plead the cause of the poor and needy"
(A) True
(B) False

2. Please, did You notice whose words make up Proverbs 31?
(A) King Lemuel
(B) King Solomon
(C) King Lemuel's mother

3. According to Proverbs 31, a noble wife is worth more than what?
(A) Gold
(B) Emeralds
(C) Rubies

4.  Based on verse 12 , a wife of a noble character brings what to her husband?
(A) Children
(B) Good
(C) Gold

5. Proverbs 31:7 says, "Let him drink and forget his poverty, 
And remember his misery no more." 
Based on this verse, what should he let them do?
(A) Stay sober
(B) Drink
(C) Become rich

6. According to Proverbs 31, the children and the husband praise the noble wife.
(A) True
(B) False

7. In verse 22 in Proverbs 31, it mentions that the virtuous wife's household is clothed in scarlet. The wife herself is clothed in fine linen in what color?
 (A) Pink
 (B) Purple
 (C) Scarlet

8. In Proverbs 31, it says in verse 26 that the (virtuous wife) speaks with what?
(A) Patience
(B) Wisdom
(C) Honesty

9. In verse 2 of Proverbs 31 the word "what" means "listen". So how many times did Lemuel's mother told him to "listen"?
(A) 3
(B) 2
(C) 1

10. In Proverbs 31, according to verse 4, what are kings not to drink?
(A) Soda
(B) Wine
(C) Water

11. Who can find ____ woman?
 (31:10a)
(A) An attractive
(B) An honest
(C) A virtuous

12. Favor is deceitful, and ___ is vain: but a woman that fears the LORD, she shall be praised. (31:30)
(A) Beauty
(B) Flattery
(C) Wealth

13. The first ____ verses of Proverbs 31 have very little to do with a virtuous woman.
(A) 9          
(B) 15
(C) 12

14. How many verses are in Proverbs 31?
(A) 31
(B) 30
(C) 33

15. What kind of woman is most praised? (vs. 30)
(A) Early riser and a mother
(B) Good cook              
(C) Fears the Lord

16. Would you say the Proverbs 31 woman is described as especially beautiful physically or more of a woman who works hard and is an asset to the family, community, and husband.
(A) Physical beauty
(B) Works hard
(C) None of the options above

17. According to verse 16, would you say the Proverbs 31 woman is a good real estate agent? 
(A) Yes              
(B) No

18. Do not give your strength to? Verse 2
(A) Idleness
(B) Women
(C) Dissension

19. She does this with her hands?
(A) Hides
(B) Honours
(C) Willingly works

20. Her household is clothed with
(A) Glory 
(B) Scarlet
(C) Beauty

21. In her tongue is the law of ____
(A) Order
(B) Kindness
(C) Commandments

22. Her children rise up and call her
(A) Mother
(B) Blessed
(C) Virtuous woman

23. Where did King Lemuel learnt his utterance?
(A) In wisdom
(B) From his mother
(C) In experience

24. When kings drink ___ they drink and forget the ____, And pervert the _____ of all the afflicted
(A) Wine, law, way
(B) Soda, law, justice
(C) Wine, law, justice

25. A virtuous woman can be likened to
(A) Gold
(B) Merchant ships
(C) None of the options above

26. What garment does the virtuous woman makes and sell?
(A) Linen garments
(B) Wool and flax
(C) Beautiful garments

27. In verse 25, what is the clothing of a virtuous woman? 
(A) Linen garment
(B) Strength and honour
(C) Both of the options above

28. What does she supply for the merchants? verse 24
(A) Linen garments
(B) Sashes
(C) Flax and wool

29. In verse 21, her household is clothed with what?
(A) Joy
(B) Scarlet
(C) Linen garment

30. She extends and reaches her hand to the
(A) Poor
(B) Needy
(C) Both of the options above

31. Her ___ does not go out by night
(A) Lamp
(B) Children
(C) Feet

32. According to Chapter 31, what is the clothing of a virtuous woman?
(A) Linen garment
(B) Strength and honour
(C) Both of the options above

 -->