<?php
$db_servername = "localhost";
$db_username = "web1";
$db_password= "]VDCtzWaW4q/Ipv6";

   session_start();
    if(isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
    } else {
      header("Location: Bejelentkezes.php");
      exit();
    }

// adatbáziskapcsolat létrehozása
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_username);

// űrlap feldolgozása
if(isset($_POST['submit'])) {
  // adatok mentése adatbázisba
  $product_name = $_POST['product_name'];
  $quantity = $_POST['quantity'];

  // felhasználó ID lekérdezése az adatbázisból
  $user_query = "SELECT id FROM users WHERE username = '$username'";
  $user_result = mysqli_query($conn, $user_query);
  $user_row = mysqli_fetch_assoc($user_result);
  $user_id = $user_row['id'];

  // termék adatok mentése az adatbázisba
  $product_query = "INSERT INTO products (user_id, product_name, quantity) VALUES ('$user_id', '$product_name', '$quantity')";
  mysqli_query($conn, $product_query);
}

// felhasználó rendeléseinek lekérdezése az adatbázisból
$order_query = "SELECT * FROM products WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
$order_result = mysqli_query($conn, $order_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="style001.css">
    <link rel="icon" type="image/x-icon" href="ikon/logo.png">
    <script src="https://kit.fontawesome.com/96ced10c0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bejelentkezes.css">
    <link rel="stylesheet" href="tabla.css">
</head>
<body>

    <nav class="navigacio">
        <input type="checkbox" id="check">
        <label for="check" class="checkfa">
            <i class="fa-solid fa-align-justify"></i>
        </label>
        
        <label class="logo">GGN</label>
        <ul class="unorderedList">
            <li class="lista"><a href="index.html" target="_self">Főoldal</a></li>
            <li class="lista"><a href="Szolgáltatásaink.html" target="_self">Szolgáltatások</a></li>
            <li class="lista"><a href="Termekeink.html" target="_self">Termékek</a></li>
            <li class="lista"><a href="Bejelentkezes.php" target="_self">Bejelentkezés</a></li>
            <li class="lista"><a href="Regisztracio.php" target="_self">Regisztráció</a></li>
            <li class="lista"><a class="active" href="rendeles.php" target="_self">Rendeléseim</a></li>
            <li class="lista"><a href="kijelentkezes.php" target="_self">Kijelentkezés</a></li>
        </ul>
    </nav>

  
    <section class="asd3">
          <div class="wrapper">
            <div class="container">
                <br>
                <p>
                  <?php
                  echo "Üdvözlünk, $username!";
                  ?>
                </p>
                <h2>Rendelés hozzáadása:</h2>
                  <form method="post" action="">
                    <p><label for="product_name">Termék neve:</label></p>
                    <input type="text" name="product_name" required>
                    <br>
                    <p><label for="quantity">Darabszám:</label></p>
                    <input type="number" name="quantity" min="1" required>
                    <br>
                    <input type="submit" name="submit" value="Rendelés leadása" class="btn btn-primary mt-3">
                    <br>
                  </form>
            </div>
            <div class="rendelestablazat">
                <h2>Rendeléseim:</h2>
                  <table class="rendeles">
                        <tr>
                        <th>Termék neve</th>
                        <th>Darabszám</th>
                        </tr>
                    <?php
                    // felhasználó rendeléseinek kilistázása
                    while($order_row = mysqli_fetch_assoc($order_result)) {
                      $product_name = $order_row['product_name'];
                      $quantity = $order_row['quantity'];
                      echo "<tr><td>$product_name</td><td>$quantity</td></tr>";
                    }
                    ?>
                  </table>
            </div>
        </div>
        <div class="copy">
        <p class="null">Elérhetőség: </p>
        <p class="null"><a href ="https://hu-hu.facebook.com/">Facebook</a>
        <a href = "https://www.instagram.com/">Instagram</a>
        <a href = "https://twitter.com/">Twitter</a>
        <a href = https://www.youtube.com/watch?v=dQw4w9WgXcQ>Youtube</a></p>
        <p>&copy Copyright 2023 Greek God Nutritions</p>       
    </div> 
    </section>                     
</body>
</html>