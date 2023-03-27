
<?php
  	$od = new hoadon();
	  $order = $od->getOrderCout($makh);
		if ($order == 0):
		  	echo "<script>alert('You have not purchased any products yet')</script>";
			echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=category"/>';
  ?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Confirmation</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Confirmation</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

  <?php 
  else:
  ?>
  <?php
        $hd = new hoadon();
        $result = $hd->getHoaDon($_SESSION['sohd']);
        $sohd = $result['masohd'];
        $username = $result['username'];
        $diachi = $result['diachi'];
        $sodt = $result['sodienthoai'];
        $ngaydat = $result['ngaydat'];
        $d = new DateTime($ngaydat);
    ?>
<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><a href="#"><span>Order number</span> : <?php echo $sohd ?></a></li>
                        <li><a href="#"><span>Date</span> : <?php echo $d->format('d/m/Y') ?></a></li>
                        <li><a href="#"><span>Phone number</span> : <?php echo $sodt ?></a></li>
                        <li><a href="#"><span>Check payments</span> : </a></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="details_item">
                    <h4>Billing Address</h4>
                    <ul class="list">
                        <li><a href="#"><span>Street</span> : 56/8</a></li>
                        <li><a href="#"><span>City</span> : Los Angeles</a></li>
                        <li><a href="#"><span>Country</span> : United States</a></li>
                        <li><a href="#"><span>Postcode </span> : 36952</a></li>
                    </ul>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Shipping Address</h4>
                    <ul class="list">
                        <li><a href="#"><span>User Name</span> : <?php echo $username ?></a></li>
                        <li><a href="#"><span>Address</span> : <?php echo $diachi ?></a></li>
                        <li><a href="#"><span>Country</span> : United States</a></li>
                        <li><a href="#"><span>Postcode </span> : 36952</a></li>
                    </ul>
                </div>
            </div>
        </div>
		<form action="">
			<div class="order_details_table">
				<h2>Order</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Date</th>
								<th scope="col">Total</th>
								<th scope="col">Detail</th>
							</tr>
						</thead>
						<tbody>
						<?php
						
							$result = $hd->getAllBill($makh);
							while ($set=$result->fetch()):
						?>
							<tr>
								<td>
									<p><?php echo $set['masohd'] ?></p>
								</td>
								<td>
									<p><?php echo $set['ngaydat'] ?></p>
								</td>
								<td>
									<h6><?php echo number_format($set['tongtien']) ?></h6>   
								</td>
								<td>
									<a href="index.php?action=single-product&act=listorderdetail&id=<?php echo $set['masohd'] ?>" class="btn btn-success">Detail</a>
								</td>
							</tr>
						<?php endwhile ?>
						</tbody>
					</table>
				</div>
			</div>
		</form>
    </div>
</section>
<?php endif ?>
<!--================End Order Details Area =================-->