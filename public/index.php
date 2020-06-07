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

ACTS CHAPTER SIX 6

1. Why did a group of people complain against the Hebrews? (6:1)
(A) Because their widows were neglected in the daily distribution
(B) Because they wanted the Apostles to select men who will serve tables
(C) Both of the options above

2. Which group of people made the complain?(6:1)
(A) Heathens
(B) Hellenists (Greek speaking Jews)
(C) The scribes

3.What was the first response of the apostles when they got complaints from Hellenists? (6:2)
(A) They summoned (called together) the  multitude of the disciples
(B) They wept 
(C) They turned their face to the Lord

4. What was the  reply of the Apostles when they got the complaints? (6:2)
(A)  "It is not desirable that we should leave the word of God and serve tables.”
(B) It is a wrong thing to serve tables
(C) The word of God is better than serving of tables
  
5. What was the top priority of the Apostles? (6: 4)
(A) Prayer and to the ministry of the word.
(B) Selection of men to serve tables
(C) Working of miracles

6. What were the required qualities for selecting the men who served tables? (6:3)
(A)  Good reputation, patience and understanding
(B) Good reputation, Spirit filled and wisdom
(C) Good reputation, spirit filled and understanding

7. How many men were selected to serve tables?
(6:3&5)
(A) 12
(B) 10
(C) 7

8. What were the qualities of Stephen? (6:5)
(A) He loved to be stones
(B) He was tall and brave
(C) He was a man filled with faith and the holy Spirit

9. How did the apostles designate the chosen men for their task? (6:6)
(A) The Apostles prayed and laid hands on them
(B) They made the men to hold hands and pray for themselves
(C) Both of the options above

10. From among the chosen people, who performed great wonders and signs? (6:8)
(A) Stephen
(B) Philip
(C) Nicolas

11. Which of these were not part of the men that were chosen? (6:5) 
(A) Timon
(B) Nicanor
(C) Mathias

12. What did the Jews charge Stephen of speaking blasphemous words against? (6:11-13)
 (A) Moses, God, Holy place and the Law
(B) The prophets
(C) The people of old

13. Which of these men was a proselyte(gentile) from Antioch who had been following the Jewish religion? (6:5)
(A) Prochorus
(B) Nicolas
(C) Parmenas

14. The men from the synagogue of freedmen were Jews. But they were from these places except
(A) Alexandria
(B) Asia
(C) Antioch

15. And all that sat in the council, looking stedfastly on him, saw his face as
it had been the ___ of an ____. 
(A) Face, eagle
(B) Face, angel
(C) Presence, angel

16. Who caused men to lie that they have heard Stephen say, Jesus of Nazareth will destroy this place and change the customs which Moses delivered to them? (6:14)
(A) The freedmen
(B) The priests
(C) The Sadducees

17. Amongst all the chapters in Acts, Chapter 6 has the least number of verses 
(A) Yes
(B) No
(C) It used to be so when the Apocrypha  had not been removed from the bible 

18. What are the first four words in Acts Chapter 6? (1:1)
(A) Now in those days
(B) It came to pass
(C) Now it happened that

19. What are the last four words in Acts Chapter 6? (6:15)
(A) Face of an Angel
(B) Moses delivered to us
(C) Sat in the council

20. They induced men to say they heard Stephen speak blasphemous words against what
two? (6:11)
(A) Moses and God
(B) Moses and the Jews
(C) The Jews and God

21. Who did they stir up to come against Stephen? (6:12)
(A) The high priest and the scribe
(B) The people, elders and the scribe
(C) The scribe, elders and high priest

22. Where was Stephen brought?(6:12)
(A) Before the people
(B) Before the scribes
(C) Before the council

23. They set up false witnesses which said-what? (6:13)
(A) Stephen is has demonic spirit
(B) They said Stephen spoke blasphemous words against this Holy Place and the law
(C) Stephen has corrupted Israel with his doctrine-

 -->