<title>Karma Shop - Login</title>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Forgot Password</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php?action=home">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?action=category">Forgot Password</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<?php
$email = '';
$email_error = '';
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $us = new user();
    $check = $us->ExistUser($email);
    if (!$check) {
        $email_error = 'Email is not register';
    }
}
?>
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="Contact/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="index.php?action=login">Log In</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Forgot Password</h3>
                    <form class="row login_form" id="contactForm" novalidate="novalidate" action="index.php?action=forgetps&act=forgetps_action" method='post'>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control <?php echo $email_error != '' ? 'error-input' : '' ?>" id="name" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            <?php
                                if ($email_error != '') {
                                    echo '<small class="text-danger">' . $email_error . '</small>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" name="submit_email" class="primary-btn">Forgot Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->