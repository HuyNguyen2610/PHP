<?php
$act = "single-product";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'single-product':
        include 'View/single-product.php';
        break;
    case 'rating':
        $usr = new user();
        $mahh = $_GET['id'];
        $makh = $_POST['makh'];
        $noidung = $_POST['comment'];
        $rate = $_POST['number_rating'];
        $usr->insertRate($mahh, $makh, $noidung, $rate);

        echo "<script>alert('rating thành công')</script>";
        include './View/single-product.php';
        break;
    case 'favorite':
        include 'View/favorite.php';
        break;
    case 'addwishlist':
        $mahh = $_GET['id'];
        if (isset($_POST['makh']) && $_POST['makh'] != -1) {
            $makh = $_POST['makh'];
            $kt = new user();
            $check = $kt->ExistWishlist($makh, $mahh);
            if (!$check) {
                $us = new user();
                $us->InsertWishlistItem($makh, $mahh);
                if (!$us) {
                    echo "<script>alert('Thêm sẳn phẩm không thành công')</script>";
                } else {
                    echo "<script>alert('Thêm sẳn phẩm thành công')</script>";
                }
            } else {
                echo "<script>alert('Sẳn phẳm đã có trong danh sách yêu thích của bạn')</script>";
            }
            include './View/single-product.php';
        } else {
            echo "<script>alert('Bạn cần đăng nhập để thêm sẳn phẳm yêu thích')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=login"/>';
        }
        break;
    case 'wishlist':
        if (isset($_GET['do'])) {
            $do = $_GET['do'];
            switch ($do) {
                case 'DeleteAll':
                    if (isset($_GET['id'])) {
                        $makh = $_GET['id'];
                        $us = new user();
                        $us->deleteWishListAll($makh);
                        if (!$us) {
                            echo "<script>alert('Xóa danh sách yêu thích không thành công')</script>";
                        } else {
                            echo "<script>alert(''Xóa danh sách yêu thích thành công')</script>";
                        }
                    }
                    break;
                case 'DeleteItem':
                    if (isset($_GET['id']) && isset($_GET['item'])) {
                        $makh = $_GET['id'];
                        $mahh = $_GET['item'];
                        $us = new User();
                        $us->deleteWishListItem($makh, $mahh);
                        if (!$us) {
                            echo "<script>alert('Failed to delete favorite product')</script>";
                        } else {
                            echo "<script>alert('Delete favorite product successfully')</script>";
                        }
                    }
                    break;
            }
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=single-product&act=favorite"/>';
        } else {
            if (isset($_SESSION['makh'])) {
                include './View/editprofile.php';
            } else {
                echo "<script>alert('You are not logged in yet')</script>";
                include './View/login.php';
            }
        }
        break;
    case 'listorder':
        include "View/listorder.php";
        break;
    case 'listorderdetail':
        include "View/listorderdetail.php";
        break;
}
?>