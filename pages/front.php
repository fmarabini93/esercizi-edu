<?php
      include '../db/db_conn.php';

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
            <link rel="stylesheet" href="../css/style.css">
            <title>Lista Film Front</title>
      </head>
      <body>
            <h2 class="text_center">Elenco film</h2>
            <section class="clearfix m_top">
                  <?php foreach($films as $film) { ?>
                        <div class="card">
                              <h3><?echo $film['title']; ?></h3>
                              <p><?echo $film['description']; ?></p>
                              <img class="block" src="<?echo $film['cover']; ?>" alt="Copertina non disponibile">
                        </div>
                  <?php } ?>
            </section>
      </body>
</html>