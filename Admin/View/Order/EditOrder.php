<?php
if (isset($_GET['act']) == 'edit') {
    $ac = 1;
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hh = new admin();
    $result = $hh->getSingleOrder($id);
    $masohd = $result['masohd'];
    $makh = $result['makh'];
    $ngaydat = $result['ngaydat'];
    $tongtien = $result['tongtien'];

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
                        echo '<form method="POST" action="index.php?action=Admin&act=editorder_action&id='. $id . '" enctype="multipart/form-data">';
                    }
                    ?>

                    <div class="form-floating mb-3">
                        <input class="form-control " id="inputEmail" type="text" placeholder="Password" name="masohd"
                            value="<?php if (isset($masohd))
                                echo $masohd; ?>" readonly />
                        <label for="inputmahh">ID</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="makh"
                            value="<?php if (isset($makh))
                                echo $makh; ?>" readonly />
                        <label for="inputtenhh">Customer ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="date" placeholder="Mô tả" name="ngaydat"
                            value="<?php if (isset($ngaydat))
                                echo $ngaydat; ?>" />
                        <label for="inputPassword">Date</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="tongtien"
                            value="<?php if (isset($tongtien))
                                echo $tongtien; ?>" />
                        <label for="inputPassword">Total</label>
                    </div>
                    <div class="text-end mt-4 mb-0">
                        <button type="submit" class="btn btn-primary" id="nut">Save</button>
                    </div>
                    </form>
                </div>
            </div>
    </main>