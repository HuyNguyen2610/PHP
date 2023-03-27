
<?php
  if (!isset($_SESSION['makh']) || isset($_SESSION['cart'])==0):
    echo '<script>alert("You are not logged in")</script>';
    include 'login.php'
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
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = $o->getCTHoaDon($_SESSION['sohd']);
                        while ($set=$result->fetch()):
                    ?>
                        <tr>
                            <td>
                                <p><?php echo $set['tenhh'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $set['soluongmua'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $set['size'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $set['mausac'] ?></p>   
                            </td>
                            <td>
                                <h6><?php echo number_format($set['dongia']) ?></h6>   
                            </td>
                        </tr>
                    <?php endwhile ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><h4>Total</h4></td>
                            <td></td>
                            <td>
                                <h5>
                                    <?php
                                    $gh = new cart();
                                    echo $gh->getTotal();
                                    ?>
                                </h5>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php endif ?>
<!--================End Order Details Area =================-->