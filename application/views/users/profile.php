<div id="page-inner" class="profile">
    <div class="top-part">
        <h2>Profile Settings</h2>
        <hr />
        <?php if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        } ?>

        <?php if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-info">' . $this->session->flashdata('message') . '</div>';
        } ?>
        <?php if (empty($user['my_img'])): ?>
            <img src="<?= base_url('profile_settings/profile_image/default.png') ?>" class="user-image img-responsive" />
        <?php else: ?>
            <img src="<?= base_url('profile_settings/profile_image/' . $user['user_id'] . '/' . $user['my_img']) ?>" class="user-image img-responsive" style="margin:10px auto; border:2px solid #ccc8c8; border-radius:10px; height:300px; width:300px; object-fit: cover;" />
        <?php endif; ?>
        <br>
        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_myimg<?= $user['user_id']; ?>">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Profile Picture
        </button>
    </div>

    <!-- Modal Window for Profile Picture Starts -->
    <div class="modal fade" id="edit_modal_myimg<?= $user['user_id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open_multipart('user/update_profile_picture'); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Profile Picture</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" name="Profile_Picture_Brkt" class="form-control" required="required" />
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="profile-table">
                            <tbody>
                                <tr>
                                    <th class="center">Firstname</th>
                                    <td class="center"><?= $user['firstname'] ?></td>
                                    <th class="center">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_firstname">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="center">Lastname</th>
                                    <td class="center"><?= $user['lastname'] ?></td>
                                    <th class="center">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_lastname">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="center">Username</th>
                                    <td class="center"><?= $user['username'] ?></td>
                                    <th class="center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_username">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="center">Password</th>
                                    <td class="center">*********</td>
                                    <th class="center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_password">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                    </th>
                                </tr>

                                <tr>
                                    <th class="center">Email Address</th>
                                    <td class="center">
                                        <?= $user['email_add'] ?>
                                        <br>
                                        <i style="color: <?= ($user['verification_status'] == 'VERIFIED') ? 'green' : 'gray' ?>;">
                                            (<?= $user['verification_status'] ?>)
                                        </i>
                                    </td>
                                    <th class="center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_email">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="center">E-Signature</th>
                                    <td class="center">
                                        <?php if (empty($user['e_signature'])): ?>
                                            <i style="color:red;">You don't have an e-signature yet, please upload an e-signature</i>
                                        <?php else: ?>
                                            <img src="<?= base_url('profile_settings/e_signature/' . $user['e_signature']) ?>" style="height:90px; width:150px; border-radius:10px; border:2px solid #dddddd;" />
                                        <?php endif; ?>
                                    </td>
                                    <td class="center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal_esignature">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Window for Firstname -->
    <div class="modal fade" id="edit_modal_firstname" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form role="form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Firstname</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" id="first_name" name="firstname" value="<?= $user['firstname'] ?>" class="form-control" required="required" />
                                <div id="first_name_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button type="button" onclick="submitFirstNameForm()" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Window for Lastname -->
    <div class="modal fade" id="edit_modal_lastname" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form role="form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Lastname</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" id="last_name" name="lastname" value="<?= $user['lastname'] ?>" class="form-control" required="required" />
                                <div id="last_name_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button type="button" onclick="submitLastNameForm()" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Window for Username -->
    <div class="modal fade" id="edit_modal_username" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form role="form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Username</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" id="username" name="username" value="<?= $user['username'] ?>" class="form-control" required="required" />
                                <div id="username_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button type="button" onclick="submitUsernameForm()" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Window for Password -->
    <div class="modal fade" id="edit_modal_password" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form role="form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" value="" class="form-control" required="required" />
                                <div id="password_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button type="button" onclick="submitPasswordForm()" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Window for Email -->
    <div class="modal fade" id="edit_modal_email" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form role="form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Email</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" value="<?= $user['email_add'] ?>" class="form-control" required="required" />
                                <div id="email_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button type="button" onclick="submitEmailForm()" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Window for E-Signature Starts -->
    <div class="modal fade" id="edit_modal_esignature" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('user/update_esignature') ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update E-Signature</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Hidden User ID -->
                                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>E-Signature</label>
                                <input type="file" name="E_Signature_Brkt" class="form-control" required="required" />
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Window for E-Signature Ends -->





</div>
<?php $this->load->view('includes/scripts/profile_settings_validator'); ?>