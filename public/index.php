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

ACTS CHAPTER FIVE

1. What was the name of Ananias' wife? (5:1)
(A) Saphire
(B) Saphira
(C) Shiphrah

2. Who filled Ananias' heart to lie? (5:3)
(A) Satan
(B) His wife
(C) Himself

3. Who did Peter say Ananias has lied to? (5:3)
(A) The Apostles
(B) His wife
(C) Holy Spirit

4. What happened to Ananias when Peter finished speaking? (5:5)
(A) He ran off
(B) He fell down and breathed his last
(C) He was stoned to death

5. What happened to Ananias' wife? (5:10)
(A) He fell down at the Apostles feet breathed her last and died
(B) She lied
(C) She was stoned

6. Sick people were laid in the street, hoping this might overshadow some of them?(5:15)
(A) Holy Spirit
(B) Pillar of cloud
(C) Peter's shadow

7. Who opened the door and freed the Apostles from prison? (5:19)
(A) Captain of the prison
(B) An angel of the Lord
(C) The high priest

8. Where were the Apostles found the next day? (5:25) 
(A) In the upper room
(B) In the cave
(C) In the temple

9. When the council wanted to kill the Apostles, this man talked them out of it? (5:34)
(A) Gamaliel
(B) Annas
(C) Gamali

10. How many hours was it when Annanias's wife came in to lie also? (5:7)
(A) 3 hours
(B) 6 hours
(C) 5 hours

11. What fell upon the people that heard about Annanias? (5:5)
(A) Tongue of fire
(B) Great fear
(C) Mantle of power

12. “And the young men arose and __ him up, __him out, and ___ him.” (5:6) 
(A) Carried, wrapped, burried
(B) Carried, burried, wrapped
(C) Wrapped, carried, burried

13. Peter asked Ananias' wife why they had agreed together to tempt who? (5:9)
(A) The Spirit of the Lord
(B) The Apostles
(C) The believers

14. Who buried Ananias' wife? (5:10)
(A) The Apostles
(B) Great men
(C) Young men

15. Because Peter and the other Apostles were healing people of sickness and unclean spirits, what sect of people rose up against them and had them put into
prison? (5:17-18)
(A) Sadducees
(B) Pharisees
(C) Both of the options above

16. The angel of the Lord told the Apostles:
“"Go, stand in the temple and speak to the people all the __ of this __."” (5:20)
(A) Nations, world
(B) World, life
(C) Word, life

17. Who called the council and the elders (senate) of the children of Israel to have the Apostles brought from prison to them? (5:21)
(A) The high priest
(B) The high priest and those with him
(C) Captain of the prison guards

18. When the High Priest, the captain of the temple and the chief Priests heard that the Apostle's were no longer in prison-where were they told that the
Apostle's were?
(A) In the Upper Room
(B) Temple
(C) Cave

19. “And daily in the __, and in every __, they did not cease teaching and preaching Jesus as the Christ.” (5:42)
(A) Lord, house
(B) Temple, house
(C) Lord, temple

20. How did the Apostles depart from the presence of the council? (5:41)
(A) They departed with anger
(B) The Spirit of the Lord took them by cloud
(C) They departed from the presence of the council, rejoicing that they were counted worthy to suffer shame for His name.”
  
21. Gamaliel talked about two separate men who had drawn people away with their false doctrine which nothing came of it: What were these two men's names? (5:36-37)
(A) Thadeus, Judas of Galilee
(B) Theudas, Judas of Galilee
(C) Thadeus, Judas son of Alpheus

22. What was Gamaliel's profession? (5:34)
(A) A judge
(B) A priest
(C) A teacher of the Law

23. What sect was Gamaliel? (5:34)
(A) A Pharisee
(B) A Sadducee
(C) An Essene

24. When the Apostles were brought from the temple by the captain and officers, why did they bring the Apostles without violence?(5:26)
(A) They wanted to seek peace
(B) They feared the people.
(C) The Apostles were honourable before their eyes

25. What is the first word of this chapter?(5:1)
(A) But
(B) Now
(C) And

26. How much money did Ananias lay at the feet of the Apostles?(5:2)
(A) A certain part of their money
(B) Few amount of money
(C) A small part of their money

27. Ananias' greatest sin was that made him to die was...? (5:3)
(A) He Lying to the Holy Spirit
(B) Not laying all the sold land money at feet of the Apostle
(C) Selling his land

28. Tell me whether you sold the land for so much?" (5:8). Who asked this question?
(A) Apostle Peter
(B) Apostle John
(C) High Priest Annas

29. To whom was this question asked? (5:8)
(A) Ananias
(B) The wife of Ananias
(C) Barnabas

30. Tell me whether You sold the land for so much?"
What was the reply?(5:8)
(A) Yes, for so much
(B) Yes, We kept none for ourselves
(C) None of the options above

31. Why did the captain and the officers fear the people?(5:26)
(A) They feared the people will stone them
(B) They feared for the people were many
(C) They feared the people for their courage and boldness

32. For what did the apostles rejoice? (5:42)
(A) They were counted worthy to suffer shame for the name
(B) The many that were added to the church
(C) That their names were written in the Lamb’s book of life

33. What were the apostles accused of filling Jerusalem with? (5:28)
(A) New converts
(B) Their doctrine
(C) Miracles, signs and wonders

34. By what unusual means did people try to obtain healing? (5:15)
(A) Having Peter’s shadow passing over them
(C) Having handerchiefs brought to them from the apostles
(C) Touching the hem of the apostles’ garments

35. When the officers came to prison the apostles were __(5:22)
(A) Worshiping God
(B) Gone
(C) Teaching and preaching to the people

36. Peter and the other apostles answered the council saying___(5:29)
(A) We ought to obey God rather than man
(B) An angel delivered us from prison
(C) Please do not put us back in prison

37. In what type prison were the apostles jailed?(5:18)
(A) Maximum security
(B) Common prison
(C) Workhouse

38. All the apostles were with one accord in____(5:12)
(A) Solomon's porch
(B) Upper Room
(C) The holy spirit

 -->