<?php include 'database.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/> <!--radi prikaza HRV znakova-->
    <title>Prikaz rezultata | Markacija</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
  </head>

  <body>
    <main>
      <div class="box" id="report"> <!--neće funkcionirat jer ti treba gigantski prozor. morat ćeš dodat ID-->
        <img src="images/avatar.png" class="avatar">
        <h3>Prikaz rezultata</h3>

        <div class='table'>
          <table>
            <thead>
              <tr>
                <th>Broj pitanja</th>
                <th>Grupa pitanja</th>
                <th>Tekst pitanja</th>
                <th>Točan odgovor</th>
                <th>Korisnikov odgovor</th>
              </tr>

              <?php
                //kljucno za ispisivanje hrvatskih znakova iz baze
                mysqli_set_charset($mysqli,"utf8");

                $query = "SELECT pitanja.broj_pitanja, pitanja.grupa_pitanja, pitanja.tekst_pitanja FROM pitanja;";
                $result = $mysqli->query($query);

                if($result-> num_rows>0){
                  while ($row = $result->fetch_assoc()){
                    echo 	"<tr>	<td>". $row["broj_pitanja"] ."</td>
                              <td>". $row["grupa_pitanja"] ."</td>
                              <td>". $row["tekst_pitanja"] ."</td>
                           </tr>";
                    }
                  echo "</table>";
                }
                else {
                  echo "0 result";
                }

                $mysqli-> close();
              ?>

            </table>



        </div>
        <a href="">Ispis podataka</a>
        <a href="">Odjava</a>
      </div>
    </main>
  </body>

  <footer>
    <p>Copyright © 2019 Gabrijela J.</p>
  </footer>
</html>
