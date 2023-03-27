<?php
$act = "Auth";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'Auth':
        include "./View/loginAdmin.php";
        break;
    case 'login':
        // echo "hello";
        if (isset($_POST['Email']) && isset($_POST['Password'])) {
            $email = $_POST['Email']; // admin
            $pass = $_POST['Password']; // 123456
            $usr = new user();
            $checkemail = $usr->ExistUser($email);
            if ($checkemail) {
                $check = $usr->login($email, md5($pass));
                if ($check) {
                    if ($check['vaitro'] == 0) {
                        echo '<script>alert("You do not have permission to access this resource");</script>';
                        include "./View/loginAdmin.php";
                    } else {
                        echo '<script>alert("Login success!");</script>';
                        $user = array(
                            'makh' => $check['makh'],
                            'email' => $check['email'],
                            'vaitro' => $check['vaitro']
                        );
                        $_SESSION['admin'] = $user;
                        echo '<meta http-equiv="refresh" content= "0; url=./"/>';
                    }
                } else {
                    echo '<script>alert("Login Failed");</script>';
                    include "./View/loginAdmin.php";
                }
            } else {
                echo '<script>alert("Login Failed");</script>';
                include "./View/loginAdmin.php";
            }
        } else {
            echo '<script>alert("Login Failed");</script>';
            include "./View/loginAdmin.php";
        }
        break;
    case 'changepass':
        include 'View/ChangePass.php';
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
                        $ad = new admin();
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
    case 'logout':
        unset($_SESSION['admin']);
        echo '<script>alert("Logout success");</script>';
        echo '<meta http-equiv="refresh" content= "0; url=./"/>';
        break;
}
?>