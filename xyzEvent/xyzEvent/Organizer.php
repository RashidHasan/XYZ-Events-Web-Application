<?php
include 'mysqli_connection.php';
session_start();
$eventAdded = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $organizerID = $_SESSION['ID'];
        $name = $_POST['name'];
        $type = 'C';
        $description = $_POST['description'];
        $location = $_POST['location'];
        $capacity = $_POST['capacity'];
        $ticketPrice = $_POST['ticketPrice'];

        $stmt = $connection->prepare("INSERT INTO event (organizerID, name, description, location, capacity, ticketPrice) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssii", $organizerID, $name, $description, $location, $capacity, $ticketPrice);
        $resultEvent = $stmt->execute();

        if ($resultEvent) {
            $eventAdded = true;
            header("Location: Organizer.php?eventAdded=true");
            exit();
        } else {
            echo '<script>console.log("Failed to add event.");</script>';
        }
        $stmt->close();
    }
}

// Check if eventAdded query parameter is present and display message accordingly
if (isset($_GET['eventAdded']) && $_GET['eventAdded'] == 'true') {
    echo '<script>console.log("Event added successfully.");</script>';
}
?>

<?php

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>XYZ Event</title>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <header style="background-color: black;" class="site-header">
            <div class="container">
                <div style="margin-bottom: 28px;" class="row"></div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="DivNav">
                    <a class="navbar-brand" href="index.php">
                        <img class="LogoNav" src="./images/LogoTwo.png" alt="">
                    </a>
                </div>
                <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Register</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <a href="index.php" class="btn custom-btn d-lg-block d-none">Sign Out</a>
                </div>
            </div>
        </nav>
        <div class="landing">
            <div class="container">
                <div class="text">
                    <h1>Organizer Dashboard</h1>
                    <p>We are thrilled to have you on board as an event organizer. Here’s a quick overview of what you
                        can do in this portal.</p>
                    <a style="margin-top: 20px;" href="#Cards">
                        <button class="buttonSp">
                            Added Event
                        </button>
                    </a>
                </div>
                <div class="image">
                    <img decoding="async" src="/images/LogoTwo.png" alt="" />
                </div>
            </div>
            <a href="#articles" class="go-down">
                <i class="fad fa-angle-double-down"></i>
            </a>
        </div>
        <div class="Title-card" id="Cards">
            <h1>Add Of Events</h1>
        </div>
        <div class="custom-btn-div">
            <a href="DisplayEventOrganizer.php">
                <button class="custom-button" id="addCardButton">
                    <span>All Event</span>
                </button>
            </a>
        </div>
        <div class="custom-card-div">
            <div class="eventCard">
                <form method="POST" action="Organizer.php">
                    <div class="label-cards">
                        <label class="label-style">Event Name</label>
                        <input style="margin-left: 65px" type="text" placeholder="Write here..." name="name"
                            class="inputOrganizer" required>
                    </div>
                    <div class="label-cards">
                        <label class="label-style">Description</label>
                        <input style="margin-left: 70px" type="text" placeholder="Write here..." name="description"
                            class="inputOrganizer" required>
                    </div>
                    <div class="label-cards">
                        <label class="label-style">Location</label>
                        <input style="margin-left: 94px" type="text" placeholder="Write here..." name="location"
                            class="inputOrganizer" required>
                    </div>
                    <div class="label-cards">
                        <label class="label-style">Capacity</label>
                        <input style="margin-left: 92px" type="number" placeholder="Write here..." name="capacity"
                            class="inputOrganizer" required>
                    </div>
                    <div class="label-cards">
                        <label class="label-style">Ticket Price</label>
                        <input style="margin-left: 70px" type="number" placeholder="Write here..." name="ticketPrice"
                            class="inputOrganizer" required>
                    </div>
                    <div class="custom-btnTwo-div">
                        <button type="submit" name="submit" class="custom-button-Update">
                            <input type="hidden" id="eventID" name="eventID" value="">
                            <span class="btn-cust">Add Event</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="site-footer" id="#section_6">
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
                        <a href="tel: 090-080-0760" class="site-footer-link">
                            0799747894
                        </a>
                    </p>
                    <p class="text-white d-flex">
                        <a href="mailto:hello@company.com" class="site-footer-link">
                            info@xyzevent.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>
                    <p class="text-white d-flex mt-3 mb-2">
                        Amman, Jordan</p>
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

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/text.js"></script>
</body>

</html>