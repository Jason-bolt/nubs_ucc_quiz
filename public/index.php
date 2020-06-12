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

ACTS CHAPTER 11

1. What words show that the Gentiles received the same experience as those on the day of Pentecost? (11:15-17)
(A) The Holy Spirit fell upon them, as upon us at the beginning
(B) God also granted to the Gentiles repentance to life
(C) Both of the options above

2. Who did Barnabas seek for and bring to Antioch to help him? (11:25)
(A) John Mark
(B) Philip
(C) Saul

3. What was the primary ministry of Barnabas and his partner in Antioch for a whole year? (11:26)
(A) Evangelizing
(B) Teaching
(C) Prophecy

4. What were the disciples called first at Antioch? (11:26)
(A) Christians
(B) Believers
(C) Nazarenes

5. What did Agabus prophesy? (11:27-28)
(A) Famine
(B) Miracles
(C) Persecution

6. According to Acts chapter 11 verse 2, where did Peter go?
(A) Up to Jerusalem
(B) The promise Land
(C) Samaria

7. What has nothing impure or unclean ever entered? (11:8)
(A) Peter's mouth
(B) Heaven
(C) Jerusalem

8. From where had three men been sent to Peter? (11:11)
(A) Caesarea
(B) Antioch
(C) Joppa

9. By whom did the disciples send their gift to the elders? (11:30)
(A) Peter
(B) Barnabas and Saul
(C) Simon and James

10. For what did Barnabas and Saul meet with the church and teach great numbers of people? (11:26)
(A) A week
(B) Three months
(C) For a whole year

11. Where were the disciples first called Christians? (11:26)
(A) Joppa
(B) Antioch
(C) Jerusalem

12. Who told Peter to have no doubt about going with the three men sent by Cornelius? (11:12)
(A) The Spirit
(B) Simon the tanner
(C) One of the apostles

13. Which prophet name was mentioned in Acts Chapter 11?
(A) Saul
(B) Peter
(C) Agabus

14. Where did he come from and where did he go to? (11:27)
(A) From Judea to Antioch
(B) From Jerusalem to Antioch
(C) From Antioch to Judea

15.  Peter said that he was in a trance and saw a vision, of a great sheet let
down from heaven by what? (11:5)
(A) By wind
(B) By four corners
(C) By Force

16. Peter said that he heard a voice saying unto him, What? (11:7)
(A) Rise and eat for the Lord has sanctify them
(B) Arise and eat for the journey is too great for You
(C) Rise, Peter; kill and eat.

17. Now some were scattered, abroad from the persecution that arose about who? (11:19)
(A) Saul
(B) The Apostles
(C) Stephen

18. These that were scattered, traveled as far as what 3 places? (11:19)
(A) Joppa, Antioch and Crete 
(B) Jerusalem, Judea and Samaria
(C) Phenice, Cyprus, and Antioch

19. Why did they travel unto these 3 places? (11:19)
(A) To preach the Word
(B) To protect their lives
(C) To spread around the world

20. Who did they preach to? (11:19)
(A) The Jews and gentiles
(B) To no one but the Jews only
(C) To no one but the gentiles only

21. “And in these days prophets came from __ to ___.” (11:27)? 
(A) Judea, Antioch
(B) Jerusalem, Antioch
(C) Antioch, Judea

22. Who stood up and signified by the spirit that there should be great famine
throughout all the world? (11:28)
(A) Agabus
(B) Peter
(C) Barnabas

23. This famine came to pass in the days of who? (11:28)
(A) Claudius Caesar
(B) Pontius Pilate
(C) Alexander

24. “Then the disciples, each according to his __, determined to send ___ to the brethren dwelling in ____.” (11:29)
(A) Faith, relief, Antioch
(B) Ability, relief, Judea
(B) Heart, relief, Antioch

25. When Peter was come up to Jerusalem, who contended with him? (11:2)
(A) The Greek speaking Jews
(B) Those of the circumcision
(C) The Apostles

26. When they contended with Peter, what did they say? (11:3)
(A) What fellowship does the circumcised have with the uncircumcised!
(B) Jews are not meant to be seen with Gentiles!
(C) You went in to uncircumcised men and ate with them!

27. Peter told them he had been praying in what city? (11:5)
(A) Antioch
(B) Joppa
(C) Judea

28. But the voice answered Peter again from heaven, saying what?(11:9)
(A) Do you think I am foolish to tell you to eat?
(B) What God has cleansed you must not call common.
  (C) I am the voice of The Lord

29. This was done how many times and what happened to the sheet? (11:10)
(A) Now this was done three times, and all were drawn up again into heaven.
(B) Now this was done twice, and all were vanished out of sight.
(C) Now this was done three times, and all went into the secret place.
  
30. Peter said, Behold -Immediately there were three men already come unto the
house where I was, sent unto him from where?
(A) Antioch
(B) Caesarea
(C) Judea

31. And the spirit made Peter go with them ___ ___? (11:12)
(A) Knowing them
(B) Six men
(C) Doubting nothing
 
(32) How many verses have Acts Chapter 11?
(A) 33
(B) 30
(C) 32

33. What are the last three words of Acts Chapter 11?
(A) There went Saul
(B) Dwelling in Judea
(C) Barnabas and Saul

 -->