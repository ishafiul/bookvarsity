<?php
if (!isset($_SESSION['user_name_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
?>


    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php reloadflash('slider_success');
                    ?>
                    <h4 class="card-title">Slider</h4>

                    <?php
                    foreach ($data['slider'] as $slider ){
                        ?>
                        <div class="row">

                                <div class="col-md-6">
                                    <img src="<?php echo URLROOT.'/img/slider/'.$slider->img; ?>" alt="" width="100px">
                                </div>
                                <div class="col-md-6">
                                    <form action="<?php echo URLROOT; ?>/admins/settings" method="post">
                                        <input type="hidden" name="id" value="<?php echo $slider->id?>">
                                        <input type="hidden" name="imgName" value="<?php echo $slider->img?>">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $slider->id?>"><i class="fas fa-edit"></i></button>
                                    <button type="submit" name="deleteSlide" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                        <div class="modal fade" id="exampleModalCenter<?php echo $slider->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Slider Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo URLROOT; ?>/admins/settings" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                       <div class="d-flex justify-content-center">
                                                           <img src="<?php echo URLROOT.'/img/slider/'.$slider->img; ?>" alt="" width="350px">
                                                       </div>
                                                        <br>
                                                        <h6>Upload New Image For This</h6>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="hidden" name="idEdit" value="<?php echo $slider->id?>">
                                                                <input type="hidden" name="imgNameEdit" value="<?php echo $slider->img?>">
                                                                <input type="file" name="sliderImgEdit" class="custom-file-input <?php echo (!empty($data['slider_err_edit'])) ? 'is-invalid' : ''; ?>">
                                                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="editSlider" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                    <h6 class="card-title">Upload New Slider</h6>
                    <span class="text-danger"><?php echo $data['slider_err'];?></span>
                    <span class="text-success"><?php if(isset($_GET['slide_success'])) echo $_GET['slide_success'];?></span>
                    <form action="<?php echo URLROOT; ?>/admins/settings" enctype="multipart/form-data" method="post">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="sliderImg" class="custom-file-input <?php echo (!empty($data['slider_err'])) ? 'is-invalid' : ''; ?>" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="upload_slider">Upload</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <?php reloadflash('featur1_success');
                    ?>
                    <h4 class="card-title">Featured Image 1</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo URLROOT.'/img/'.$data['info'][0]->featurImg1; ?>" alt="" width="100px">
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo URLROOT; ?>/admins/settings" method="post" enctype="multipart/form-data">
                                <span class="text-danger"><?php echo $data['featur1_err'];?></span>
                                <span class="text-success"><?php echo $data['featur1_ok'];?></span>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="featurImg1" class="custom-file-input <?php echo (!empty($data['featur1_err'])) ? 'is-invalid' : ''; ?>" id="inputGroupFile04">
                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                                    </div>

                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="uploadfeatur1">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <?php reloadflash('featur2_success');
                    ?>
                    <h4 class="card-title">Featured Image 2</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo URLROOT.'/img/'.$data['info'][0]->featurImg2; ?>" alt="" width="100px">
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo URLROOT; ?>/admins/settings" method="post" enctype="multipart/form-data">
                                <span class="text-danger"><?php echo $data['featur2_err'];?></span>
                                <span class="text-success"><?php echo $data['featur2_ok'];?></span>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="featurImg2" class="custom-file-input <?php echo (!empty($data['featur2_err'])) ? 'is-invalid' : ''; ?>" id="inputGroupFile04">
                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                                    </div>

                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="uploadfeatur2">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <br>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php reloadflash('logo_success');
                    ?>
                    <h4 class="card-title">Logo</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo URLROOT.'/img/'.$data['info'][0]->logo; ?>" alt="" width="100px"style="background-color: rgba(0,191,240,0.67);padding: 5px; border-radius: 5px">
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo URLROOT; ?>/admins/settings" method="post" enctype="multipart/form-data">
                                <span class="text-danger"><?php echo $data['logo_err'];?></span>
                                <span class="text-success"><?php echo $data['logo_ok'];?></span>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="logoImg" class="custom-file-input <?php echo (!empty($data['logo_err'])) ? 'is-invalid' : ''; ?>" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                                </div>

                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="uploadLogo">Upload</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <?php reloadflash('info_success');
                    ?>
                    <h4 class="card-title">Other Site info</h4>
                    <span class="text-success"><?php echo $data['infoUpdate_success'];?></span>
                    <form action="<?php echo URLROOT; ?>/admins/settings" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $data['info'][0]->title?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Site Description</label>
                            <input type="text" name="details" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $data['info'][0]->details?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Site Description</label>
                            <input type="text" name="details" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $data['info'][0]->main_phone?>">
                        </div>
                        <br>
                        <hr>
                        <h4 class="card-title">Social Media <small>(Full Link with http://)</small></h4>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" name="fb" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $data['info'][0]->fb?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Twitter</label>
                            <input type="text" name="tw" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $data['info'][0]->tw?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Instagram</label>
                            <input type="text" name="ig" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $data['info'][0]->ig?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="infoAdd" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
            <br>
        </div>
    </div>

<?php
require_once 'inc/footer.php';
?>