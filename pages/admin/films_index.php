<?php
      $univoco = $_COOKIE["univoco"];

      if($univoco == "" || preg_match("([<>&(),%'?+])", $univoco) || preg_match('/"/', $univoco)){
            header("Location: login.php?loggedOut");
      }

      include '../../db/db_conn.php';

      $sql = "SELECT id, username FROM users WHERE univoco = '$univoco'";
      $result = mysqli_query($db_conn, $sql);
      $user = mysqli_fetch_assoc($result);
      $id = $user['id'];

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
            <link rel="stylesheet" href="../../css/style.css">
            <title>Films Index</title>
      </head>
      <body>
            <p>Benvenuto, <b><? echo $user['username']; ?></b>!</p>
            <p><a href="login.php?loggedOut">Logout</a></p>

            <!-- Form inserimento film -->
            <h2>Inserisci un nuovo film</h2>
            <form action="../../db/insert_film.php" method="POST">
                  <label for="title">Titolo</label>
                  <input type="text" name="title" id="title" placeholder="Inserisci il titolo del film" required>
                  <label for="description">Descrizione</label>
                  <textarea name="description" id="description" cols="30" rows="10" placeholder="Inserisci una descrizione del film" required></textarea>
                  <label for="cover">Copertina</label>
                  <textarea name="cover" id="cover" cols="30" rows="5" placeholder="Inserisci l'URL della copertina"></textarea>
                  <input type="hidden" name="usr_id" value="<?echo $id; ?>">
                  <input class="submit" type="submit" value="Inserisci">
            </form>

            <!-- Lista film -->
            <h2 class="text_center">I tuoi film</h2>
            <section class="clearfix m_top">
                  <?php foreach($films as $film) { ?>
                        <div class="card">
                              <h3><?echo $film['title']; ?></h3>
                              <p><?echo $film['description']; ?></p>
                              <img class="block" src="<?echo $film['cover']; ?>" alt="Copertina non disponibile">
                              <form class="inline_b m_top" action="reviews.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?echo $id; ?>">
                                    <input type="hidden" name="film_id" value="<?echo $film['id']; ?>">
                                    <input type="submit" value="Recensioni">
                              </form>
                              <form class="inline_b m_top" action="modify_film.php" method="POST">
                                    <input type="hidden" name="film_id" value="<?echo $film['id']; ?>">
                                    <input type="submit" value="Modifica">
                              </form>
                              <form class="inline_b m_top" action="../db/delete_film.php" method="POST" onsubmit="return confirm('Sicuro di voler eliminare il film <?echo $film['title'] ?>?')">
                                    <input type="hidden" name="id" value="<?echo $film['id']; ?>">
                                    <input type="submit" value="Elimina">
                              </form>
                        </div>
                  <?php } ?>
            </section>
      </body>
</html>