<title>Admin Add Product</title>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Product</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fab fa-product-hunt me-1"></i> -->
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    Add Product
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?action=Admin&act=add_action">
                                <div class="form-floating mb-3">
                                    <input class="form-control " id="inputEmail" type="text" placeholder="Password" name="mahh" readonly />
                                    <label for="inputmahh">ID</label>

                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="text" placeholder="Password" name="tenhh" request/>
                                    <label for="inputtenhh">Product name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="text" placeholder="Password" name="dongia" request/>
                                    <label for="inputdongia">Prince</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="text" placeholder="Password" name="giamgia" request/>
                                    <label for="inputgiamgia">Discount</label>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control"  id="hinh" type="file" name="hinh" style="line-height:34px"/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="number" placeholder="Password" name="nhom" request/>
                                    <label for="inputnhom">Group</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="maloai" id="">
                                        <?php   
                                        $hh = new admin();  
                                        $res =$hh->getAllType(); 
                                        while ($type = $res->fetch()) :
                                        ?>
                                        <option value="<?php echo $type['maloai'] ?>"><?php echo $type['tenhh'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <label for="inputnhom">Type code</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control"  id="Password" type="text" placeholder="Mô tả" style="height:120px" name="mota" request> </textarea>
                                    <label for="inputPassword">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="date" placeholder="Mô tả" name="ngaylap"  request/>
                                    <label for="inputPassword">Date</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="number" placeholder="Password" name="soluongton"request/>
                                    <label for="inputPassword">Quantity in stock</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="text" placeholder="Password" name="mausac" request/>
                                    <label for="inputPassword">Color</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control"  id="Password" type="number" placeholder="Password" name="size"request/>
                                    <label for="inputPassword">Size</label>
                                </div>
                                <div class="text-end mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary" id="nut">Add Product</button>
                                </div>
                            </form>
                </div>
            </div>
    </main>