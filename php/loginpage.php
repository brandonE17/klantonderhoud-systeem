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
    <style>
        body {
            background-color: #87A0A5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: #b0bec5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: gray;
            display: inline-block;
        }
        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        button {
            background: #546E7A;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #455A64;
        }
    </style>
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

