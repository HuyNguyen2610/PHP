
<title>Admin Order</title>

<div id="layoutSidenav_content">
  <main>
  <div class="container-fluid px-4">
            <h1 class="mt-4">All Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Order</li>
                <li class="breadcrumb-item active">Order All</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                <i class="fas fa-money-check me-1"></i>
                    All Order
                </div>
        <div class="card-body">
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>ID Customer</th>
                  <th>Purchase Date</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id Order</th>
                  <th>Id Customer</th>
                  <th>Purchase Date</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $hh = new admin();
                $Product = $hh->getAllHoaDon();
                while ($result = $Product->fetch()) :
                ?>
                  <tr>
                    <td><?php echo $result['masohd']; ?> </td>
                    <td><?php echo $result['makh']; ?></td>
                    <td><?php echo $result['ngaydat']; ?></td>
                    <td><?php echo number_format($result['tongtien']); ?></td>

                    <td>
                      <div>
                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?ation=Admin&act=editorder&id=<?php echo $result['masohd'] ?>">Edit</a>
                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?ation=Admin&act=delete_order&id=<?php echo $result['masohd'] ?>">Detele</a>
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
