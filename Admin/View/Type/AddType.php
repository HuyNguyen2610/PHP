<title>Admin Add Type </title>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Type</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fab fa-product-hunt me-1"></i> -->
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    Add Type
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?action=Admin&act=add_type">
                        <div class="form-floating mb-3">
                            <input class="form-control " id="inputEmail" type="number" placeholder="Password" name="maloai" readonly />
                            <label for="inputmahh">ID</label>

                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control"  id="Password" type="text" placeholder="Password" name="tenhh" request/>
                            <label for="inputtenhh">Product name</label>
                        </div>
                        <div class="text-end mt-4 mb-0">
                            <button type="submit" class="btn btn-primary" id="nut">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<div class="container-fluid px-4">
    <h4 class="mt-2">Import file</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="index.php?action=import&act=import_type" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Choose file import</label>
                    <input type="file" name="file" class="form-control " style="width:400px" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                    <button type="submit" name="submit_file" class="btn btn-success mt-4">IMPORT</button>

                </div>
            </form>
        </div>
    </div>
</div>
</main>
    