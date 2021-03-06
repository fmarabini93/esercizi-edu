<?php
      include '../../db/db_conn.php';

      $film_id = $_POST['film_id'];
      $sql = "SELECT * FROM films WHERE id = $film_id";
      $result = mysqli_query($db_conn, $sql);
      $film = mysqli_fetch_assoc($result);
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
            <p><a href="films_index.php">Torna indietro</a></p>

            <!-- Form modifica film -->
            <h2>Modifica il film "<?echo $film['title']; ?>"</h2>
            <form class="inline_b" action="../../db/update_film.php" method="POST">
                  <label for="title">Titolo</label>
                  <input type="text" name="title" id="title" value="<?echo $film['title']; ?>" required>
                  <label for="description">Descrizione</label>
                  <textarea name="description" id="description" cols="30" rows="10" required><?echo $film['description']; ?></textarea>
                  <label for="cover">Copertina</label>
                  <textarea name="cover" id="cover" cols="30" rows="5"><?echo $film['cover']; ?></textarea>
                  <input type="hidden" name="id" value="<?echo $film['id'] ?>">
                  <input class="submit" type="submit" value="Modifica">
            </form>
            <form class="inline_b" action="../db/delete_film.php" method="POST" onsubmit="return confirm('Sicuro di voler eliminare il film <?echo $film['title'] ?>?')">
                  <input type="hidden" name="id" value="<?echo $film_id; ?>">
                  <input type="submit" value="Elimina">
            </form>
      </body>
</html>