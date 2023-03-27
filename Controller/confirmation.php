<?php
$o = new hoadon();
$sohdid = $o->InsertOder($_SESSION['makh']);
$_SESSION['sohd'] = $sohdid;
$total = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $item) {
        $o->insertOrderDetail($sohdid, $item['mahh'], $item['soluong'], $item['color'], $item['size'], $item['total']);
        $total += $item['total'];
    }
}

$o->updateOrderTotal($sohdid, $total);
include "View/confirmation.php";
?>