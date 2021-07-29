
        <div class="header_top">
            <div class="col-sm-9 h_menu4">
                <ul class="megamenu skyblue">
                    <li class="active grid"><a class="color8" href="index.html">New</a></li>
                    <?php
                    $helper = new HelperFunction();
                    foreach ($data['primary_cat'] as $primary){
                    ?>
                    <li><a class="color1" href="#"><?php echo $primary->name?></a><div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <ul>
                                            <?php

                                            $i = 0;
                                            $count=[];
                                            foreach ($data['child'] as $child){

                                                if ( $child->parentsof == $primary->id){

                                                    $count[$i] = [
                                                        'name'=>$child->name,
                                                        'id'=>$child->id
                                                    ];
                                                    $i++;
                                                }

                                            }
                                            if($i>1){

                                                $mid = $helper->calculate_median($count);
                                                for($i=0;$i<$mid;$i++){
                                                    ?>
                                                    <li><a href="<?php echo URLROOT; ?>/browse/category/<?php echo $count[$i]['id']?>"><?php  echo $count[$i]['name'];?></a></li>
                                                    <?php
                                                }
                                            }
                                            elseif ($i == 0){

                                            }
                                            else{
                                            ?>
                                            <li><a href="<?php echo URLROOT; ?>/browse/category/<?php echo $count[0]['id']?>"><?php  echo $count[0]['name'];?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <ul>
                                            <?php

                                            $icount = 0;
                                            $count=[];
                                            foreach ($data['child'] as $child){

                                                if ( $child->parentsof == $primary->id){

                                                    $count[$icount] = [
                                                        'name'=>$child->name,
                                                        'id'=>$child->id
                                                    ];
                                                    $icount++;
                                                }

                                            }
                                            $mid = $helper->calculate_median($count);
                                            if($i>1){
                                            for($i=3;$i<$icount;$i++){
                                                ?>
                                                <li><a href="<?php echo URLROOT; ?>/browse/category/<?php echo $count[$i]['id']?>"><?php  echo $count[$i]['name'];?></a></li>
                                                <?php
                                            }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>Popular Author</h4>
                                        <ul>
                                            <?php
                                            foreach ($data['brands'] as $brand){
                                                if ($brand->category_id == $primary->id){
                                                    ?>
                                                    <li><a href="<?php echo URLROOT; ?>/browse/brand/<?php echo $brand->id?>"><?php echo $brand->name?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    <li><a class="color6" href="<?php echo URLROOT; ?>/pages/contact">Conact</a></li>
                </ul>
            </div>
            <div class="col-sm-2 header-top-right">

                <div class="register-info">
                    <ul>
                        <?php
                        if (isset($_SESSION['user_id'])){
                        ?>
                            <li>
                                <a href="<?php echo URLROOT; ?>/profile"><i class="far fa-user"></i> <?php
                                    echo $_SESSION['user_name'];
                                    ?></a>
                                <a href="<?php echo URLROOT; ?>/login/logout">Logout</a>
                            </li>
                        <?php
                        }
                        else{
                        ?>
                            <li><a href="<?php echo URLROOT; ?>/login">Login</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="header_bootm">
            <div class="col-sm-4 span_1">
                <div class="logo">
                    <a href="<?php echo URLROOT; ?>/index"><img src="<?php echo URLROOT.'/public/img/'.$data['info'][0]->logo; ?>" width="50px" alt=""/></a>
                </div>
            </div>
            <div class="col-sm-8 row_2">
                <div class="header_bottom_right">
                    <div class="search">
                        <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
                        <input type="submit" value="">
                    </div>
                    <ul class="bag">
                        <a href="<?php echo URLROOT; ?>/cart"><i class="bag_left"> </i></a>
                        <a href="<?php echo URLROOT; ?>/cart"><li class="bag_right"><p>

                                    <?php
                                    if (isset($_SESSION['cart'])){
                                        echo count($_SESSION['cart']);
                                    }
                                    else{
                                        echo '0';
                                    }
                                    ?>
                                </p> </li></a>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

