<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="./">
        <div class="d-flex align-items-center mb-3 mt-4 pb-1">
            <img class="img" src="../assets/img/logo.png" alt="" width="10%">
            <span class=" fw-bold mb-0">Karma Shop - Admin</span>
        </div>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form> -->
    <!-- Navbar-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </div>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php?action=Auth&act=changepass&id=<?php echo $_SESSION['admin']['makh']; ?>">Change Password</a></li>
                <li><a class="dropdown-item" href="index.php?action=Auth&act=logout">Logout<i class="fa-solid fa-right-from-bracket ms-3"></i></a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="./">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Data Base</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                        Product
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?action=Admin&act=allproduct">All Product</a>
                            <a class="nav-link" href="index.php?action=Admin&act=addproduct">Add New Product</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseType" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                        Type
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseType" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?action=Admin&act=alltype">All Type </a>
                            <a class="nav-link" href="index.php?action=Admin&act=addtype">Add New Type</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrder" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                        Order
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseOrder" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?action=Admin&act=allorder">All Order</a>
                            <a class="nav-link" href="index.php?action=Admin&act=allorder_detail">All Order Detail</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        User
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?action=Admin&act=alluser">All User</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-comment"></i></div>
                        Comments
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?action=Admin&act=comment">All Comments</a>
                            <a class="nav-link" href="index.php?action=Admin&act=review">Review</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION['admin']['email']; ?>
            </div>
        </nav>
    </div>