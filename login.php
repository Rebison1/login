<?php
// Start a session to manage user login state.
session_start();

// Check if the form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings (modify with your database credentials).
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "user";

    // Create a database connection.
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection.
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input.
    $username = $_POST["name"];
    $password = $_POST["password"];

    // Query to check if the user exists in the database.
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful.
        $_SESSION["username"] = $username;
        header("location: dashboard.php"); // Redirect to a protected page.
    } else {
        // Login failed.
        $error = "Invalid username or password.";
    }

    // Close the database connection.
    $conn->close();
}
?>
