<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CGV : Online Certificate Verification System</title>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">

    <!-- Favicons -->
    <link href="img/logo/favicon/favicon-32x32.png" rel="icon">
    <link href="img/logo/favicon/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- External CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="d17af46b-afdd-4665-8862-2ca604c2cadc" data-blockingmode="auto" type="text/javascript"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <style>
        #profile-box {
            display: none;
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #profile-icon {
            cursor: pointer;
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 24px;
        }

        .logout-button {
            margin-top: 10px;
        }

        /* Custom Scroll */
        /* width */

        ::-webkit-scrollbar {
            width: 15px;
        }

        /* Track */

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */

        ::-webkit-scrollbar-thumb {
            background: #15fd00;
            border-radius: 10px;
        }

        /* Handle on hover */

        ::-webkit-scrollbar-thumb:hover {
            background: #15fd00;
        }

        /* End Custom Scroll */
    </style>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top topbar-transparent">
        <div class="container d-flex justify-content-end">
            <div class="social-links">
                <a href="https://twitter.com/sdlsmartlabs" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://facebook.com/sdlsmartlabs" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://linkedin.com/company/sdlsmartlabs" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="https://instagram.com/sdlsmartlabs" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center">


            <a href="home.php" class="logo mr-auto"><img src="img/logo/favicon/android-chrome-512x512.png" alt="" class="img-fluid"></a>

            <nav class="main-nav d-none d-lg-block dark">
                <ul>
                    <li class="active"><a href="home.php">HOME</a></li>
                    <li><a href="#why-us">ABOUT US</a></li>
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="#pricing">Testimonials</a></li>
                    <li><a href="#team">TEAM</a></li>
                    <li><a href="#footer">CONTACT US</a></li>
                    <li>
                        <div id="profile-icon" onclick="toggleProfileBox()">👤profile</div>
                    </li>
                </ul>
            </nav>
            <!-- .main-nav-->

        </div>

        <div id="profile-box">
            <?php

            if (isset($_SESSION['email'])) {
                // User is logged in, display profile information
                include 'config.php';

                $email = $_SESSION['email'];

                $sql = "SELECT * FROM `users` WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Display user profile information
                    echo "<h1>Welcome, {$user['name']}!</h1>";
                    echo "<p>Email: {$user['email']}</p>";
                    // Add more profile information as needed
                    echo '<button class="logout-button"><a href="logout.php">Logout</a></button>';
                } else {
                    echo "<p>Error retrieving user profile.</p>";
                }
            } else {
                // User is not logged in, display login link or handle as needed
                echo '<p>User not logged in.</p>';
            }
            ?>
        </div>

        <script>
            function toggleProfileBox() {
                var profileBox = document.getElementById('profile-box');
                profileBox.style.display = (profileBox.style.display === 'none') ? 'block' : 'none';
            }
        </script>

    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                        <span>India’s </span>largest online certificate generation and verification network
                    </h2>
                    <div>
                        <a href="#services" class="btn-get-started scrollto">Get Started</a>
                        <a href="#footer" class="btn-get-started scrollto">Contact Us</a>
                    </div>
                </div>

                <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/intro-img.png" alt="" class="img-fluid" width="150%" height="400%">
                </div>
            </div>

        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container-fluid" data-aos="fade-up">

                <header class="section-header">
                    <h3>Why choose us?</h3>
                    <p>To us, it's not just work - we take pride in the solutions we deliver.</p>
                </header>

                <div class="row">

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="assets/img/why-us.jpg">
                            <img src="assets/img/about.jpg" alt="" class="img-fluid" width="250%" height="280%">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="why-us-content">
                            <p>Getting a validated certificate is like having solid proof for employers, schools, and others that you didn't just take an online course – you mastered it. To get this official certificate, you go through a careful process where your identity is checked using a webcam and a valid photo ID. This way, employers and schools can trust that you really finished the course.
                            </p>
                            <p>While learning for the sake of learning is great, there are times when having a certificate is super useful. If you're looking to move up in your job, get a promotion, or boost your college application, having a verified certificate from our online network is key. It tells everyone that your educational achievements are real and deserve respect.<br><br>&nbsp;Come join us for a learning experience where the joy of gaining new knowledge goes hand in hand with actual benefits for your career and education. Your journey to success begins with a verified certificate that shows how dedicated and accomplished you are.</p>
                            <div class="features clearfix" data-aos="fade-up" data-aos-delay="100">
                                <i class="fa fa-diamond" style="color: #f058dc;"></i>
                                <h4>Build skills and your career</h4>
                                <p>Impress your employer with a verified certificate that documents your learning.</p>
                            </div>

                            <div class="features clearfix" data-aos="fade-up" data-aos-delay="200">
                                <i class="fa fa-object-group" style="color: #ffb774;"></i>
                                <h4>Challenge yourself</h4>
                                <p>Sometimes we all need that extra push. Working towards a certificate keeps you motivated.</p>
                            </div>

                            <div class="features clearfix" data-aos="fade-up" data-aos-delay="300">
                                <i class="fa fa-language" style="color: #589af1;"></i>
                                <h4>Share it with the world</h4>
                                <p>Share your verified certificate with others securely through a dedicated link that we provide.</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Services</h3>
                    <p>Click the links below to either generate certificates or verify certificates.</p>
                </header>

                <div class="row">

                    <div class="col-md-6 col-lg-6 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <div class="icon" style="background:white;"><span class="iconify" data-icon="ion:ribbon" data-inline="false" data-width="50" data-height="50" style="color: #e98e06;"></span></i>
                            </div>
                            <h4 class="title"><a href="gen.html">Generate Certificate</a></h4>
                            <p class="description">Please type your certificate number to generate certificate only if your details is present in our database or else contact your organization.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <div class="icon" style="background:white;"><span class="iconify" data-icon="ion:checkmark-done" data-inline="false" data-width="50" data-height="50" style="color: #f058dc;"></span></div>
                            <h4 class="title"><a href="certv.php">Verify Certificate</a></h4>
                            <p class="description">Please type your certificate number to verify certificate only if your details is present in our database or else contact your organization.</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Technologies Used</h3>
                </header>

                <div class="owl-carousel clients-carousel">
                    <img src="img/1.jpg" alt="">
                    <img src="img/2.png" alt="">
                    <img src="img/3.png" alt="">
                    <img src="img/4.png" alt="">
                    <img src="img/5.png" alt="">
                    <img src="img/6.png" alt="">
                </div>

            </div>
        </section>
        <!-- End Clients Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3>Team</h3>
                    <p>Our team include experienced tech experts</p>
                </div>

                <div class="row">
                    <div class="offset-lg-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="img/leela.png" class="img-fluid" alt="P. Leela Prasad">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>P. Leela Prasad</h4>
                                    <span>Developer</span>
                                    <div class="social">
                                        <a href="https://linkedin/vigneshshettyin"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://github.com/vigneshshettyin"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="img/sonu.png" class="img-fluid" alt="Ch. Sonu Sandeep">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Ch. Sonu Sandeep</h4>
                                    <span>Developer</span>
                                    <div class="social">
                                        <a href="https://linkedin/vigneshshettyin"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://github.com/vigneshshettyin"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="img/jignash.png" class="img-fluid" alt="Ch. Jignash">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Ch. Jignash</h4>
                                    <span>Developer</span>
                                    <div class="social">
                                        <a href="https://linkedin/vigneshshettyin"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://github.com/vigneshshettyin"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="img/nagalakshmi.png" class="img-fluid" alt="Y. Siva Naga Lakshmi">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Y. Siva Naga Lakshmi</h4>
                                    <span>Developer</span>
                                    <div class="social">
                                        <a href="https://linkedin/vigneshshettyin"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://github.com/vigneshshettyin"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="img/smily.jpg" class="img-fluid" alt="K. Akhila">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>K. Akhila</h4>
                                    <span>Developer</span>
                                    <div class="social">
                                        <a href="https://www.linkedin.com/in/akhila-karukoti"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://github.com/Akhilakarukoti"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="img/Anusha.png" class="img-fluid" alt="S. Anusha">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>S. Anusha</h4>
                                    <span>Developer</span>
                                    <div class="social">
                                        <a href="https://linkedin/vigneshshettyin"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://github.com/vigneshshettyin"><i class="fa fa-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </section>
        <!-- End Team Section -->


        <!-- ======= Testimonial Section ======= -->
        <section id="testimonial" class="testimonial section-bg wow fadeInUp">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Testimonials</h3>
                    <p>See what our customers are saying about us.</p>
                </header>

                <div class="row flex-items-xs-middle flex-items-xs-center">

                    <!-- Testimonial 1 -->
                    <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets\img\testimonial-1.jpg" class="card-img-top" alt="Testimonial 1 Image">
                            <div class="card-block">
                                <p class="testimonial-text">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                    Praesent efficitur."
                                </p>
                                <p class="testimonial-author">- John Doe</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <img src="assets\img\testimonial-2.jpg" class="card-img-top" alt="Testimonial 2 Image">
                            <div class="card-block">
                                <p class="testimonial-text">
                                    "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae."
                                </p>
                                <p class="testimonial-author">- Jane Smith</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="assets\img\testimonial-3.jpg" class="card-img-top" alt="Testimonial 3 Image">
                            <div class="card-block">
                                <p class="testimonial-text">
                                    "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur."
                                </p>
                                <p class="testimonial-author">- Mark Johnson</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!-- End Testimonial Section -->

        <section id="projectdemo" class="pricing section-bg wow fadeInUp">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Project Demo</h3>
                    <p>Get to know about our company, dashboard working & services provided at our company one stretch.</p>
                </header>
                <div style="position: relative; padding-bottom: 56.25%; height: 0;">
                    <video width="640" height="360" controls autoplay loop>
                        <source src="sample.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video><iframe frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->



    <div style="padding: 20px;">
        <center><button style="border:none; background-color: #F9A826;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Submit Feedback</button></center>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Feedback</h5></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">

                        <header class="section-header">
                            <p>We would love to hear your thoughts, suggestions, concerns or problems with anything so we can improve!
                            </p>
                        </header>
                        <form action="feedback.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="fName" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" required />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="contactEmail" id="email" placeholder="Your Email" data-rule="email" required />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="phone" class="form-control" name="contactMessage" id="subject" placeholder="Phone" data-rule="minlen:4" required />
                                <div class="validate"></div>
                            </div>
                            <label for="inlineRadio1">Rating</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" required>
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" required>
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" required>
                                <label class="form-check-label" for="inlineRadio3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4" required>
                                <label class="form-check-label" for="inlineRadio3">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5" required>
                                <label class="form-check-label" for="inlineRadio3">5</label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="contactPhone" rows="5" data-rule="required" required placeholder="Feedback...."></textarea>
                                <div class="validate"></div>
                            </div>

                            <div class="mb-3">
                                <!-- <div class="loading">Loading</div> -->
                                <div class="error-message" style="background-color:lime"></div>
                                <!-- <div class="sent-message">Your feedback has been sent. Thank you!</div> -->
                            </div>

                            <div class="text-center"><button style="background-color: #F9A826;" class="btn btn-primary" type="submit" title="Send Feedback">Send Feedback</button></div>

                            <br>
                            <br>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feedback  -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
        <div class="footer-top">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="footer-info">
                                    <h3>CGV</h3>
                                    <p>Providing cost-effective Full-Stack Web Development, User Interface Design, and more, with a focus on streamlined certificate generation and validation services.</p>
                                </div>

                                <div class="footer-newsletter">
                                    <h4>Our Newsletter</h4>
                                    <p>Get Free Email Updates!<br>Join us for FREE to get instant email updates!</p>
                                    <form action="newsletter.php" method="post" role="form" class="php-email-form">
                                        <input type="email" name="contactEmailN" placeholder="Your Email" required><input type="submit" value="Subscribe">
                                        <div class="mb-3">
                                            <div class="loading">Loading</div>
                                            <div class="error-message" style="background-color:lime"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="footer-links">
                                    <h4>Useful Links</h4>
                                    <ul>
                                        <li><a href="#services">Services</a></li>
                                        <li><a href="login.php">Login Page</a></li>
                                    </ul>
                                </div>

                                <div class="footer-links">
                                    <h4>Contact Us</h4>
                                    <p>
                                        Chittinagar<br> Vijayawada
                                        <br> Andhra Pradesh, India<br>
                                        <strong>Phone:</strong> +91 9700651322<br>
                                        <strong>Email:</strong> pailaleelaprasad@gmail.com<br>
                                    </p>
                                </div>

                                <div class="social-links">
                                    <a href="https://twitter.com/" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="https://facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="https://linkedin.com/company/" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form">

                            <h4>Connect. Meet. Move.</h4>
                            <p>Please fill out the form below to get in touch. We will contact you shortly.</p>

                            <form action="contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-group">
                                    <input type="text" name="fName" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="contactEmail" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control" name="contactMessage" id="subject" placeholder="Phone" data-rule="minlen:4" data-msg="Please enter your contact number" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="contactPhone" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validate"></div>
                                </div>

                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message" style="background-color:lime"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>

                                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                Made with <i class="fa fa-heart" style="color: rgb(255, 123, 0);"></i> in <strong>CGV</strong> &amp; Designed by <a href="home.php">Rocky Leela</a>
            </div>
        </div>
    </footer>
    <!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <script>
        function myFoo() {
            var x = document.getElementById("foo");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5f7aa38f4704467e89f4a000/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <script>
        var message = "Right Click Disabled!";

        function clickIE4() {
            if (event.button == 2) {
                alert(message);
                return false;
            }
        }

        function clickNS4(e) {
            if (document.layers || document.getElementById && !document.all) {
                if (e.which == 2 || e.which == 3) {
                    alert(message);
                    return false;
                }
            }
        }

        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS4;
        } else if (document.all && !document.getElementById) {
            document.onmousedown = clickIE4;
        }

        document.oncontextmenu = new Function("alert(message);return false")
    </script>
</body>

</html>