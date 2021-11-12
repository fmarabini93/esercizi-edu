<?php
      include '../../db/db_conn.php';

      $user_id = $_POST['user_id'];
      $film_id = $_POST['film_id'];

      $sql = "SELECT title FROM films WHERE id = '$film_id'";
      $result = mysqli_query($db_conn, $sql);
      $film_title = mysqli_fetch_row($result)[0];

      $sql = "SELECT * FROM reviews WHERE user_id = '$user_id' AND film_id = '$film_id'";
      $result = mysqli_query($db_conn, $sql);
      $reviews = [];

      for ($i = 0; $i < ($result->num_rows); $i++) {
            $reviews[] = mysqli_fetch_assoc($result);
      }
?>

<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../../css/style.css">
            <title>Recensioni</title>
      </head>
      <body>
            <form action="films_index.php"><input type="submit" value="Torna indietro"></form>
            <h2><?echo $film_title; ?></h2>
            <?php foreach($reviews as $review) { ?>
                  <div class="card">
                        <h3><?echo $review['title']; ?></h3>
                        <p><?echo $review['description']; ?></p>
                        <?php switch($review['stars']) {
                              case "1":
                                    echo "&#9733;";
                                    break;
                              case "2":
                                    echo "&#9733; &#9733;";
                                    break;
                              case "3":
                                    echo "&#9733; &#9733; &#9733;";
                                    break;
                              case "4":
                                    echo "&#9733; &#9733; &#9733; &#9733;";
                                    break;
                              case "5":
                                    echo "&#9733; &#9733; &#9733; &#9733; &#9733;";
                        } ?>
                  </div>
            <?php } ?>
      </body>
</html>