<?php
      $server_name = "localhost";
      $username = "root";
      $password = "root";
      $db_name = "films_test";
      $conn = new mysqli($server_name, $username, $password); 

      if ($conn->connect_error) {
            die("<h1>Connection failed: </h1>" . $conn->connect_error);
      }

      $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
      if ($conn->query($sql) === FALSE) {
            echo "<h1>Error creating database: </h1>" . $conn->error;
      }

      include "../db/db_conn.php";

      $users_table = "CREATE TABLE IF NOT EXISTS users (
            id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            univoco VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY (username)
      )";

      if ($db_conn->query($users_table) === FALSE) {
            echo "<h1>Error creating table: </h1>" . $db_conn->error;
      }