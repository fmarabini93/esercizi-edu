<?php
      include 'db_conn.php';

      $title = $_POST['title'];
      $description = $_POST['description'];
      $stars = $_POST['stars'];
      $film_id = $_POST['film_id'];

      $get_user = "SELECT usr_id FROM films WHERE id = '$film_id'";
      $result = mysqli_query($db_conn, $get_user);
      $user_id = mysqli_fetch_row($result)[0];

      $sql = "INSERT INTO reviews (user_id, film_id, title, description, stars) VALUES ('$user_id', '$film_id', '$title', '$description', '$stars')";

      if (mysqli_query($db_conn, $sql)) {
            echo "<h1>Recensione inserita correttamente!</h1>
                  <a href='../pages/front/films_index.php'>Torna indietro</a>";
      } else {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($db_conn);
      }