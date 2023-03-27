<title>Karma - User</title>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Edit Profile</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php?action=home">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?action=login&act=editprofile">Edit Profile</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


<section>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usr = new user();
        $result = $usr->getProfile($id);
        $wislist = $usr->getWishListCout($makh);
        $car = new cart();
        $cart = $car->CartTotal();
        $hd = new hoadon();
        $order = $hd->getOrderCout($makh);
        $makh = $result['makh'];
        $username = $result['username'];
        $email = $result['email'];
        $diachi = $result['diachi'];
        $sodt = $result['sodienthoai'];
        $img = $result['img'];
        //change pass
        $newpass = '';
        $pass_error = '';
        $repass = '';
        $repass_error = '';
        $oldpass = '';
        $oldpass_error = '';
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $us = new user();
            $check = $us->ExistUser($email);
        
            if (!$check) {
                $email_error = 'Email is not register';
            } else {
                $oldpass=$_POST['txtpassword'];
                $user = $us->login($email, md5($pass));
                if(!$user){
                    $oldpass_error='Incorrect password';
                }
            }
        }
        if (isset($_POST['matkhau'])) {
            $newpass = $_POST['matkhau'];
            $uppercase = preg_match('@[A-Z]@', $newpass);
            $lowercase = preg_match('@[a-z]@', $newpass);
            $number    = preg_match('@[0-9]@', $newpass);
            $flag = false;
            // Must be a minimum of 8 characters
            if (strlen($newpass) >= 8) {
                // Must contain at least one uppercase character
                if ($uppercase) {
                    // Must contain at least one lowercase character
                    if ($lowercase) {
                        if (!$number) {
                            $pass_error = 'Password must contain a number';
                        }
                    } else {
                        $pass_error = 'Password must contain a lowercase character';
                    }
                } else {
                    $pass_error = 'Password must contain an uppercase character';
                }
            } else {
                $pass_error = 'Password must be at least 8 characters';
            }
        }
        if (isset($_POST['matkhau']) && isset($_POST['renewpassword'])) {
            $newpass = $_POST['matkhau'];
            $repass = $_POST['renewpassword'];
            if ($repass != $newpass) {
                $repass_error = 'Re-enter the password is not the same';
            }
        }
    }
    ?>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5">
                <div class="layout">
                    <div class="profile">
                        <div class="profile__picture">
                        <?php if($img == null) {?>
                                <img src="Contact/img/product/avatar_2x.png" alt="" >
                            <?php } else{ ?>
                            <img src="Contact/img/product/<?php echo $img ?>" alt=""/>
                            <?php } ?>
                            </div>
                            <div class="profile__header">
                                <div class="profile__account">
                                    <h4 class="profile__username"><?php echo $username ?></h4>
                                </div>
                            </div>
                            <div class="profile__stats">
                            <div class="profile__stat">
                                <div class="profile__icon "><a href="index.php?action=cart" class="profile__icon--gold"><i class="fa-solid fa-bag-shopping"></i></a></div>
                                    <div class="profile__value"><?php if($cart=0){echo "0";}else{ echo $cart ;} ?>
                                    <div class="profile__key">Cart</div>
                                </div>
                            </div>
                            <div class="profile__stat">
                                <div class="profile__icon profile__icon--blue"><a href="index.php?action=single-product&act=listorder"><i class="fas fa-money-check"></i></a></div>
                                    <div class="profile__value"><?php echo $order ?>
                                    <div class="profile__key">Order</div>
                                </div>
                            </div>
                            <div class="profile__stat">
                                <div class="profile__icon"><a href="index.php?action=single-product&act=favorite" class="profile__icon--pink"><i class="fas fa-heart"></i></a></div>
                                    <div class="profile__value"><?php echo $wislist ?>
                                    <div class="profile__key">Likes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 mb-lg-0 shadow p-3 mb-5 bg-white rounded-3 border-0">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"> Full Name</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6 class="mb-0"> : </h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="text-muted mb-0">
                                        <?php echo $username ?>
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6 class="mb-0"> : </h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="text-muted mb-0">
                                        <?php echo $email ?>
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6 class="mb-0"> : </h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="text-muted mb-0">
                                        <?php echo $sodt ?>
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-1">
                                    <h6 class="mb-0"> : </h6>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="text-muted mb-0">
                                        <?php echo $diachi ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card mt-4 mb-lg-0 shadow p-3 mb-5 bg-white rounded-3 border-0">
                    <h3>Update Password</h3>
                    <div class="card-body">
                    <form action="index.php?action=login&act=changepass_action&id=<?php echo $id ?>" method="post" enctype="multipart/form-data" >
                        <input type="text" id="form2Example1" class="form-control" value="<?php if (isset($makh))
                                echo $makh; ?>" name="makh" hidden/>

                        <input type="email" id="form2Example1" class="form-control" value="<?php if (isset($email))
                                echo $email; ?>" name="email"
                            hidden />

                        <div class="form-outline mb-4">
                            <input type="password" id="form2Example1" class="form-control"  name="txtpassword"/>
                            <label class="form-label" for="form2Example1">Old Password</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="form2Example1" class="form-control"  name="matkhau" />
                            <label class="form-label" for="form2Example1">New Password</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="form2Example1" class="form-control"  name="renewpassword" />
                            <label class="form-label" for="form2Example1">Re New Password</label>
                        </div>
                        <!-- Submit button -->
                        <div class='text-right'>
                            <button type="submit" class="btn btn-primary mb-4 w-25">Update</button>
                        </div>
                    </form>
                        </div>
                    </div>
            </div>
            <div class="col-lg-7 mt-4 mb-lg-0 ">
                <div class="shadow p-3 mb-5 bg-white rounded-3 border-0">
                <h1>Edit Profile</h1> <br>
                <form action="index.php?action=login&act=profile_action&id=<?php echo $id ?>" method="post" enctype="multipart/form-data" >
                        <input type="text" id="form2Example1" class="form-control" value="<?php if (isset($makh))
                                echo $makh; ?>" name="makh" hidden/>
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" value="<?php if (isset($username))
                                echo $username; ?>" name="username" />
                        <label class="form-label" for="form2Example1">Full Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" class="form-control" value="<?php if (isset($email))
                                echo $email; ?>" name="email"
                            readonly />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" value="<?php if (isset($sodt))
                                echo $sodt; ?>" name="sodienthoai"/>
                        <label class="form-label" for="form2Example1">Number Phone</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" value="<?php if (isset($diachi))
                                echo $diachi; ?>" name="diachi" />
                        <label class="form-label" for="form2Example1">Address</label>
                    </div>
                    <div class="card mb-4 rounded-3">
                        <div class="card-body text-center">
                            <div class='row'>
                                <div class='col-3'>
                                    <label for="formFileLg" class="form-label">
                                    <?php if($img == null) {?>
                                <img src="Contact/img/product/avatar_2x.png" id="blah" alt="avatar" class="rounded-circle img-fluid" style="width: 100px;">
                                <?php } else{ ?>
                                    <img src="Contact/img/product/<?php echo $img ?>" id="blah" alt="avatar" class="rounded-circle img-fluid" style="width: 100px;">
                                <?php } ?>
                                    </label>
                                </div>
                                <div class="col-9" style="margin-top:35px">
                                    <input type="file" class="form-control" id="imgInp" name="img" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class='text-right'>
                            <button type="submit" class="btn btn-primary mb-4 w-25">Update</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>