<?php
$act = 'category';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'category':
        include "View/category.php";
        break;
    case "detail":
        include "./View/single-product.php";
        break;
    case 'search':
        include "View/category.php";
        break;
    case 'comment':
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $makh = $_SESSION['makh'];
            
            if(isset($_POST['comment']) && $_POST['comment']==""){
                echo "<script>alert('Bạn chưa ghi comment')</script>";
            }else{
                $noidung = $_POST['comment'];
                $usr = new user();
                $usr->insertcomment($mahh, $makh, $noidung);
            }

            include "./View/single-product.php";
            break;
        }
    case 'type':
        include "View/type.php";
        break;
}