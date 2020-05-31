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

CHAPTER 30

1. The churning (squeezing) of milk produces
(A) Milk
(B) Butter
(C) Drink

2. The wringing(punching) of nose produces
(A) Bad smell
(B) Blood
(C) Smell

3. The forcing of ........ produces ........
(A) Strife, wrath
(B) Wrath, strife
(C) Strike, wrath

4. Who is advised to put his or her hand on his mouth?
(A) One who foolishly exalts himself
(B) One who devises evil
(C) Both of the options above

5. Mr. Agur mentioned four things which stately (magnificently) walks. These are
(A) Lion, greyhound (male dog), male goat and a king with many troops
(B) Lion, locust, goat and a king with many troops
(C) Lion, greyhound (male dog), locust and a king with many troops

6. Who is described as a mighty beast who does not turn away from any?
(A) Eagle
(B) King with many troops
(C) Lion

7. He skillfully grasps with its hands, And it is in kings' palaces. 
(A) Spider
(B) Wise servant
(C) Ant

8. Which kind of animals have no king?
(A) Ants
(B) Rock Badgers
(C) Locusts

9. Which kind of animals advance in ranks?
(A) Ants
(B) Rock Badgers
(C) Locusts

10 ......... has two daughters-- Give and Give!
(A) A leech
(B) A woman
(C) A young maiden

11.  Which kind of animals makes their homes in crags(face of rocks)?
(A) Ants
(B) Rock Badgers
(C) Locusts

12. Which kind of animals are considered to be feeble folks?
(A) Ant
(B) Rock Badgers
(C) Locusts

13. The are a people not strong, Yet 
they prepare their food in the summer
(A) Ants
(B) Rock Badgers
(C) Locusts

14. This chapter are words of
(A) Solomon
(B) Jakeh
(C) Agur

15. He describes himself as
(A) Stupid
(B) Knowledgeable
(C) Wise

16. Every word of God is
(A) Pure
(B) Shield
(C) Both of the options above

17. There is a generation that is pure 
(A) Before God
(B) In their own eyes
(C) and blameless

18. The grave, the barren woman, the dry earth and fire are
(A) Punishment
(B) A shame
(C) Never satisfied

19. She eats and wipes her mouth, 
And says, I have done no evil
(A) An adulterous woman
(B) The foolish woman
(C) The young maid

20. One thing the earth cannot bear, is a hateful woman who is
(A) Crying
(B) Loud
(C) Married

21. What kind of animal will eat the eye that mocks his father, And scorns obedience to his mother
(A) Ravens in the valley
(B) Young Eagles
(C) Leech

22. There are ......... things which are too wonderful for me, Yes,......... which I do 
not understand: 
(A) Four, three
(B) Three, four
(C) Four, four

23. For .........things the earth is perturbed, 
Yes, for..........it cannot bear up: 
(A) Four, three
(B) Three, four
(C) Four, four

24. The words in this chapter was declared to
(A) Ithiel and Ucal
(B) Jakeh
(C) Solomon

25. Who is known to be the son of Agur
(A) Jakeh
(B) Solomon
(C) None of the options above

26. There are.......... things which are majestic in pace, Yes, ....... which are 
stately in walk
(A) Four, three
(B) Four, four
(C) Three, four

27. There is a generation whose teeth are like ........, And whose fangs are like ........
(A) Swords, fire
(B) Knife, fire
(C) Sword, knife

28. The word of God is pure. If you add to the word, You will be found
(A) A liar
(B) In hell
(C) In judgement

29. The writer's prayer was that, God should not
(A) Make him rich nor poor
(B) Feed him with the food allotted to him
(C) Both of the options above

30. The writer requested to God not to deny him of two things. The two things he request was that?
(A) Remove falsehood and lies far from me
(B) Give me neither poverty nor riches
(C) Both of the options above

31. Some of the four things the writer did not understand was. The way of an eagle in the air, The 
way of a serpent(snake) on a 
(A) Tree
(B) Soil
(C) On a rock

 -->