<title>Karma Shop - Category</title>
<?php
$hh = new hanghoa();

$maloai = $_GET['id'];
$result = $hh->getTypeProduct($maloai);

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
				<h1>Shop Category page</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="">Shop<span class="lnr lnr-arrow-right"></span></a>
					<a href="index.php?action=category">Fashon Category</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<form action="index.php?action=cart" method="post">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a  href="index.php?action=category" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>ALL<span class="number">(<?php echo $count ?>)</span></a>
                        <?php
                            $hh = new hanghoa();
                            $result = $hh->getTypeAll();
                            while ($set = $result->fetch()) {

                        ?>
						<li class="main-nav-list"><a  href="index.php?action=category&act=type&id=<?php echo $set['maloai'] ?>" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span><?php echo $set['tenhh'] ?><span class="number"><?php echo $hh->getCount($set['maloai']); ?></span></a>
						<?php
							}
						?>
						</li>
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Product Filters</div>
					<div class="common-filter">
						<div class="head">Brands</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Adidass<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Nike<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Color</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
										Leather<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
										with red<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<?php
					if (isset($_GET['act'])=='search') {
						$act = 0;
					}
					else {
						$act = 1;
					}
				?>
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
					<form class="form-inline" method="get">
                    <input type="hidden" value="category" name="action">
                    <input type="hidden" value="type" name="act">
                    <input type="hidden" value="<?php echo $maloai ?>" name="id">
                    <div class="row ">
                        <div class="col-6">
                            <?php
                            $priceSort = isset($_GET['priceSort']) ? $_GET['priceSort'] : 'Normal';
                            ?>
                            <select class="form-select w-100" aria-label="Default select example" name='priceSort'>
                                <option <?php echo ($priceSort == 'Normal') ? ' selected' : '' ?> value="Normal">Normal</option>
                                <option <?php echo ($priceSort == 'Desc') ? ' selected' : '' ?> value="Desc">High to low</option>
                                <option <?php echo ($priceSort == 'Asc') ? ' selected' : '' ?> value="Asc">Low to high</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-info mb-2">Sort</button>
                        </div>
                    </div>
                </form>
					</div>
					<div class="sorting mr-auto">
					</div>
					<div class="pagination">
						<?php
						if ($priceSort == 'Normal') {
							$url = '';
						} else {
							$url = '&priceSort='. $priceSort;
						}
						if ($current_page > 1 && $page > 1) {
						?>

						<a href="index.php?action=category&act=type&id=<?php echo $maloai ?>&page=<?php echo ($current_page - 1) ?><?php echo $url ?>" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						
						<?php
						}
                        for($i=1;$i<=$page;$i++){
                    	?>
						<a href="index.php?action=category&act=type&id=<?php echo $maloai ?>&page=<?php echo $i ?><?php echo $url ?>"><?php echo $i ?></a>
						<?php } ?>

						<?php 
						if ($current_page < $page && $page > 1) {
						?>
						<a href="index.php?action=category&act=type&id=<?php echo $maloai ?>&page=<?php echo ($current_page + 1) ?><?php echo $url ?>" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						<?php } ?>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
                        <?php
                            $hh = new hanghoa();
                            if (isset($_GET['id'])) {
                                $maloai = $_GET['id'];
								if ($priceSort == 'Normal') {
									$result = $hh->getListType($start, $limit, $maloai);
									} else {
										$result = $hh->getListTypeSoft($start, $limit, $priceSort, $maloai);
									}                                
							while ($set = $result->fetch()) :
                        ?>

						<!-- single product -->
						<div class="col-lg-4 col-md-6">

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
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="index.php?action=category&act=detail&id=<?php echo $set['mahh'] ?>" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
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
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
					<form class="form-inline" method="get">
                    <input type="hidden" value="category" name="action">
					<input type="hidden" value="type" name="act">
                    <input type="hidden" value="<?php echo $maloai ?>" name="id">
                    <div class="row ">
                        <div class="col-6">
                            <?php
                            $priceSort = isset($_GET['priceSort']) ? $_GET['priceSort'] : 'Normal';
                            ?>
                            <select class="form-select w-100" aria-label="Default select example" name='priceSort'>
                                <option <?php echo ($priceSort == 'Normal') ? ' selected' : '' ?> value="Normal">Normal</option>
                                <option <?php echo ($priceSort == 'Desc') ? ' selected' : '' ?> value="Desc">High to low</option>
                                <option <?php echo ($priceSort == 'Asc') ? ' selected' : '' ?> value="Asc">Low to high</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-info mb-2">Sort</button>
                        </div>
                    </div>
                </form>
					</div>
					<div class="pagination">
					<?php
						if ($priceSort == 'Normal') {
							$url = '';
						} else {
							$url = '&priceSort='. $priceSort;
						}
						if ($current_page > 1 && $page > 1) {
						?>

						<a href="index.php?action=category&act=type&id=<?php echo $maloai ?>&page=<?php echo ($current_page - 1) ?><?php echo $url ?>" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						
						<?php
						}
                        for($i=1;$i<=$page;$i++){
                    	?>
						<a href="index.php?action=category&act=type&id=<?php echo $maloai ?>&page=<?php echo $i ?><?php echo $url ?>"><?php echo $i ?></a>
						<?php } ?>

						<?php 
						if ($current_page < $page && $page > 1) {
						?>
						<a href="index.php?action=category&act=type&id=<?php echo $maloai ?>&page=<?php echo ($current_page + 1) ?><?php echo $url ?>" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						<?php } ?>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r1.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r2.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r3.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r5.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r6.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r7.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r9.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r10.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="Contact/img/r11.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="Contact/img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>
	<!-- End related-product Area -->