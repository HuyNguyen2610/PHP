<title>Admin Edit Type</title>
<?php
if (isset($_GET['act']) == 'edit') {
    $ac = 1;
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hh = new admin();
    $result = $hh->getSingleType($id);
    $maloai = $result['maloai'];
    $tenhh = $result['tenhh'];
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit User</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fab fa-product-hunt me-1"></i> -->
                    <i class="fa-regular fa-pen-to-square  me-1 "></i>
                    Edit User
                </div>
                <div class="card-body">
                    <?php
                    if ($ac == 1) {
                        echo '<form method="POST" action="index.php?action=Admin&act=edittype_action&id='.$id .'" enctype="multipart/form-data">';
                    }
                    ?>

                    <div class="form-floating mb-3">
                        <input class="form-control " id="inputEmail" type="text" placeholder="Password" name="maloai"
                            value="<?php if (isset($maloai))
                                echo $maloai; ?>" readonly />
                        <label for="inputmakh">ID</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="tenhh"
                            value="<?php if (isset($tenhh))
                                echo $tenhh; ?>" request/>
                        <label for="inputtenhh">Full Name</label>
                    </div>
                    <div class="text-end mt-4 mb-0">
                        <button type="submit" class="btn btn-primary" id="nut">Save</button>
                    </div>
                    </form>
                </div>
            </div>
    </main>