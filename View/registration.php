<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php?action=home">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?action=category">Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<?php
$name = isset($_POST['txtusername']) ? $_POST['txtusername'] : '';
$email = '';
$email_error = '';
$address = isset($_POST['txtdiachi']) ? $_POST['txtdiachi'] : '';
$phone = '';
$phone_error = '';
$pass = '';
$pass_error = '';
$repass = '';
$repass_error = '';
if (isset($_POST['txtemail'])) {
    $email = trim($_POST['txtemail']);
    $kt = new user();
    $check = $kt->ExistUser($email);
    if ($check) {
        $email_error = 'The Email was registered';
    } else {
        $regexemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
        if (preg_match($regexemail, $email) == 0) {
            $email_error = "invalid email";
        }
    }
}
if (isset($_POST['txtsodt'])) {
    $phone = trim($_POST['txtsodt']);
    $kt = new user();
    $check = $kt->ExistUserDT($phone);
    if ($check) {
        $phone_error = 'The phone number was registered';
    } else {
        $regexphone = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
        if (preg_match($regexphone, $phone) == 0) {
            $phone_error = "invalid phone number";
        }
    }
}
if (isset($_POST['txtpass'])) {
    $pass = $_POST['txtpass'];
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number    = preg_match('@[0-9]@', $pass);
    $flag = false;
    // Must be a minimum of 8 characters
    if (strlen($pass) >= 8) {
        // Must contain at least one uppercase character
        if ($uppercase) {
            // Must contain at least one lowercase character
            if ($lowercase) {
                if (!$number) {
                    $pass_error = 'Password must contain a number';
                }
            } else {
                $pass_error = 'Password must contain a lowercase character';
            }
        } else {
            $pass_error = 'Password must contain an uppercase character';
        }
    } else {
        $pass_error = 'Password must be at least 8 characters';
    }
}
if (isset($_POST['txtpass']) && isset($_POST['retypepassword'])) {
    $pass = $_POST['txtpass'];
    $repass = $_POST['retypepassword'];
    if ($repass != $pass) {
        $repass_error = 'Re-enter the password is not the same';
    }
}
?>
<section class="login_box_area section_gap">
    <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Create account</h3>
                        <form class="row login_form" action="index.php?action=registration&act=registration_action" method="post" id="contactForm"
                            novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="txtusername" placeholder="Username" value="<?php echo $name ?>"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'"> 
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control <?php echo $email_error != '' ? 'error-input' : '' ?>" id="name" name="txtemail" placeholder="Email" 
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                <?php
                                if ($email_error != '') {
                                    echo '<small class="text-danger">' . $email_error . '</small>';
                                }
                                ?>
                            </div>
                            <div class="col-md-12 form-group con">
                                <input type="password" class="form-control" id="password" name="txtpass" placeholder="Password"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                    <span class="show-btn eye"><i class="fa fa-eye"></i></span>
                            <?php
                                if ($pass_error != '') {
                                    echo '<small class="text-danger">' . $pass_error . '</small>';
                                }
                                ?>
                            </div>
                            <div class="col-md-12 form-group con">
                                <input type="password" class="form-control" id="password" name="retypepassword" placeholder="Re-enter password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re-enter password'">
                                <span class="show-btn eye"><i class="fa fa-eye"></i></span>
                            <?php
                                if ($repass_error != '') {
                                    echo '<small class="text-danger">' . $repass_error . '</small>';
                                }
                                ?>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="txtdiachi" placeholder="Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="txtsodt" placeholder="Mobile Phone"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Phone'">
                            <?php
                                if ($phone_error) {
                                    echo '<small class="text-danger">' . $phone_error . '</small>';
                                }
                                ?>
                            </div>
                            <div class="col-md-12 form-group mb-5 mt-3">
                                <button type="submit" class="primary-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================End Login Box Area =================-->