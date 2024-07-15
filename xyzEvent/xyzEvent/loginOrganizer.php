<?php
session_start(); 
// Start the session at the beginning of the script
include 'mysqli_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['password'], $_POST['repeat-password'], $_POST['email'], $_POST['phone'])) {
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $repeatPassword = trim($_POST['repeat-password']);
        $email = trim($_POST['email']);
        $phoneNumber = trim($_POST['phone']);

        // Server-side validation
        if (empty($name) || empty($password) || empty($repeatPassword) || empty($email) || empty($phoneNumber)) {
            echo "<script>alert('All fields are required.');</script>";
        } elseif ($password !== $repeatPassword) {
            echo "<script>alert('Passwords do not match.');</script>";
        } else {
            $checkStmt = $connection->prepare("SELECT COUNT(*) FROM organizer WHERE name = ? AND password = ?");
            $checkStmt->bind_param("ss", $name, $password);
            $checkStmt->execute();
            $checkStmt->bind_result($row);
            $checkStmt->fetch();
            $checkStmt->close();

            if ($row > 0) {
                echo "<script>alert('Username or password already in system.');</script>";
            } else {
                $stmt = $connection->prepare("INSERT INTO organizer (name, password, email, phoneNumber) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $password, $email, $phoneNumber);
                if ($stmt->execute()) {
                    echo "<script>alert('Sign-up successful!'); window.location.href='loginOrganizer.php';</script>";
                } else {
                    die("Error inserting data: " . $stmt->error);
                }
                $stmt->close();
            }
        }
    } elseif (isset($_POST['email'], $_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $checkStmt = $connection->prepare("SELECT id, name FROM organizer WHERE email = ? AND password = ?");
        $checkStmt->bind_param("ss", $email, $password);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $checkStmt->bind_result($id, $name);
            $checkStmt->fetch();
            $_SESSION['ID'] = $id;
            $_SESSION['name'] = $name;
            echo "<script>alert('Login successful!'); window.location.href='Organizer.php';</script>";
        } else {
            echo "<script>alert('No account found with the provided credentials.');</script>";
        }
        $checkStmt->close();
    }
    $connection->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="DivNav">
                    <a class="navbar-brand" href="index.html">
                        <img class="LogoNav" src="./images/LogoTwo.png" alt="">
                    </a>
                </div>
                <a href="index.html" class="btn custom-btn d-lg-none ms-auto me-4">Go Back</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.html#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.html#section_2">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.html#section_6">Contact</a>
                        </li>
                    </ul>
                    <a href="index.php" class="btn custom-btn d-lg-block d-none">Go Back</a>
                </div>
            </div>
        </nav>

        <section class="ticket-section section-padding">
            <div class="section-overlay"></div>
            <div class="cardDiv">
                <div class="exotic-container" id="containerCard">
                    <div class="fantasy-form-container sign-up">
                        <form method="POST" action="loginOrganizer.php">
                            <h1 style="font-size: 30px;">Create Account</h1>
                            <h1 style="font-size: 40px;">Organizer</h1>
                            <span>or use your email for registration</span>
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <input type="phone" name="phone" placeholder="Phone Number">
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="repeat-password" placeholder="Repeat Password">
                            <button type="submit">Sign Up</button>
                        </form>
                    </div>
                    <div class="fantasy-form-container sign-in">
                        <form method="POST" action="loginOrganizer.php">
                            <h1>Sign In</h1>
                            <h1>Organizer</h1>
                            <span>or use your email password</span>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <a href="#">Forget Your Password?</a>
                            <button type="submit">Sign In</button>
                        </form>
                    </div>
                    <div class="mystical-toggle-container">
                        <div class="mystical-toggle">
                            <div class="mystical-toggle-panel mystical-toggle-left">
                                <h1>Welcome Back!</h1>
                                <p class="textFont">Enter your personal details to use all of the site features</p>
                                <button class="hidden" id="loginCard">Sign In</button>
                            </div>
                            <div class="mystical-toggle-panel mystical-toggle-right">
                                <h1>Hello!</h1>
                                <p class="textFont">Register with your personal details to use all of the site features
                                </p>
                                <button class="hidden" id="registerCard">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <img src="./images/Logo.png" class="logoReg">
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                        <ul class="social-icon d-flex justify-content-lg-end">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-apple"></span>
                                </a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-youtube"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-4 pb-2">
                    <h5 class="site-footer-title mb-3">Links</h5>
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">About</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Book Event</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Schedule</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Have a question?</h5>
                    <p class="text-white d-flex mb-1">
                        <a href="tel: 090-080-0760" class="site-footer-link">0799747894</a>
                    </p>
                    <p class="text-white d-flex">
                        <a href="mailto:hello@company.com" class="site-footer-link">info@xyzevent.com</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>
                    <p class="text-white d-flex mt-3 mb-2">Amman, Jordan</p>
                    <a class="link-fx-1 color-contrast-higher mt-3" href="#">
                        <span>Our Maps</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12 mt-5">
                        <p class="copyright-text">Copyright © 2024 X Y Z Event Company</p>
                    </div>
                    <div class="col-lg-8 col-12 mt-lg-5">
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Privacy Policy</a>
                            </li>
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Your Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/card.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const registerForm = document.querySelector('.sign-up form');
            const loginForm = document.querySelector('.sign-in form');

            registerForm.addEventListener('submit', function(event) {
                const name = registerForm.querySelector('input[name="name"]').value.trim();
                const email = registerForm.querySelector('input[name="email"]').value.trim();
                const phone = registerForm.querySelector('input[name="phone"]').value.trim();
                const password = registerForm.querySelector('input[name="password"]').value.trim();
                const repeatPassword = registerForm.querySelector('input[name="repeat-password"]').value.trim();

                if (!name || !email || !phone || !password || !repeatPassword) {
                    alert("All fields are required.");
                    event.preventDefault();
                } else if (password !== repeatPassword) {
                    alert("Passwords do not match.");
                    event.preventDefault();
                }
            });

            loginForm.addEventListener('submit', function(event) {
                const email = loginForm.querySelector('input[name="email"]').value.trim();
                const password = loginForm.querySelector('input[name="password"]').value.trim();

                if (!email || !password) {
                    alert("alert");
                }
            });
        });
    </script>
</body>

</html>