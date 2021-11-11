<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <title>Login</title>
      </head>
      <body>
            <h1>Entra</h1>
            <form action="../db/login_user.php" method="POST">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" placeholder="Inserisci il tuo username" required>
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" placeholder="Inserisci la tua password" required>
                  <input class="submit" type="submit" value="Entra">
            </form>
      </body>
</html>