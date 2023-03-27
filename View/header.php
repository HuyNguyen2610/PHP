
<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php?action=home"><img src="Contact/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php?action=home">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="index.php?action=category">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="index.php?action=checkout">Product Checkout</a></li> 
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="index.php?action=blog">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="index.php?action=single-blog">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="index.php?action=contact">Contact</a></li>
							<?php
								if(isset($_SESSION['email']) && isset($_SESSION['username'])){
									$name=$_SESSION['username'];
									$makh=$_SESSION['makh'];
							?>
							<li class="nav-item submenu dropdown">
								<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false"><?php echo $name ?></a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="index.php?action=login&act=profile&id=<?php echo $makh ?>">Edit Profile</a></li>
									<li class="nav-item"><a class="nav-link" href="index.php?action=login&act=logout">Logout</a></li>

								</ul>
							</li>
							<?php }else{ ?>
									<li class="nav-item"><a class="nav-link" href="index.php?action=login">Login</a></li>
							<?php } ?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="index.php?action=cart" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" action="index.php?action=category&act=category" method="post">
					<input type="text" class="form-control" id="search_input" name="txtsearch" placeholder="Search Here">
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->