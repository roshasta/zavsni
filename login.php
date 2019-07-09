<?php include 'database.php' ?>

<?php
	session_start();

	//connection to database
	$db = mysqli_connect("localhost", "root", "123456gj", "markacija");

	if(isset($_POST['submit_log'])){
		$korisnicko_ime = mysqli_real_escape_string($db, $_POST['korisnicko_ime']);
		$lozinka = mysqli_real_escape_string($db,$_POST['lozinka']);


		$sql = "SELECT * FROM korisnici WHERE korisnicko_ime='$korisnicko_ime' AND lozinka='$lozinka'";
		$result = mysqli_query($db, $sql);

		if(mysqli_num_rows($result) == 1){
			$_SESSION['korisnicko_ime'] = $korisnicko_ime;
			header("location: start.php"); //redirect to quizzer
		} else{
			$_SESSION['message'] = "Pogrešno unesena kombinacija korisničkog imena/lozinke. Pokušajte ponovno!";
		}
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/> <!--radi prikaza HRV znakova-->
    <title>Prijava | Markacija</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <h1>Planinarsko društvo Markacija</h1>
    </header>

		<?php
			if(isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>

    <main>
      <div class="box" id="login">
        <img src="images/avatar.png" class="avatar">
        <div class="form">
          <form  action="#" method="POST">
            <h3>Unesite korisničke podatke!</h3>
            <p>Korisničko ime</p>
            <input type="text" name="korisnicko_ime" placeholder="Unesite korisničko ime">
            <p>Lozinka</p>
            <input type="password" name="lozinka" placeholder="Unesite lozinku">
            <input type="submit" name="submit_log" value="Prijava">
          </form>
        </div>
      </div>
    </main>
  </body>

  <footer>
    <p>Copyright © 2019 Gabrijela J.</p>
  </footer>
</html>
