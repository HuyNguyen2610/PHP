<?php
class hoadon
{
    var $sohd = null;
    var $makh = null;
    var $ngaydat = null;
    var $tongtien = 0;
    var $mahh = null;
    public function __construct()
    {
    }

    public function InsertOder($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $datecreate = $date->format("Y-m-d");
        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien) values(NULL,$makh,'$datecreate',0)";
        // echo $query;
        $db->exec($query);
        $int = $db->getInstance("select masohd from hoadon order by masohd desc limit 1");
        return $int[0];
    }
    function insertOrderDetail($masohd, $mahh, $soluong, $mausac, $size, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang)values($masohd,$mahh, $soluong,'$mausac',$size, $thanhtien,0)";
        // echo $query;
        $db->exec($query);
    }
    function updateOrderTotal($sohd, $tongtien)
    {
        $db = new connect();
        $query = "update hoadon set tongtien=$tongtien where masohd=$sohd";
        $db->exec($query);
    }
    function getHoaDon($sohd)
    {
        $db = new connect();
        $select = "select a.masohd, a.ngaydat,b.username,b.sodienthoai,b.diachi from hoadon a INNER JOIN taikhoan b on a.makh=b.makh where a.masohd=$sohd";
        $result = $db->getInstance($select);
        // echo $select;
        // $result = $result->fetch();
        return $result;
    }
    function getCTHoaDon($sohd)
    {
        $db = new connect();
        $select = "select b.tenhh,a.mausac,a.size,a.soluongmua,b.dongia from cthoadon a INNER JOIN hanghoa b on a.mahh=b.mahh where masohd=$sohd";
        $result = $db->getList($select);
        return $result;
    }
    public function checkBought($makh, $mahh)
    {
        $db = new connect();
        $select = "select * from hoadon,cthoadon WHERE hoadon.masohd = cthoadon.masohd and hoadon.makh = $makh and  cthoadon.mahh =$mahh";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getOrderCout($makh)
    {
        $db = new connect();
        $select = "select COUNT(hoadon.masohd) as 'tong' FROM taikhoan,hoadon WHERE hoadon.makh = $makh and taikhoan.makh = hoadon.makh;";
        $result = $db->getInstance($select);
        return $result['tong'];
    }
    public function getAllBill($makh)
    {
        $db = new connect();
        $select = "select * FROM hoadon where makh = $makh order by masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    public function getBillInfo($masohd)
    {
        $db = new connect();
        $select = "select * FROM hoadon where masohd = $masohd ";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getBillDetail($masohd)
    {
        $db = new connect();
        $select = "select * FROM cthoadon,hanghoa where masohd = $masohd and cthoadon.mahh = hanghoa.mahh ";
        $result = $db->getList($select);
        return $result;
    }
}
?>