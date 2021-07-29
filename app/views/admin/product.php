<?php
if (!isset($_SESSION['user_name_admin'])){
    redirect('admins/login');
}
$helpers = new HelperFunction();
require_once 'inc/header.php';
?>

    <span class="text-success"><?php echo $data['product_succ'];?></span>
<?php
reloadflash('product_succ');
?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo URLROOT; ?>/admins/products" method="post" enctype="multipart/form-data">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Product</h4>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Name</label>
                        <br>
                        <span class="text-danger"><?php echo $data['name_err'];?></span>
                        <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price (USD-$)</label>
                        <br>
                        <span class="text-danger"><?php echo $data['price_err'];?></span>
                        <input type="text" name="price" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['price'];?>">
                    </div>
                    <div class="form-group">
                        <label>Short Info</label>
                        <textarea class="editor" name="short_info"  rows="15"><?php echo $data['short_info'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Details</label>
                        <textarea class="editor" name="details" rows="15"><?php echo $data['details'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>More Info</label>
                        <textarea class="editor" name="more_info" rows="15"><?php echo $data['more_info'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category</label>
                        <br>
                        <span class="text-danger"><?php echo $data['category_err'];?></span>
                        <select name="category" class="form-control <?php echo (!empty($data['category_err'])) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">
                            <option value="0">Select</option>
                            <?php
                            foreach ($data['childCategory'] as $Child){

                                ?>
                                <option value="<?php echo $Child->id?>" <?php if ($data['category'] == $Child->id){echo 'selected';}?>><?php echo $Child->name?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Brand</label>
                        <br>
                        <span class="text-danger"><?php echo $data['brand_err'];?></span>
                        <select name="brand" class="form-control <?php echo (!empty($data['brand_err'])) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">
                            <option value="0">Select</option>
                            <?php
                            foreach ($data['brands'] as $brand){

                                ?>
                                <option value="<?php echo $brand->id?>" <?php if ($data['brand'] == $brand->id){echo 'selected';}?>><?php echo $brand->name?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <label for="exampleFormControlSelect1">Upload Photo</label>
                    <br>
                    <span class="text-danger"><?php echo $data['upload_img_err'];?></span>
                    <div class="input-group">
                        <div class="custom-file">

                            <input type="file" name="productImg[]" multiple="" class="custom-file-input  <?php echo (!empty($data['upload_img_err'])) ? 'is-invalid' : ''; ?>">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>
                    <br>

                    <label for="exampleFormControlSelect1">Upload PDF</label>
                    <br>
                    <span class="text-danger"><?php echo $data['upload_img_err'];?></span>
                    <div class="input-group">
                        <div class="custom-file">

                            <input type="file" name="pdf" class="custom-file-input  <?php echo (!empty($data['upload_img_err'])) ? 'is-invalid' : ''; ?>">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>
                    <br>

                    <div class="d-flex justify-content-end">
                        <button type="submit" name="addProduct" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
            <br>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top Product</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Price</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data['top_featured'] as $products){
                            ?>
                        <form action="<?php echo URLROOT; ?>/admins/products" method="post">
                            <tr>

                                <th scope="row"><?php echo $products->id?></th>
                                <td><?php echo $products->product_name?></td>
                                <td><?php echo $products->cat_name?></td>
                                <td><?php echo $products->brand_name?></td>
                                <td>$<?php echo $products->price?></td>
                                <td>
                                    <?php if ($data['top_featured']){
                                        ?>
                                        <button type="submit" name="removeTopF" class="btn btn-warning">Remove Top Featured</button>
                                        <br>
                                        <br>
                                        <?php

                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="<?php echo URLROOT; ?>/admins/editproduct/<?php echo $products->url; ?>" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="id" value="<?php echo $products->id?>">
                                    <button type="submit" name="deleteProduct" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>
                        </form>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <hr>
                    <h4 class="card-title">Bottom Product</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Price</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data['bottom_featured'] as $products){
                            ?>
                        <form action="<?php echo URLROOT; ?>/admins/products" method="post">
                            <tr>

                                <th scope="row"><?php echo $products->id?></th>
                                <td><?php echo $products->product_name?></td>
                                <td><?php echo $products->cat_name?></td>
                                <td><?php echo $products->brand_name?></td>
                                <td>$<?php echo $products->price?></td>
                                <td>
                                    <?php if ($data['bottom_featured']){
                                        ?>
                                        <button type="submit" name="removeBottomF" class="btn btn-warning">Remove Bottom Featured </button>
                                        <?php

                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="<?php echo URLROOT; ?>/admins/editproduct/<?php echo $products->url; ?>" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="id" value="<?php echo $products->id?>">
                                    <button type="submit" name="deleteProduct" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>
                        </form>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <hr>
                    <br>
                    <h4 class="card-title">All Product</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Price</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data['products'] as $products){
                            ?>
                        <form action="<?php echo URLROOT; ?>/admins/products" method="post">
                            <tr>

                                <th scope="row"><?php echo $products->id?></th>
                                <td><?php echo $products->product_name?></td>
                                <td><?php echo $products->cat_name?></td>
                                <td><?php echo $products->brand_name?></td>
                                <td>$<?php echo $products->price?></td>
                                <td>
                                    <?php if ($products->add_to_home == 0){
                                    ?>
                                    <button type="submit" name="addToHome" class="btn btn-success">Add to Home</button>
                                        <?php

                                    }
                                    else{
                                       ?>
                                        <button type="submit" name="removeFromHome" class="btn btn-warning">Remove From Home</button>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <?php if (!$data['top_featured'] && $products->add_to_home == 0){
                                        ?>
                                        <button name="addTopF" type="submit" class="btn btn-primary">Top Featured</button>
                                        <br>
                                        <br>
                                        <?php

                                    }
                                    ?>
                                    <?php if (!$data['bottom_featured'] && $products->add_to_home == 0){
                                        ?>
                                        <button type="submit" name="addBottomF" class="btn btn-primary">Bottom Featured </button>
                                        <?php

                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="<?php echo URLROOT; ?>/admins/editproduct/<?php echo $products->url; ?>" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="id" value="<?php echo $products->id?>">
                                    <button type="submit" name="deleteProduct" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </td>


                            </tr>
                        </form>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    $helpers->pagination($data['total_pages'],$data['pageno']);
                    ?>
                </div>
            </div>
            <br>
        </div>
    </div>
    <script type="text/javascript">
        tinymce.init({
            selector: '.editor',
        });
    </script>
<?php
require_once 'inc/footer.php';
?>