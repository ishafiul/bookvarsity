<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
?>
    <div class="content">
        <div class="content_box">
            <div class="men">
                <div class="register">
                    <form class="user" action="<?php echo URLROOT; ?>/signup" method="post">
                        <div class="register-top-grid">
                            <h1>PERSONAL INFORMATION</h1>
                            <div>
                                <span>First Name<label>*</label></span>
                                <input type="text" name="fname" value="<?php echo $data['f_name'];?>">
                                <span style="color: red"><?php echo $data['f_name_err'];?></span>
                            </div>
                            <div>
                                <span>Last Name<label>*</label></span>
                                <input type="text" name="l_name" value="<?php echo $data['l_name'];?>">
                                <span style="color: red"><?php echo $data['l_name_err'];?></span>
                            </div>
                            <div>
                                <span>Email Address<label>*</label></span>
                                <input type="email" name="mail" value="<?php echo $data['mail'];?>">
                                <span style="color: red"><?php echo $data['mail_err'];?></span>
                            </div>
                            <div>
                                <span>Phone Number<label>*</label></span>
                                <input type="text" name="phone" value="<?php echo $data['phone'];?>">
                                <span style="color: red"><?php echo $data['phone_err'];?></span>
                            </div>
                            <div>
                                <span>Zip Code<label>*</label></span>
                                <input type="text" name="zip" value="<?php echo $data['zip'];?>">
                                <span style="color: red"><?php echo $data['zip_err'];?></span>
                            </div>
                            <div>
                                <span>Address<label>*</label></span>
                                <input type="text" name="address" value="<?php echo $data['address'];?>">
                                <span style="color: red"><?php echo $data['address_err'];?></span>
                            </div>
                            <div class="clearfix"> </div>
                            <a class="news-letter" href="#">
                            </a>
                        </div>
                        <div class="register-bottom-grid">
                            <h2>LOGIN INFORMATION</h2>
                            <div>
                                <span>Password<label>*</label></span>
                                <input type="password" name="pass1" value="<?php echo $data['pass1'];?>">
                                <span style="color: red"><?php echo $data['pass1_err'];?></span>
                            </div>
                            <div>
                                <span class="pass">Confirm Password<label>*</label></span>
                                <input type="password" name="pass2" class="" value="<?php echo $data['pass2'];?>">
                                <span style="color: red"><?php echo $data['pass2_err'];?></span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    <div class="clearfix"> </div>


                        <div class="register-but">
                            <button type="submit" name="signup" class="btn btn-danger">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php require APPROOT . '/views/inc/footer.php'; ?>
        </div>
    </div>
