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
            <form action="../db/login_user.php" method="POST">
                  <input type="text" name="username" id="username" placeholder="Inserisci il tuo username">
                  <input type="text" name="password" id="password" placeholder="Inserisci la tua password">
                  <input type="submit" value="Entra">
            </form>
      </body>
</html>