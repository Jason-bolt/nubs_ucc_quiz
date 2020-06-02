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

ACTS CHAPTER 1

1. To whom was the Acts of the Apostles written?
(A) The Holy Apostle Paul
(C) Theophilus
(C) The Holy Apostle Peter

2. According to Acts Chapter one, the Gospel according to St. Luke Represented Jesus' life through what event.
(A) The day Christ was taken up to heaven
(B) The day Christ was resurected
(C) The day of Pentecost

3. According to Acts chapter one, Christ gave his Commandments to the Apostles through whom or what?
(A) The Holy Apostle Peter
(B) The Holy Scripture
(C) The Holy Spirit

4. The proofs Jesus presented to the Apostles following his resurrection is are described as what? 
(A) Innumerable
(B) Incredible
(C) Infallible

5. How long was Jesus seen with the Apostles following his resurrection?
(A) One Year
(B) Forty Weeks
(C) Forty Days

6. According to Acts  chapter one, where did Jesus tell the Apostles to wait for "the Promise of the Father"
(A) Jerusalem
(B) Antioch
(C) Rome

7. According Acts chapter one, how would the first Christians be baptized following Christ's Ascension?
(A) They would be baptized with water
(B) They will be baptized with The Holy Spirit
(C) They will be baptized with fire

8. What was Christ's response in Acts chapter one when asked regarding the time of the restoration of the Kingdom of Israel?
(A) "When you see Jerusalem" Destroyed by Rome
(B) "It is not for you to know times and seasons which The Father has put in His own authority"
(C) "When the gospel has been preached throughout the world"

9. When Jesus was taken up into the sky before their very eyes, what appeared to the men after He had left?
(A) Men dressed in white
(B)  Cloud
(C) Gardners

10. How far did the disciples have to walk to get to the Mount of Olives in Jerusalem?
(A) 4 days
(B) 5 days
(C) A Sabbath Day's Journey

11. Who stood up among the believers and started speaking?
(A) John
(B) Peter
(C) Paul

12. What did Judas buy with the reward he got from his wickedness?
(A) A new chariot with spinning rims
(B) All the twinkies in the land
(C) A field

13. Which two men were selected to replace Judas?
(A) Matthias and Barsabbas
(B) Matthias and Barabbas
(C) Joseph and Barabbas

14. Who was added as the 12th apostle?
(A) Barsabbas
(B) Joseph
(C)Matthias

15. What were the qualifications listed in order to become and apostle?
(A) Must be with Jesus from John's Baptism to His rapture
(B) Must be with Jesus from His birth to His death
(C) Must be with Jesus from His rapture to His death

16. When John the Baptist baptized, he baptized with the Holy Spirit and water. 
(A) True
(B) False
(C) Don't know

17.Who said, "Why do you stand gazing up into heaven?” (1:9-11)
(A) Men dressed in white apparel
(B) Luke
(C) Peter

18. Which woman is named who gathered in the upper room? (1:14)
(A) Dorcas
(B) Martha
(C) Mary

19. About how many gathered in the upper room? 
(A) 120
(B) 12
(C)	40

20. Fill in the blank: The men gathered at Christ’s Ascension in Acts chapter one were called
“Men of ____.”
(A) Galilee
(B) God
(C) Jerusalem

21. From what mount did Christ ascend in Acts chapter one?
(A) Sinai
(B) The Temple mount
(C) Olivet

22. Which of these Christians was NOT listed in Acts chapter one as being gathered in the upper
room following Christ’s Ascension?
(A) Bartholomew
(B) Paul
(C) Judas

23. In addition to praying, how did the Apostles determine the replace for Judas Iscariot in Acts
chapter one?
(A) They cast lots
(B) The Christians in Jerusalem voted for the replacement
(C) The replacement was appointed by the Holy Apostle Peter

24. According to Acts chapter one, what was the surname of Joseph called Barsabas?
(A) The Zealot
(B) Justus
(C) Alphaeus

25. According to Acts chapter one, the prophecy regarding Judas Iscariot’s death can be found in
what biblical book?
(A) Jeremiah
(B) Isaiah
(C) Psalms

26. According to Acts chapter one, what does “Akel Dama” mean?
(A) “Field of Blood.”
(B) “Traitor’s Field.”
(C) “Judas’ Field.”

27. How did Judas Iscariot die?
(A) He was poisoned
(B) He was stabbed
(C) He fell headlong and burst in the middle

28. What event does the book of Acts record as having occurred forty days after Christ’s
Resurrection from the dead?
(A) The Feast of the women who went to the tomb.
(B) The Day of Pentecost.
(C) Christ’s Ascension into Heaven

29. Jesus was received out of the sight of His disciples by this?
(A) Whirlwind
(B) Chariots of fire
(C) A cloud

30. How many men(man) stood by the disciples, telling them that this same Jesus would return?
(A) 1
(B) 2
(C) 3

31. Where did the disciples go to wait for the promise?
(A) In the temple
(B) In a cave
(C) In the upper room

 -->