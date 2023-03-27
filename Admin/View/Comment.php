
<title>Admin User</title>

<div id="layoutSidenav_content">
  <main>
  <div class="container-fluid px-4">
            <h1 class="mt-4">All User</h1>
            <ol class="breadcrumb mb-4">User</li>
                <li class="breadcrumb-item active">User All</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                <i class="fas fa-user-circle me-1"></i>
                    All User
                </div>
        <div class="card-body">
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $hh = new admin();
                $Product = $hh->getListComment();
                while ($result = $Product->fetch()) :
                ?>
                  <tr>
                    <td><?php echo $result['mabl']; ?> </td>
                    <td><?php echo $result['tenhh']; ?></td>
                    <td><?php echo $result['username']; ?></td>
                    <td><?php echo $result['ngaybl']; ?></td>
                    <td><?php echo $result['noidung']; ?></td>
                    <td>
                      <div>
                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Admin&act=delete_comment&id=<?php echo $result['mabl'] ?>"><i class="fa-solid fa-comment-slash"></i></a>
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
