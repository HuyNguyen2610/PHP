<title>Admin Edit Product</title>
<?php
if (isset($_GET['act']) == 'edit') {
    $ac = 1;
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hh = new admin();
    $result = $hh->getProductSingle($id);
    $mahh = $result['mahh'];
    $tenhh = $result['tenhh'];
    $dongia = $result['dongia'];
    $giamgia = $result['giamgia'];
    $hinh = $result['hinh'];
    $nhom = $result['nhom'];
    $maloai = $result['maloai'];
    $ngaylap = $result['ngaylap'];
    $mota = $result['mota'];
    $soluongton = $result['soluongton'];
    $mausac = $result['mausac'];
    $size = $result['size'];

}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Product</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fab fa-product-hunt me-1"></i> -->
                    <i class="fa-regular fa-pen-to-square  me-1 "></i>
                    Edit Product
                </div>
                <div class="card-body">
                    <?php
                    if ($ac == 1) {
                        echo '<form method="POST" action="index.php?action=Admin&act=edit_action&id=' . $id . '" enctype="multipart/form-data">';
                    }
                    ?>

                    <div class="form-floating mb-3">
                        <input class="form-control " id="inputEmail" type="text" placeholder="Password" name="mahh"
                            value="<?php if (isset($mahh))
                                echo $mahh; ?>" readonly />
                        <label for="inputmahh">ID</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="tenhh"
                            value="<?php if (isset($tenhh))
                                echo $tenhh; ?>" request/>
                        <label for="inputtenhh">Product name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Password" name="dongia"
                            value="<?php if (isset($dongia))
                                echo $dongia; ?>" request/>
                        <label for="inputdongia">Prince</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Password" name="giamgia"
                            value="<?php if (isset($giamgia))
                                echo $giamgia; ?>" request/>
                        <label for="inputgiamgia">Discount</label>
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" id="hinh" type="file" name="hinh" style="line-height:34px" />
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Password" name="nhom"
                            value="<?php if (isset($nhom))
                                echo $nhom; ?>" request/>
                        <label for="inputnhom">Group</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="maloai" id="">
                            <?php     
                            $res =$hh->getAllType(); 
                            while ($type = $res->fetch()) :
                            ?>
                            <option value="<?php echo $type['maloai'] ?>"><?php echo $type['tenhh'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label for="inputnhom">Type code</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="Password" type="text" placeholder="Mô tả"
                            style="height:120px" name="mota" request><?php if (isset($mota))
                                echo $mota;  ?> </textarea>
                        <label for="inputPassword">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="date" placeholder="Mô tả" name="ngaylap"
                            value="<?php if (isset($ngaylap))
                                echo $ngaylap; ?>" request/>
                        <label for="inputPassword">Date</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Password" name="soluongton"
                            value="<?php if (isset($soluongton))
                                echo $soluongton; ?>" request/>
                        <label for="inputPassword">Quantity in stock</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="mausac"
                            value="<?php if (isset($mausac))
                                echo $mausac; ?>" request />
                        <label for="inputPassword">Color</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Password" name="size"
                            value="<?php if (isset($size))
                                echo $size; ?>" request />
                        <label for="inputPassword">Size</label>
                    </div>
                    <div class="text-end mt-4 mb-0">
                        <button type="submit" class="btn btn-primary" id="nut">Save</button>
                    </div>
                    </form>
                </div>
            </div>
    </main>