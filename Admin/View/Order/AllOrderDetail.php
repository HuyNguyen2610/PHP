
<title>Admin Order Detail</title>

<div id="layoutSidenav_content">
  <main>
  <div class="container-fluid px-4">
            <h1 class="mt-4">All Order Detail</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Order</li>
                <li class="breadcrumb-item active">All Order Detail</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                <i class="fas fa-money-check me-1"></i>
                    All Order Detail
                </div>
        <div class="card-body">
          <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>ID Product</th>
                    <th>Quantity Purchased</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Total</th>
                    <th>Action</th>
                    </tr>
                </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>ID Product</th>
                    <th>Quantity Purchased</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $hh = new admin();
                $Product = $hh->getAllCTHoaDon();
                while ($result = $Product->fetch()) :
                ?>
                  <tr>
                    <td><?php echo $result['masohd']; ?> </td>
                    <td><?php echo $result['mahh']; ?></td>
                    <td><?php echo $result['soluongmua']; ?></td>
                    <td><?php echo $result['mausac']; ?></td>
                    <td><?php echo $result['size']; ?></td>
                    <td><?php echo number_format($result['thanhtien']); ?></td>

                    <td>
                      <div>
                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?ation=Admin&act=editorder_detail&id=<?php echo $result['masohd'] ?>">Edit</a>
                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?ation=Admin&act=delete_detail&id=<?php echo $result['masohd'] ?>">Detele</a>
                      </div>

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
      <div class="mb-5"></div>
    </div>
  </main>
