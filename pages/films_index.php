<?php
      $univoco = $_COOKIE["univoco"];

      if($univoco == "" || preg_match("([<>&(),%'?+])", $univoco) || preg_match('/"/', $univoco)){
            header("Location: login.php?loggedOut");
      }

      include '../db/db_conn.php';

      $sql = "SELECT username FROM users WHERE univoco = '$univoco'";
      $result = mysqli_query($db_conn, $sql);
      $username = mysqli_fetch_row($result)[0];
      $films_table = $username . '_films';

      $sql = "SELECT id FROM users WHERE univoco = '$univoco'";
      $result = mysqli_query($db_conn, $sql);
      $id = mysqli_fetch_row($result)[0];


      $sql = "SELECT * FROM `$films_table`";
      $result = mysqli_fetch_row(mysqli_query($db_conn, $sql));
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
                  <input type="hidden" name="table_name" value="<?echo $films_table ?>">
                  <input type="hidden" name="usr_id" value="<?echo $id ?>">
                  <input class="submit" type="submit" value="Inserisci">
            </form>

            <!-- Lista film -->
            <section>
                  <?php foreach($result as $item) { ?>
                        <div>

                        </div>
                  <?php } ?>
            </section>
      </body>
</html>