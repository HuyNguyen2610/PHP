<?php
    $act="registration";
    if(isset($_GET['act'])){
        $act=$_GET['act'];
    }
        switch($act){
            case 'registration':
                include "View/registration.php";
            break;
            case 'registration_action';
                if (isset($_POST['txtusername'])) {
                    $username = $_POST['txtusername'];
                    $email = $_POST['txtemail'];
                    $kt = new user();
                    $check = $kt->ExistUser($email);
                    // check email dang duoc dang ky chua
                    if ($check) {
                        include './View/registration.php';
                    } else {
                        $dt  = trim($_POST['txtsodt']);
                        $checkdt = $kt->ExistUserDT($dt);
                        if (!$checkdt) {
                            //https://itforusblog.wordpress.com/2020/05/28/regex-so-dien-thoai-viet-nam/
                            $regexphone = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
                            $regexemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
                            //kiem tra so dien thoai hop le chua
                            if (preg_match($regexphone, $dt) && preg_match($regexemail, $email) ) {
                                $password = $_POST['txtpass'];
                                $uppercase = preg_match('@[A-Z]@', $password);
                                $lowercase = preg_match('@[a-z]@', $password);
                                $number    = preg_match('@[0-9]@', $password);
                                // Must be a minimum of 8 characters
                                // Must contain at least 1 number
                                // Must contain at least one uppercase character
                                // Must contain at least one lowercase character
                                if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                                    include './View/registration.php';
                                } else {
                                    //Kiem tra mat khau nhap lai co dung khong
                                    $repass = $_POST['retypepassword'];
                                    if ($password == $repass) {
                                        $diachi  = $_POST['txtdiachi'];
                                        $crypt =  md5($password);
                                        $us  = new user();
                                        $us->InsertUser($username, $crypt, $email, $diachi, $dt);
                                        if (!$us) {
                                            echo "<script>alert('Đăng kí không thành công')</script>";
                                            include './View/registration.php';
                                        } else {
                                            
                                            echo "<script>alert('Đăng kí thành công')</script>";
                                            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=login"/>';
                                        }
                                    } else {
                                        include './View/registration.php';
                                    }
                                }
                            } else {
                                include './View/registration.php';
                            }
                        } else {
                            include './View/registration.php';
                        }
                    }
                }
            break;
    }