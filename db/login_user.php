<?php
      $inserted_username = $_POST['username'];
      $inserted_password = $_POST['password'];

      // Codifica password
      $passwd = sha1(md5(sha1($inserted_password)));

      // Check caratteri strani / campi vuoti
      foreach($_POST as $key=>$value) {
            if (preg_match("([<>&(),%'?+])", $value) || preg_match('/"/', $value)) { 
                  $dangerousCharacters = "1";
            }
            if ($value == "") {
                  $emptyField = "1";
            }
      }

      include "db_conn.php";

      if ($dangerousCharacters != "1" && $emptyField != "1" && strlen($inserted_password) >= 8 && strlen($inserted_password) <= 20) {
            $query="SELECT univoco FROM users WHERE username = '$inserted_username' AND password = '$passwd'";
            $result = mysqli_query($db_conn, $query);
            $num = mysqli_num_rows($result);
            $logdb = mysqli_fetch_row($result);
            $univoco = $logdb['0'];

            if ($num < 1) {
                  $unregisteredUser = "1";
                  echo "<p>Nome utente o password errati. <a href='../pages/login.php'>Torna indietro</a></p>";
            } else {
                  setcookie("univoco", $univoco, time()+3600, "/");
                  header("Location: ../pages/films_index.php?loginOK");
            }
      } else if ($dangerousCharacters == 1) {
            echo "<p>Hai inserito caratteri non ammessi: ([<>&(),%'?+]). <a href='../pages/login.php'>Torna indietro</a></p>";
      } else if ($emptyField == 1) {
            echo "<p>Hai lasciato uno o più campi vuoti. <a href='../pages/login.php'>Torna indietro</a></p>";
      } else {
            echo "<p>La lunghezza della password deve essere compresa tra 8 e 20 caratteri. <a href='../pages/login.php'>Torna indietro</a></p>";
      }