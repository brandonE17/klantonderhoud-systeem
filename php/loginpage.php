<?php

//................................................................................................................
// Naam script             : Klantonderhoud-systeem
// Omschrijving            : Loginpage klantonderhoud-systeem
// Naam ontwikkelaar       : Brandon, Siham
// Project                 : 
// Datum                   : 3-24-2025
//...............................................................................................................
// Aanpassing Datum Project Pgmr OMschrijving
//
//................................................................................................................//




// Start de sessie
session_start();

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['naam'];
    $password = $_POST['wachtwoord'];

    // Dummy login gegevens (vervang dit met databasecontrole)
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php'); // Stuur door naar een andere pagina
        exit;
    } else {
        $error = 'Ongeldige inloggegevens';
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pagina</title>
</head>
<body>
    <div class="login-container">
        <div class="profile-icon"></div>
        <form method="POST">
            <input type="text" name="naam" placeholder="naam" required>
            <input type="password" name="wachtwoord" placeholder="wachtwoord" required>
            <button type="submit">Inloggen</button>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>

