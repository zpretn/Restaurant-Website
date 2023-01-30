<?php
include_once 'DB-Connection-Model.inc';
session_start();
var_dump($_SESSION);

if (!isset($_SESSION) || !isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != "false") {
    //header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/login.html");
    header("Location: " . "login.php");
    //header("Location: " . "login.html");
    //print("Not logged in");
}

if (isset($_GET) && isset($_GET["id"])) {
    //var_dump($_GET["id"]);
    //var_dump($GLOBALS);
    if (!isset($_SESSION["warenkorb"])) {
        $_SESSION["warenkorb"] = [];
    }
    array_push($_SESSION["warenkorb"], $_GET["id"]);
}

//$name = $conn->query("SELECT 'name' as name FROM menu WHERE $_GET["id"])->fetch();
$names = $conn->query("SELECT name FROM menu WHERE id = " . $_GET['id'])->fetchAll();
$prices = $conn->query("SELECT price FROM menu WHERE id = " . $_GET['id'])->fetchAll();


//print_r($_SESSION["warenkorb"]);
//print_r($names);
//print_r($price);



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/Icon.png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Cart</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <h2>Restaurant <em>Website</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="book-table.html">Book A Table</a></li>

                        <li class="nav-item active"><a class="nav-link" href="menu.html">Menu</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about-us.html">About Us</a>
                                <a class="dropdown-item" href="blog.html">Blog</a>
                                <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                            </div>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>


                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2>International Menus</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>
                    <h4>
                        <p>Name:</p>
                    </h4>
                    <h5> <?php
                            foreach ($names as $name) {
                                echo "<p>" . $name['name'] . "</p>";
                            }
                            ?> </h5>
                    <h4>
                        <p>Price:</p>
                    </h4>
                    <h5> <?php
                            foreach ($prices as $price) {
                                echo "<p>" . $price['price'] . "</p>";
                            }
                            ?> </h5></a></p>
                </div>
            </div>
        </div>
    </div>




    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form">
                        <form action="#" id="contact">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Pick-up location" required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Return location" required="">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Return date/time" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter full name" required="">

                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Enter email address" required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Enter phone" required="">
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>

</html>