<?php
      include "db_conn.php";

      $title = $_POST['title'];
      $description = $_POST['description'];
      $table_name = $_POST['table_name'];
      $id = $_POST['usr_id'];

      $sql = "INSERT INTO `$table_name` (usr_id, title, description) VALUES ('$id', '$title', '$description')";
      if (mysqli_query($db_conn, $sql) == FALSE) {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($db_conn);
      } else {
            header("Location: ../pages/films_index.php");
      }