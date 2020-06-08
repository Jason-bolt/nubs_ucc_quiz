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

ACTS CHAPTER 7

1. Then He gave him the covenant of circumcision; and so Abraham begot Isaac and circumcised him on the eighth day; and Isaac begot Jacob, and Jacob begot ____.  (7:8)
(A) Joseph
(B) Judah
(C) The twelve patriarchs

2. How many years was Israel in bondage and oppressed by Egypt? (7:6)
(A) 440
(B) 400
(C) 330

3. In Moses’ life there were three periods of how many years each? (7:23, 29-30, 36)
(A) 25
(B) 30
(C) 40

4. How did Stephen describe the Jewish council? (7:51)
(A) Stiff-necked & uncircumcised in heart and ears
(B) Resisting the Holy Ghost
(C) Both of the options above

5. What was the reaction of the council to Stephen’s charges? (7:54)
(A) Beat him
(B) Gnashed on him with their teeth
(C) Put him in prison

6. In what position was Jesus when Stephen saw the heavens opened? (7:55, 56)
(A) Kneeling
(B) Standing
(C) Sitting

7. Who held the clothes of those who stoned Stephen? (7:58)
(A) Barnabas
(B) Peter
(C) Saul

8. What words did Stephen say before he died that were similar to what Jesus said before he died? (7:60)
(A) Do not weep for Me, but weep for yourselves and for your children
(B) Lord, do not charge them with this sin
(C) It is finished!

9. And when forty years had passed, an Angel of the Lord appeared to him in a flame of fire in a bush, in the wilderness of ___. (7:30)
(A) Midian
(B) Arabia
(C) Mount Sinai

10. Who asked the council if the accusations against Stephen was so? (7:1)
(A) Saul
(B) The High Priest
(C) A Pharisee

11. Abraham came out of the ___ and dwelt where?(7:4)
(A) Mountain and dwelt in Canaan
(B) Family and dwelt in Canaan
(C) Chaldeans and dwelt in Haran

12. God said Abraham's seed would dwell in what kind of land? (7:6)
(A) Foreign Land
(B) Land of milk and honey
(C) Holy land

13. God gave Abraham the covenant of what? And Abraham got what? (7:8)
(A)  Promise and Abraham got Sarah as a wife
(B) Circumcision and Abraham begot Isaac.
(C) Salvation and Abraham got descendants

14. Isaac was circumcised what day? (7:8)
(A) The eighth day
(B) The seventh day
(C) The fortieth day

15. Why did the Patriarchs sold Joseph to slavery into Egypt? (7:9)
(A) They were moved with envy
(B) They needed money
(C) They was famine

16. God was with Joseph and delivered him out of his afflictions and gave him
favour and wisdom in the presence of who? (7:9-10)
(A) Portiphar
(B) The prison guard
(C) Pharaoh, King of Egypt

17. What did Pharoah made Joseph? (7:10)
(A) He took him out of prison
(B) He made him watch over Potiphar's house
(C)  He made him Governor over Egypt and all his house

18. “Now a __ and great ___ came over all the land of Egypt and Canaan, and our fathers found no sustenance" (7:11)
(A) Famine, great trouble
(B) Weeping, cry
(C) Death, sickness

19. Who heard that there was corn in Egypt and sent out our Fathers first? (7:12)
(A) David
(B) Jacob
(C) Joseph

20. Joseph was known to who and when? (7:13)
(A) His brothers, on their journey
(B) His brothers, the second time
(C) Pharaoh, during the Famine

21. When Joseph sent and called his Father and all his relatives, how many were they? (7:14)
(A) 75
(B) 40
(C) 70

22. “So ___went down to ___; and he died, he and our fathers.” (7:15)
(A) Jacob, valley
(B) Joseph, the porch
(C) Jacob, Egypt

23. “"But when the time of the promise drew near which God had sworn to Abraham, the people __ and ____in Egypt" (7:17)
(A) Grew and multiplied
(B) Stayed and laboured
(C) Praised and worshiped

24. Moses was learned in all the wisdom of the Egyptians and became mighty in
two things. What are they? (7:22)
(A) Words and deeds
(B) Signs and wonders
(C) Miracles and power

25.  How old was Moses when it came into his heart to visit his brethren the children of Israel? (7:23)
(A) Eighty
(B) Forty
(C) Thirty

26.Then Moses fled and became a stranger in what land? and had how many sons? (7:29)
(A) In the land of Egypt and had two sons
(B) In the land of Midian and had two sons
(C) In the land of Mesopotamia and had three sons

27. When Moses saw the bush and wondered at the sight and drew near to it, what
happened? (7:31)
(A) He saw fire
(B) The voice of the Lord came to him,”
(C) He was transformed

28. When the Lord spoke to Moeses, he said he was the God of what three of his
Fathers? (7:32)
(A) Abraham, Isaac, and Jacob. 
(B) Shadrach, Meshach and Abedenago
(C) Peter, James and John

29. Why did the Lord  tell Moses to take off his sandals? (7:33)
(A) His sandals was not clean
(B) He needed to trust God
(C) The place where he stands was holy ground

30. How many years were Moses and the children of Israel in the wilderness? (7:36)
(A) Thirty Years
(B) Forty Years
(C) Thirty Three Years

31. What did they do before stoning Stephen? (7:58)
(A) The witnesses laid down their clothes
(B) They cast him out of the city
(C) They made him to kneel before the witnesses

32. Stephen said they receive the law by the direction of who? (7:53)
(A) The Lord
(B) Angels
(C) Moses

33. Then God turned and gave them up to worship-who?(7:42)
(A) False gods
(B) Their desires
(C) The host of heaven

34. God said they took up the tabernacle of who? (7:43)
(A) Moloch
(B) Remphan
(C) The covenant

35. God said they took up the star of what God? (7:43)
(A) Moloch
(B) Remphan
(C) Babylon

36. Who built God a house?(7:47)
(A) David
(B) Moses
(C) Solomon

37. Moses was brought up in his father's house for how long?(7:20)
(A) 40 years
(B) 3 months
(C) 3 years

38. When Moses was set out, who took him up and brought him up as her own son?(7:21)
(A) His own mother
(B) Pharaoh's daughter
(C) Both of the options above

39. “"This is that Moses who said to the children of Israel, 'The Lord your God will raise up for you a __ like me from your ___. Him you shall hear" 7:37
(A) Saviour, generation
(B) Prophet, brethren
(C) Leader, ancestors

40. “However, the Most High does not dwell in __ made with __, as the prophet says:” (7:48)
(A) Temples, clay
(B) Temples, hands
(C) Houses, clay

41. For God, Heaven is his what, and earth is his what?(7:49)
(A) Throne, His place of rest
(B)  Footstool, throne
(C) Throne, footstool

42. “Has My __ not made all these ____?'” (7:50)
(A) Lord, creatures
(B) Hand, things
(C) Hand, creatures 

43. “"Our fathers had the ___ of ___ in the wilderness, as He appointed, instructing Moses to make it according to the pattern that he had seen,” (7:44) 
(A) Ark, covenant
(B) Laws, Moses
(C) Tabernacle, witness

44. Which also our Fathers that came after brought in with Jesus into the
possession of whom? (7:45)
(A) Priesthood
(B) Generation
(C) The Gentiles

45. Who found favour before God, and desired to find a tabernacle for the God of Jacob? (7:45&46)
(A) Moses
(B) David
(C) Solomon

46.  God said he would carry them away beyond where? (7:43)
(A) Jerusalem
(B) The borders of the earth
(C) Babylon

 -->