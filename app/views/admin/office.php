<?php
if (!isset($_SESSION['user_name_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
?>
    <div class="container">
        <div class="card">

                <div class="card-body">
                    <form action="<?php echo URLROOT; ?>/admins/office" method="post">
                    <h4 class="card-title">Add Office</h4>
                    <span class="text-success"><?php echo $data['office_succ'];?></span>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" name="address" class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['address']?>">
                        <span class="invalid-feedback"><?php echo $data['address_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mobile</label>
                        <input type="text" name="mobile" class="form-control <?php echo (!empty($data['mobile_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['mobile']?>">
                        <span class="invalid-feedback"><?php echo $data['mobile_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telephone</label>
                        <input type="text" name="telephone" class="form-control <?php echo (!empty($data['telephone_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['telephone']?>">
                        <span class="invalid-feedback"><?php echo $data['telephone_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">FAX</label>
                        <input type="text" name="fax" class="form-control <?php echo (!empty($data['fax_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['fax']?>">
                        <span class="invalid-feedback"><?php echo $data['fax_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-Mail</label>
                        <input type="text" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="" value="<?php echo $data['email']?>">
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" name="addOffice" class="btn btn-primary">Submit</button>
                    </div>
                    <hr>
                    </form>
                    <h4 class="card-title">All Office</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Fax</th>
                            <th scope="col">Email</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data['office'] as $office){
                        ?>
                        <form action="<?php echo URLROOT; ?>/admins/office" method="post">
                            <tr>
                                <th scope="row"><?php echo $office->id?></th>
                                <td><?php echo $office->address?></td>
                                <td><?php echo $office->mobile?></td>
                                <td><?php echo $office->telephone?></td>
                                <td><?php echo $office->fax?></td>
                                <td><?php echo $office->email?></td>
                                <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $office->id?>"><i class="fas fa-edit"></i></button>

                                    <input type="hidden" name="id" value="<?php echo $office->id?>">
                                    <button type="submit" name="deleteOffice" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                            </tr>
                            <div class="modal fade" id="exampleModalCenter<?php echo $office->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Office</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" name="editaddress" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $office->address?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Mobile</label>
                                                <input type="text" name="editmobile" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $office->mobile?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Telephone</label>
                                                <input type="text" name="edittelephone" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $office->telephone?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">FAX</label>
                                                <input type="text" name="editfax" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $office->fax?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">E-Mail</label>
                                                <input type="text" name="editemail" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $office->email?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="editOffice" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>