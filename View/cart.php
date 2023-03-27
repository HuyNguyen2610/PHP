<title>Karma Shop -Cart</title>    
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?action=cart">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <form action="index.php?action=cart&act=update_item" method="post">
        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cart = new cart();
                                $car = $cart->CartTotal();
                                if($car<1){
                                ?>
                                    <tr>
                                    <td colspan="5" class="text-center"><h3>You have not added any products to your cart</h3></td>
                                    </tr>
                                <?php 
                                }else{
                                foreach ($_SESSION['cart'] as $key => $item) :
                                ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img style="width:125px" src="Contact\img\product\<?php echo $item['hinh'] ?>" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <h5><?php echo $item['name'] ?></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td><h5><?php echo $item['color'] ?></h5></td>
                                        <td><h5><?php echo $item['size'] ?></h5></td>
                                        <td>
                                            <h5><?php echo number_format($item['dongia']) ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="number" name="newqty[<?php echo $key ?>]" value="<?php echo $item['soluong'] ?>" id="sst" maxlength="12" title="Quantity:" class="input-text qty">
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?php echo number_format($item['total']) ?></h5>
                                        </td>
                                        <td class=""><a href="index.php?action=cart&act=delete_gh&id=<?php echo $key ?>"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                <?php endforeach; }?>
                                <tr class="bottom_button">
                                    <td>
                                        <button type="submit" class="gray_btn" href="#">Update Cart</button>
                                    </td>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" placeholder="Coupon Code">
                                            <a class="primary-btn" href="#">Apply</a>
                                            <a class="gray_btn w-50" href="#">Close Coupon</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php
                                            $gh = new cart();
                                            echo $gh->getTotal();
                                            ?>VNĐ
                                        </h5>
                                    </td>
                                </tr>

                                <tr class="out_button_area">
                                    <td>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn w-75" href="index.php?action=category">Continue Shopping</a>
                                            <a class="primary-btn" href="index.php?action=confirmation">Proceed to checkout</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!--================End Cart Area =================-->