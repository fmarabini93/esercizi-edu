<?php
      $id = $_POST['id'];

      include 'db_conn.php';

      $sql = "DELETE FROM films WHERE id = '$id'";

      if (mysqli_query($db_conn, $sql)) {
            echo "<h1>Film eliminato correttamente!</h1>
                  <a href='../pages/films_index.php'>Torna indietro</a>";
      } else {
            echo "Impossibile eliminare il film " . $db_conn->error;
      }