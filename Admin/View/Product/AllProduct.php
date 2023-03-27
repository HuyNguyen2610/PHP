<title>Admin All Product</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">All Product</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-product-hunt me-1"></i>
                    All Product
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Group</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>View</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Group</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>View</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $hh = new hanghoa();
                                $Product = $hh->getListHanghoaAll();
                                while ($result = $Product->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['mahh']; ?></td>
                                        <td><?php echo $result['tenhh']; ?></td>
                                        <td><?php echo $result['nhom']; ?></td>
                                        <td><img class="img-fluid" src="../Contact/img/product/<?php echo $result['hinh'] ?>" width="25%" alt=""></td>
                                        <td><?php echo $result['giamgia']; ?></td>
                                        <td><?php echo $result['dongia']; ?></td>
                                        <td><?php echo $result['soluongton']; ?></td>
                                        <td><?php echo $result['tenloai'] ?></td>
                                        <td><?php echo $result['mota']; ?></td>
                                        <td><?php echo $result['soluotxem']; ?></td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Admin&act=edit&id=<?php echo $result['mahh']; ?>">Edit</a>
                                            <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Admin&act=delete_action&id=<?php echo $result['mahh'] ?>">Detele</a>
                                        </td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>