<?php

class admin
{

    public function __construct()
    {
    }

    public function getProductType($maloai)
    {
        $db = new connect();
        $select = "select hanghoa.maloai,tenloai FROM hanghoa,loai WHERE hanghoa.maloai = loai.maloai AND hanghoa.maloai = '" . $maloai . "';";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getProductSingle($id)
    {
        $db = new connect();
        $select = "select * FROM hanghoa WHERE mahh  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }
    function InsertSP($tenhh, $dongia, $giamgia, $hinh, $nhom, $maloai, $ngaylap, $mota, $soluongton, $mausac, $size)
    {
        $db = new connect();
        $query = "insert into hanghoa(mahh,tenhh,dongia,giamgia,hinh,nhom,maloai, ngaylap, mota, soluongton,mausac, size)
      values(NULL,'$tenhh','$dongia','$giamgia','$hinh','$nhom','$maloai','$ngaylap','$mota','$soluongton','$mausac','$size')";
        $db->exec($query);
    }
    function updatesp($id, $data)
    {
        $db = new connect();
        $query = "update hanghoa 
        SET tenhh =  '" . $data['tenhh'] . "',
        dongia = " . $data['dongia'] . ",
        giamgia =  " . $data['giamgia'] . ",
        hinh = '" . $data['hinh'] . "',
        maloai = " . $data['maloai'] . ",
        nhom =  " . $data['nhom'] . ",
        ngaylap = ' " . $data['ngaylap'] . "',
        mota = '" . $data['mota'] . "',
        soluongton =  " . $data['soluongton'] . ",
        mausac =  '" . $data['mausac'] . "',
        size =  " . $data['size'] . "
            where mahh= $id";
        // echo $query;
        $db->exec($query);
    }

    function Delete($id)
    {
        $db = new connect();
        $query = "delete from hanghoa where mahh=$id;
                    delete from cthoadon WHERE masohd = $id;
                    delete from hoadon WHERE masohd = $id";
        $db->exec($query);
    }
    public function getSingleOrder($id)
    {
        $db = new connect();
        $select = "select * FROM hoadon WHERE masohd  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }
    function UpdateOrder($id, $data)
    {
        $db = new connect();
        $query = "update hoadon 
        SET makh =  " . $data['makh'] . ",
            ngaydat = '" . $data['ngaydat'] . "',
            tongtien =  " . $data['tongtien'] . "
            where masohd= $id";
        // echo $query;
        $db->exec($query);
    }
    function getAllHoaDon()
    {
        $db = new connect();
        $select = "select * from hoadon";
        $result = $db->getList($select);
        return $result;
    }
    function getAllCTHoaDon()
    {
        $db = new connect();
        $select = "select * from cthoadon";
        $result = $db->getList($select);
        return $result;
    }

    public function getSingleOrderDetail($id)
    {
        $db = new connect();
        $select = "select * FROM cthoadon WHERE masohd  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }

    function UpdateOrdeDetail($id, $data)
    {
        $db = new connect();
        $query = "update cthoadon 
        SET mahh =  " . $data['mahh'] . ",
            soluongmua =  " . $data['soluongmua'] . ",
            mausac = '" . $data['mausac'] . "',
            size =  " . $data['size'] . ",
            thanhtien =  " . $data['thanhtien'] . "
            where masohd= $id";
        // echo $query;
        $db->exec($query);
    }
    function DeleteDetail($id)
    {
        $db = new connect();
        $query = "delete from cthoadon WHERE masohd = $id;
                delete from hoadon WHERE masohd = $id";
        $db->exec($query);
    }

    function getAllUser()
    {
        $db = new connect();
        $select = "select * from taikhoan";
        $result = $db->getList($select);
        return $result;
    }

    function UpdateUser($id, $data)
    {
        $db = new connect();
        $query = "update taikhoan 
        set username = '" . $data['username'] . "',
        email =  '" . $data['email'] . "',
        diachi =  '" . $data['diachi'] . "',
        sodienthoai = " . $data['sodienthoai'] . ",
        img = '" . $data['img'] . "',
        vaitro = " . $data['vaitro'] . "
            where makh= $id";
        // echo $query;
        $db->exec($query);
    }
    public function getUserSingle($id)
    {
        $db = new connect();
        $select = "select * FROM taikhoan WHERE makh  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }
    function DeleteUser($makh)
    {
        $db = new connect();
        $query = "delete from taikhoan WHERE makh = $makh";
        $db->exec($query);
    }

    function getAllType()
    {
        $db = new connect();
        $select = "select * from loai";
        $result = $db->getList($select);
        return $result;
    }

    function UpdateType($id, $data)
    {
        $db = new connect();
        $query = "update loai 
        SET tenhh =  '" . $data['tenhh'] . "'
            where maloai= $id";
        // echo $query;
        $db->exec($query);
    }
    public function getSingleType($id)
    {
        $db = new connect();
        $select = "select * FROM loai WHERE maloai  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }
    function InsertType($tenhh)
    {
        $db = new connect();
        $query = "insert into loai(maloai,tenhh)
      values(NULL,'$tenhh')";
        $db->exec($query);
    }
    function DeleteType($maloai)
    {
        $db = new connect();
        $query = "delete from loai WHERE maloai = $maloai";
        $db->exec($query);
    }
    function UpdatePass($id, $matkhau)
    {
        $db = new connect();
        $query = "update taikhoan set matkhau='$matkhau' where makh='$id'";
        // echo $query;
        $db->exec($query);
    }
    public function getStatistics($month, $year)
    {
        $db  = new connect();
        $select = "select c.ngaydat,b.tenhh,sum(a.soluongmua) as soluong FROM cthoadon a, hanghoa b ,hoadon c WHERE a.mahh = b.mahh and c.masohd = a.masohd and MONTH(c.ngaydat) = $month AND YEAR(c.ngaydat) = $year group by b.tenhh,c.ngaydat order by sum(a.soluongmua) ASC";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
    public function getListComment()
    {
        $db  = new connect();
        $select = "select binhluan.*,taikhoan.username,hanghoa.tenhh FROM binhluan,taikhoan,hanghoa WHERE binhluan.mahh = hanghoa.mahh and binhluan.makh = taikhoan.makh";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
    function DeleteComment($mabl)
    {
        $db = new connect();
        $query = "delete from binhluan WHERE mabl = $mabl";
        $db->exec($query);
    }
    public function getListReview()
    {
        $db  = new connect();
        $select = "select danhgia.*,taikhoan.username,hanghoa.tenhh FROM danhgia,taikhoan,hanghoa WHERE danhgia.mahh = hanghoa.mahh and danhgia.makh = taikhoan.makh";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
    function DeleteReview($madg)
    {
        $db = new connect();
        $query = "delete from danhgia WHERE madg = $madg";
        $db->exec($query);
    }
    function getmahh($madg){
        $db = new connect();
        $select = "select * FROM danhgia WHERE madg  = $madg;";
        $result = $db->getInstance($select);
        return $result['mahh'];
    }
}
?>