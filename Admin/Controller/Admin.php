<?php
$act = "Home";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'Home':
        include "./View/HomeAdmin.php";
        break;

    //<-----------Product -------------------->
    case 'allproduct':
        include "./View/Product/AllProduct.php";
        break;
    //edit
    case 'edit':
        include './View/Product/EditProduct.php';
        break;
    //edti product
    case "edit_action":
        if (isset($_POST['mahh'])) {
            $ad = new admin();
            $uploadCheck = true;
            $mahh = $_POST['mahh'];
            $image = $_FILES['hinh'];

            $target_dir = "../Content/img/product";
            $target_image = $target_dir . "/" . basename($image['name']);
            $name_image = basename($image['name']);
            $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

            if ($name_image == "") {
                $prodc = $ad->getProductSingle($mahh);
                $name_image = $prodc['hinh'];
            } else {
                if ($image["size"] > 500000) {
                    echo "<script>alert('Sorry, your file is too large.')</script>";
                    $uploadCheck = false;
                }

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp"
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
                    'mahh' => $_POST['mahh'],
                    'tenhh' => $_POST['tenhh'],
                    'dongia' => $_POST['dongia'],
                    'giamgia' => $_POST['giamgia'],
                    'hinh' => $name_image,
                    'maloai' => $_POST['maloai'],
                    'nhom' => $_POST['nhom'],
                    'ngaylap' => $_POST['ngaylap'],
                    'mota' => $_POST['mota'],
                    'soluongton' => $_POST['soluongton'],
                    'mausac' => $_POST['mausac'],
                    'size' => $_POST['size'],
                );
                $ad->updatesp($mahh, $product);
                echo "<script>alert('Update product success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allproduct"/>';
            } else {
                echo "<script>alert('Product update fail')</script>";
                include "./View/Product/EditProduct.php";
            }
        }
        break;

    //add product
    case 'addproduct':
        include "./View/Product/AddProduct.php";
        break;

    case 'add_action':
        if (isset($_POST['tenhh'])) {
            $tenhh = $_POST['tenhh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $hinh = $_POST['hinh'];
            $nhom = $_POST['nhom'];
            $maloai = $_POST['maloai'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            $soluongton = $_POST['soluongton'];
            $mausac = $_POST['mausac'];
            $size = $_POST['size'];

            $hh = new admin();
            $check = $hh->InsertSP($tenhh, $dongia, $giamgia, $hinh, $nhom, $maloai, $ngaylap, $mota, $soluongton, $mausac, $size);
            if ($check) {
                echo '<script>alert("Add unsuccess!!!");</script>';
                include './View/Product/AddProduct.php';
            } else {
                echo '<script>alert("Add Success!!!");</script>';
                include "./View/Product/AllProduct.php";
            }
        }
        break;
    //delete
    case 'delete_action':
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $hh = new admin();
            $hh->Delete($mahh);
            echo "<script>alert('Delete product success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allproduct"/>';
        } else {
            echo "<script>alert('Delete product fail')</script>";
            include "./View/Product/AllProduct.php";
        }
    //<----------- End Product -------------------->


    //<----------- Order -------------------->
    case 'allorder':
        include "./View/Order/AllOrder.php";
        break;
    case 'editorder':
        include "./View/Order/EditOrder.php";
        break;
    //edit order
    case "editorder_action":
        if (isset($_POST['masohd'])) {
            $ad = new admin();
            $masohd = $_POST['masohd'];
            $makh = $_POST['makh'];
            $product = array(
                'masohd' => $_POST['masohd'],
                'makh' => $_POST['makh'],
                'ngaydat' => $_POST['ngaydat'],
                'tongtien' => $_POST['tongtien'],
            );
            $ad->UpdateOrder($masohd, $product);
            echo "<script>alert('Update product success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorder"/>';
        } else {
            echo "<script>alert('Product update fail')</script>";
            include "./View/Order/EditOrder.php";
        }
        break;
    case 'delete_order':
        if(isset($_GET['id'])){
            $masohd = $_GET['id'];
            $hh = new admin();
            $hh->DeleteDetail($masohd);
            echo "<script>alert('Delete order success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorder"/>';
        }else{
            echo "<script>alert('Delete order fail')</script>";
            include './View/Order/AllOrder.php';
        }
            break;
    //<----------- End Order -------------------->



    //<----------- Order Details -------------------->
    case 'allorder_detail' :
        include "./View/Order/AllOrderDetail.php";
        break;
    case 'editorder_detail' :
        include "./View/Order/EditOrderDetail.php";
        break;

    case "editdeatail_action":
        if (isset($_POST['masohd'])) {
            $ad = new admin();
            $masohd = $_POST['masohd'];
            $mahh = $_POST['mahh'];
            $product = array(
                'masohd' => $_POST['masohd'],
                'mahh' => $_POST['mahh'],
                'soluongmua' => $_POST['soluongmua'],
                'mausac' => $_POST['mausac'],
                'size' => $_POST['size'],
                'thanhtien' => $_POST['thanhtien'],
            );
            $ad->UpdateOrdeDetail($masohd, $product);
            echo "<script>alert('Update product success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorder_detail"/>';
        } else {
            echo "<script>alert('Product update fail')</script>";
            include "./View/Order/EditOrderDetail.php";
        }
        break;
    case 'delete_detail':
        if(isset($_GET['id'])){
            $masohd = $_GET['id'];
            $hh = new admin();
            $hh->DeleteDetail($masohd);
            echo "<script>alert('Delete order detail success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorder_detail"/>';
        }else{
            echo "<script>alert('Delete order detail fail')</script>";
            include './View/Order/AllOrderDetail.php';
        }
        break;
    //<-----------End Order Details -------------------->

    //<----------- User -------------------->
    case 'alluser' :
        include "./View/User/AllUser.php";
        break;
    //edit
    case 'edituser' :
        include "./View/User/EditUser.php";
        break;
    
    //edit action
    case "edituser_action":
        if (isset($_POST['makh'])) {
            $ad = new admin();
            $uploadCheck = true;
            $makh = $_POST['makh'];
            $image = $_FILES['img'];

            $target_dir = "../Content/img/product";
            $target_image = $target_dir . "/" . basename($image['name']);
            $name_image = basename($image['name']);
            $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

            if ($name_image == "") {
                $prodc = $ad->getUserSingle($makh);
                $name_image = $prodc['img'];
            } else {
                if ($image["size"] > 500000) {
                    echo "<script>alert('Sorry, your file is too large.')</script>";
                    $uploadCheck = false;
                }

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp"
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
                    'email' => $_POST['email'],
                    'diachi' => $_POST['diachi'],
                    'sodienthoai' => $_POST['sodienthoai'],
                    'img' => $name_image,
                    'vaitro' => $_POST['vaitro'],
                );
                $ad->UpdateUser($makh, $product);
                echo "<script>alert('Update user success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alluser"/>';
            } else {
                echo "<script>alert('Update user fail')</script>";
                include "./View/User/EditUser.php";
            }
        }
        break;
    
    case 'delete_user':
        if(isset($_GET['id'])){
            $makh = $_GET['id'];
            $hh = new admin();
            $hh->DeleteUser($makh);
            echo "<script>alert('Delete user success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alluser"/>';
        }else{
            echo "<script>alert('Delete user fail')</script>";
            include './View/User/AllUser.php';
        }
        break;
    //<----------- End User -------------------->

    //<----------- Type -------------------->
    case 'alltype' :
        include "./View/Type/AllType.php";
        break;
    case 'edittype' :
        include "./View/Type/EditType.php";
        break;
    case "edittype_action":
        if (isset($_POST['maloai'])) {
            $ad = new admin();
            $maloai = $_POST['maloai'];
            $product = array(
                'maloai' => $_POST['maloai'],
                'tenhh' => $_POST['tenhh'],
            );
            $ad->UpdateType($maloai, $product);
            echo "<script>alert('Update product success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alltype"/>';
        } else {
            echo "<script>alert('Product update fail')</script>";
            include "./View/Type/EditType.php";
        }
        break;
    case 'addtype' :
        include "./View/Type/AddType.php";
        break;

    case 'add_type':
        if (isset($_POST['tenhh'])) {
            $tenhh = $_POST['tenhh'];
            $hh = new admin();
            $check = $hh->InsertType($tenhh);
            if ($check) {
                echo '<script>alert("Add unsuccess!!!");</script>';
                include './View/Type/AddType.php';
            } else {
                echo '<script>alert("Add Success!!!");</script>';
                include "./View/Type/AllType.php";
            }
        }
        break;
    case 'delete_type':
        if(isset($_GET['id'])){
            $maloai = $_GET['id'];
            $hh = new admin();
            $hh->DeleteType($maloai);
            echo "<script>alert('Delete type success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alltype"/>';
        }else{
            echo "<script>alert('Delete type fail')</script>";
            include './View/Type/AllType.php';
        }
        break;
    //<----------- End Type -------------------->
    case 'comment':
        include 'View/Comment.php';
        break;
    case 'delete_comment':
        if(isset($_GET['id'])){
            $mabl = $_GET['id'];
            $hh = new admin();
            $hh->DeleteComment($mabl);
            echo "<script>alert('Delete comment success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=comment"/>';
        }else{
            echo "<script>alert('Delete comment fail')</script>";
            include './View/Comment.php';
        }
        break;
    case 'review':
        include 'View/Review.php';
        break;
    case 'delete_review':
        if(isset($_GET['id'])){
            $madg = $_GET['id'];
            $hh = new admin();
            $gr = new user();
            $mahh= $hh->getmahh($madg);
            $gr->getRate($mahh);
            $hh->DeleteReview($madg);
            echo "<script>alert('Delete review success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=review"/>';
        }else{
            echo "<script>alert('Delete review fail')</script>";
            include './View/Review.php';
        }
        break;
}

?>