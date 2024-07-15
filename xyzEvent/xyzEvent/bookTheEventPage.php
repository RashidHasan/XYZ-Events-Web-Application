<?php
session_start();
include 'mysqli_connection.php';

$events = [];

$query = "SELECT ID, name, description, location, capacity, TicketPrice FROM event";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['book'])) {
        $eventID = $_POST['eventID'];
        $attendeeID = $_SESSION['attendeeID'];
        $eventClass = $_POST['eventClass'];

        $checkAttendeeQuery = "SELECT * FROM attendee WHERE ID = ?";
        $stmt = $connection->prepare($checkAttendeeQuery);
        $stmt->bind_param("i", $attendeeID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<script>alert('Invalid attendee ID.');</script>";
        } else {
            $checkBookingQuery = "SELECT * FROM Attendee_Booking WHERE A_ID = ? AND E_ID = ?";
            $stmt = $connection->prepare($checkBookingQuery);
            $stmt->bind_param("ii", $attendeeID, $eventID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('You have already booked this event.');</script>";
            } else {
                $sqlEvent = "INSERT INTO Attendee_Booking (A_ID, E_ID, TicketPriceBasedOnClass) VALUES (?, ?, ?)";
                $ticketPrice = $_POST['ticketPrice'];
                $stmt = $connection->prepare($sqlEvent);
                $stmt->bind_param("iii", $attendeeID, $eventID, $ticketPrice);
                $stmt->execute();
                echo "<script>alert('Booking successful.');</script>";
            }
        }
    } elseif (isset($_POST['cancel'])) {
        if (!isset($_SESSION['attendeeID'])) {
            echo "<script>alert('Invalid attendee ID.');</script>";
        } else {
            $eventID = $_POST['eventID'];
            $attendeeID = $_SESSION['attendeeID'];

            $cancelBookingQuery = "DELETE FROM Attendee_Booking WHERE A_ID = ? AND E_ID = ?";
            $stmt = $connection->prepare($cancelBookingQuery);
            $stmt->bind_param("ii", $attendeeID, $eventID);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Booking canceled successfully.');</script>";
            } else {
                echo "<script>alert('You have not booked this event.');</script>";
            }
        }
    }
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
                    <a class="navbar-brand" href="attendee-home.php">
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
                        <a href="attendee-home.php" class="btn custom-btn d-lg-block d-none">Go Back</a>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="landing">
            <div class="container">
                <div class="text">
                    <h1>Booking Now!</h1>
                    <p>Easily book your preferred event on the XYZ Events website for an exceptional experience.</p>
                    <a style="margin-top: 20px;" href="#Cards"> <button class="buttonSp">
                            Booking Now!
                        </button></a>
                </div>
                <div class="image">
                    <img decoding="async" src="./images/LogoTwo.png" alt="" />
                </div>
            </div>
            <a href="#articles" class="go-down">
                <i class="fad fa-angle-double-down"></i>
            </a>
        </div>
        <div class="Title-card" id="Cards">
            <h1>Details Of Events</h1>
        </div>
        <section class="container-event-card" id="cards-container">
            <?php foreach ($events as $event): ?>
                <div class="card-container">
                    <div class="card-content">
                        <div class="card-title">
                            <label class="title"><?php echo htmlspecialchars($event['name']); ?></label>
                        </div>
                        <div class="card-body">
                            <label class="title">Event Name</label>
                            <input disabled type="text" value="<?php echo htmlspecialchars($event['name']); ?>"
                                class="inputSpea">
                            <label class="title">Type</label>
                            <select class="inputSpeaTwo" id="eventClass-<?php echo $event['ID']; ?>"
                                onchange="updateTicketPrice(<?php echo $event['ID']; ?>, <?php echo $event['TicketPrice']; ?>)">
                                <option value="C">Class C</option>
                                <option value="B">Class B</option>
                                <option value="A">Class A</option>
                            </select>
                            <label class="title">Capacity</label>
                            <input disabled type="text" value="<?php echo htmlspecialchars($event['capacity']); ?>"
                                class="inputSpea">
                            <label class="title">Location</label>
                            <input disabled type="text" value="<?php echo htmlspecialchars($event['location']); ?>"
                                class="inputSpea">
                            <label class="title">Description</label>
                            <input disabled type="text" value="<?php echo htmlspecialchars($event['description']); ?>"
                                class="inputSpea">
                            <label class="title">Ticket Price</label>
                            <input disabled type="text" id="ticketPrice-<?php echo $event['ID']; ?>"
                                value="<?php echo htmlspecialchars($event['TicketPrice']); ?>" class="inputSpea">

                            <form method="POST" class="btn-strangeBtn">
                                <input type="hidden" name="eventID" value="<?php echo $event['ID']; ?>">
                                <input type="hidden" name="ticketPrice" id="hiddenTicketPrice-<?php echo $event['ID']; ?>"
                                    value="<?php echo $event['TicketPrice']; ?>">
                                <input type="hidden" name="eventClass" id="hiddenEventClass-<?php echo $event['ID']; ?>"
                                    value="C">
                                <button type="submit" name="book" class="strangeBtn">Book</button>
                                <button style="margin-left: 30px" type="submit" name="cancel"
                                    class="strangeBtn">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>

        <div style="transform: translateY(-110px)" class="custom-btn-div">

            <button class="custom-button" id="prev-btn" onclick="prevCard()">
                <span>Previous</span>
            </button>
            <div style="margin-left: 20px; margin-right: 20px; font-size: 40px; font-weight: 700;">
                <span id="card-number">1</span>
            </div>
            <button class="custom-button" id="next-btn" onclick="nextCard()">
                <span>Next</span>
            </button>
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
    <script>
        // Get the cards container
        const cardsContainer = document.getElementById('cards-container');
        // Get the navigation buttons
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        // Set initial card index and counter
        let currentCardIndex = 0;
        let cardNumber = currentCardIndex + 1;
        // Function to show the previous card
        function prevCard() {
            if (currentCardIndex > 0) {
                currentCardIndex--;
                cardNumber--;
                updateVisibility();
            }
        }
        // Function to show the next card
        function nextCard() {
            if (currentCardIndex < cardsContainer.children.length - 1) {
                currentCardIndex++;
                cardNumber++;
                updateVisibility();
            }
        }
        // Function to update card visibility based on the current index
        function updateVisibility() {
            for (let i = 0; i < cardsContainer.children.length; i++) {
                if (i === currentCardIndex) {
                    cardsContainer.children[i].style.display = 'block';
                } else {
                    cardsContainer.children[i].style.display = 'none';
                }
            }
            // Update navigation buttons visibility
            prevBtn.disabled = currentCardIndex === 0;
            nextBtn.disabled = currentCardIndex === cardsContainer.children.length - 1;

            // Update card number
            document.getElementById('card-number').textContent = cardNumber;
        }
        // Initialize visibility
        updateVisibility();

        // Function to update ticket price based on selected class
        function updateTicketPrice(eventID, basePrice) {
            const eventClass = document.getElementById(`eventClass-${eventID}`).value;
            let finalPrice = basePrice;

            switch (eventClass) {
                case 'B':
                    finalPrice = basePrice * 1.25;
                    break;
                case 'A':
                    finalPrice = basePrice * 1.5;
                    break;
                default:
                    finalPrice = basePrice;
            }

            finalPrice = Math.round(finalPrice);

            document.getElementById(`ticketPrice-${eventID}`).value = finalPrice;
            document.getElementById(`hiddenTicketPrice-${eventID}`).value = finalPrice;
            document.getElementById(`hiddenEventClass-${eventID}`).value = eventClass;
        }
    </script>
</body>

</html>