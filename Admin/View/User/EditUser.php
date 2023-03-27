<title>Admin Edit User</title>
<?php
if (isset($_GET['act']) == 'edit') {
    $ac = 1;
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hh = new admin();
    $result = $hh->getUserSingle($id);
    $makh = $result['makh'];
    $username = $result['username'];
    $email = $result['email'];
    $diachi = $result['diachi'];
    $sodienthoai = $result['sodienthoai'];
    $img = $result['img'];
    $vaitro = $result['vaitro'];
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
                        echo '<form method="POST" action="index.php?action=Admin&act=edituser_action&id='.$id .'" enctype="multipart/form-data">';
                    }
                    ?>

                    <div class="form-floating mb-3">
                        <input class="form-control " id="inputEmail" type="text" placeholder="Password" name="makh"
                            value="<?php if (isset($makh))
                                echo $makh; ?>" readonly />
                        <label for="inputmakh">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="username"
                            value="<?php if (isset($username))
                                echo $username; ?>" request/>
                        <label for="inputtenhh">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="email" placeholder="Password" name="email"
                            value="<?php if (isset($email))
                                echo $email; ?>" request/>
                        <label for="inputdongia">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="text" placeholder="Password" name="diachi"
                            value="<?php if (isset($diachi))
                                echo $diachi; ?>" request/>
                        <label for="inputnhom">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="Password" type="number" placeholder="Password" name="sodienthoai"
                            value="<?php if (isset($sodienthoai))
                                echo $sodienthoai; ?>" />
                        <label for="inputnhom">Phone Number</label>
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" id="img" type="file" name="img" style="line-height:34px" request />
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <select name="vaitro" id="vaitro" class="form-control">
                            <option value="1" <?php if(isset($vaitro) && $vaitro == 1) echo "selected"; ?>>Admin</option>
                            <option value="0" <?php if(isset($vaitro) && $vaitro == 0) echo "selected"; ?>>User</option>
                        </select>
                        <label for="vaitro">Role</label>
                    <div class="text-end mt-4 mb-0">
                        <button type="submit" class="btn btn-primary" id="nut">Save</button>
                    </div>
                    </form>
                </div>
            </div>
    </main>
    