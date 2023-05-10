<?php
session_start();

// Az aktuális felhasználói munkamenet törlése
unset($_SESSION["user"]);

// Az összes munkamenet változó törlése
$_SESSION = array();

// Az összes munkamenet süti törlése
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}

// Végül a munkamenet teljes törlése
session_destroy();

// Átirányítás a bejelentkező oldalra
header("Location: Bejelentkezes.php");
exit();
?>
