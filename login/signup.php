<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = "sqlite:my_database.db";

$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    )
");

$name = $_POST ["signup_name"];
$email = $_POST ["signup_email"];
$password = $_POST ["signup_password"];

$name = $_POST["signup_name"]; // The user's name
$email = $_POST["signup_email"]; // The user's email address
$password = password_hash($_POST["signup_password"], PASSWORD_DEFAULT); 
// Hash the user's password securely using the recommended algorithm (currently bcrypt)

// 5. Prepare an SQL statement to insert the new user into the 'users' table
// Using prepare() with placeholders prevents SQL injection attacks
$stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

// 6. Execute the prepared statement with the actual values

// This inserts the user into the table
$stmt->execute([$name, $email, $password]);

// 7. Print a success message so we know the script ran correctly
echo "Database and starting user table created successfully.\n";

?>

