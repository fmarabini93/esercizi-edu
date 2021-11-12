<?php
      $id = $_POST['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $cover = $_POST['cover'];

      include 'db_conn.php';

      $sql = "UPDATE films SET title = '$title', description = '$description', cover = '$cover' WHERE id = '$id'";

      if (mysqli_query($db_conn, $sql)) {
            echo "<h1>Film aggiornato correttamente!</h1>
            <a href='../pages/admin/films_index.php'>Torna indietro</a>";
      } else {
            echo "Impossibile modificare il film " . $db_conn->error;
      }