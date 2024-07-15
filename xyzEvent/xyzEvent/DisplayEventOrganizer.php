<?php
include 'mysqli_connection.php';
session_start();

$eventAdded = false;
$eventUpdated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $organizerID = $_SESSION['ID'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $capacity = $_POST['capacity'];
        $ticketPrice = $_POST['TicketPrice'];
        $eventID = $_POST['eventID'];

        if ($eventID) {
            // Update existing event
            $sqlEvent = "UPDATE event SET 
                name = '$name', 
                description = '$description', 
                location = '$location', 
                capacity = '$capacity', 
                ticketPrice = '$ticketPrice' 
             WHERE ID = '$eventID' AND organizerID = '$organizerID'";

            $resultEvent = mysqli_query($connection, $sqlEvent);

            if ($resultEvent) {
                $eventUpdated = true;
            } else {
                echo '<script>console.log("Failed to update event.");</script>';
            }
        }
    } elseif (isset($_POST['delete'])) {
        $eventID = $_POST['eventID'];
        $sqlEvent = "DELETE FROM event WHERE ID = '$eventID'";
        $resultEvent = mysqli_query($connection, $sqlEvent);

        if ($resultEvent) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo '<script>console.log("Failed to delete event.");</script>';
        }
    }
}


// Fetch and display events
$events = [];
$query = "SELECT ID, name, description, location, capacity, TicketPrice FROM event";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}
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
                    <a class="navbar-brand" href="DisplayEventOrganizer.php">
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
            <h1>All Of Events</h1>
        </div>

        <?php foreach ($events as $event): ?>
            <div class="custom-card-div">
                <div class="eventCard">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <?php if (isset($event['name'])): ?>
                            <div class="label-cards">
                                <label class="label-style">Event Name</label>
                                <input style="margin-left: 70px" type="text" name="name" value="<?php echo $event['name']; ?>"
                                    class="inputOrganizer">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($event['description'])): ?>
                            <div class="label-cards">
                                <label class="label-style">Description</label>
                                <input style="margin-left: 75px" style="margin-left: 65px" type="text" name="description"
                                    value="<?php echo $event['description']; ?>" class="inputOrganizer">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($event['location'])): ?>
                            <div class="label-cards">
                                <label class="label-style">Location</label>
                                <input style="margin-left: 97px" type="text" name="location"
                                    value="<?php echo $event['location']; ?>" class="inputOrganizer">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($event['capacity'])): ?>
                            <div class="label-cards">
                                <label class="label-style">Capacity</label>
                                <input style="margin-left: 94px" type="text" name="capacity"
                                    value="<?php echo $event['capacity']; ?>" class="inputOrganizer">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($event['TicketPrice'])): ?>
                            <div class="label-cards">
                                <label class="label-style">Ticket Price</label>
                                <input style="margin-left: 70px" type="text" name="TicketPrice"
                                    value="<?php echo $event['TicketPrice']; ?>" class="inputOrganizer">
                            </div>
                        <?php endif; ?>
                        <div>
                            <div class="custom-btnTwo-div">
                                <input type="hidden" name="eventID" value="<?php echo $event['ID']; ?>">
                                <button type="submit" name="submit" class="custom-button-Update">
                                    <span class="btn-cust">Update</span>
                                </button>
                                <button type="submit" name="delete" class="custom-button-Delete">
                                    <span class="btn-cust">Delete</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
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
                    <h5 class="site-footer-title mb-3">Organizer Dashboard</h5>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="loginOrganizer.php" class="site-footer-link">Sign Out</a>
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
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/text.js"></script>
</body>

</html>