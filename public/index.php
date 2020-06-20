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

ACTS CHAPTER 19

1. Person who had a school where Paul disputed daily for two years. (19:9-10)
(A) Alexander
(B) Tyrannus
(C) Gaius

2. Person who had seven sons who were exorcists. (19:13-16)
(A) Demetrius
(B) Gaius
(C) Sceva

3. A silversmith. (19:24)
(A) Alexander
(B) Aristarchus
(C) Demetrius

4. Goddess of the Ephesians. (19:27)
(A) Damaris
(B) Diana
(C) Phebe

5. What question did Paul ask the twelve disciples of John the Baptist at Ephesus? (19:2)
(A) Can I explain to you the way of God more accurately?
(B) Did you receive the Holy Spirit when you believed?
(C) Do you understand what you are reading?

6. All who dwelt in Asia heard the word of the Lord Jesus both Jews and Greeks. (19:10)
(A) True
(B) False
(C) Neither true nor false

7. Who rescued Paul from being killed? (19:35-41)
(A) Alexander
(B) Chief captain
(C) Jailer

8. What special miracles did God work through Paul? (19:11-12)
(A)	Handkerchiefs or aprons were brought from his body to the sick, and the diseases left them and the evil spirits went out of them
(B) People were healed by his shadow
(C) People touched the hem of his garment and were healed

9. What did those who used curious arts do with their books? (19:19)
(A) Burned them
(B) Gave them away
(C) Read them

10. Where did Paul go on his third missionary journey while Apollos was at Corinth (Acts 19:1)?
(A) Troas
(B) Philipi
(C) Ephesus

11. What baptism had the Ephesian disciples had (Acts 19:3)?
(A) The baptism of water
(B) The baptism of the Holy Spirit
(C) The baptism of John the Baptist

12. How were the Ephesian believers baptized a second time (Acts 19:5)?
(A) In the Holy Spirit
(B) Into the water and the blood of Jesus
(C) In the name of the Lord Jesus

13. When did the Holy Spirit come on the Ephesian disciples (Acts 19:6)?
(A) When they were baptized
(B) When Paul laid his hands on them
(C) When they confessed Jesus as Lord

14. How did some Jews try to cast demons out of people (Acts 19:13)?
(A) By the Jesus whom Paul preaches
(B) By commanding them to come out by the Holy Spirit
(C) By anointing them with oil in Jesus name

15. What happened when someone tried to cast out a demon in Jesus' name illegitimately (Acts 19:16)?
(A) The demoniac ran away
(B) The demoniac broke his chains and left
(C) The demoniac leaped (jumped) on them and beat them

16. It says that in Ephesus there arose a great commotion about _____. What term was used to describe the early Christians there (Acts 19:23)?
(A) The Nazarenes
(B) The Christians
(C) The Way

17. For what god did the silversmith of Ephesus make shrines (Acts 19:24)?
(A) Diana
(B) Zeus
(C) Hermes

18. Where did the disciples not let Paul venture after the riot in Ephesus got started (Acts 19:31)?
(A) Into the theater
(B) Into the streets
(C) Into the city square

19. Which people shouted, "Great is Diana of the Ephesians!" ( Acts 19: 24-28)
(A) The craft men
(B) The chief servants
(C) The priests

20. Why did they shout? (Acts 19:28)
(A) They loved Demitrus' speech
(B) They were full of wrath
(C) They were motivated

21. When the Holy Spirit came on the Ephesian disciples, what did they do (Acts 19:6)?
A. They were baptized in the name of Jesus
B. They were able to heal the sick among them
C. They spoke in tongues and prophesied

22. What did those who had practiced sorcery do at Ephesus (Acts 19:19)?
A. They attacked Paul seeking to drive him out of the city
B. They cut and burned themselves
C. They burned their books publicaly

23. How long did Paul teach in Ephesus synagogue? (Acts 19:8)
(A) 6 months
(B) 3 months
(C) 3 Years

24. How long did Paul preached in Asia? (Acts 19:10)
(A) 2 years
(B) 3 years
(C) 3 months

25. Who was Sceva? (Acts 19:14)
(A) Craft man
(B) A Jewish Chief Priest
(C) Blacksmith

26. How much was the total wealth of the books of the magicians?
(A) 5,000 pieces of silver
(B) 500 pieces of silver
(C) 50,000 pieces of silver

27. Paul sent these two men to Macedonia? (Acts 19:22)
(A) Silas and Timothy
(B) Timothy and Erastus
(C) Silas and Apollos

28. This man was not allowed to speak to the assembly when they knew he was a Jew? (Act 19:33)
(A) Paul
(B) Alexander
(C) Timothy

29. “But when they found out that he was a Jew, all with one voice cried out for about two hours, _____ "(Acts 19:34)
(A) Crucify him!
(B) Great is Diana of the Ephesians!
(C) You shall not speak!

30. How many verses are in this chapter?
(A) 40
(B) 41
(C) 42

 -->