<?php session_start();
	// header("Location: soon.php");
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Quiz</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php 
	include_once('db.php'); 
	
	$query = "SELECT * FROM questions_2";
	$questions = mysqli_query($connection, $query);
?>


<section class="container py-1 text-center">
	<h4><img src="nubs_logo.png" width="60">NUBS UCC - <span style="font-size: 20px;">BIBLE QUIZ</span></h4>
	<h6><u>PROVERBS CHAPTER 11</u></h6>
</section>

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
					<button type="submit" name="submit" class="btn btn-primary">Start quiz</button>
				</form>	
			</div>
		</div>
	</section>

	<br />

<?php
	}else{
		// name is inputted so show quiz
		$_SESSION['full_name'] = $_POST['full_name'];
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
						<label><input required type="radio" name="question<?php echo $count; ?>" value="A"> A. <?php echo $question['option_1']; ?></label>
					</div>
					<div class="radio">
						<label><input type="radio" name="question<?php echo $count; ?>" value="B"> B. <?php echo $question['option_2']; ?></label>
					</div>
					<div class="radio">
						<label><input type="radio" name="question<?php echo $count; ?>" value="C"> C. <?php echo $question['option_3']; ?></label>
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


<!-- 

PROVERBS CHAPTER 12
1. Who is said to love knowledge?
(A) the way of righteousness
(B) whoever loves instruction
(C) a foolish son

2. What is one who hates correction called?
(A) wicked ones
(B) righteousness
(C) stupid

3. If grace means `favor`, who obtains it from the Lord?
(A) good man
(B) the righteous
(C) the righteous soul

4. What kind of intentions are condemned by God?
(A) excellent wife
(B) the hand of the diligent
(C) wicked ones

5. What root cannot be moved?
(A) the righteous
(B) she who causes shame
(C) blessings

6. Where is the crown of the husband?
(A) excellent wife
(B) whoever loves instruction
(C) near the door of her house

7. What wife is like rottenness in one`s bones?
(A) will deliver
(B) labors going to a foreigner
(C) she who causes shame

8. What type of advice is deceitful?
(A) house of the righteous
(B) the ones we do not obey
(C) counsels of the wicked

9. The mouth of the upright will do what?
(A) will deliver
(B) his wisdom
(C) consume

10. Whose house will stand?
(A) the one who is slighted but has a servant
(B) house of the righteous
(C) your own

11. What commends a person?
(A) righteous man
(B) his wisdom
(C) love

12. Which is better, the one with a servant but is slighted, or the one honoring himself who lacks bread?
(A) the wicked
(B) one who lacks bread
(C) the one who is slighted but has a servant

13. Which regards the welfare of his animal?
(A) frivolity
(B) righteous man
(C) a heart of hate

14. Who lacks tender mercies?
(A) the wicked
(B) that of the righteous
(C) wise people

15. Which is devoid of understanding?
(A) the catch of evil men
(B) wisdom
(C) frivolity

16. Which root yields fruit?
(A) the labor of the diligent
(B) that of the righteous
(C) wicked ones

17. What does the wicked covet?
(A) nearby
(B) the catch of evil men
(C) good man

18. What ensnares the wicked?
(A) stupid
(B) the foolish
(C) his lips

19. Who comes through trouble?
(A) whoever loves instruction
(B) the righteous
(C) one with multitude of words

20. By what means does good satisfy one?
(A) to do evil
(B) stupid
(C) by the fruit of his mouth

21. What good does it do for one to work with his own hands?
(A) recompense of it will be rendered to him
(B) whoever loves instruction
(C) little

22. The way of a fool seems right to whom?
(A) by the fruit of his mouth
(B) the blessing of the LORD
(C) a fool

23. When does a fool show his wrath?
(A) righteousness
(B) at once
(C) in due time

24. What does the prudent man do when shamed?
(A) the righteous soul
(B) vinegar is taken
(C) covers it

25. What does he who speaks the truth declare?
(A) righteousness
(B) whoever loves instruction
(C) prolonging of days

26. What does the tongue of the wise promote?
(A) destruction
(B) health
(C) good man

27. Which is established forever?
(A) stupid
(B) the way of anxiety
(C) truthful lip

28. Who has joy?
(A) whoever loves instruction
(B) counselors of peace
(C) the wicked

29. What kind of trouble will NOT overtake the righteous?
(A) a perverse one
(B) stupid
(C) grave one

30. With what will the wicked be filled?
(A) evil
(B) whoever loves instruction
(C) success

31. The Lord's delight is in whom?
(A) grave one
(B) a shepherd
(C) those who deal truthfully

32. What does the heart of fools proclaim?
(A) righteousness
(B) foolishness
(C) the latest news

33. Whose hand will rule?
(A) the righteous soul
(B) clamorous
(C) hand of the diligent

34. What is the future of the lazy person?
(A) foolishness
(B) a life of thievery
(C) forced labor

35. What can cause depression?
(A) righteousness
(B) anxiety
(C) the depths of hell

36. What will make the heart glad?
(A) the righteous soul
(A) still water
(C) a good word

37. What kind of friend will even lead the righteous astray?
(A) anxiety
(B) a just man
(C) the wicked

38. What is a man`s precious possession?
(A) righteousness
(B) diligence
(C) fear of the LORD

39. In what road is no death?
(A) bearing it alone
(B) understanding
(C) the way of righteousness
1. B
2. C
3. A
4. C
5. A
6. A
7. C
8. C
9. A
10. B
11. B
12. C
13. B
14. A
15. A
16. B
17. B
18. C
19. B
20. C
21. A
22. C
23. B
24. C
25. A
26. B
27. C
28. B
29. C
30. A
31. C
32. B
33. C
34. C
35. B
36. C
37. C
38. B
39. C
 -->