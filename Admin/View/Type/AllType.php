
<title>Admin Type</title>

<div id="layoutSidenav_content">
  <main>
  <div class="container-fluid px-4">
            <h1 class="mt-4">All User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">DataBase</li>
                <li class="breadcrumb-item active">User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-product-hunt me-1"></i>
                    All User
                </div>
        <div class="card-body">
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Type Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>ID</th>
                  <th>Type Name</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $hh = new admin();
                $Product = $hh->getAllType();
                while ($result = $Product->fetch()) :
                ?>
                  <tr>
                    <td><?php echo $result['maloai']; ?> </td>
                    <td><?php echo $result['tenhh']; ?></td>
                    <td>
                      <div>
                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?ation=Admin&act=edittype&id=<?php echo $result['maloai'] ?>">Edit</a>
                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?ation=Admin&act=delete_type&id=<?php echo $result['maloai'] ?>">Detele</a>
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
