<?php
$act = "forgetps";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forgetps':
        include "./View/forgetpassword.php";
        break;
    case 'forgetps_action':
        //gửi về địa chỉ mail
        if (isset($_POST['submit_email']) && $_POST['email']) {
            // echo "hello";
            $getemail = $_POST['email']; //phptestly20@gmail.com
            // với địa chỉ email người dùng mới nhập vào( nhớ là địa chỉ email 
            //phải tồn tại trong database)
            // truy vấn lấy ra email, mật khẩu dựa trên email mới nhập vào
            $ur = new User();
            $result = $ur->getEmail($getemail);
            if (!$result) {
                include './View/forgetpassword.php';
            } else {
                // lấy ra email và mật khẩu trả về từ database
                // $resuil[email: phptestly20@gmail.com,matkhau:e10adc3949ba59abbe56e057f20f883e]
                $email = md5($result['email']); //md5(phptestly20@gmail.com)
                // echo $email;
                $pass = md5($result['matkhau']); //md5(e10adc3949ba59abbe56e057f20f883e)
                // echo $pass;
                //tạo đường link để gửi qua email
                $link = "<a href='http://localhost:7000/PHP2/karma-master/index.php?action=forgetps&act=resetps&key=" . $email . "&reset=" . $pass . "'>Click To Reset password</a>";
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = "dolongvu1133@gmail.com"; //
                // GMAIL password
                // $mail->Password = "php22023ngoc";
                $mail->Password = "dhlnlicpndhpzkbv"; //Phplytest20@php
                $mail->SMTPSecure = "tls";
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587";
                $mail->From = 'dolongvu1133@gmail.com';
                $mail->FromName = 'Huy Nguyễn';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($getemail, 'Huy');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = 'Click On This Link to Reset Password ' . $link . '';
                if ($mail->Send()) {
                    echo "<script>alert('Check mail in email or spam')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=https://mail.google.com/mail/"/>';
                } else {
                    echo "Mail Error - >" . $mail->ErrorInfo;
                }
            }
        }
        // cách thứ 2: tạo biến ngẫu nhiên
        // $a=1234
        //$_SESSION['reps']=$a
        //$link=$a;
        break;
    case 'resetps':
        include 'View/resetpw.php';
        break;
    case 'submit_new':
        $pass = '';
        $pass_error = '';
        if (isset($_POST['password'])) {
            $pass = $_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $pass);
            $lowercase = preg_match('@[a-z]@', $pass);
            $number = preg_match('@[0-9]@', $pass);
            $repass = $_POST['retypepassword'];

            if (strlen($pass) >= 8 && $uppercase && $lowercase && $number && $repass == $pass) {
                $passnew = md5($_POST['password']);
                $emailold = $_POST['email'];
                $ur = new User();
                $ur->updateEmail($emailold, $passnew);
                unset($_SESSION['keyreset']);
                unset($_SESSION['reset']);
                echo '<script> alert("Change password success");</script>';
                include "View/login.php";
            } else {
                echo "<script> alert('Change password fail');</script>";
                include 'View/resetpw.php';
                break;
            }
        }
        break;

}
?>