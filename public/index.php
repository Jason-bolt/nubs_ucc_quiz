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

ACTS CHAPTER 8

1. Who in particular put men and women in prison? (8:1,3)
(A) Aeneas
(B) Ananias
(C) Saul

2. Where did Philip go as a result of persecution against the church? (8:5)
(A) Samaria
(B) Caesarea
(C) Damascus

3. Who offered money in order to purchase the ability to give people the Holy Ghost? (8:18-19)
(A) Aeneas
(B) Simon
(C) Judas

4. Who was sent to investigate the revival at Samaria? (8:14)
(A) Peter and James
(B ) James and John
(C) Peter and John

5. What did the Samaritans do after Peter and John arrived in Samaria? (8:17)
(A)	They repented
Correct answer	
(B) They were baptized in Jesus' Name
(C)	They received the Holy Ghost

6. Toward where did the angel of the Lord tell Philip to go? (8:26)
(A) Samaria
(B) Ethiopia
(C) Gaza

7. From what portion of the Bible was the Ethiopian reading? (8:28)
(A) Isaiah
(B) Jeremiah
(C) Daniel

8. Which of the following is NOT a questions the Ethiopian asked Philip? (8:31, 34,)
A 	How can I, unless someone guides me?
B 	Of whom does the prophet say this, of himself or of some other man?
(C) Are You here to explain this to me?

9. One of the following is one of the questions the Ethiopian asked Philip? (8:36)
(A) Where do You come from?
(B) What hinders me from being baptized
(C) Are You one of the Apostles?

10. What phrases indicates that the baptism of the Ethiopian was performed by immersion? (8:38-39)
(A) Went down into the water
(B) The Spirit descended like a dove
(C) Buried with him in baptism

11.Where was Philip found after the Spirit of the Lord caught him away? (8:40)
(A) Azotus
(B) Caesarea
(C) Gaza

12. Where did Philip end up? (8:40)
(A) Azotus
(B) Caesarea
(C) Gaza

13. The great persecution against the church began after whose violent death? (8:1)
(A) Stephen
(B) Jesus
(C) John the Baptist

14. What did the believers do after being scattered? (8:4)
(A) Preached the Word
(B) Went into hiding
(C) Both of the options above

15.  Who did Philip witness to in the wilderness? (8:27-39)
(A) The people of Samaria
(B) An Ethiopian Eunuch
(C) The people of Gaza

16.  What did the Eunuch do after being baptized? (8:39)
(A) Returned to Samaria
(B) Went on his way rejoicing
(C) Took Philip to his home for a meal

17. Who wasn't scattered throughout the region at during the time of great persecution? (8:1)
(A) The people in Jerusalem
(B) The Apostles
(C) Both of the options above

18. What kind of men carried Stephen to his burial? (8:2)
(A) Young men
(B) Devout men
(C) Men of valour

19. “As for Saul, he made___of the church, entering every house, and ____off men and women, committing them to prison.” (8:3)
(A) Mockery, stripping
(B) Havoc, dragging
(C) Blasphemy, killing

20. The people of Samaria gave heed unto those things which Philip spake, hearing and
seeing what? (8:6)
(A) The miracles which he did
(B) People been baptized with the Holy Spirit
(C) Revival which happened through him

21. Unclean spirits did what?
(A) Made way for the Lord
(B) Confessed that Christ is Lord
(C) Cried with a loud voice, came out of many who were possessed

22. There was great what in that city Samaria? (8:8)
(A) Revival
(B) Joy
(C) None of the options above

23. Who used socery to bewitch the people of Samaria, giving out that himself
was some great one? (8:9)
(A) Alexander
(B) Bar-Jesus
(C) Simon

24. “You have neither __ nor __ in this matter, for your heart is not right in the sight of God" (8:21)
(A) Good, bad
(B) Part, portion
(C) Work, ministry

25. The people gave heed to Simon from the least to the greatest, saying what? (8:10)
(A) This is a powerful man
(B) This man is the great power of God
(C) None of the options above

26. To Simon they had heeded because why? (8:11)
(A) They had not seen the miracles of the Apostles
(B) Because he was a powerful man
(C)  Because he had astonished them with his sorceries for a long time.”

27.  But the people believed who - when he preached Jesus Christ to them? (8:12)
(A) Jesus
(B) The Apostles
(C) Philip
  
28. What did Simon do when he heard Philip preach Jesus Christ? (8:13)
(A) He also believed
(B) He wanted to pay money for his power
(C) He stood with awe

29. "The Holy Spirit had not fallen upon them(Samaria people). They had only been baptized in what?
(A) In the name of the Lord Jesus
(B) In water
(C) In faith

30. “Then Philip opened his mouth, and beginning at this Scripture, preached ___to him.” (8:35).
(A) Jesus
(B) The scriptures
(C) Baptism

31. “Now as they went down the road, they came to what? (8:36)
(A) Agreement
(B) Some water
(C) Departure

32. Why had this Eunuch come to Jerusalem?(8:27)
(A) For commercial works
(B) To worship
(C) For get understanding of scriptures

33.  This Eunich had great authority under Queen who of the Ethiopians? (8:27)
(A) Queen Sheba
(B) Queen Candace
(C) None of the options above

34 How many verses has Acts Chapter 8?
(A) 42
(B) 40
(C) 44

35. What is the first word of this chapter? (8:1)
(A) And
(B) Now
(C) But

36. The last word of this chapter is a name of a__?
(A) An Apostle
(B) A city
(C) A verb

 -->