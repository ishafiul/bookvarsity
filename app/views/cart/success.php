<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
?>
<div class="content">
    <div class="content_box">
        <br>
        <br>
        <?php
        if (!empty($data['transiction'])){
             ?>
            <div class="alert alert-success" role="alert">
               <?php echo $data['transiction']?>
            </div>
        <?php
        }
        else{
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $data['transiction_err']?>
            </div>
        <?php
        }
        ?>
        <br>
        <br>
        <?php require APPROOT . '/views/inc/footer.php'; ?>
    </div>
</div>