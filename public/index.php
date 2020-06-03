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
		$start_time = date("H:i:s");
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

ACTS CHAPTER TWO

1. Which of the following was not a supernatural physical phenomenon that accompanied the initial outpouring of the Holy Ghost? (2:2-4)
(A) Divided tongues(Cloven) 
(B) Sound from heaven
(C) Earthquake

2. In what city did the initial outpouring of the Holy Ghost occur? (2:5)
(A) Antioch
(B) Jerusalem
(C) Samaria

3. At what time of the day did the Holy Ghost fall on the day of Pentecost? (2:15)
(A) Third hour
(B) Ninth hour
(C) First watch

4. What is not mentioned as a reaction that the observers had? (2:6, 7, 12, 13)
(A) Joy
(B) Amazement
(C) Mocking

5. The Holy Ghost outpouring was a fulfillment of whose prophecy? (2:16)
(A) David
(B) Joel
(C) Isaiah

6. The resurrection was a fulfillment of whose prophecy? (2:25-27)
(A) David
(B) Joel
( C) Isaiah

7. How did Peter reply to the question “what shall we do?” (2:38)
(A) He who believes and is baptized will be saved
(B) Repent, and … be baptized in the name of Jesus Christ for the remission of sins; and you shall receive the gift of the Holy Spirit
(C) If you confess with your mouth the Lord Jesus and believe in your heart … you will be saved

8. How many souls were added to the church after Peter spoke? (2:41)
(A) 12
(B) 120
(D) 3000

9. What was NOT mentioned as one of the things the new disciples continued to do? (2:42)
(A) In the apostles' doctrine
(B) Breaking of bread
(C) Fasting

10. What was NOT mentioned as one of the things the new disciples continued to do? (2:42)
(A) Fellowship
(B) Prayer
(C) None of the options above

11. Which of these statements is(are) NOT part of Apostle Peter's "sermon"
(A) Believe on the Lord Jesus Christ, and you will be saved
(B) 	If you confess with your mouth the Lord Jesus and believe in your heart … you will be saved
(C) Both of the options above

12. On the day of Pentecost, as they were all with one accord in one place, what kind of sound from heaven did they hear? (2:2)
(A) A sound like a still small voice
(B) A sound like a mighty rushing wind
(C) A sound of cloud

13. What happened unto and sat upon each of them on the day Pentecost in the upper room?
(A) There appeared to them divided tongues, as of fire, and sat upon each of them
(B) There appeared to them a dove as Holy Ghost and sat upon each of them
(C) There appeared to them a mantle of fire and sat upon each of them

14. What were they filled with, How did they speak and what gave them the utterance? (2:4)
(A) They were all filled with giftings and began to prophecy as Jesus gave them utterance
(B) They were all filled with the Holy Spirit and began to speak with unknown tongues, as the spirit gave them utterance 
(C) They were all filled with the Holy Spirit and began to speak with other tongues, as the Spirit gave them 
utterance 

15. They were amazed and marveled to hear their own language because the one's who were speaking were? (2:7)
(A) Apostles
(B) From Galilee
(C) Uneducated

16. Who did the prophet Joel say would dream dreams? (2:17) 
(A) Sons and daughters
(B) Old men
(C) Young men

17. Who did the prophet Joel say would Prophesy?(2:17)
(A) Young men
(B) Old men
(C) Sons and daughters

18. Who did the prophet Joel say would see visions?(2:17)
(A) Young men
(B) Old men
(C) Sons and daughters

19. Who in those days would the spirit be poured out on to be able to prophesy? (2:18)
(A) His Menservants 
(B) His Maidservants
(C) Both of the options above

20. On that great and notable day of the Lord's return, what will happen to them that call on the name of the Lord?
(A) Shall pray
(B) Shall be saved
(C) Shall save

21. How was Jesus approved by God by the men of Israel? (2:22)
(A) By miracles, wonders, and signs which God did through him
(B) By the acts of the Apostles
(C) By his words

22. Him, being delivered by the determinate council and foreknowledge of God, ye have taken, and by lawless hands have ___ and ___: (2:23)
(A) Been crucified, put to death
(B) Been betrayed, and put to death
(C) Been called, put to death

23. When Jesus was raised up what was loosed? (2:24)
(A) Pains of death
(B) Death
(C) Hell

24. How did the new converts eat their meat? (2:46)
(A) With gladness and simplicity of heart
(B) With wine
(C) With wisdom

25. David also said his heart rejoiced, his tongue was glad: what would happen to his flesh?(2:26)
(A) Rest in hope
(B) Merry
(C) Be burried

26. Before that great and notable day of the Lord's return, what will happen to the sun and the moon? (2:20)
(A) The sun shall be turned into darkness, And the moon into blood
(B) The sun shall be turned into blood, And the moon into darkness
(C) None of the options above

27. Peter testified and exhorted with many other words telling them to save themselves from what? (2:40)
(A) This perverse generation
(B) The day of the Lord
(C) The Sabbath

28. And all that believed were together, and had what? (2:44)
(A) Meals together
(B) All things in common
(C) Bible discussions

29. Wonders would be shown where? Where would signs be shown? (2:19)
(A) In heaven above, in the earth beneath
(B) In the earth beneath, In the heaven above
(C) In hell and hades

30. Peter said, " Therefore let all the house of Israel know assuredly, that God hath made that same Jesus, whom ye have crucified, both-what? (2:36)
(A) King and ruler
(B) Lord and Christ
(C) Head and Tail

31. Now when they heard Peter say this, what happened?(2:37)
(A) They were amazed
(B) They were cut to the heart
(C) They were confused

32. The Lord said unto my Lord, sit at my right hand, till what? (2:34-35)
(A) I make Your enemy Your stepping stone
(B) I make Your enemies Your 
footstool.
(C) I make Your enemy Your stool

33. There were some that mocked the Disciples for speaking in other tongues, what did they say about them? (2:13)
(A) They are going mad
(B) They do not know what they saying
(C) They are full of new wine

34. Who stood up to let the mockers know that the were wrong with their sayings? (2:14)
(A) Apostle Peter
(B) Apostle Paul
(C) Apostle John

35. At what time did Apostle Peter got up to speak?
(A) Third hour
(B) Noon
(C) First watch

 -->