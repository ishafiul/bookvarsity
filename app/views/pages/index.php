<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
?>
        <div class="grid_1">
            <div class="col-md-3 banner_left">
                <img src="<?php
                if (!empty($data['top_f'])) {
                    echo 'data:image/png;base64,' . $data['product_img_top'][0]->base64;
                }
                ?>" class="img-responsive" alt=""/>
                <div class="banner_desc">
                    <h1><?php
                        if (!empty($data['top_f'])) {
                            echo $data['top_f'][0]->product_name;
                        }
                        ?> </h1>
                    <h2><?php
                        if (!empty($data['top_f'])) {
                        foreach ($data['child'] as $ctaegory){
                        if ($ctaegory->id == $data['top_f'][0]->category) {
                            echo $ctaegory->name;
                        }
                        }
                        }?></h2>
                    <h5>$<?php
                        if (!empty($data['top_f'])) {
                            echo $data['top_f'][0]->price;

                        }?>
                        <small>Only</small>
                    </h5>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <input type="hidden" name="id" value="<?php if (!empty($data['top_f'])) {
                            echo $data['top_f'][0]->id;

                        }?>">
                    <button class="btn1 btn4 btn-1 btn1-1b" type="submit" name="addToCart">Add To Cart</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9 banner_right">
                <!-- FlexSlider -->
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                            foreach ($data['slider'] as $slider){
                            ?>
                            <li><img src="<?php echo URLROOT.'/img/slider/'.$slider->img; ?>" alt=""/></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </section>
                <!-- FlexSlider -->
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content">
            <div class="content_box">
                <ul class="grid_2">
                    <?php
                    if (!empty($data['home_product'])){
                        foreach ($data['home_product'] as $product){

                    ?>
                    <a href="<?php echo URLROOT; ?>/product/<?php echo $product->url?>"><li><img src="<?php echo 'data:image/png;base64,'.$product->product_base_img ?>" class="img-responsive" alt=""/>
                            <span class="btn5">$<?php echo $product->price?></span>
                            <p><?php echo $product->product_name?></p>
                        </li></a>
                    <?php
                        }
                    }
                    ?>
                    <div class="clearfix"> </div>
                </ul>
                <div class="grid_3">
                    <div class="col-md-6 box_2">
                        <div class="section_group">
                            <div class="col_1_of_2 span_1_of_2">
                                <img src="<?php echo URLROOT.'/img/'.$data['info'][0]->featurImg1; ?>" class="img-responsive" alt=""/>
                            </div>
                            <div class="col_1_of_2 span_1_of_2">
                                <img src="<?php echo URLROOT.'/img/'.$data['info'][0]->featurImg2; ?>" class="img-responsive" alt=""/>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box_3">
                            <div class="col_1_of_2 span_1_of_2 span_3">
                                <br>
                                <h3><?php
                                    if (!empty($data['bottom_f'])){
                                    echo $data['bottom_f'][0]->product_name;
                                    }
                                    ?>
                                   </h3>
                                <h4>$<?php
                                    if (!empty($data['bottom_f'])){
                                        echo $data['bottom_f'][0]->price;
                                    }
                                    ?></h4>
                                <br>
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                    <input type="hidden" name="id" value="<?php if (!empty($data['bottom_f'])) {
                                        echo $data['bottom_f'][0]->id;

                                    }?>">
                                    <button class="btn1 btn6 btn-1 btn1-1b" type="submit" name="addToCart">Add To Cart</button>
                                </form>
                            </div>
                            <div class="col_1_of_2 span_1_of_2 span_4">
                                <div class="span_5">
                                    <img src="<?php if (!empty($data['bottom_f'])){ echo 'data:image/png;base64,' . $data['product_img_bottom'][0]->base64;}?>" class="img-responsive" alt=""/>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <?php require APPROOT . '/views/inc/footer.php'; ?>
            </div>
        </div>
        <link href="<?php echo URLROOT; ?>/css/flexslider.css" rel='stylesheet' type='text/css' />
        <script defer src="<?php echo URLROOT; ?>/js/jquery.flexslider.js"></script>

        <script type="text/javascript">
            $(function(){
                SyntaxHighlighter.all();
            });
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>

