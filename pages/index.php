<?php include "../../db/createDB.php" ?>

<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <title>Home</title>
      </head>
      <body>
            <form action="admin/register.php"><input type="submit" class="submit" value="Registrati"></form>
            <form action="admin/login.php"><input type="submit" class="submit" value="Entra"></form>
            <form action="front/films_index.php"><input type="submit" class="submit" value="Lista film"></form>
      </body>
</html>