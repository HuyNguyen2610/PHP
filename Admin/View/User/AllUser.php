
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
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Number Phone</th>
                  <th>Avatar</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Number Phone</th>
                  <th>Avatar</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $hh = new admin();
                $Product = $hh->getAllUser();
                while ($result = $Product->fetch()) :
                ?>
                  <tr>
                    <td><?php echo $result['makh']; ?> </td>
                    <td><?php echo $result['username']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['diachi']; ?></td>
                    <td><?php echo $result['sodienthoai']; ?></td>
                    <td><img class="img-fluid" src="../Contact/img/product/<?php echo $result['img'] ?>" width="15%" alt=""></td>
                    <td><?php if($result['vaitro']>0){echo 'Admin';} else {echo 'User';} ?></td>
                    <td>
                      <div>
                        <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Admin&act=edituser&id=<?php echo $result['makh'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                        <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Admin&act=delete_user&id=<?php echo $result['makh'] ?>"><i class="fa-solid fa-user-slash"></i></a>
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
