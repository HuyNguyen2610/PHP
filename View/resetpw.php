<title>Karma Shop - Login</title>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Change Password</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php?action=home">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Change Password</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

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
                        <a class="primary-btn" href="index.php?action=registration">Log In</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Change Password</h3>
                    <?php
                        if (isset($_GET['key']) && isset($_GET['reset'])) {
                            $_SESSION['keyreset'] = $_GET['key'];
                            $_SESSION['reset'] = $_GET['reset'];
                        }
                        $email = $_SESSION['keyreset'];
                        $pass = $_SESSION['reset'];
                        $ur = new user();
                        $result = $ur->getPassEmail($email, $pass);

                        if ($result) {
                            $emailold = $result['email'];
                            $pass = '';
                            $pass_error = '';
                            $repass = '';
                            $repass_error = '';
                            if (isset($_POST['password'])) {
                                $pass = $_POST['password'];
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
                            if (isset($_POST['password']) && isset($_POST['retypepassword'])) {
                                $pass = $_POST['password'];
                                $repass = $_POST['retypepassword'];
                                if ($repass != $pass) {
                                    $repass_error = 'Re-enter the password is not the same';
                                }
                            }


                    ?>

                    <form class="row login_form" id="contactForm" novalidate="novalidate" action="index.php?action=forgetps&act=submit_new" method='post'>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $emailold ?>" hidden  onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $emailold ?>" disabled  onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
                        </div>
                        <div class="col-md-12 form-group con">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New password"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
                            <span class="show-btn eye"><i class="fa fa-eye"></i></span>
                            <?php
                                if ($pass_error != '') {
                                    echo '<small class="text-danger">' . $pass_error . '</small>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12 form-group con">
                            <input type="password" class="form-control" id="password" name="retypepassword" placeholder="Re-enter new password"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re-enter new password'">
                            <span class="show-btn eye"><i class="fa fa-eye"></i></span>
                            <?php
                                if ($repass_error != '') {
                                    echo '<small class="text-danger">' . $repass_error . '</small>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" name="submit_password" class="primary-btn">Change Password</button>
                        </div>
                    </form>

                    <?php
                        }else{
                            echo "<script>alert('Đường dẫn không hợp lệ')</script>";
                            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=login"/>';
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->