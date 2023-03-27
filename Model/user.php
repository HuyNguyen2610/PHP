<?php
class user
{
    public function __construct()
    {
    }
    public function InsertUser($username, $matkhau, $email, $diachi, $dt)
    {
        $db = new connect();
        $query = "insert into taikhoan(makh, username, matkhau, email, diachi, sodienthoai, vaitro)
            values(NULL,'$username','$matkhau','$email','$diachi','$dt',default)";
        $db->exec($query);
    }
    //viết lệnh kiểm tra email đã tồn tại chưa
    // phương thức login
    public function login($email, $password)
    {
        $db = new connect();
        $select = "select * from `taikhoan` where email='$email' and matkhau='$password'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }

    public function ExistUser($email)
    {
        $db = new connect();
        $select = "select * from `taikhoan` where email='$email'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }
    public function Password($password)
    {
        $db = new connect();
        $select = "select * from `taikhoan` where md5(matkhau)='$password'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }
    public function ExistUserDT($sodt)
    {
        $db = new connect();
        $select = "select * from `taikhoan` where sodienthoai='$sodt'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }

    public function insertcomment($mahh, $makh, $noidung)
    {
        $db = new connect();
        $date = new DateTime("now");
        $datecreate = $date->format("Y-m-d");
        $query = "insert into binhluan(mabl, mahh, makh, ngaybl, noidung) values (NULL, $mahh, $makh, '$datecreate', '$noidung')";
        $db->exec($query);
    }

    public function HienThicomment($mahh)
    {
        $db = new connect();
        $select = "select a.username,a.img, b.noidung, b.ngaybl from taikhoan a INNER JOIN binhluan b on a.makh=b.makh where b.mahh=$mahh order by b.mabl DESC";
        $result = $db->getList($select);
        return $result;
    }

    public function Tongcomment($mahh)
    {
        $db = new connect();
        $select = "select count(b.mabl) from binhluan b where b.mahh=$mahh";
        $result = $db->getInstance($select);
        return $result[0];
    }

    function getEmail($email)
    {
        $db = new connect();
        $select = "select email,matkhau from taikhoan where email='$email'";
        $result = $db->getInstance($select);
        return $result;
    }
    // lấy lại email và mật khẩu
    function getPassEmail($email, $pass)
    {
        $select = "select email,matkhau from taikhoan where md5(email)='$email' and md5(matkhau)='$pass'";
        // select email, matkhau from taikhoan where md5(phptestly20@gmail.com)='405999d3a4fb8cddf893e238928c001'
        $db = new connect();
        $result = $db->getInstance($select);
        return $result;
    }
    function updateEmail($emailold, $passnew)
    {
        $db = new connect();
        $query = "update taikhoan set matkhau='$passnew' where email='$emailold'";
        // echo $select;
        $db->exec($query);
    }
    public function getProfile($id)
    {
        $db = new connect();
        $select = "SELECT * FROM `taikhoan` WHERE makh =$id";
        $result = $db->getInstance($select);
        return $result;
    }

    public function UpdateProfile($id, $data)
    {
        $db = new connect();
        $query = "update taikhoan 
        set username = '" . $data['username'] . "',
        diachi =  '" . $data['diachi'] . "',
        sodienthoai = " . $data['sodienthoai'] . ",
        img = '" . $data['img'] . "'
            where makh= $id";
        // echo $query;
        $db->exec($query);
    }
    function insertRate($mahh, $makh, $noidung, $rate)
    {
        $db = new connect();
        $date = new DateTime("now");
        $datecreate = $date->format('Y-m-d H:i:s');
        $query = "insert into danhgia(madg, mahh, makh, ngaydg, noidung, rate) values(null, $mahh, $makh, '$datecreate','$noidung',$rate)";
        // echo $query;
        $db->exec($query);
    }
    function CheckRate($mahh, $makh)
    {
        $db = new connect();
        $select = "select a.username,b.noidung,b.ngaydg,b.rate  from taikhoan a inner join danhgia b on a.makh=b.makh where b.mahh=$mahh and a.makh = $makh order by b.ngaydg desc";

        $result = $db->getInstance($select);
        return $result;
    }
    public function getRate($mahh)
    {
        $db = new connect();
        $select = "select a.username,a.img, b.noidung, b.ngaydg,b.rate from taikhoan a INNER JOIN danhgia b on a.makh=b.makh where b.mahh=$mahh order by b.madg DESC;";
        $result = $db->getList($select);
        return $result;
    } 
    public function TongDg($mahh)
    {
        $db = new connect();
        $select = "select count(b.madg) from danhgia b where b.mahh=$mahh;";
        $result = $db->getInstance($select);
        return $result[0];
    }
    public function InsertWishlistItem($makh, $mahh)
    {
        $db = new connect();
        $query = "insert into spyeuthich(makh,mahh)values($makh,$mahh)";
        // echo $query;
        $db->exec($query);
    }
    public function ExistWishlist($makh, $mahh)
    {
        $db = new connect();
        $select = "select * FROM spyeuthich where makh =$makh and mahh=$mahh";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
    public function getWishListCout($makh)
    {
        $db = new connect();
        $select = "select COUNT(hanghoa.mahh) as'soluong' FROM spyeuthich,hanghoa WHERE spyeuthich.makh = $makh and spyeuthich.mahh = hanghoa.mahh;";
        $result = $db->getInstance($select);
        return $result['soluong'];
    }
    public function deleteWishListItem($makh, $mahh)
    {
        $db = new connect();
        $query = "delete FROM spyeuthich where makh =$makh and mahh=$mahh";
        echo $query;
        $db->exec($query);
    }
    public function deleteWishListAll($makh)
    {
        $db = new connect();
        $query = "delete FROM spyeuthich where makh =$makh";
        echo $query;
        $db->exec($query);
    }
    public function getWishList($makh)
    {
        $db = new connect();
        $select = "select a.makh, a.mahh, b.mahh, b.tenhh, b.dongia, b.giamgia,b.hinh from spyeuthich a inner join hanghoa b on a.mahh=b.mahh where a.makh=$makh";
        $result = $db->getList($select);
        return $result;
    }
    function UpdatePass($id, $matkhau)
    {
        $db = new connect();
        $query = "update taikhoan set matkhau='$matkhau' where makh='$id'";
        // echo $query;
        $db->exec($query);
    }
    function getRateCount($mahh,$rate)
    {
        $db = new connect();
        $select = "select count(madg) as soluong from danhgia WHERE mahh = $mahh and rate = $rate;";
        $result = $db->getInstance($select);
        return $result['soluong'];
    }
}
?>