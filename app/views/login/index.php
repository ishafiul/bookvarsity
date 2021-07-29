<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
?>
        <div class="content">
            <div class="content_box">
                <div class="men">
                    <div class="account-in">
                        <h2>Account</h2>
                        <?php flash('register_success');
                        ?>
                        <br>
                        <div class="col-md-7 account-top">
                            <form class="user" action="<?php echo URLROOT; ?>/login" method="post">
                                <div>
                                    <span>Email*</span>
                                    <input type="text" name="username" value="<?php echo $data['username'];?>">
                                    <span style="color: red"><?php echo $data['username_err'];?></span>
                                </div>
                                <div>
                                    <span class="pass">Password*</span>
                                    <input type="password" name="password" value="<?php echo $data['password'];?>">
                                    <span style="color: red"><?php echo $data['password_err'];?></span>
                                </div>
                                <input type="submit" value="Login">
                            </form>
                        </div>
                        <div class="col-md-5 left-account ">
                            <a href="single.html"><img class="img-responsive " src="images/s4.jpg" alt=""></a>
                            <div class="five-in">
                                <h1>25% </h1><span>discount</span>
                            </div>
                            <a href="<?php echo URLROOT; ?>/signup" class="create">Create an account</a>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>