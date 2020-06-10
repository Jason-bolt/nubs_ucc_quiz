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

ACTS CHAPTER 9

1. “Then Saul, still breathing __ and ___ against the disciples of the Lord, went to the high priest” (9:1)
(A) Threats, murder
(B) Anger, shame
(C) War, terror

2. What did Saul desire from the High Priest?
(A) Letters from him(high priest) to the Synagogues of Damascus.
(B) An advice from him( High Priest) to the Synagogues of Damascus
(C) A Sword from him(High Priest) to the Synagogues of Damascus

3. Where was Saul going when he was smitten down? (9:1-3)
(A) Azotus
(B) Damascus
(C) Gaza

4. By what means did the Lord tell Ananias to go to Saul? (9:10)
(A) Dream
(B) Vision
(C) Instructed by the apostles

5. What did the Lord show Ananias about Saul? (9:11)
(A) He was at the street called Straight
(B) He was at the house of Judas 
(C) Both of the options above

6. Why was Ananias reluctant to go to Saul? (9:13-14)
(A) He was warned by God in a dream
(B) His wife said for him to have nothing to do with this man
(C) He had heard from many how much harm Saul had done to the saints in Jerusalem

7. How did Saul escape from the Jews? (9:23-25)
(A) In a large basket
(B) By hiding on a roof top
(C) With the help of a garrison of Roman soldiers

8. Who declared unto the apostles that Saul had seen the Lord and preached boldly in the name of Jesus? (9:26-27)
(A) Barnabas
(B) Peter
(C) John

9. Where did the brethren send Saul to spare his life? (9:30)
(A) Azotus
(B) Caesarea
(C) Tarsus

10. God through Peter healed this person from paralysis? (9:33)
(A) Aeneas
(B) Dorcas
(C) James

11. For how many years has this person been paralyzed? (9:33)
(A) Three Years
(B) Eight Years
(C) Thirty eight Years


12. Who was raised from the dead at Joppa? (9:36-42)
(A) Aeneas
(B) Ananias
(C) Dorcas

13. At whose house did Peter stay many days? (9:43)
(A) Dorcas
(B) John
(C) Simon the tanner

14. Where did Saul take the men and women bound who were of the Way?(9:2)
(A) Jerusalem
(B) Damascus
(C) Caeserea

15. Whose house was Ananias told to go to? (9:11)
(A) Jude
(B) James
(C) Judas

16. Where did they lay Dorcas after she had been washed? (9:37)
(A) In a tomb
(B) Upper room
(C) In the temple

17. What did Saul eat while he was without sight? (9:9)
(A) Bread & water
(B) Very little
(C) He neither ate nor drank

18.  As soon as Saul received his sight, he arose and ___(9:18)
(A) Sang praises
(B) Preached
(C) Was baptized

19. At Joppa there was a certain disciple named Tabitha which is translated ___(9:36)
(A) Mary 
(B) Dorcas
(C) Martha

20. Peter stayed many days in __(9:43)
(A) Tarsus
(B) Joppa
(C) Antioch

21. Saul spoke boldly in the name of the Lord Jesus and disputed against the
(A) Pharisees
(B) Hellenists
(C) Priests

22. After Saul received his sight, he spent some days with the disciples at __ (9:19)
(A) Damascus
(B) Jerusalem
(C) Antioch

23. Saul was struck with what physical problem after hearing Jesus on the road to Damascus? (9:8)
(A) Deafness
(B) Blindness
(C) Became mute

24. What was the name of the street on which the Lord told Ananias to go to find Saul? (9:11)
(A) Straight
(B) Broad
(C) Narrow

25. The Lord tells Ananias that Saul is____(9:15)
(A) A good and just man
(B) A chosen vessel
(C) A devout vessel

26. At what city did Peter find Aeneas?(9:32)
(A) Joppa
(B) Jerusalem
(C) Lydda

27. How many verses are in Acts Chapter 9?
(A) 40
(B) 42
(C) 43

28. Now after many days were past, the Jews ___. (9:23)
(A) Planned a celebration in honor of Saul's dedication to Christ
(B) Plotted to kill him
(C) Demanded that Saul perform some miracles

29. After Paul was sent to Tarsus, the churches had peace and were edified throughout what 3
regions? (9:31)
(A) Samaria, Judea, Jerusalem
(B) Judea, Galilee, Samaria
(C) Antioch, Judea, Samaria

30. What was the occupation of Simon? (9:40)
(A) A Tanner
(B) Carpenter
(C) Fisherman

31. The people of Joppa sent two men unto Lydda to get who to come to them? (9:38)
(A) Peter
(B) Saul
(C) John

32. What are the first two words of Acts chapter 9?(9:1)
(A) Now Saul
(B) Then Saul
(C) There was

33. The last word of Acts Chapter 9 is a name of a
(A) Man
(B) Profession
(C) A City

 -->