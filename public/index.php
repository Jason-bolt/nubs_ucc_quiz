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

PROVERBS CHAPTER 22

1. A good name is better than.
(A) Silver and Gold
(B) Great riches
(C) Sacrifice

2. What makes a prudent man to hide himself?
(A) Evil
(B) Punishment
(C) From shame

3. What does humility and the fear of the Lord produce?
(A) Honour, riches and life
(B)  Honour, glory and peace
(C) Honour, riches and peace

4. He who guards his soul will be far from
(A) Thorns and thistles
(B) Thorns and snares
(C) Death

5. Whom does the rich rule over?
(A) The borrower
(B) The poor
(C) Servants

6. What is the outcome of the rod of anger of a person who sows iniquity?
(A) Failure
(B) Sorrow
(C) None of the above

7. Who generously gives bread to the poor?
(A) The rich
(B) The generous giver
(C) Lender

8. What happens when contention leave?
(A) Strife and reproach cease
(B) Scoffer is casted out
(C) All the above

9. Who will be the friend of a king?
(A) Lover of pure heart with gracious lips
(B) The rich
(C) None of the above

10. In contrast to knowledge, The Lord overthrows
(A) The words of faithless
(B) One abhorred by The Lord
(C) Wicked rulers

11. What is a deep pit?
(A) The voice of the wicked
(B) The mouth of an immoral woman
(C) The mouth of a woman

12 What is used to drive foolishness from the heart of a child?
(A) Rod
(B) Rod of correction
(C) Rod of wisdom

13. When foolishness is driven from a child's heart where does it go?
(A) Far from him
(B) Around
(C) None of the above

14. What will surely happen to a person who gives to the rich?
(A) Will become poor
(B) Will increase in riches
(C) Will lend to the poor

15. What should we apply our hearts to, after hearing wisdom?
(A) Wisdom
(B) Instruction
(C) Knowledge

16. What should be fixed upon lips of a man?
(A) Knowledge and wisdom
(B) Wisdom and riches
(C) Knowledge and power

17. What will happen to a man who oppresses the poor to increase riches?
(A) Will grow in riches
(B) Will become poor
(C) Will lend to the poor

18. Proverbs make one to know the certainty of what?
(A) Truth
(B) The rich
(C) The good hearted

19. What does the eyes of the Lord preserves?
(A) Knowledge
(B) Wisdom
(C) Understanding

20. One should not........ the poor nor........ afflicted.
(A) Oppress, rob
(B) Rob, Oppress
(C) Kill, hate

21. Why should the correct option above not be done to the poor and afflicted?
(A) The Lord will plead their cause
(B) The Lord will plunder the soul of those who plunder them
(C) Both of the above

22. With whom is a man advise not to make friends with?
(A) A poor man
(B) An angry man
(C) A furious man

23. With whom is a man advise not to move with?
(A) A poor man
(B) An Angry man
(C) A furious man

24. Who will stand before kings?
(A) A man who excels in his work
(B) A gifted hands
(C) A rich man

25. What should not be removed?
(A) Ancient landmark
(B) The fear of God
(C) The Lord

26. Do not shake hands with what?
(A) Agreement
(B) Pledge
(C) Dispute

27. Who pleads the cause of the poor and afflicted?
(A) He who has mercy on the poor
(B) The Lord
(C) The rich

28. What is bound in the heart of a child?
(A) Foolishness
(B) Angry
(C) Fury

29. Where is it a pleasant thing to keep the words of the wise?
(A) Passed on
(B) Within You
(C) Above

30 Who says there is a lion outside?
(A) The poor
(B) An immoral woman
(C) The Lazy

31 The King's friend will have what on his lips?
(A) Councel 
(B) Grace
(C) Words

32. Who made the rich and the poor?
(A) The Lord
(B) Themselves
(C) None of the above

33. What should be chosen rather than having gold and silver?
(A) Good name
(B) Loving favour
(C) Loving Kindness

 -->