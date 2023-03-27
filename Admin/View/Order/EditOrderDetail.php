<?php
if (isset($_GET['act']) == 'edit') {
    $ac = 1;
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hh = new admin();
    $result = $hh->getSingleOrderDetail($id);
    $masohd = $result['masohd'];
    $mahh = $result['mahh'];
    $soluongmua = $result['soluongmua'];
    $mausac = $result['mausac'];
    $size = $result['size'];
    $thanhtien = $result['thanhtien'];

}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Order</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fab fa-product-hunt me-1"></i> -->
                    <i class="fa-regular fa-pen-to-square  me-1 "></i>
                    Edit Order
                </div>
                <div class="card-body">
                    <?php
                    if ($ac == 1) {
                        echo '<form method="POST" action="index.php?action=Admin&act=editdeatail_action&id=' . $id . '" enctype="multipart/form-data">';
                    }
                    ?>

                    <div class="form-floating mb-3">
                        <input class="form-control " id="inputEmail" type="text" placeholder="Password" name="masohd"
                            value="<?php if (isset($masohd))
                                echo $masohd; ?>" readonly />
                        <label for="inputmahh">ID</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="mahh" value="<?php if (isset($mahh))
                            echo $mahh; ?>" readonly />
                        <label for="inputtenhh">Product ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Mô tả" name="soluongmua"
                            value="<?php if (isset($soluongmua))
                                echo $soluongmua; ?>" />
                        <label for="inputPassword">Quantity Purchased</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Mô tả" name="mausac" value="<?php if (isset($mausac))
                            echo $mausac; ?>" />
                        <label for="inputPassword">Color</label>
                </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Password" type="number" placeholder="Mô tả" name="size"
                                value="<?php if (isset($size))
                                    echo $size; ?>" />
                            <label for="inputPassword">Size</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Password" type="text" placeholder="Password"
                                name="thanhtien" value="<?php if (isset($thanhtien))
                                    echo $thanhtien; ?>" />
                            <label for="inputPassword">Total</label>
                        </div>
                        <div class="text-end mt-4 mb-0">
                            <button type="submit" class="btn btn-primary" id="nut">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
    </main>