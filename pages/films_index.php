<?php
      $univoco = $_COOKIE["univoco"];

      if($univoco == "" || preg_match("([<>&(),%'?+])", $univoco) || preg_match('/"/', $univoco)){
            header("Location: login.php?loggedOut");
      }

      include '../db/db_conn.php';

      $sql = "SELECT username FROM users WHERE univoco = '$univoco'";
      $result = mysqli_query($db_conn, $sql);
      $username = mysqli_fetch_row($result)[0];

      $sql = "SELECT id FROM users WHERE univoco = '$univoco'";
      $result = mysqli_query($db_conn, $sql);
      $id = mysqli_fetch_row($result)[0];


      $sql = "SELECT * FROM films WHERE usr_id = $id";
      $result = mysqli_query($db_conn, $sql);
      $films = [];

      for ($i = 0; $i < ($result->num_rows); $i++) {
            $films[] = mysqli_fetch_assoc($result);
      }
?>

<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <title>Films Index</title>
      </head>
      <body>
            <p>Benvenuto, <b><? echo $username; ?></b>!</p>
            <p><a href="login.php?loggedOut">Logout</a></p>

            <!-- Form inserimento film -->
            <form action="../db/insert_film.php" method="POST">
                  <label for="title">Titolo</label>
                  <input type="text" name="title" id="title" placeholder="Inserisci il titolo del film" required>
                  <label for="description">Descrizione</label>
                  <textarea name="description" id="description" cols="30" rows="10" placeholder="Inserisci una descrizione del film" required></textarea>
                  <label for="cover">Copertina</label>
                  <textarea name="cover" id="cover" cols="30" rows="5" placeholder="Inserisci l'URL della copertina"></textarea>
                  <input type="hidden" name="usr_id" value="<?echo $id ?>">
                  <input class="submit" type="submit" value="Inserisci">
            </form>

            <!-- Lista film -->
            <section class="clearfix">
                  <?php foreach($films as $film) { ?>
                        <div class="card">
                              <h3><?echo $film['title'] ?></h3>
                              <p><?echo $film['description'] ?></p>
                              <img src="<?echo $film['cover'] ?>" alt="Copertina non disponibile">
                        </div>
                  <?php } ?>
            </section>
      </body>
</html>