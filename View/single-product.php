<title>Karma Shop - Product Details</title>
<script type="text/javascript">
	function chonsize(a) {
		document.getElementById("size").value = a;

	}
</script>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Product Details Page</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="index.php?action=category">Shop<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">product-details</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->

<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<?php
			if (isset($_GET['action'])) {
				$mahh = $_GET['id'];
				$hh = new hanghoa();
				$result = $hh->getHangHoaID($mahh);
				$rating = $hh->getRate($mahh);
				$hh->Views($mahh);
				$mahh = $result['mahh']; //có thể sd :$mahh=$result['mahh'];
				$tenhh = $result['tenhh'];
				$dongia = $result['dongia'];
				$giamgia = $result['giamgia'];
				$hinh = $result['hinh'];
				$mota = $result['mota'];
				$nhom = $result['nhom'];
				$slt = $result['soluongton'];
				$mau = $result['mausac'];
				$size = $result['size'];
			}
			?>
			<div class="col-lg-6">
				<div class="s_Product_carousel">

					<?php
					$result = $hh->getHangHoaNhomHinh($nhom);
					while ($set = $result->fetch()):
						?>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo 'Contact/img/product/' . $set['hinh'] ?>" alt="">
						</div>
					<?php endwhile ?>


				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<form action="index.php?action=cart" method="post">
						<input type="hidden" name="mahh" value="<?php echo $mahh ?>" />
						<h3>
							<?php echo $tenhh ?>
						</h3>
						<?php
						if ($giamgia == 0) {
							echo "<h2>" . number_format($dongia) . "VNĐ</h2>";
						} else {
							echo "<h2>" . number_format($dongia) . "VNĐ</h2>
							<h5 class='l-through' id='gachngang'>" . number_format($giamgia) . "vnđ</h5>";
						}
						?>

						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : Household</a></li>
							<li><a href="#"><span>Availibility</span> :
									<?php
									if ($slt == 0) {
										echo 'Unstock';
									} else {
										echo 'Instock';
									}
									?>
								</a></li>
						</ul>
						<ul class="list">
							<li>
								<a href="#"><span>Size</span> :
								</a>
								<input type="hidden" name="size" id="size" value="0" />
								<?php
								$result = $hh->getHangHoaNhomSize($nhom);
								while ($set = $result->fetch()):
									?>
									<button type="button" name="<?php echo $set['size']; ?>" class="btn" id="size"
										onclick="chonsize(<?php echo $set['size']; ?>)" value="<?php echo $set['size']; ?>">
										<?php echo $set['size']; ?>
									</button>
								<?php endwhile; ?>
							</li>
							<li>
								<a href="#" class="mau"><span>Color</span> :
								</a>
								<div class="mausac">
									<select name="mymausac" class="form-control" style="width:150px; ">
										<?php
										$result = $hh->getHangHoaNhomColor($nhom);
										while ($set = $result->fetch()):
											?>
											<option value="<?php echo $set['mausac']; ?>">
												<?php echo $set['mausac']; ?>
											</option>
										<?php endwhile; ?>
									</select>
								</div>
							</li>
						</ul>


						<br>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="soluong" id="sst" maxlength="12" value="1" title="Quantity:"
								class="input-text qty">
							<button
								onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
								class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button
								onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;"
								class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center pb-2">
							<?php
							if ($slt <= 0) {
								echo '<button class="primary-btn" type="submit" disabled style="border:0px">Add to Cart</button>';
							} else {
								echo '<button class="primary-btn"  type="submit" style="border:0px">Add to Cart</button>';
							}
							?>
					</form>
					<?php
					$makh = -1;
					if (isset($_SESSION['makh'])) {
						$makh = $_SESSION['makh'];
						$kt = new user();
						$check = $kt->ExistWishlist($makh, $mahh);
						if ($check) {
							?>
							<form method="post" action="index.php?action=single-product&id=<?php echo $mahh ?>&act=addwishlist">
								<input type="hidden" name="makh" value="<?php echo $makh ?>">
								<button class="btn btn-round btn-danger text-light" type="submit" disabled><i
										class="fas fa-heart"></i></button>
							</form>
							<?php
						} else {
							?>
							<form method="post" action="index.php?action=single-product&id=<?php echo $mahh ?>&act=addwishlist">
								<input type="hidden" name="makh" value="<?php echo $makh ?>">
								<button class="btn btn-round btn-danger" type="submit"><i class="far fa-heart"></i></button>
							</form>
							<?php
						}
					} else {
						?>
						<form method="post" action="index.php?action=single-product&id=<?php echo $mahh ?>&act=addwishlist">
							<input type="hidden" name="makh" value="-1">
							<button class="btn btn-round btn-danger" type="submit"><i class="far fa-heart"></i></button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<?php
			$usr = new user();
			$tong = $usr->TongComment($mahh);
			$dg = $usr->TongDg($mahh);
			?>
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
					aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
					aria-controls="profile" aria-selected="false">Specification</a>
			</li>
			<li class="nav-item">
				<?php
				if ($tong == 0) {
					?>
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
						aria-controls="contact" aria-selected="false">Comments</a>
					<?php
				} else {
					?>
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
						aria-controls="contact" aria-selected="false">Comments (
						<?php echo $tong ?>)
					</a>
				<?php } ?>
			</li>
			<li class="nav-item">
				<?php
				if ($dg == 0) {
					?>
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
						aria-controls="review" aria-selected="false">Reviews</a>
					<?php
				} else {
					?>
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
						aria-controls="review" aria-selected="false">Reviews (
						<?php echo $dg ?>)
					</a>
				<?php } ?>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of
					all shapes
					and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick
					School in
					Reading at the age of 15, where she went to secretarial school and then into an insurance office.
					After moving to
					London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He
					was an
					officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before
					John took a
					job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours,
					and when
					showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently
					bought her a
					child’s painting set for her birthday and it was with this that she produced her first significant
					work, a
					half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It
					was aptly
					named ‘Hangover’ by Beryl’s husband and</p>
				<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are
					seeing
					more and more recipe books and Internet websites that are dedicated to the act of cooking for one.
					Divorce and
					the death of spouses or grown children leaving for college are all reasons that someone accustomed
					to cooking for
					more than one would suddenly need to learn how to adjust all the cooking practices utilized before
					into a
					streamlined plan of cooking that is more efficient for one person creating less</p>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<h5>Width</h5>
								</td>
								<td>
									<h5>128mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Height</h5>
								</td>
								<td>
									<h5>508mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Depth</h5>
								</td>
								<td>
									<h5>85mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Weight</h5>
								</td>
								<td>
									<h5>52gm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Quality checking</h5>
								</td>
								<td>
									<h5>yes</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Freshness Duration</h5>
								</td>
								<td>
									<h5>03days</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>When packeting</h5>
								</td>
								<td>
									<h5>Without touch of hand</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Each Box contains</h5>
								</td>
								<td>
									<h5>60pcs</h5>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
					<div class="col-lg-6">
						<?php
						$usr = new user();
						$result = $usr->HienThicomment($mahh);
						while ($set = $result->fetch()):
							?>
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<?php if ($set['img'] == '') { ?>
												<img src="Contact/img/product/avatar_2x.png" alt=""
													style="border-radius: 100px; width:55px;">
											<?php } else { ?>
												<img src="Contact/img/product/<?php echo $set['img'] ?>" alt=""
													style="border-radius: 100px; width:70px">
											<?php } ?>
										</div>
										<div class="media-body">
											<h4>
												<?php echo $set['username'] ?>
											</h4>
											<h5>
												<?php echo $set['ngaybl'] ?>
											</h5>
											<a class="reply_btn" href="#">Reply</a>
											<p class="pe-5">
												<?php echo $set['noidung'] ?>
											</p>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile ?>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<?php
							if (isset($_SESSION['makh'])) {
								?>
								<h4>Post a comment</h4>
								<form class="row contact_form"
									action="index.php?action=category&act=comment&id=<?php echo $_GET['id'] ?>"
									method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="comment" id="comment" rows="1"
												placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
									</div>
								</form>
								<?php
							} else {
								echo '<h4>You need to login to comment</h4><br>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">

						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4>
										<?php echo number_format($rating, 1) ?>
									</h4>
									<h6>(
										<?php
										$dg = $usr->TongDg($mahh);
										if ($dg == 0) {
											echo '0';
										} else {
											echo $dg;
										} ?> Reviews)
									</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
												<?php
												$us = new user();
												echo $rate = $us->getRateCount($mahh, 5);

												?>
											</a></li>
										<li><a href="#">4 Star 
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
												<?php
												$us = new user();
												echo $rate = $us->getRateCount($mahh, 4);

												?>
											</a></li>
										<li><a href="#">3 Star 
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
												<?php
												$us = new user();
												echo $rate = $us->getRateCount($mahh, 3);

												?>
											</a></li>
										<li><a href="#">2 Star 
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
												<?php
												$us = new user();
												echo $rate = $us->getRateCount($mahh, 2);

												?>
											</a></li>
										<li><span class="mt-1">1 Star</span>  
											<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">
											<span class="mt-1">
											<?php
												$us = new user();
												echo $rate = $us->getRateCount($mahh, 1);

												?>
											</span>
												
											</li>
									</ul>
								</div>
							</div>
						</div>
						<?php
						$usr = new user();
						$result = $usr->getRate($mahh);
						while ($set = $result->fetch()):
							?>
							<div class="review_list mb-3">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<?php if ($set['img'] == '') { ?>
												<img src="Contact/img/product/avatar_2x.png" alt=""
													style="border-radius: 100px; width:55px;">
											<?php } else { ?>
												<img src="Contact/img/product/<?php echo $set['img'] ?>" alt=""
													style="border-radius: 100px; width:70px">
											<?php } ?>
										</div>
										<div class="media-body">
											<div class="row">

												<div class="col-lg-6">
													<h4>
														<?php echo $set['username'] ?>
													</h4>
												</div>
												<div class="col-6">
													<h5>
														<?php echo $set['ngaydg'] ?>
													</h5>
												</div>
											</div>
											<?php
											for ($i = 0; $i < 5; $i++) {
												if ($i < $set['rate']) {
													echo '<img src="./Contact/img/product/star2.png" id="php1" class="php" width="13px">';
												} else {
													echo '<img src="./Contact/img/product/star3.png" id="php1" class="php" width="13px">';
												}
											}
											?>
										</div>
									</div>
									<p class="pe-5">
										<?php echo $set['noidung'] ?>
									</p>
								</div>
							</div>
						<?php endwhile ?>
					</div>

					<div class="col-lg-6">
						<div class="review_box">
							<h4>Add a Review</h4>
							<?php
							$usr = new user();
							if (isset($_SESSION['makh'])) {
								$order = new hoadon();
								$checkBuy = $order->checkBought($_SESSION['makh'], $mahh);
								if ($checkBuy) {
									$checkRated = $usr->CheckRate($mahh, $makh);
									if (!$checkRated) {
										?>
										<form class="row contact_form"
											action="index.php?action=single-product&id=<?php echo $mahh ?>&act=rating" method="post"
											id="contactForm" novalidate="novalidate">
											<div class="row">
												<div class="col-3">
													<p>Your Rating:</p>
												</div>
												<div class="col-9 mb-2">
													<ul class="list">
														<input type="hidden" id="php1_hidden" value="1">
														<img src="Contact\img\product\star2.png" onmouseover="change(this.id);"
															id="php1" class="php" width="20px">
														<input type="hidden" id="php2_hidden" value="2">
														<img src="Contact\img\product\star2.png" onmouseover="change(this.id);"
															id="php2" class="php" width="20px">
														<input type="hidden" id="php3_hidden" value="3">
														<img src="Contact\img\product\star2.png" onmouseover="change(this.id);"
															id="php3" class="php" width="20px">
														<input type="hidden" id="php4_hidden" value="4">
														<img src="Contact\img\product\star2.png" onmouseover="change(this.id);"
															id="php4" class="php" width="20px">
														<input type="hidden" id="php5_hidden" value="5">
														<img src="Contact\img\product\star2.png" onmouseover="change(this.id);"
															id="php5" class="php" width="20px">
													</ul>
												</div>
											</div>

											<input type="hidden" name="makh" value="<?php echo $_SESSION['makh'] ?>" />
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" value="<?php echo $_SESSION['username'] ?>" readonly
														class="form-control" id="name" name="name" placeholder="Your Full name"
														onfocus="this.placeholder = ''"
														onblur="this.placeholder = 'Your Full name'">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control"
														value="<?php echo $_SESSION['email'] ?>" readonly id="email" name="email"
														placeholder="Email Address" onfocus="this.placeholder = ''"
														onblur="this.placeholder = 'Email Address'">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control"
														value="<?php echo $checkBuy['ngaydat'] ?>" readonly id="email" name="email"
														placeholder="Time purchase:" onfocus="this.placeholder = ''"
														onblur="this.placeholder = 'Time purchase:'">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="comment" id="message" rows="1"
														placeholder="Review" onfocus="this.placeholder = ''"
														onblur="this.placeholder = 'Review'"></textarea>
												</div>
											</div>
											<div class="col-md-12 text-right">
												<button type="submit" value="submit" class="primary-btn">Submit Now</button>
											</div>
											<input type="hidden" name="number_rating" id="phprating" value="5">
										</form>
										<?php
									} else {
										echo '<h4 class="text-warning">The product has been rated by you</h4>';
									}
								} else {
									echo '<h4 class="text-warning">You need to <a class="text-danger" href="#top">purchase</a> the product to reviews</h4>';
								}
							} else {
								echo '<h4 class="text-warning">You need to <a href="index.php?action=User&act=login" class="text-danger">login</a> and purchase the product to reviews</h4>';
							}

							$count = $result->rowCount();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
						labore et dolore
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
<script type="text/javascript">
	function change(id) {
		var cname = document.getElementById(id).className;
		var ab = document.getElementById(id + "_hidden").value;
		document.getElementById(cname + "rating").value = ab;
		for (var i = ab; i >= 1; i--) {
			document.getElementById(cname + i).src = 'Contact/img/product/star2.png';
		}
		var id = parseInt(ab) + 1;
		for (var j = id; j <= 5; j++) {
			document.getElementById(cname + j).src = "Contact/img/product/star3.png";
		}
	}
</script>

<!-- End related-product Area -->