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

ACTS CHAPTER FOUR

1. As Peter and John spoke unto the people, what 3 groups came upon them? (4:1)
(A) The priests, the captain of the temple, and the Sadducees
(B) The high priest, the captain of the temple and Sadducees
(C) The priests, the Captain of the temple and Pharisees

2. Why did these groups come against Peter and John? (4:2)
(A) They were disturbed by their teachings and preaching
(B) They wanted to stone them
(C) They heard their names from afar

3. But many of the people-Peter and John spoke to had the word and believed: about how many men were there that believed? (4:4)
(A) 3000
(B) 300
(C) 5000

4. What did the groups who came against Peter and John, do to them? (4:3)
(A) Asked them difficult questions
(B) They put them in custody until the next day
(C) They put them into custody until evening

5. What was the High Priests name at this time?(4:6)
(A) Annas
(B) Caiaphas
(C) Alexander

6. (This is concerning-the healing of the lame man) Peter and John were set in the midst of the High Priest and asked what? (4:7)
(A) By what power or by what name have you done this?
(B) Where do you get your power from?
(C) Where do you come from, who is your master?

7. This is the '___ which was rejected by you ___, which has become the chief cornerstone.' (4:11)
(A) Stone, builders
(B) Building, builders
(C) Wall, builders

8. Neither is there salvation in any other: For there is none other name under heaven given among men whereby we must be what?(4:12)
(A) Mentioning
(B) Saved
(C) Praising

9. When they saw the boldness of Peter and John, they perceived what about them?(4:13)
(A) They perceived that they were uneducated and untrained men
(B) They perceived that they have been with Jesus
(C) Both of the options above

10. But they marveled at Peter and John- Why?(4:13)
(A) When they saw their boldness
(B) When they perceived they were uneducated and untrained
(C) Both of the options above

11. Why couldn't they that came against Peter and John say anything against the lame man's healing?(4:16)
(A) Because they were afraid of the people
(B) Because they have been with Jesus
(C) Because the miracle done through them was evident to all who dwell in Jerusalem, and they could not deny it.
  
12. What did the one's who were against Peter and John commanded them not to do?(4:17)
(A) They commanded them not to heal with the name again
(B) They commanded them not to have fellowship with the believers again
(C) They commanded them not to speak at all nor teach in the name of Jesus.

13. For we cannot but speak the things which we have ___ 
and ___. (4:20)
(A) Seen, heard
(B) Touch, felt
(C) seen, believed

14. The lame man who was healed was about how old?
(A) Over forty years
(B) Forty years old
(C) Thirty years old

15. Why did the nations __, And the people ___vain things?(4:25)
(A) Rage, plot
(B) Plan, plot
(C) Plot, plan

16. What servant did Peter and John say said that scripture? (4:25)
(A) Moses
(B) Isaiah
(C) David

17. What two people did Peter and John say was against the Holy Servant Jesus whom The Lord has anointed?(4:27)
(A) Herod and Pontius Pilate
(B) Ceasar and Pontius Pilate
(C) Herod and Ceasar

18. What two groups of people did Peter and John say was against thy Holy Servant Jesus whom The Lord has anointed? (4:27)
(A) The Pharisees and Sadducees
(B) The gentiles and the people of Israel
(C) The gentiles and Pharisees

19. What did Peter and John ask God to stretch forth and heal with?(4:30)
(A) His Hand
(B) His Rod
(C) His Finger

20. How did Peter & John speak the word of God?(4:31)
(A) With eloquence
(B) With boldness
(C) With other tongues

21. “Now the multitude of those who believed were of one heart and one soul; neither did anyone say that any of the things he possessed was his own, but they had all things in ____.”(4:32)
(A) Abundance
(B) Common
(C) They needed

22. The multitude also with great power, gave the Apostles great witness of the resurrection of the Lord Jesus Christ and what was upon them all?(4:33)
(A) Boldness
(B) Great grace
(C) Mercy

23. Joses was surnamed what by the Apostles?(4:36)
(A) Barnabas
(B) Barabbas
(C) Barsabbas

24. How was his surname interpreted?(4:36)
(A) King amongst Princes
(B) Prince of encouragement
(C) Son of encouragement

25. What was Joses? (nationality)(4:36)
(A) The country of Greece
(B) The country of Cyprus
(C) None of the above

26. Joses was a ____(4:36)
(A) Levite
(B) Benjamite
(C) Gadite

27. What did Joses lay at the Apostle's feet? (4:37)
(A) Food and clothing
(B) His sins
(C) Money he got from selling his land

28. This is not in any name in Heaven or on Earth, except Jesus. (4:12)
(A) Hope
(B) Tribulation
(C) Salvation

29. The following happened when the disciples prayed?(4:31)
(A) They were filled with the Holy Spirit
(B) The place they assembled was shaken
(C) Both of the options above

30. How many verses are in this chapter?
(A) 32
(B) 35
(C) 37

31. What are the last two words of this chapter?
(A) Were sold
(B) Apostles' feet
(C) None of the options above

 -->