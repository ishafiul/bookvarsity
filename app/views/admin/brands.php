<?php
if (!isset($_SESSION['user_name_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
?>
<div class="container">
       <div class="card">
           <form action="<?php echo URLROOT; ?>/admins/brands" method="post">
           <div class="card-body">
               <?php
               reloadflash('brand_succ');
               ?>
               <h4 class="card-title">Add Author</h4>
               <div class="form-group">
                   <label for="exampleInputPassword1">Author Name</label>
                   <br>
                   <span class="text-danger"><?php echo $data['brand_Name_err'];?></span>
                   <span class="text-success"><?php echo $data['brand_succ'];?></span>
                   <input type="text" name="brandName" class="form-control <?php echo (!empty($data['brand_Name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['brand_name'];?>" id="exampleInputPassword1" >
               </div>
               <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Primary Category</label>
                   <br>
                   <span class="text-danger"><?php echo $data['cat_select_err'];?></span>
                   <span class="text-danger"><?php echo $data['cat_select_err'];?></span>
                   <select name="selectCat" class="form-control <?php echo (!empty($data['cat_select_err'])) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">
                       <option value="0">Select</option>
                       <?php
                       foreach ($data['primaryCategory'] as $primary){

                           ?>
                           <option value="<?php echo $primary->id?>"><?php echo $primary->name?></option>
                           <?php
                       }
                       ?>
                   </select>
               </div>
               <div class="d-flex justify-content-end">
                   <button type="submit" name="addBrand" class="btn btn-primary">Submit</button>
               </div>
               <hr>
               <h4 class="card-title">All Author</h4>
               <?php
               foreach ($data['brands'] as $brands){
                   ?>
                   <div class="row">
                       <div class="col-md-4">
                           <h4><?php echo $brands->name?></h4>
                       </div>
                       <div class="col-md-4">
                           <h4>Category Name : <?php echo $brands->cat_name?></h4>
                       </div>
                       <div class="col-md-4">
                               <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $brands->id?>"><i class="fas fa-edit"></i></button>

                               <input type="hidden" name="id" value="<?php echo $brands->id?>">
                               <button type="submit" name="deletebrand" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                       </div>
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalCenter<?php echo $brands->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Edit Category Name</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                           <div class="form-group">
                                               <label for="exampleInputPassword1">Enter New Category Name</label>
                                               <input type="hidden" name="editid" value="<?php echo $brands->id?>">
                                               <input type="text" name="editBrandName" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $brands->name?>">
                                           </div>
                                           <div class="form-group">
                                               <label for="exampleFormControlSelect1">Select Primary Category</label>
                                               <select name="selectEditCat" class="form-control" id="exampleFormControlSelect1">
                                                   <option value="0">Select</option>
                                                   <?php
                                                   foreach ($data['primaryCategory'] as $primary){

                                                       ?>
                                                       <option value="<?php echo $primary->id?>" <?php if ($primary->id ==$brands->category_id){echo 'selected';}?>><?php echo $primary->name?></option>
                                                       <?php
                                                   }
                                                   ?>
                                               </select>
                                           </div>

                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" name="editBrands" class="btn btn-primary">Save changes</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <hr>
                   <?php
               }
               ?>
           </div>
    </form>
       </div>
</div>
<?php
require_once 'inc/footer.php';
?>