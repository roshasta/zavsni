<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php

	//Check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];
		if($number == 1){ //if koji sprjecava beskonacno dodavanje bodova na prethodni rezultat
			$_SESSION['score'] = 0;
		}
		$selected_choice = $_POST['choice'];
		$next = $number+1;

		/*Get Total Question*/
		$query = "SELECT * FROM `pitanja`";

		//Get result
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;
		//$next = $total+1; //OVO SAM NAKNADNO DODALA - PROVJERI

		/*Get Correct Choice*/
		$query = "SELECT * FROM `odgovori` WHERE broj_pitanja = $number AND tocan_odgovor = 1";

		//Get result
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		//Get row
		$row = $result->fetch_assoc();

		//Set correct choice
		$correct_choice = $row['id_odgovora'];

		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}

		//Check if last question
		if($number == $total){
			header("Location: final.html");
			exit();
		} else {
			header("Location: question.php?n=".$next);
		}
	}
