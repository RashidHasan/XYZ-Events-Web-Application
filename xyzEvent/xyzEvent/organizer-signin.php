<?php
include 'mysqli_connection.php';
session_start();

// Check if the login form has been submitted
// Check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $connection->prepare("SELECT * FROM organizer WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        $organizer = $result->fetch_assoc();

        if ($organizer) {
            $_SESSION["name"] = $organizer["name"];
            $_SESSION["password"] = $organizer["password"];
            $_SESSION["email"] = $organizer["email"];
            $_SESSION["phoneNumber"] = $organizer["phoneNumber"];
            $_SESSION['ID'] = $organizer['ID'];
            header('Location: Organizer.php');
            exit;
        } else {
            echo "Username or password are wrong";
        }
        $stmt->close();
    }
}