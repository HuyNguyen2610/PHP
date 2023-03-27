<?php
class cart{
    function add_item($key,$quantity,$mycolor,$size){
        $key_session = "";
        if (isset($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key2 => $item) {

                if ($key == $item['mahh'] && $size == $item['size'] && $mycolor == $item['color']) {
                    $key_session = $key2;
                }
            }

            if (isset($_SESSION['cart'][$key_session])) {
                $quantitynew = $quantity + $_SESSION['cart'][$key_session]['soluong'];
                $this->update_items($key_session, $quantitynew);
            }

            if ($key_session == "") {
                $pros = new hanghoa();
                $pro = $pros->getHangHoaID($key);
                $cost = $pro['dongia'];
                $tenhh = $pro['tenhh'];
                $total = $cost * $quantity;

                $item = array(
                    'mahh' => $key,
                    'hinh' => $pro['hinh'],
                    'name' => $tenhh,
                    'color' => $mycolor,
                    'dongia' => $cost,
                    'size' => $size,
                    'soluong' => $quantity,
                    'total' => $total
                );
                $_SESSION['cart'][] = $item;
            }
        }
    }
    function getTotal(){
        $total=0;
        foreach($_SESSION['cart'] as $item){
            $total += $item['total'];
        }
        $total = number_format($total);
        return $total;
    }
    function delete_item($key){
        unset($_SESSION['cart'][$key]);
    }
    function update_items($key,$qty){
        if($qty<=0){
            $this->delete_item($key);
        }else{
            $_SESSION['cart'][$key]['soluong'] = $qty;
            $totalnew=  $_SESSION['cart'][$key]['soluong']* $_SESSION['cart'][$key]['dongia'];
            $_SESSION['cart'][$key]['total']=$totalnew;
        }
    }
    function CartTotal()
    {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        }
    }
}
?>