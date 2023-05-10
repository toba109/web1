<?php
    
    $db_servername = "localhost";
    $db_username = "web1";
    $db_password = "]VDCtzWaW4q/Ipv6";
    // Kapcsolódás az adatbázishoz
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_username);

// Ellenőrizzük a kapcsolatot
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    // Ellenőrizzük, hogy az űrlap elküldésekor meg lett-e adva a felhasználónév és jelszó
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Ellenőrizzük, hogy a felhasználónév és jelszó helyes-e
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                // Ha a felhasználónév és jelszó helyesek, a felhasználó sikeresen bejelentkezett
                session_start();
                $_SESSION['username'] = $username;
                header("Location: rendeles.php");
                exit();
            } else {
                echo "Hibás felhasználónév vagy jelszó!";
            }
        } else {
            echo "Hibás felhasználónév vagy jelszó!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="style001.css">
    <link rel="icon" type="image/x-icon" href="ikon/logo.png">
    <script src="https://kit.fontawesome.com/96ced10c0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bejelentkezes.css">
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
            <li class="lista"><a class="active" href="Bejelentkezes.php" target="_self">Bejelentkezés</a></li>
            <li class="lista"><a href="Regisztracio.php" target="_self">Regisztráció</a></li>
            <li class="lista"><a href="rendeles.php" target="_self">Rendeléseim</a></li>
        </ul>
    </nav>
    <section class="asd2">
       
        <div class="wrapper">
            <div class="container">
                <p>Üdvözöllek a Bejelentkezési oldalon, kérlek add meg a regisztrációkor megadott adataid! </p><br>
                <p>Ha még nem regisztráltál a Rágisztráció fülre kattintva tudod pótolni!</p><br>
                <form action="" method="POST">
                    <div class="form-group">
                        <p class="nej" >Felhasználónév</p>
                        <input name="username" id="username" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="nej">Jelszó</p>
                        <input name="password" id="password" type="password" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-3">
                        Bejelentkezés
                    </button>
                </form>
            </div>
        </div> 
    </section>  
    <div class="copy">
        <p class="null">Elérhetőség: </p>
        <p class="null"><a href ="https://hu-hu.facebook.com/">Facebook</a>
        <a href = "https://www.instagram.com/">Instagram</a>
        <a href = "https://twitter.com/">Twitter</a>
        <a href = https://www.youtube.com/watch?v=dQw4w9WgXcQ>Youtube</a></p>
        <p>&copy Copyright 2023 Greek God Nutritions</p>       
    </div>           
</body>
</html>