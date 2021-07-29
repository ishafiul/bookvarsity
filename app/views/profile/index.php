<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/navbar.php';
//print_r($data['user_info']);
print_r($data['pdf']);
?>

<div class="content">
    <div class="content_box">
        <br>
        <br>
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>John Doe</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-header">All Yours</h1>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Download</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50"></td>
                                        <td>Otto</td>
                                        <td><a href="#" class="btn btn-primary"><i class="fas fa-download"></i> Download</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <?php require APPROOT . '/views/inc/footer.php'; ?>
    </div>
</div>
