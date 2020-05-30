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

CHAPTER 29

1. An unjust man is an abomination to 
(A) The Lord
(B) The righteous
(C) The king

2. How many people seek the favour of the ruler?
(A) Many people
(B) Some people
(C) Few people with authority 

3. The Justice of a man comes from where?
(A) The Court
(B) The Lord
(C) Righteousness

4. What brings as a snare(dangerous trap) into a man's life?
(A) Trust of unjust men
(B) The words of a fool
(C) The fear of man

5. What can keep a man safe from the snare in question 4?
(A) Trust in the Lord
(B) Obedience
(C) Fear of the Lord

6. Whoever partakes in a crime with a thief hates his own life because.
(A) He swears to tell the truth, but reveals nothing
(B) Can be caught and get killed
(C) On the path of destruction

7. What does a man's pride does to him
(A) Makes him wise in his own eyes
(B) Brings him low
(C) Turns him to be arrogant

8. What kind of spirit retains honour?
(A) Holy Spirit
(B) Humble spirit
(C) Honoured spirit

9. Who stirs up strife(argument)?
(A) An Angry man
(B) A furious man(quick-tempered man) 
(C) The wicked

10. He who pampers his servant from 
childhood Will have him as a son in the 
end. 
(A) Child, servant hood, son
(B) Servant, childhood, son
(C) Servant, servant hood, son

11. Who has more hope than a man hasty in his words( a man who speaks without thinking)
(A) A fool
(B) The wicked
(C) An angry man

12. A servant will not be corrected by?
(A) A servant
(B) Mere words
(C) Punishment

13. Though a servant understands corrections from mere words but 
(A) He will not respond
(B) He will not understand
(C) He will be not be corrected

14. What happens when there is no revelation?
(A) People cast off restrain (order)
(B) There shall be no leader
(C) There shall be no joy

15. What makes people to keep the law?
(A) Happy
(B) When there is no revelation
(C) None of the options above

16. What does a parent receive when he corrects a son?
(A) Rest and delight
(B) Wisdom
(C) Both of the options above

17. What happens when the wicked multiply?
(A) The righteous perish
(B) Transgression increases
(C) Sorrow does not depart

18. The righteous shall see the fall of
(A) Thousand on their hand and ten thousand on the other hand
(B) Wicked
(C) Companion of gluttons

19. What gives wisdom?
(A) Rod 
(B) Rebuke
(C) Both of the options above

20. The throne of the king who judges the poor with truth will be what?
(A) Established forever
(B) Be mighty
(C) Gain Favour 

21. Who gives light to the eyes of the poor and oppressor?
(A) The eye witness
(B) The Lord
(C) Light bearer

22. Whose servants tends to become wicked?
(A) A wicked ruler who pays attention to lies
(B) A ruler who oppresses his servants
(C) A ruler who pays attention to lies

23. A fool easily looses his temper, but a wise man
(A) holds them back( controls his temper)
(B) Sits quietly
(C) Avoids quarrel

24. The upright seek the well being of 
(A) The bloodthirsty
(B) The blameless
(C) Both of the options above

25. Be wise and don't sue a fool. You won't get peace, because all the fool will do is 
(A) Fight
(B) Rage or laughs
(C) Mere words

26. If scoffers sets a city aflame, Who turns away wrath?
(A) A wise man
(B) A man
(C) The Lord

27. Whoever remains stiff-necked after many rebukes will suddenly be 
(A) Destroyed without remedy
(B) Destructive without remedy
(C) Destructive

28. What happens when the righteous is in authority?
(A) The people rejoice
(B) Wise people rejoice
(C) The righteous rejoice

29. A companion of harlots wastes 
(A) Her wealth
(B) Her father's wealth
(C) Her companion's wealth

30. The king establishes the land by justice, But he who receives bribes overthrows what?
(A) The land
(B) Justice
(C) Both of the options above

31. Who spreads the net for the feet of his neighbour?
(A) The wicked
(B) Flatterer
(C) Companion of harlots

32. What snares an evil man
(A) The fear of man
(B) Transgression
(C) Trust of unjust men

33. The righteous sings and 
(A) Dances
(B) Shouts
(C) Rejoices

34. Whoever loves wisdom makes
(A) His father rest
(B) His father rejoice
(C) His father sings

35. The wicked does not understand what knowledge?
(A) The cause(rights) of the poor
(B) The knowledge of righteousness(righteous life)
(C) Humility

 -->