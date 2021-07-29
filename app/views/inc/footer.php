<div class="footer_top">
    <div class="span_of_4">
        <div class="col-md-3 box_4">
            <h4>Shop</h4>
            <ul class="f_nav">
                <li><a href="#">new arrivals</a></li>
                <li><a href="#">men</a></li>
                <li><a href="#">women</a></li>
                <li><a href="#">accessories</a></li>
                <li><a href="#">kids</a></li>
                <li><a href="#">brands</a></li>
                <li><a href="#">trends</a></li>
                <li><a href="#">sale</a></li>
                <li><a href="#">style videos</a></li>
            </ul>
        </div>
        <div class="col-md-3 box_4">
            <h4>help</h4>
            <ul class="f_nav">
                <li><a href="#">frequently asked  questions</a></li>
                <li><a href="#">men</a></li>
                <li><a href="#">women</a></li>
                <li><a href="#">accessories</a></li>
                <li><a href="#">kids</a></li>
                <li><a href="#">brands</a></li>
            </ul>
        </div>
        <div class="col-md-3 box_4">
            <h4>account</h4>
            <ul class="f_nav">
                <li><a href="#">login</a></li>
                <li><a href="#">create an account</a></li>
                <li><a href="#">create wishlist</a></li>
                <li><a href="#">my shopping bag</a></li>
                <li><a href="#">brands</a></li>
                <li><a href="#">create wishlist</a></li>
            </ul>
        </div>
        <div class="col-md-3 box_4">
            <h4>popular</h4>
            <ul class="f_nav">
                <li><a href="#">new arrivals</a></li>
                <li><a href="#">men</a></li>
                <li><a href="#">women</a></li>
                <li><a href="#">accessories</a></li>
                <li><a href="#">kids</a></li>
                <li><a href="#">brands</a></li>
                <li><a href="#">trends</a></li>
                <li><a href="#">sale</a></li>
                <li><a href="#">style videos</a></li>
                <li><a href="#">login</a></li>
                <li><a href="#">brands</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- start span_of_2 -->
    <div class="span_of_2">
        <div class="span1_of_2">
            <h5>need help? <a href="<?php echo URLROOT; ?>/pages/contact">contact us <span> &gt;</span> </a> </h5>
            <p>(or) Call us: <?php echo $data['info'][0]->main_phone?></p>
        </div>
        <div class="span1_of_2">
            <h5>follow us </h5>
            <div class="row" >
                <div class="col-md-4"><a href="<?php echo $data['info'][0]->fb?>" style="color: #858796;font-size: 2.5em;"><i class="fab fa-facebook"></i></a></div>
                <div class="col-md-4"><a href="<?php echo $data['info'][0]->tw?>" style="color: #858796;font-size: 2.5em;"><i class="fab fa-twitter"></i></a></div>
                <div class="col-md-4"><a href="<?php echo $data['info'][0]->ig?>" style="color: #858796;font-size: 2.5em;"><i class="fab fa-instagram-square"></i></a></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="copy">
        <p>© <?php echo date("Y"); ?> All Rights Reseverd by <?php echo $data['info'][0]->title?> </p>
    </div>
</div>
</div>
</div>
<link href="<?php echo URLROOT; ?>/public/css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="<?php echo URLROOT; ?>/public/js/jquery.flexslider.js"></script>
<script defer src="<?php echo URLROOT; ?>/public/js/main.js"></script>
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
</body>
</html>