<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../../css/style.css">
            <title>Login</title>
      </head>
      <body>
            <form action="index.php"><input type="submit" value="Home"></form>
            <h1>Registrati</h1>
            <form action="../../db/validate_and_insert_user.php" method="POST">
                  <label for="username">Username</label>
                  <input type="email" name="username" id="username" placeholder="Inserisci il tuo username" required>
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" placeholder="Inserisci la tua password" required>
                  <input class="submit" type="submit" value="Registrati">
            </form>
      </body>
</html>