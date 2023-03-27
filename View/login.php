<title>Karma Shop - Login</title>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Login</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php?action=home">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?action=category">Login</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<?php
$email = '';
$email_error = '';
$pass='';
$pass_error = '';
if(isset($_POST['txtemail'])){
    $email = $_POST['txtemail'];
    $us = new user();
    $check = $us->ExistUser($email);

    if (!$check) {
        $email_error = 'Email is not register';
    } else {
        $pass=$_POST['txtpassword'];
        $user = $us->login($email, md5($pass));
        if(!$user){
            $pass_error='Incorrect password';
        }
    }
}


?>
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="Contact/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this
                            is the</p>
                        <a class="primary-btn" href="index.php?action=registration">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <form class="row login_form" id="contactForm" novalidate="novalidate"
                        action="index.php?action=login&act=login_action" method='post'>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control <?php echo $email_error != '' ? 'error-input' : '' ?>" id="name" name="txtemail" placeholder="Email" value="<?php echo $email ?>"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                <?php
                                if ($email_error != '') {
                                    echo '<small class="text-danger">' . $email_error . '</small>';
                                }
                                ?>
                        </div>
                        <div class="col-md-12 form-group con">
                            <input type="password" class="form-control <?php echo $pass_error != '' ? 'error-input' : '' ?>" id="password" name="txtpassword" value="<?php echo $pass ?>" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            <span class="show-btn eye"><i class="fa fa-eye"></i></span>
                                <?php
                                if ($pass_error != '') {
                                    echo '<small class="text-danger">' . $pass_error . '</small>';
                                }
                                ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Log In</button>
                            <a href="index.php?action=forgetps">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
