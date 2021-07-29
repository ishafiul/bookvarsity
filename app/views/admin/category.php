<?php
if (!isset($_SESSION['user_name_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
?>
    <div class="row">
        <div class="col-md-6">
            <!---->
            <div class="card">
                <div class="card-body">
                    <?php
                    reloadflash('categoryP_success');
                    ?>
                    <h4 class="card-title">Add Primary Category</h4>

                    <form action="<?php echo URLROOT; ?>/admins/Categories" method="post">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Name</label>
                            <br>
                            <span class="text-danger"><?php echo $data['cataddP_err'];?></span>
                            <span class="text-success"><?php echo $data['cataddP_Succ'];?></span>
                            <input type="text" name="categoryPName" class="form-control <?php echo (!empty($data['cataddP_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['categoryPName']?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="categoryPAdd" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <h4 class="card-title">All Primary Categories</h4>
                    <hr>
                    <?php
                    foreach ($data['primaryCategory'] as $primary){
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $primary->name?></h4>
                            </div>
                            <div class="col-md-6">
                                <form action="<?php echo URLROOT; ?>/admins/Categories" method="post">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $primary->id?>"><i class="fas fa-edit"></i></button>

                                    <input type="hidden" name="id" value="<?php echo $primary->id?>">
                                    <button type="submit" name="deletePrimaryCat" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter<?php echo $primary->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Category Name</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo URLROOT; ?>/admins/Categories" method="post">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Enter New Category Name</label>
                                                    <input type="hidden" name="id" value="<?php echo $primary->id?>">
                                                    <input type="text" name="editPrimaryCat" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $primary->name?>">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="editPrimaryCategory" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!---->
        </div>
        <div class="col-md-6">
            <!---->
            <div class="card">
                <div class="card-body">
                    <?php
                    reloadflash('categoryC_success');
                    ?>
                    <h4 class="card-title">Add Child Category</h4>

                    <form action="<?php echo URLROOT; ?>/admins/Categories" method="post">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Name</label>
                            <br>
                            <span class="text-success"><?php echo $data['cataddC_Succ'];?></span>
                            <span class="text-danger"><?php echo $data['cataddC_err'];?></span>
                            <input type="text" name="categoryCName" class="form-control <?php echo (!empty($data['cataddC_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['categoryCName']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Primary Category</label>
                            <br>
                            <span class="text-danger"><?php echo $data['cataddC_select_err'];?></span>
                            <select name="selectP" class="form-control <?php echo (!empty($data['cataddC_select_err'])) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">
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
                            <button type="submit" name="categoryCAdd" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <h4 class="card-title">All Child Categories</h4>
                    <hr>
                    <?php
                    foreach ($data['childCategory'] as $child){
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <h4><?php echo $child->name?></h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Child of : <?php echo $child->parents_name?></h4>
                            </div>
                            <div class="col-md-4">
                                <form action="<?php echo URLROOT; ?>/admins/Categories" method="post">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $child->id?>"><i class="fas fa-edit"></i></button>

                                    <input type="hidden" name="id" value="<?php echo $child->id?>">
                                    <button type="submit" name="deleteChildCat" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter<?php echo $child->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Category Name</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo URLROOT; ?>/admins/Categories" method="post">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Enter New Category Name</label>
                                                    <input type="hidden" name="id" value="<?php echo $child->id?>">
                                                    <input type="text" name="editChildCat" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $child->name?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Primary Category</label>
                                                    <br>
                                                    <span class="text-danger"><?php echo $data['cataddC_select_err'];?></span>
                                                    <select name="selectPForEdit" class="form-control <?php echo (!empty($data['cataddC_select_err'])) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">
                                                        <option value="0">Select</option>
                                                        <?php
                                                        foreach ($data['primaryCategory'] as $primary){

                                                            ?>
                                                            <option value="<?php echo $primary->id?>" <?php if ($primary->id ==$child->parentsof){echo 'selected';}?>><?php echo $primary->name?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="editChildCategory" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!---->
        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>