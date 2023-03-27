<?php
class hanghoa
{
    public function __construct()
    {
    }

    public function getListHanghoaAll()
    {
        $db = new connect();
        $select = "select hanghoa.*, loai.tenhh AS tenloai
        FROM hanghoa
        JOIN loai ON hanghoa.maloai = loai.maloai;";
        $result = $db->getList($select);
        return $result;
    }
    public function getListHanghoaPage($start, $limit)
    {
        $db = new connect();
        $select = "select * from hanghoa limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    public function getListHanghoaSale()
    {
        $db = new connect();
        $select = "select* FROM hanghoa WHERE giamgia>0 LIMIT 12;";
        $result = $db->getList($select);
        return $result;
    }
    // hàng ở home
    public function getListHanghoaHomeSale()
    {
        $db = new connect();
        $select = "select* FROM hanghoa WHERE giamgia>0 LIMIT 8;";
        $result = $db->getList($select);
        return $result;
    }
    public function getListHanghoaHome()
    {
        $db = new connect();
        $select = "select* FROM hanghoa WHERE giamgia=0 LIMIT 8;";
        $result = $db->getList($select);
        return $result;
    }
    public function getHangHoaID($id)
    {
        $db = new connect();
        $select = "select* FROM hanghoa WHERE mahh=$id;";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getHangHoaNhomHinh($nhom)
    {
        $db = new connect();
        $select = "select distinct hinh from hanghoa where nhom=$nhom";
        $result = $db->getList($select);
        return $result;
    }
    public function getHangHoaNhomColor($nhom)
    {
        $db = new connect();
        $select = "select distinct mausac from hanghoa where nhom=$nhom";
        $result = $db->getList($select);
        return $result;
    }
    public function getHangHoaNhomSize($nhom)
    {
        $db = new connect();
        $select = "select distinct size from hanghoa where nhom=$nhom";
        $result = $db->getList($select);
        return $result;
    }
    public function getHangHoaGia()
    {
        $db = new connect();
        $select = "select* FROM hanghoa WHERE dongia<500000";
        $result = $db->getList($select);
        return $result;
    }
    function getTimKiem($timkiem)
    {
        $db = new connect();
        $select = "select * from hanghoa where tenhh like '%$timkiem%'";
        $result = $db->getList($select);
        return $result;
    }

    function Views($id)
    {
        $db = new connect();
        $select = "update hanghoa set soluotxem = soluotxem + 1 where mahh =$id";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getRate($mahh)
    {
        $db = new connect();
        $select = "select avg(rate)as avgRating FROM danhgia WHERE mahh= $mahh";
        // echo $select;
        $result = $db->getInstance($select);
        if ($result['avgRating'] == null) {
            $result['avgRating'] = 0;
        }
        $rate = $result['avgRating'];
        $updatequery = "update hanghoa set rate=$rate where mahh=$mahh";
        // echo $updatequery;

        $db->exec($updatequery);

        return $result['avgRating'];
    }
    public function getType($maloai)
    {
        $db = new connect();
        $select = "select loai.maloai,loai.tenhh,hanghoa.* FROM loai,hanghoa WHERE loai.maloai = $maloai and loai.maloai = hanghoa.maloai";
        $result = $db->getList($select);
        return $result;
    }
    public function getTypeAll()
    {
        $db = new connect();
        $select = "select * from loai";
        $result = $db->getList($select);
        return $result;
    }

    public function getTypeProduct($maloai)
    {
        $db = new connect();
        $select = "select loai.maloai,loai.tenhh,hanghoa.* FROM loai,hanghoa WHERE loai.maloai = $maloai and loai.maloai = hanghoa.maloai;";
        $result = $db->getList($select);
        return $result;
    }
    public function getListType($start, $limit, $maloai )
    {
        $db = new connect();
        $select = "select loai.maloai,loai.tenhh,hanghoa.* FROM loai,hanghoa WHERE loai.maloai = $maloai and loai.maloai = hanghoa.maloai limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    public function getCount( $maloai )
    {
        $db = new connect();
        $select = "select COUNT(loai.maloai) as 'tong' FROM hanghoa,loai WHERE loai.maloai = $maloai and hanghoa.maloai = loai.maloai";
        $result = $db->getInstance($select);
        return $result['tong'];
    }
    public function getListTypeSoft($start, $limit,$type, $maloai )
    {
        $db = new connect();
        $select = "select loai.maloai,loai.tenhh,hanghoa.* FROM loai,hanghoa WHERE loai.maloai = $maloai and loai.maloai = hanghoa.maloai ORDER BY hanghoa.dongia $type " . " limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    public function getListAllPageSort($start, $limit, $type)
    {
        $db  = new connect();
        $select = "select hanghoa.* from hanghoa,loai where loai.maloai = hanghoa.maloai ORDER BY hanghoa.dongia
        $type " . "limit " . $start . "," . $limit;
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
}
?>