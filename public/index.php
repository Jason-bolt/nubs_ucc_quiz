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

ACTS CHAPTER 10

1. What was Cornelius’ occupation? (10:1)
(A) Carpenter
(B) Centurion
(C) Governor

2. Which of the following was NOT mentioned as a good quality of Cornelius? (10:2, 22, 24, 30)
(A) Devout and Feared God
(B) Fasted and Gave alms
(C)	None of the options above

3. By what means did Cornelius know to send for Peter? (10:3-6)
(A) An angel appeared to him
(B) Peter’s reputation had spread to Caesarea
(C) His servants told him to

4. What vision did Peter see? (10:11-17)
(A) A great sheet
(B) Cornelius praying
(C) Gentiles receiving the Holy Ghost

(5) Who went with Peter to Caesarea? 10:23, 11:12)
(A) John Mark
(B) Philip and Saul
(C) Six Jewish brethrens

6. What did Peter say to refuse worship from Cornelius? (10:25-26)
(A) Man looks on the outward appearance but God looks on the heart
(B) Stand up; I myself am also a man
(C) We also are men of like passions with you

7. How did Peter know that the household of Cornelius received the Holy Ghost? (10:44-46)
(A) They believed on the Lord Jesus with all their hearts
(B) They repented of their sins
(C) None of the options above

(8) How did Peter know that the household of Cornelius received the Holy Ghost? (10:44-46)
(A) They heard them speak with tongues and magnify God
(B) They sold their goods and gave half to the poor
(C) None of the options above

9. What did Peter command them to do after they received the Holy Ghost? (10:48)
(A) Be baptized in the name of the Lord
(B) Continue in the apostle’s doctrine
(C) Go into all the world and preach the gospel to every creature

10. According to Acts 10: 1, where did Cornelius live?
(A) Antioch
(B) Caesarea
(C) Capernaum

11. After having his vision, Cornelius sent two of his servants and a soldier to what town?
(A) Crete
(B)Joppa
 (C) Antioch

12. Acts 10: 25 tells of the disciple Peter entering Cornelius' house. How did Cornelius greet him?
(A) Wanted to know where the disciple Andrew was.
(B) Kissed Peter on both cheeks.
(C) Fell at Peter's feet in reverence.

13. According to Acts 10: 27, how many people were at Cornelius' house to meet Peter?
(A) A large gathering of people
(B) There was no one apart from Cornelius
(C) About three or four people

14. What did Peter say to the people at Cornelius' house, as per Acts 10: 34?
(A) "I have never been so disillusioned in all my life as these people are not worthy of eternal life."
(B) "I now realize how true it is that God shows favoritism and will only accept certain non-Jewish believers."
(C) "I now realize how true it is that God does not show favoritism but accepts men from every nation who fear him and do what is right."

15. How does chapter 10 of Acts conclude?
(A) The people demanded that Peter depart immediately.
(B) The people said Peter should invite the other disciples to visit them.
(C) None of the options above

16. How does chapter 10 of Acts conclude?
(A) The people said Peter reminded them of another person in their town.
(B) The people asked Peter to stay a few days.
(C) None of the options above

17. What was the name of Cornelius' army group? (10:1)
(A) Roman Regiment
(B) Italian Regiment
(C) Caesarea Regiment

18. At what hour of the day did Cornelius see a vision in which an angel of God spoke to him? (10:3)
(A) About the Ninth Hour
(B) About the Third Hour
(C) About the Fourth Hour

19. Fill in the blank in this passage: Your prayers and your alms have come up for ___ (10:4)
(A) A reward from God
(B) A memorial before God
(C) A visit from a servant from God (Peter)

20. A Christian named Simon had what surname? (10:5)
(A) The Tanner
(B) Peter
(C) Both of the options above

21. With whom was Peter staying when Cornelius sent Messengers to call for him? (10:6)
(A) Simon the tanner
(B) Aquila the tent maker
(C) Josephus the porter

22. Who did Cornelius sent to call for Peter? (10:7)
(A) Three devout soldiers
(B) Three devout household servants
(C) Two household servants and a devout soldier

23. Where was Simon the tanner’s house located?(10:6)
(A) By the sea
(B) Straight Street
(C)On the mountain

24. What was Peter doing on the housetop in Acts 10?(10:9)
(A) Praying
(B) Reading
(C) Preaching

25. Who are the selected persons who Jesus appeared to after His resurrection, according to Peter? (10:41)
(A) The Apostles
(B) spies
(C) The chosen ones

26. While Peter was on the housetop in Acts 10, who came to the door of the house?(10:19)
(A) The men from Cornelius
(B) The men from Paul
(C) The men from Barnabas

27. What was in the great sheet that Peter saw in his vision in Acts 10?(10:12)
(A) All kinds of four footed animals, crawling creatures, and birds
(B) All kinds of people from all over the world
(C) All kinds of gods made from various materials

28. God is not one to show what in? (10:34)
(A) Partiality
(B) Hatred
(C) Anger

29. . In Acts 10:35, Peter said God welcomes those who ___ Him and do what?
(A) Fear, what's right
(B) Love, what feels good
(C) Respect, talk to him

30. According to Acts 10:47, what is necessary in order for someone to be baptized?
(A) Water
(B) Blood
(C) Ashes

31. “And we are witnesses of all things which He did both in the land of the ___ and in _____, whom they killed by hanging on a tree.” 10:39
(A) Jews, gentiles
(B) Jews, Jerusalem
(C) Jews, Samaria

32. “The word which God sent to the children of Israel, preaching peace through Jesus Christ--He is what?–” Acts 10:36 
(A) The reigning king
(B) Seated at the right hand of God
(C) He is Lord of all

 -->