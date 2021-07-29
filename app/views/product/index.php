<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
?>


        <div class="content">
            <div class="content_box">
                <div class="men">
                    <div class="single_top">
                        <div class="col-md-9 single_right">
                            <div class="grid images_3_of_2">
                                <ul id="etalage">
                                    <?php
                                    foreach ($data['img'] as $img){

                                    ?>
                                    <li>
                                        <a href="optionallink.html">
                                            <img class="etalage_thumb_image" src="<?php echo URLROOT; ?>/img/product/<?php echo $img->img?>" class="img-responsive" />
                                            <img class="etalage_source_image" src="<?php echo URLROOT; ?>/img/product/<?php echo $img->img?>" class="img-responsive" title="" />
                                        </a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="desc1 span_3_of_2">
                                <h1><?php echo $data['products'][0]->product_name?></h1>
                                <p class="m_5">Rs. <?php echo $data['products'][0]->price?></p>
                                <div class="btn_form">
                                    <form action="<?php echo URLROOT; ?>/product/<?php echo $data['products'][0]->url?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $data['products'][0]->id?>">
                                        <input type="hidden" name="url" value="<?php echo $data['products'][0]->url?>">
                                        <input type="submit" value="Add To Cart"  name="addToCart">
                                    </form>
                                </div>
                                <p class="m_text2"><?php echo $data['products'][0]->short_info?></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="toogle">
                        <h2>Product Details</h2>
                        <p class="m_text2"><?php echo $data['products'][0]->product_details?></p>
                    </div>
                    <div class="toogle">
                        <h2>More Information</h2>
                        <p class="m_text2"><?php echo $data['products'][0]->more_info?></p>
                    </div>
                    <h4 class="head_single">Related Products</h4>
                    <div class="single_span_3">
                        <?php
                        foreach ($data['related_products'] as $relatedProducts){
                        ?>
                            <a href="<?php echo URLROOT; ?>/product/<?php echo $relatedProducts->url?>">
                        <div class="col-sm-3 span_4">
                            <img src="<?php echo URLROOT; ?>/img/product/<?php echo $relatedProducts->product_base_img?>" class="img-responsive" alt=""/>
                            <h3><?php echo $relatedProducts->product_name?></h3>
                            <h4>$<?php echo $relatedProducts->price?></h4>
                        </div>
                            </a>
                        <?php
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <?php require APPROOT . '/views/inc/footer.php'; ?>

