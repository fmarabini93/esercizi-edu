<?php
      include '../../db/db_conn.php';

      $sql = "SELECT * FROM films";
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
            <title>Lista Film Front</title>
      </head>
      <body>
            <form action="../index.php"><input type="submit" value="Home"></form>
            <form action="../admin/register.php"><input type="submit" value="Registrati"></form>
            <form action="../admin/login.php"><input type="submit" value="Entra"></form>
            <h2 class="text_center">Elenco film</h2>
            <section class="clearfix m_top">
                  <?php foreach($films as $film) { ?>
                        <div class="card">
                              <h3><?echo $film['title']; ?></h3>
                              <p><?echo $film['description']; ?></p>
                              <img class="block" src="<?echo $film['cover']; ?>" alt="Copertina non disponibile">
                              <form class="inline_b m_top" action="../../db/insert_review.php" method="POST">
                                    <input type="hidden" name="film_id" value="<?echo $film['id']; ?>">
                                    <label for="title">Titolo</label>
                                    <input type="text" name="title" id="title" placeholder="Inserisci un titolo" required>
                                    <label for="description">Recensione</label>
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Scrivi la tua recensione" required></textarea>
                                    <label for="stars">Valutazione</label>
                                    <input type="radio" name="stars" id="stars" value="1" required>&#9733;
                                    <input type="radio" name="stars" value="2">&#9733;&#9733;
                                    <input type="radio" name="stars" value="3">&#9733;&#9733;&#9733;
                                    <input type="radio" name="stars" value="4">&#9733;&#9733;&#9733;&#9733;
                                    <input type="radio" name="stars" value="5">&#9733;&#9733;&#9733;&#9733;&#9733;
                                    <input type="submit" class="submit" value="Recensisci">
                              </form>
                        </div>
                  <?php } ?>
            </section>
      </body>
</html>