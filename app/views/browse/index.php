<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';

?>

        <div class="content">
            <div class="content_box">
                <div class="men">
                    <div class="col-md-3 sidebar">
                        <div class="block block-layered-nav">
                            <div class="block-title">
                                <strong><span>Shop By</span></strong>
                            </div>
                            <div class="block-content">

                                <dl id="narrow-by-list">
                                    <dt class="odd">processus</dt>
                                    <dd class="odd">
                                        <ol>
                                            <li>
                                                <a href="<?php
                                                $url='';
                                                if (isset($_GET['perpage']) && !isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&price=0-99';
                                                }
                                                elseif (isset($_GET['sort']) && !isset($_GET['perpage'])){
                                                    $url .='?sort='.$_GET['sort'].'&price=0-99';
                                                }
                                                elseif (isset($_GET['perpage']) && isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'].'&price=0-99';
                                                }
                                                else{
                                                    $url = '?price=0-99';
                                                }
                                                echo $url;
                                                    ?>"><span class="price1">US$&nbsp;0,00</span> - <span class="price1">US$&nbsp;99,99</span></a>
                                            </li>
                                            <li>
                                                <a href="<?php
                                                $url='';
                                                if (isset($_GET['perpage']) && !isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&price=100-199';
                                                }
                                                elseif (isset($_GET['sort'])  && !isset($_GET['perpage'])){
                                                    $url .='?sort='.$_GET['sort'].'&price=100-199';
                                                }
                                                elseif (isset($_GET['perpage']) && isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'].'&price=100-199';
                                                }
                                                else{
                                                    $url = '?price=100-199';
                                                }
                                                echo $url;
                                                ?>"><span class="price1">US$&nbsp;100,00</span> - <span class="price1">US$&nbsp;199,99</span></a>

                                            </li>
                                            <li>
                                                <a href="<?php
                                                $url='';
                                                if (isset($_GET['perpage']) && !isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&price=200-299';
                                                }
                                                elseif (isset($_GET['sort']) && !isset($_GET['perpage'])){
                                                    $url .='?sort='.$_GET['sort'].'&price=200-299';
                                                }
                                                elseif (isset($_GET['perpage']) && isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'].'&price=200-299';
                                                }
                                                else{
                                                    $url = '?price=200-299';
                                                }
                                                echo $url;
                                                ?>"><span class="price1">US$&nbsp;200,00</span> - <span class="price1">US$&nbsp;299,99</span></a>

                                            </li>
                                            <li>
                                                <a href="<?php
                                                $url='';
                                                if (isset($_GET['perpage']) && !isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&price=300-499';
                                                }
                                                elseif (isset($_GET['sort']) && !isset($_GET['perpage'])){
                                                    $url .='?sort='.$_GET['sort'].'&price=300-499';
                                                }
                                                elseif (isset($_GET['perpage']) && isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'].'&price=300-499';
                                                }
                                                else{
                                                    $url = '?price=300-499';
                                                }
                                                echo $url;
                                                ?>"><span class="price1">US$&nbsp;300,00</span> - <span class="price1">US$&nbsp;499,99</span></a>

                                            </li>
                                            <li>
                                                <a href="<?php
                                                $url='';
                                                if (isset($_GET['perpage']) && !isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&price=800-9999999999';
                                                }
                                                elseif (isset($_GET['sort']) && !isset($_GET['perpage'])){
                                                    $url .='?sort='.$_GET['sort'].'&price=800-9999999999';
                                                }
                                                elseif (isset($_GET['perpage']) && isset($_GET['sort'])){
                                                    $url .='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'].'&price=800-9999999999';
                                                }
                                                else{
                                                    $url = '?price=800-9999999999';
                                                }
                                                echo $url;
                                                ?>"><span class="price1">US$&nbsp;800,00</span> and above</a>

                                            </li>
                                        </ol>
                                    </dd>
                                </dl>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="mens-toolbar">

                            <div class="sort">

                                <div class="sort-by">
                                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="sort" method="post">
                                    <label>Sort By</label>
                                        <?php
                                            if (isset($_GET['perpage'])){
                                                ?>
                                                <input type="hidden" value="<?php echo '?perpage='.$_GET['perpage']?>" name="perpageforsort">
                                                <?php
                                            }

                                        ?>
                                    <select name="sort" onchange="this.form.submit()">
                                        <option value="0-1">Default</option>
                                        <option value="1-0">Price : High to Low</option>
                                        <option value="0-1">Price : Low to High</option>
                                    </select>
                                    </form>
                                </div>


                            </div>
                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="perpage" method="post">
                            <div class="pager">
                                <div class="limiter visible-desktop">
                                    <label>Show</label>
                                    <select name="perpage"  onchange="this.form.submit()">
                                        <option value="9">Select</option>
                                        <option value="9"
                                            <?php
                                            if (isset($_GET['perpage']) && $_GET['perpage'] == 9){
                                                echo ' Selected';
                                            }
                                            ?>
                                        >9</option>
                                        <option value="15"
                                            <?php
                                            if (isset($_GET['perpage']) && $_GET['perpage'] == 15){
                                                echo ' Selected';
                                            }
                                            ?>
                                        >15</option>
                                        <option value="30"
                                            <?php
                                            if (isset($_GET['perpage']) && $_GET['perpage'] == 30){
                                                echo ' Selected';
                                            }
                                            ?>
                                        >30</option>
                                    </select> per page

                                </div>
                                <?php
                                $get='';
                                if (isset($_GET['perpage']) && !isset($_GET['price']) && !isset($_GET['sort'])){
                                    $get.='?perpage='.$_GET['perpage'];
                                }
                                elseif (isset($_GET['price']) && !isset($_GET['perpage']) && !isset($_GET['sort'])){
                                    $get.='?price='.$_GET['price'];
                                }
                                elseif (isset($_GET['sort']) && !isset($_GET['perpage']) && !isset($_GET['price'])){
                                    $get.='?sort='.$_GET['sort'];
                                }
                                elseif (isset($_GET['sort']) && isset($_GET['perpage']) && !isset($_GET['price'])){
                                    $get.='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'];
                                }
                                elseif (isset($_GET['sort']) && isset($_GET['price']) && !isset($_GET['perpage'])){
                                    $get.='?sort='.$_GET['sort'].'&price='.$_GET['price'];
                                }
                                elseif (isset($_GET['price']) && isset($_GET['perpage']) && !isset($_GET['sort'])){
                                    $get.='?perpage='.$_GET['perpage'].'&price='.$_GET['price'];
                                }
                                elseif (isset($_GET['price']) && isset($_GET['perpage']) && isset($_GET['sort'])){
                                    $get.='?perpage='.$_GET['perpage'].'&sort='.$_GET['sort'].'&price='.$_GET['price'];
                                    //echo $get;
                                }

                                $helper->paginationuser($data['total_pages'],$data['pageno'],$get);
                                ?>
                                <div class="clearfix"></div>
                            </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row span_2">
                            <?php
                            foreach ($data['products'] as $product){
                            ?>
                                <div class="col-md-4 span_1_of_single1">
                                    <a href="<?php echo URLROOT; ?>/product/<?php echo $product->url?>">
                                        <img src="<?php echo URLROOT; ?>/img/product/<?php echo $product->product_base_img?>" alt="" height="220" width="130"/>
                                        <h3>parum clari</h3>
                                        <p>Duis autem vel eum iriure</p>
                                        <h4>Rs.399</h4>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>