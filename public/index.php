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

CHAPTER THREE 3

1. Which Apostles, was it said-went up to the temple? (3:1)
(A) Peter, James and John
(B) Peter and John
(C) Peter and James

2. At what time of the day did these Apostles went up to the temple?(3:1)
(A) Third hour
(B) Ninth hour
(B) First watch

3. There was a lame man carried and laid daily at the gate of the temple, what was the gate of the temple called? (3:2)
(A) Wonderful
(B) Amazing
(C) Beautiful

4. Those Apostles went up to the temple at the hour of? (3:1)
(A) Sacrifice
(B) Confession
(C) Prayer

5. Why was the lame man at the gate?
(A) To sacrifice
(B) To see the Apostles
(C) To ask for alms

6. What did one of the Apostles say he did not have? (3:6)
(A) Faith
(B) Hope
(C) Silver and Gold

7. When the man got up, where did he go? (3:8)
(A) Outside the City 
(B) In the temple
(C) Home

8. What of the temple was called Solomon's?(3:11)
(A) The Porch
(B) The gate
(C) Upper room

9. Who was determined to let Jesus go?(3:13)
(A) Peter
(B) Herod
(C) Pilate

10. This through faith is what made the lame man strong? (3:16)
(A) The blood of Jesus
(B) The name of Jesus
(C) The powder of Jesus

11. God told this man, in his seed all the family of the earth will be blessed (3:25)
(A) David
(B) Solomon
(C) Abraham

12. How long had this man been lame? (3:2)
(A) From his mother's womb
(B) 38 years
(C) From childhood

13. What did the lame man ask of the Apostles? (3:3)
(A) Healing
(B) Silver and gold
(C) Alms

14. Why did the lame man give heed to Peter and John when told-look on us? (3:5)
(A) He was expecting to receive something from them
(B) He realized they were Apostles
(C) He knew they could heal him

15. How did Peter tell the lame man to rise up and walk?(3:6)
(A) In the name of Jesus Christ of Nazareth, rise up and walk
(B) By faith, rise up and walk
(C) Rise up You lame man and walk!

16. What two things received strength on the lame man? (3:7)
(A) His knee and feet
(B) His feet and ankle bones
(C) His knee and ankle bones

17. What 3 things did the lame man do as he entered into the temple? (3:8)
(A) He stood, walked and run
(B) He leaped up, stood and walked
(C) He walked, leaped and praised God

18. And all the people saw him __ and __ God. (3:9)
(A) Walking, praising
(B) Singing, praising
(C) Praising, worshipping

19. Peter spake to the people letting them know it was Jesus whom they ignorantly killed, who healed the lame man: that by using what in his name-made the lame man strong? (3:16)
(A) Faith
(B) Power
(C) Authority

20. Peter told them to repent and be converted so their sins would be what? (3:19)
(A) Blotted out
(B) Far from them
(C) Recognize no more

21. Whom/What must the Heaven receive until the times of restoration of all things? (3:20-21)
(A) Believers
(B) Jesus Christ
(C) Power and glory

22. Who said "A prophet shall the Lord your God raise up unto you of your brethren, like unto me; him shall ye hear in all things whatsoever things he shall say unto you."? (3:22)
(A) lsaiah
(B) Moses
(C) Jeremiah

23. What shall come to pass to every soul that will not hear what Moses told them? (3:23)
(A) Shall be utterly destroyed
(B) God will not hear his prayers
(C) Shall not be stolen

24. Jesus was sent to bless in turning everyone from what? (3:26)
(A) Hell
(B) Destruction
(C) From their iniquities

25. What routine practice were Peter and John observing they saw the lame man? (3:1)
(A) Going to the temple to pray
(B) Going from house to house breaking bread
(C) Continuing in the apostles’ doctrine

26. What did Peter tell the lame man? (3:4,6)
(A) Look at us
(B) Silver and gold have I none
(C) All of the above

27. How many verses are in Acts Chapter 3?
(A) 28
(B) 26
(C) 27

28. What is the first word in Acts 3?
(A) And
(B) Now
(C) For

29. How many names of Apostles were mentioned in the entire chapter?
(A) 3
(B) 2
(C) 4

30. Which single Apostle spoke throughout the chapter?
(A) James
(B) John
(C) Peter

31. Apart from Solomon, how many names in the old testament were mentioned in this chapter?
(A) 4
(B) 5
(C) 6

32. What is the last word in this chapter?
(A) Depart
(B) Iniquities
(C) Servant

 -->