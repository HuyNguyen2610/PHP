<?php
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }
    $act='cart';
    if(isset($_GET['act'])){
        $act=$_GET['act'];
    }
    switch($act){
        case 'cart':
            if(isset($_POST['mahh'])){
                $mahh=$_POST['mahh'];
                $soluong=$_POST['soluong'];
                $mausac=$_POST['mymausac'];
                $size=$_POST['size'];
                $gh= new cart();
                $gh->add_item($mahh,$soluong,$mausac,$size);
        
            }
            include 'View/cart.php';
        break;
        
        case 'delete_gh':
            if(isset($_GET['id'])){
                $key=$_GET['id'];
                $gh= new cart();
                $gh->delete_item($key);
            }
            include 'View/cart.php';
        break;

        case 'update_item':
            $new_list=$_POST['newqty'];
            foreach($new_list as $key => $qty){
                if($_SESSION['cart'][$key]['soluong']!=$qty){
                    $gh= new cart();
                    $gh->update_items($key,$qty);
                }
            }
            echo "<script>alter('Update')</script>";
            include 'View/cart.php';
        break;
    }
    

?>