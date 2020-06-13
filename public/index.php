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

ACT CHAPTER 12

1. Who did kill James with the sword? (12:2)
(A) Herodias
(B) Herod
(C) Jephuneh

2. When Herod saw it pleased the Jews when he killed James, who did he proceed
further to take? (12:3)
(A) Peter
(B) John
(C) Paul

3. How was Peter guarded in prison? (12:4,6)
(A) Four squads of soldiers kept him
(B) Without food
(C) Both of the options above

4. How was Peter guarded in prison? (12:4,6)
(A) Bound with two chains between two soldiers
(B) Guards were before the door keeping the prison
(C) Both of the options above

5. What was NOT mentioned as a miracle that occurred in when Peter was released from prison? (12:6-10)
(A) An earthquake shook the prison
(B) An angel came
(C) None of the options above

6. What was NOT mentioned as a miracle that occurred in when Peter was released from prison? (12:6-10)
(A) A light shone
(B) His chains fell off
(C) None of the options above

7. To whose house did Peter go after his release from prison? (12:12)
(A) His mother-in-law
(B) Lydia
(C) Mary, the mother of John Mark

8. Who failed to open the gate where the prayer meeting was held? (12:13-14)
(A) Rhoda
(B) Lydia
(C) Mary, the mother of John Mark

9. What did Herod do to the guards of the prison? (12:18-19)
(A) Banished them to the Isle of Patmos
(B) Fired them
(C) Put them to death

10. What happened to Herod? (12:23)
(A) Eaten by worms and died
(B) Turned into a pillar of salt
(C) Smitten with blindness and leprosy

11. Herod was intending to bring Peter before the people, When?
(A) After the passover
(B) Before the passover
(C) In the cause of the passover

12. Who came upon Peter while a light shined in the prison? (12:7)
(A) The Apostles
(B) The soldiers
(C) The Angel Of The Lord

13. Peter did as the angel of the Lord said, but thought all that was
happening-was what? (12:10)
(A) Not true
(B) A mirage
(C) A vision

14. What did people in the house say to Rhoda? (12:15)
(A) You are beside Yourself! ( You are mad!)
(B) Are You sure Peter is alive?
(C) Be truthful to us

15. But Rhoda constantly affirmed that it was Peter, but the people in the house said it was what? (12:15)
(A) It is Peter's angel
(B) Never again say that
(C) The Lord knows the truth 

16. Peter continued knocking and when they opened the door and saw him, what was their reaction? (12:16)
(A) There wept
(B) They were astonished
(C) They hugged him and kissed him

17. Peter motioning unto them with his hand for them to do what? (12:17)
(A) Sit down
(B) Not be afraid
(C) Keep silent

18. “Then, as soon as it was __, there was no __ stir among the soldiers about what had become of Peter.” (12:18)
(A) Time, great
(B) Day, small
(C) True, Peter

19. Herod went from Judaea to where and stayed there? (12:19)
(A) Jerusalem
(B) Galilee
(C) Caesarea

20. Now Herod had been very angry with the people of what two places? (12:20)
(A) Tyre and Judea
(B) Judea and Sidon
(C) Tyre and Sidon

21. What two men returned from Jerusalem? (12:25)
(A) Paul and Silas
(B) Barnabas and Saul
(C) Peter and John

22. What made these two men return from Jerusalem?
(A) They lived in Antioch
(B) They had fulfilled their ministry
(C) They had to go to Peter.

23. Whose surname was Mark?
(A) Simon
(B) John
(C) James

24. “But the word of God __ and ____.” (12:24) 
(A) Grew and multiplied
(B) Sowed and reaped
(C) Rised and soar

25 The last word of Acts Chapter 12 is
(A) Luke
(B) Simon
(C) Mark

 -->