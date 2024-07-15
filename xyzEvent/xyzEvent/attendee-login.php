<?php
session_start();
include 'mysqli_connection.php'; // Ensure you have a connection to the database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the statement
    if ($stmt = $connection->prepare("SELECT * FROM attendee WHERE email = ? AND password = ?")) {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $attendee = $result->fetch_assoc();
        $stmt->close();

        if ($attendee) {
            // Set session variables
            $_SESSION["name"] = $attendee["name"];
            $_SESSION["email"] = $attendee["email"];
            $_SESSION["phoneNumber"] = $attendee["phoneNumber"];
            $_SESSION['ID'] = $attendee['ID'];

            // Redirect to attendee home page
            header('Location: attendee-home.php');
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Database query failed: " . $connection->error;
    }
} else {
    echo "Please provide both email and password.";
}
