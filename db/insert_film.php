<?php
      include "db_conn.php";

      $title = $_POST['title'];
      $description = $_POST['description'];
      $cover = $_POST['cover'];
      $id = $_POST['usr_id'];

      $sql = "INSERT INTO films (usr_id, title, description, cover) VALUES ('$id', '$title', '$description', '$cover')";
      
      if (mysqli_query($db_conn, $sql) == FALSE) {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($db_conn);
      } else {
            header("Location: ../pages/admin/films_index.php");
      }