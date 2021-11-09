<?php
      $univoco = $_COOKIE["univoco"];

      if($univoco == "" || preg_match("([<>&(),%'?+])", $univoco) || preg_match('/"/', $univoco)){
            header("Location: login.php?loggedOut");
      }

      include '../db/db_conn.php';

      $sql = "SELECT username FROM users WHERE univoco = '$univoco'";
      $result = mysqli_query($db_conn, $sql);
      $username = mysqli_fetch_row($result)[0];
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
      </body>
</html>