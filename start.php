<?php include 'database.php' ?>
<?php session_start(); ?>

<?php
	/*Get Total Questions*/
		$query = "SELECT * FROM pitanja";

	//Get Results
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/> <!--radi prikaza HRV znakova-->
    <title>Start | Markacija</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <h1>Planinarsko društvo Markacija</h1>
    </header>

    <main>
      <div class="box" id="start">
        <img src="images/avatar.png" class="avatar">
        <h3>Pozdrav, <i><?php echo $_SESSION['korisnicko_ime'] ?></i>!</h3>
        <p>Dobrodošli u aplikaciju namjenjenu polaganju završnog ispita Planinarske škole Markacija.
          Polaganje završnog ispita ujedno je i zadnja faza pripreme kandidata za samostalne pohode na
          šumske staze stoga Vam želimo puno uspjeha u rješavanju.
        </p>
        <ul>
          <li>ispit započinje pritiskom na tipku <i>Start</i></li>
          <li>pitanja su zatvorenog (anketnog) tipa</li>
          <li>ispit sadrži <?php echo $total; ?> pitanja, a predviđeno vrijeme rješavanja je <?php echo $total *.5; ?> min</li>
        </ul>

        <a href="question.php?n=1">Start</a> <!--umetanje n=1 brojača stranica putem kojeg dohvaćamo točno određeno pitaje na točno određenoj stranici-->
      </div>
    </main>
  </body>

<footer>
  <p>Copyright © 2019 Gabrijela J.</p>
</footer>
</html>
