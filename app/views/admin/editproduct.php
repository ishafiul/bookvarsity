<?php
if (!isset($_SESSION['user_name_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
$product = $data['products'][0];
?>
    <span class="text-success"><?php echo $data['product_succ'];?></span>
<?php
reloadflash('product_succ');
?>
    <div class="card">
        <div class="card-body">

            <?php
            foreach ($data['img'] as $img ){
                ?>
            <form action="<?php echo URLROOT; ?>/admins/editproduct/<?php  echo $product->url;?>" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6">
                        <img src="<?php echo URLROOT.'/img/product/'.$img->img; ?>" alt="" width="100px">
                    </div>
                    <div class="col-md-6">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $img->id?>"><i class="fas fa-edit"></i></button>
                        <input type="hidden" name="imgId" value="<?php echo $img->id?>">
                        <input type="hidden" name="imgName" value="<?php echo $img->img?>">
                        <button type="submit" name="deleteImg" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                        <div class="modal fade" id="exampleModalCenter<?php echo $img->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Slider Image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center">
                                                <img src="<?php echo URLROOT.'/img/product/'.$img->img; ?>" alt="" width="350px">
                                            </div>
                                            <br>
                                            <h6>Upload New Image For This</h6>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="img" class="custom-file-input <?php echo (!empty($data['slider_err_edit'])) ? 'is-invalid' : ''; ?>">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="editImg" class="btn btn-primary">Save changes</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </form>
                <?php
            }
            ?>
            <form action="<?php echo URLROOT; ?>/admins/editproduct/<?php  echo $product->url;?>" method="post" enctype="multipart/form-data">

            <h4 class="card-title">Edit Product Details</h4>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php  echo $product->product_name;?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price (USD-$)</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php  echo $product->price;?>">
            </div>
            <div class="form-group">
                <label>Short Info</label>
                <textarea class="editor" name="short_info"  rows="15"><?php  echo $product->short_info;?></textarea>
            </div>
            <div class="form-group">
                <label>Product Details</label>
                <textarea class="editor" name="details" rows="15"><?php  echo $product->product_details;?></textarea>
            </div>
            <div class="form-group">
                <label>More Info</label>
                <textarea class="editor" name="more_info" rows="15"><?php  echo $product->more_info;?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select name="category" class="form-control" id="exampleFormControlSelect1">
                    <option value="0">Select</option>
                    <?php
                    foreach ($data['childCategory'] as $Child){

                        ?>
                        <option value="<?php echo $Child->id?>" <?php if ($product->category == $Child->id){echo 'selected';}?>><?php echo $Child->name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Brand</label>
                <select name="brand" class="form-control" id="exampleFormControlSelect1">
                    <option value="0">Select</option>
                    <?php
                    foreach ($data['brands'] as $brand){

                        ?>
                        <option value="<?php echo $brand->id?>" <?php if ($product->brand == $brand->id){echo 'selected';}?>><?php echo $brand->name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <label for="exampleFormControlSelect1">Upload More Photo</label>
            <div class="input-group">

                <div class="custom-file">
                    <input type="file" name="productImg[]" multiple="" class="custom-file-input">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-end">
                <button type="submit" name="editProduct" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <br>
    <script type="text/javascript">
        tinymce.init({
            selector: '.editor',
        });
    </script>
    </form>
<?php
require_once 'inc/footer.php';
?>