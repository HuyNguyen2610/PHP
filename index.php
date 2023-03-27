<?php
// include 'Model/connect.php';
// include 'Model/hanghoa.php';
// include 'Model/cart.php';
// include 'Model/user.php';
session_start();

include 'Model/class.phpmailer.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
    <!--
        CSS
        ============================================= -->
    <link rel="icon" href="Contact/img/fav.png">
    <link rel="stylesheet" href="Contact/css/linearicons.css">
    <link rel="stylesheet" href="Contact/css/font-awesome.min.css">
    <link rel="stylesheet" href="Contact/css/themify-icons.css">
    <link rel="stylesheet" href="Contact/css/bootstrap.css">
    <link rel="stylesheet" href="Contact/css/owl.carousel.css">
    <link rel="stylesheet" href="Contact/css/nice-select.css">
    <link rel="stylesheet" href="Contact/css/nouislider.min.css">
    <link rel="stylesheet" href="Contact/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="Contact/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="Contact/css/magnific-popup.css">
    <link rel="stylesheet" href="Contact/css/main.css">
    <link rel="stylesheet" href="Contact/css/single-product.css">
    <link rel="stylesheet" href="Contact/css/mau.css">
    <link rel="stylesheet" href="Contact/css/eye.css">
    <link rel="stylesheet" href="Contact/css/editprofile.css">
</head>

<body>
    <?php
    include "View/header.php";
    ?>

    <?php
    $cn = new connect();
    $ctrl = "home";
    if (isset($_GET["action"])) {
        $ctrl = $_GET["action"];
    }
    include "Controller/" . $ctrl . ".php";
    ?>
    <?php
    include "View/footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="Contact/js/vendor/bootstrap.min.js"></script>
    <script src="Contact/js/jquery.ajaxchimp.min.js"></script>
    <script src="Contact/js/jquery.nice-select.min.js"></script>
    <script src="Contact/js/jquery.sticky.js"></script>
    <script src="Contact/js/nouislider.min.js"></script>
    <script src="Contact/js/countdown.js"></script>
    <script src="Contact/js/jquery.magnific-popup.min.js"></script>
    <script src="Contact/js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="Contact/js/gmaps.min.js"></script>
    <script src="Contact/js/main.js"></script>
    <script src="Contact/js/test.js"></script>
    <script src="Contact/js/eye.js"></script>
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
</body>

</html>