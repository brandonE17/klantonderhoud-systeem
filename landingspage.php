<?php
//................................................................................................................
// Naam script             : Klantonderhoud-systeem
// Omschrijving            : Landingpage klantonderhoud-systeem
// Naam ontwikkelaar       : Brandon, Siham
// Project                 : 
// Datum                   : 3-24-2025
//...............................................................................................................
// Aanpassing Datum Project Pgmr OMschrijving
//
//................................................................................................................//




// Database configuratie
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Functie om een gebruiker te registreren
function registerUser($username, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Functie om een gebruiker in te loggen
function loginUser($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password!";
    }

    $stmt->close();
}

// HTML en PHP formulier verwerking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        registerUser($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['login'])) {
        loginUser($_POST['username'], $_POST['password']);
    }
}
?> 
