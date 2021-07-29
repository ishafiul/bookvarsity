<?php
require_once APPROOT . '/views/inc/header.php';
require_once APPROOT . '/views/inc/navbar.php';
?>
        <div class="content">
            <div class="content_box">
                <div class="men">
                    <h1 class="contact_head">Our Address</h1>
                    <div class="contact_box">
                        <?php
                        foreach ($data['office'] as $office){
                        ?>
                        <div class="col-sm-4">
                            <address class="addr">
                                <p>
                                    <?php
                                    echo $office->address;
                                    ?>
                                </p>
                                <dl>
                                    <dt>Freephone:</dt>
                                    <dd> <?php
                                        echo $office->mobile;
                                        ?></dd>
                                </dl>
                                <dl>
                                    <dt>Telephone:</dt>
                                    <dd> <?php
                                        echo $office->telephone;
                                        ?></dd>
                                </dl>
                                <dl>
                                    <dt>FAX:</dt>
                                    <dd> <?php
                                        echo $office->fax;
                                        ?></dd>
                                </dl>
                                <p>E-mail:
                                    <a href="#">  <?php
                                        echo $office->email;
                                        ?></a>
                                </p>
                            </address>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="contact_form">
                        <h2>Contact Form</h2>
                        <form>
                            <div class="row_5">
                                <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                                <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:20px">
                                <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" style="margin-left:20px">
                                <div class="clearfix"></div>
                            </div>
                            <div class="row_6">
                                <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message:</textarea>
                            </div>
                            <input name="submit" type="submit" id="submit" value="Send Message">
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
<?php
require_once APPROOT . '/views/inc/footer.php';
?>