<?php
      $server_name = "localhost";
      $username = "root";
      $password = "root";
      $db_name = "films_test";
      $db_conn = new mysqli($server_name, $username, $password); 

      if ($db_conn->connect_error) {
            die("<h1>Connection failed: </h1>" . $db_conn->connect_error);
      }

      $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
      if ($db_conn->query($sql) === FALSE) {
            echo "<h1>Error creating database: </h1>" . $db_conn->error;
      }

      include "db_conn.php";

      $users_table = "CREATE TABLE IF NOT EXISTS users (
            id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            univoco VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY (username)
      )";

      $films_table = "CREATE TABLE IF NOT EXISTS films (
            usr_id INT(10) UNSIGNED NOT NULL,
            id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            title VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            cover TEXT,
            PRIMARY KEY (id),
            FOREIGN KEY (usr_id) REFERENCES users(id)
      )";

      if (mysqli_query($db_conn, $users_table) === FALSE) {
            echo "<h1>Error creating table: </h1>" . $db_conn->error;
      }

      if (mysqli_query($db_conn, $films_table) === FALSE) {
            echo "<h1>Error creating table: </h1>" . $db_conn->error;
      }