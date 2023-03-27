<?php
$act = 'login';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'login':
        include './View/login.php';
        break;
    case 'login_action':
        if (isset($_POST['txtemail']) && isset($_POST['txtpassword'])) {
            $email = $_POST['txtemail'];
            $pass = md5($_POST['txtpassword']);
            $us = new user();
            $check = $us->ExistUser($email);
            // check email dang duoc dang ky chua
            if (!$check) {
                include './View/login.php';
            } else {
                $check = $us->login($email, $pass);

                if ($check != false) {
                    echo $check['makh'];
                    $_SESSION['makh'] = $check['makh'];
                    $_SESSION['username'] = $check['username'];
                    $_SESSION['matkhau'] = $check['matkhau'];
                    $_SESSION['email'] = $check['email'];
                    echo "<script>alert('Login success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?act=home"/>';
                } else {
                    echo "<script>alert('Login fail')</script>";
                    include 'View/login.php';
                }
            }
            break;
        }
    case 'logout':
        if (isset($_SESSION['makh'])) {
            unset($_SESSION['makh']);
            unset($_SESSION['username']);
            unset($_SESSION['matkhau']);
            unset($_SESSION['email']);
            unset($_SESSION['cart']);
        }
        echo '<meta http-equiv="refresh" content= "0; url=./index.php?act=home"/>';
        break;

    case "profile":
        include "./View/editprofile.php";
        break;
    case "profile_action":
        if (isset($_POST['makh'])) {
            $us = new user();
            $uploadCheck = true;
            $makh = $_POST['makh'];
            $image = $_FILES['img'];

            $target_dir = "./Contact/img/product";
            $target_image = $target_dir . "/" . basename($image['name']);
            $name_image = basename($image['name']);
            $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

            if ($name_image == "") {
                $prodc = $us->getProfile($makh);
                $name_image = $prodc['img'];
            } else {
                if ($image["size"] > 500000) {
                    echo "<script>alert('Sorry, your file is too large.')</script>";
                    $uploadCheck = false;
                }

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                    $uploadCheck = false;
                }

                if ($uploadCheck == false) {
                    echo "<script>alert('Sorry, your file was not uploaded.')</script>";
                } else {
                    move_uploaded_file($image["tmp_name"], $target_image);
                }
            }
            if ($uploadCheck) {
                $product = array(
                    'makh' => $_POST['makh'],
                    'username' => $_POST['username'],
                    'diachi' => $_POST['diachi'],
                    'img' => $name_image,
                    'sodienthoai' => $_POST['sodienthoai'],
                );
                $us->UpdateProfile($makh, $product);
                echo "<script>alert('Update product success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=login&act=profile&id='.$makh.'"/>';
            } else {
                echo "<script>alert('Product update fail')</script>";
                include "./View/editprofile.php";
            }
        }
        break;
    case 'changepass_action':
        if (isset($_POST['makh']) && isset($_POST['email']) && isset($_POST['txtpassword'])) {
            $newpass = '';
            $pass_error = '';
            $makh = $_POST['makh'];
            $email = $_POST['email'];
            $pass = $_POST['txtpassword'];
            $us = new user();
            $check = $us->login($email, md5($pass));
            if (!$check) {
                echo "<script>alert('Password change failed')</script>";
                include 'View/ChangePass.php';
                // echo '<meta http-equiv="refresh" content= "0; url=./"/>';
            } else {
                if(isset($_POST['matkhau'])){
                    $newpass = $_POST['matkhau'];
                    $uppercase = preg_match('@[A-Z]@', $newpass);
                    $lowercase = preg_match('@[a-z]@', $newpass);
                    $number = preg_match('@[0-9]@', $newpass);
                    $repass = $_POST['renewpassword'];
                    if (strlen($newpass) >= 8 && $uppercase && $lowercase && $number && $repass == $newpass) {
                        $matkhau = md5($_POST['matkhau']);
                        $ad = new user();
                        $ad->UpdatePass($makh, $matkhau);
                        echo '<script> alert("Change password success");</script>';
                        echo '<meta http-equiv="refresh" content= "0; url=./"/>';
                    } else {
                        echo "<script> alert('Change password fail');</script>";
                        include 'View/ChangePass.php';

                    }
                }
            }
            break;
        }
       
}
?>