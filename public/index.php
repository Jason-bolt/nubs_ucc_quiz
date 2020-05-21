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

CHAPTER 20

What is a mocker?
(A) Strong drink
(B) Scoffer
(C) Wine

2. What is brawler?
(A) Wine
(B) Strong drink
(C) Alcohol 

3. What is the wrath of the king compared to?
(A) An angry lion
(B) The roaring of a lion
(C) Wrath of a lion

4. For a man to stop striving is what?
(A) Honourable
(B) Peace seeking
(C) Calmness

5. Who does not plow for the winter?
(A) Idle hands
(B) A lazy man
(C) Slumberer 

6. What is like deep water?
(A) Wisdom
(B) Understanding
(C) Councel

7. What do most men proclaim?
(A) Faithfulness
(B) Their own goodness
(C) Goodness and mercy

8. Whose children are blessed after him?
(A) A king who sits on a throne
(B) Rich people
(C) The righteous man who walks in his integrity

9. Who scatters evil with his eyes?
(A) A king who sits on the throne of judgment
(B) Men
(C) The righteous who walks in intergrity

10. What are an abomination to the Lord?
(A) Diverse weights and measures
(B) Diverses  weights
(C) Diverse measures

11. Even a child is known by his what?
(A) Deeds
(B) Righteousness
(C) His parents

12. The Lord has made both the hearing ear and the what?
(A) Seeing eye
(B) Seeing heart
(C) Seeing

13. If you love sleep you may come to what?
(A) Poverty
(B) Lack of bread
(C) Hunger

14. What are a precious jewel?
(A) The lips of knowledge
(B) Understanding
(C) Discerning heart

15. What is sweet to a man but is afterwards as gravel?
(A) Bread gained by deciept
(B) Bread gained against deciept
(C) Bread gained into deciept

16. By what kind of counsel should war be waged?
(A)Wise
(B) Wicked
(C) Haughty

17. Do not associate with what person?
(A) Tale bearer
(B) The one that flatters with the lips
(C) The flatter and the tale bearer

18. An inheritance gained hastily will not be what at the end?
(A) Remain
(B) Blessed
(C) Increased

19. Whose lamp will be put out in deep darkness?
(A) Those that curse father and mother
(B) They that curse father with mother
(C) They that curses fathers

20. Do not say, `I will recompense evil` for who will save you?
(A) The knowledge of God
(B) The Lord
(C) The fear of the Lord

21. What are not good?
(A) Dishonest scales
(B) Diverse weights
(C) Idle hands

22. Whose steps are of the Lord?
(A) A man
(B) A man who commits his ways to the Lord
(C) A wise man

23. For a person to devote a thing as holy and afterwards reconsider, it is a what?
(A) Unbelief
(B) A snare
(C) A Haste

24. What is a lamp to the Lord so that He can search the inward heart?
(A) The word
(B) Man's spirit
(C) Understanding

25. By what does the king uphold his throne?
(A) Power
(B) Loving Kindness
(C) Mercy and truth

26. What is the splendor of old men?
(A) The gray head
(B) The gray hair
(C) The grey hair

27. What will cleanse away evil?
(A) Blows that hurts
(B) Stripes
(C) Righteousness

28. Whoever provokes a king to anger.
(A) Will be devoured
(B) Sin against his own life
(C) Put danger against in his own life

29. What will a man of understanding draw out in the heart of man?
(A) Councel
(B) Deep waters
(C) Wisdom

30. Who brings a threshing wheel over the wicked?
(A) A King
(B) Wise King
(C) The Lord

(31) By what are plans established?
(A) Understanding
(B) The Lord
(C) Council

32. Hold a garment as a pledge when it for?
(A) A seductress
(B) A surety
(C) A stranger

33. Who reveals secret?
(A) One who flatters with his mouth
(B) A talebearer
(C) Non of the above

34. What searches the inner depth of a man's own heart?
(A) The spirit of the man
(B) The lamb of the Lord
(C) Both of the above

 -->