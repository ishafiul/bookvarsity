<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
?>
<div class="content">
    <div class="content_box">

        <?php
        if(empty($data)){

        ?>
        <div class="men cart">
            <h1>It appears that your cart is currently empty!</h1>
            <h2>You can continue browsing <a href="<?php echo URLROOT; ?>">here</a>.</h2>
        </div>
        <?php
        }
        else{
        ?>
            <br>
        <table class="table">
            <thead>

                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $totalPrice = 0;
            foreach ($data['cart'] as $cart){
            ?>
            <tr>
                <td><img src="<?php echo URLROOT; ?>/img/product/<?php echo $cart->product_base_img?>" alt="" width="100px"></td>
                <td><?php echo $cart->product_name?></td>
                <td>$<?php echo $cart->price?></td>
                <td>
                    <form class="user" action="<?php echo URLROOT; ?>/cart" method="post">
                    <input type="hidden" name="id" value="<?php echo $cart->id?>">
                    <button type="submit" name="deleteCart" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
                <?php
                $totalPrice += intval($cart->price);
            }
            ?>

            </tbody>
        </table>
        <div>
            <h2>Total: $<?php echo $totalPrice?></h2>
            <a href="<?php echo URLROOT; ?>/cart/Checkout" class="btn btn-danger">Checkout Now!</a>
        </div>
    </div>
            <br>
            <br>
            <br>
            <hr>
        <?php
        }
        ?>
        <?php require APPROOT . '/views/inc/footer.php'; ?>
    </div>
</div>
