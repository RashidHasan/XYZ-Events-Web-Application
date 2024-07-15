<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>XYZ Event</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <main>

        <!-- <header style="background-color: black;" class="site-header">
            <div class="container">
                <div style="margin-bottom: 28px;" class="row">



                </div>
            </div>
        </header> -->


        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="DivNav">
                    <a class="navbar-brand" href="index.php">
                        <img class="LogoNav" src="./images/LogoTwo.png" alt="">
                    </a>
                </div>

                <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#home">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#about">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#schedule">Schedule</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#contact">Contact</a>
                        </li>
                    </ul>







                    <div class="dropdown">
                        <a class="btn custom-btn d-lg-block d-none">Register</a>
                        <div class="dropdown-content">
                            <a href="attendee-register.php">Attendee Login</a>
                            <a href="loginOrganizer.php">Organizer Login</a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>


        <section class="hero-section" id="home">
            <div class="section-overlay"></div>

            <div class="container d-flex justify-content-center align-items-center">

                <div class="row">
                    <div class="col-12 mt-auto mb-5 text-center">

                        <div>
                            <small id="animated-small"></small>
                            <h1 id="animated-h1" class="text-white mb-5"></h1>
                        </div>

                        <a style="margin-top: 20px;" href="attendee-register.php"> <button class="buttonSp">
                                Booking Now!
                            </button></a>


                    </div>

                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                        <div class="date-wrap"></div>
                        <div class="location-wrap mx-auto py-3 py-lg-0"></div>
                    </div>
                </div>
            </div>

            <div class="video-wrap">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="video/pexels-2022395.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </section>



        <section class="event-section section-padding" id="about">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Learn About XYZ Event</h1>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="event-thumb">
                            <div class="event-image-wrap">
                                <img src="./images/eventPhoto.jpg" class="event-image img-fluid">
                            </div>

                            <div class="event-hover">
                                <p>
                                    <strong>Welcome to XYZ Events, a premier event management company renowned for
                                        orchestrating a wide range of events, from professional conferences to vibrant
                                        social gatherings and dynamic festivals. With a rich history of delivering
                                        exceptional experiences, we are now pioneering an innovative Event Management
                                        System (EMS) designed to streamline event organization and elevate the
                                        experience for clients and attendees.
                                    </strong>

                                </p>



                                <hr>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="event-thumb">
                            <div class="event-image-wrap">
                                <img src="./images/EduEvent.png" class="event-image img-fluid">
                            </div>

                            <div class="event-hover">
                                <p style="font-size: 15px">
                                    <strong>Our new EMS is born from a commitment to enhancing event planning through
                                        advanced technology and industry best practices. This system addresses common
                                        challenges such as resource allocation, team communication, data analysis,
                                        attendee engagement, and regulatory compliance. By integrating these elements
                                        into a user-friendly platform, we aim to boost efficiency, improve our event
                                        management capabilities, and offer unparalleled value to our clients, setting
                                        new standards in event coordination.</strong>

                                </p>


                            </div>
                        </div>

                        <div class="event-thumb">
                            <img src="./images/conferencesEvent.png" class="event-image img-fluid">

                            <div class="event-hover">
                                <p style="font-size: 15px">
                                    <strong>At XYZ Events, our mission is to enhance every aspect of event management,
                                        making it simpler and more efficient. We are dedicated to providing exceptional
                                        service and innovative solutions, ensuring every event we manage is a remarkable
                                        success. Join us as we set new benchmarks in the world of event
                                        management.</strong>

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="schedule-section section-padding" id="schedule">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Event Schedule</h1>

                            <div class="table-responsive">
                                <table class="schedule-table table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>

                                            <th scope="col">Wednesday</th>

                                            <th scope="col">Thursday</th>

                                            <th scope="col">Friday</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Day 1</th>

                                            <td class="table-background-image-wrap pop-background-image">
                                                <h3>Pop Night</h3>

                                                <p class="mb-2">5:00 - 7:00 PM</p>

                                                <p>By Adele</p>

                                                <div class="section-overlay"></div>
                                            </td>

                                            <td style="background-color: #F3DCD4"></td>

                                            <td class="table-background-image-wrap rock-background-image">
                                                <h3>Rock & Roll</h3>

                                                <p class="mb-2">7:00 - 11:00 PM</p>

                                                <p>By Rihana</p>

                                                <div class="section-overlay"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Day 2</th>

                                            <td style="background-color: #ECC9C7"></td>

                                            <td>
                                                <h3>DJ Night</h3>

                                                <p class="mb-2">6:30 - 9:30 PM</p>

                                                <p>By Rihana</p>
                                            </td>

                                            <td style="background-color: #D9E3DA"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Day 3</th>

                                            <td class="table-background-image-wrap country-background-image">
                                                <h3>Country Music</h3>

                                                <p class="mb-2">4:30 - 7:30 PM</p>

                                                <p>By Rihana</p>

                                                <div class="section-overlay"></div>
                                            </td>

                                            <td style="background-color: #D1CFC0"></td>

                                            <td>
                                                <h3>Free Styles</h3>

                                                <p class="mb-2">6:00 - 10:00 PM</p>

                                                <p>By Members</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="pricing-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 style="font-size: 40px" class="text-center mb-4">Enjoy the wonderful events that await you
                        </h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="pricing-thumb">
                            <div class="d-flex">
                                <div>
                                    <h3><small>Early Bird</small> $120</h3>

                                    <p>Including good things:</p>
                                </div>

                                <p class="pricing-tag ms-auto">Save up to <span>50%</span></h2>
                            </div>

                            <ul class="pricing-list mt-3">
                                <li class="pricing-list-item">platform for potential customers</li>

                                <li class="pricing-list-item">digital experience</li>

                                <li class="pricing-list-item">high-quality sound</li>

                                <li class="pricing-list-item">standard content</li>
                            </ul>

                            <a class="link-fx-1 color-contrast-higher mt-4" href="bookTheEventPage.php">
                                <span>Buy Ticket</span>
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

                    <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                        <div class="pricing-thumb">
                            <div class="d-flex">
                                <div>
                                    <h3><small>Standard</small> $240</h3>

                                    <p>What makes a premium event?</p>
                                </div>
                            </div>

                            <ul class="pricing-list mt-3">
                                <li class="pricing-list-item">platform for potential customers</li>

                                <li class="pricing-list-item">digital experience</li>

                                <li class="pricing-list-item">high-quality sound</li>

                                <li class="pricing-list-item">premium content</li>

                                <li class="pricing-list-item">live chat support</li>
                            </ul>

                            <a class="link-fx-1 color-contrast-higher mt-4" href="bookTheEventPage.php">
                                <span>Buy Ticket</span>
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
            </div>
        </section>


        <section class="contact-section section-padding" id="contact">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Interested? Let's talk</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Contact Form</h5>
                                </button>

                                <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactMap" type="button" role="tab"
                                    aria-controls="nav-ContactMap" aria-selected="false">
                                    <h5>Google Maps</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                    role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name"
                                                    class="form-control" placeholder="Full name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email"
                                                    class="form-control" placeholder="Email address" required>
                                            </div>
                                        </div>

                                        <input type="text" name="contact-company" id="contact-company"
                                            class="form-control" placeholder="Company" required>

                                        <textarea name="contact-message" rows="3" class="form-control"
                                            id="contact-message" placeholder="Message"></textarea>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                                aria-labelledby="nav-ContactMap-tab">
                                <iframe class="google-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.638622293072!2d35.86711881518677!3d31.953949481234308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca079adcb7a9b%3A0x781c8d4b6c75e4c4!2sAmman%2C%20Jordan!5e0!3m2!1sen!2s!4v1653002449521!5m2!1sen!2s"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>

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
                            <a href="#about" class="site-footer-link">About</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="attendee-register.php" class="site-footer-link">Book Event</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#schedule" class="site-footer-link">Schedule</a>
                        </li>


                        <li class="site-footer-link-item">
                            <a href="#contact" class="site-footer-link">Contact</a>
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