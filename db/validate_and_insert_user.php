<?php
      // Importazione dati form
      $inserted_username = $_POST['username'];
      $inserted_password = $_POST['password'];
      
      // Generazione codice univoco
      date_default_timezone_set("Europe/Rome");
      $time = microtime(true);
      $dFormat = "l jS F, Y - H:i:s";
      $mSecs = $time - floor($time);
      $mSecs = substr($mSecs,1);
      $unique = sprintf('%s%s', date($dFormat), $mSecs );
      
      function generateRandomString($length = 30) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            } return $randomString;
            } $returnString = generateRandomString();
      
      $univoco = $returnString.sha1($unique);

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
            $query="SELECT * FROM users WHERE username = '$inserted_username'";
            $result = mysqli_query($db_conn, $query);
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                  $usedUsername = "1";
                  echo "<p>Esiste già un utente registrato con questa mail. <a href='../pages/admin/register.php'>Torna indietro</a></p>";
            } else {
                  $query= "INSERT INTO users (username, password, univoco) VALUES ('$inserted_username', '$passwd', '$univoco')";
                  $sql = mysqli_query($db_conn, $query);

                  header("Location: ../pages/admin/login.php?regOK");
            }
      } else if ($dangerousCharacters == 1) {
            echo "<p>Hai inserito caratteri non ammessi: ([<>&(),%'?+]). <a href='../pages/admin/register.php'>Torna indietro</a></p>";
      } else if ($emptyField == 1) {
            echo "<p>Hai lasciato uno o più campi vuoti. <a href='../pages/admin/register.php'>Torna indietro</a></p>";
      } else {
            echo "<p>La lunghezza della password deve essere compresa tra 8 e 20 caratteri. <a href='../pages/admin/register.php'>Torna indietro</a></p>";
      }