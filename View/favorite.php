<title>Karma Shop - Category</title>
<?php
$hh = new user();
$makh = $_SESSION['makh'];
$result = $hh->getWishList($makh);
$cou = $hh->getWishListCout($makh);

$count = $result->rowCount();

$limit = 9;

$p = new Page();

$page = $p->findPage($count,$limit);

$start = $p->findStart($limit);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Wish List</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="index.php?action=login&act=profile&id=<?php echo $makh ?>">Edit Profile<span class="lnr lnr-arrow-right"></span></a>
					<a href="index.php?action=single-product&act=favorite">Wish List</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<form action="index.php?action=cart" method="post">
	<div class="container">
		<div class="row">
			
			<div class="col-xl-12 col-lg-12 col-md-12">
				<?php
					if (isset($_GET['act'])=='search') {
						$act = 0;
					}
					else {
						$act = 1;
					}
				?>
				<!-- Start Filter Bar -->

				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<?php
						if($cou<1){
						?>
						<div class="col-sm-12 ">
							<div class="col-sm-12 col-sm-offset-1  text-center">
								<h3 class="text-center ">You have not added a favorite product yet</h3>
							</div>
						<?php }else{
						$hh = new hanghoa();
						if($act ==0){
							if(isset($_POST['txtsearch'])){
								$tk = $_POST['txtsearch'];
								$result = $hh->getTimKiem($tk);
							}
						}else{
							$result = $hh->getWishList($makh);
						}
						while ($set = $result->fetch()) :
						?>
						<!-- single product -->
						<div class='text-right'>
				<a href="index.php?action=single-product&act=wishlist&do=DeleteAll&id=<?php echo $makh ?>" class="btn btn-danger mt-3">Delete All</a>
				</div>
						<div class="col-lg-3 col-md-5">

							<div class="single-product">
								<img class="img-fluid" src="Contact\img\product\<?php echo $set['hinh'] ?>" alt="">
								<div class="product-details">
									<h6><?php echo $set['tenhh'] ?></h6>
									<div class="price">
										<?php
										if ($set['giamgia'] == 0) {
											echo "<h6>" . number_format($set['dongia']) . "vnđ</h6>";
										} else {
											echo "<h6>" . number_format($set['dongia']) . "vnđ</h6>
											<h6 class='l-through'>" . number_format($set['giamgia']) . "vnđ</h6>";
										}
										?>

									</div>
										<div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="index.php?action=category&act=detail&id=<?php echo $set['mahh'] ?>" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
											<a href="index.php?action=single-product&act=wishlist&do=DeleteItem&id=<?php echo $makh ?>&item=<?php echo $set['mahh'] ?>" class="social-info">
												<span class="fa-regular fa-trash-can"></span>
												<p class="hover-text">Remove</p>
											</a>
										</div>
								</div>
							</div>
						</div>
						<?php
						endwhile;
						}
						?>
						
					</div>

				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
			
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
</form>
	<!-- End related-product Area -->