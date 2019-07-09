<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php

	//kljucno za ispisivanje hrvatskih znakova iz baze
	mysqli_set_charset($mysqli,"utf8");

	//Set question number
	$number = (int) $_GET['n']; //dohvaćanje broja stranice i spremanje tog broja u var $number

	/*Get Total Question*/
	$query = "SELECT * FROM `pitanja`";

	//Get result
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;

	/*Get Question*/
	$query = "SELECT * FROM `pitanja` WHERE broj_pitanja=$number";

	//Get Result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$question = $result->fetch_assoc();

	/*Get Choices*/
	$query = "SELECT * FROM `odgovori` WHERE broj_pitanja=$number";

	//Get Results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/> <!--radi prikaza HRV znakova-->
    <title>Pitanje | Markacija</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <h1>Grupa pitanja: <?php echo $question['grupa_pitanja']; ?> </h1>
    </header>

    <main>
      <div class="box" id="question">
        <img src="images/avatar.png" class="avatar">
        <div class="current">
          Pitanje <?php echo $question['broj_pitanja']; ?> od <?php echo $total; ?>
        </div>

        <p>
          <?php echo $question['tekst_pitanja']; ?>
        </p>

        <form method="POST" action="process.php">
          <ul class="choices">
            <?php while($row = $choices->fetch_assoc()): ?>
              <li>
                <input type="radio" name="choice" value="<?php echo $row['id_odgovora']; ?>">
								<?php echo $row['tekst_odgovora']; ?>
              </li>
            <?php endwhile; ?>
          </ul>

          <div class="next"><input type="submit" value="Predaj"></div>
          <input type="hidden" name="number" value="<?php echo $number; ?>" />
        </form>
      </div>
    </main>
  </body>

  <footer>
    <p>Copyright © 2019 Gabrijela J.</p>
  </footer>
</html>
