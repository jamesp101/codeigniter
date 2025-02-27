<div class="container">
    <h1><?= $role?></h1>
    <?php if ($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
    } ?>

    <?php if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-info">' . $this->session->flashdata('message') . '</div>';
    } ?>

    <?php if ($this->session->flashdata('success')) {
        echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
    } ?>

    <?php
        if ((in_array($role, ['President','Document Controller','Director for QAIE']) && count($users) < 1)
            || !in_array($role, ['President','Document Controller','Director for QAIE'])) {
            echo '<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createUserModal">
                Create User
            </button>';
        }
    ?>
    <!-- Button trigger modal -->


    <div class="modal fade" id="createUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Form starts here -->
            <form id="registerForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Requester</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="form_errors" class="alert alert-danger" style="display:none;"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" id="Firstname_JV" name="firstname" class="form-control" />
                            <!-- <div id="FirstnameStatus" style="color:red;"></div> -->
                            <?= form_error('firstname', '<div class="error">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" id="Lastname_JV" name="lastname" class="form-control" />
                            <div id="LastnameStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="Username_JV" name="username" class="form-control" />
                            <div id="UsernameStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="Password_JV" name="password" class="form-control" />
                            <div id="PasswordStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="Confirm_Password_JV" name="confirm_password" class="form-control" />
                            <div id="ConfirmPasswordStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" id="Email_Address_JV" name="email_address" class="form-control" />
                            <div id="EmailAddressStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select id="Department_JV" name="department" onChange="getOffices(this.value);" class="form-control">
                                <option value="" selected disabled>---Select Department---</option>
                                <?php foreach ($departments as $department): ?>
                                    <option value="<?= $department['Department_Name']; ?>"><?= $department['Department_Name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div id="DepartmentStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Office</label>
                            <select id="Office_JV" name="office" class="form-control">
                                <option value="" selected disabled>---Select Office---</option>
                                <?php foreach ($offices as $office): ?>
                                    <option value="<?= $office['ID_Office'] . '|' . $office['Office_Name']; ?>"><?= $office['Office_Name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div id="OfficeStatus" style="color:red;"></div>
                        </div>
                        <div class="form-group">
                            <label>E-Manual Viewing</label>
                            <select id="E_Manual_Viewing_JV" name="e_manual_viewing" class="form-control">
                                <option value="" selected disabled>---Select---</option>
                                <option value="ENABLED">Enabled</option>
                                <option value="DISABLED">Disabled</option>
                            </select>
                            <div id="EManualViewingStatus" style="color:red;"></div>
                        </div>
                        <input type="hidden" id="Type_JV" name="type" value="<?= $role ?>" class="form-control" />
                        <input type="hidden" id="Verification_Status_JV" name="verification_status" value="UNVERIFIED" class="form-control" />
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <br/>
    <br/>
    <table id="table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Department</th>
                <th>Office</th>
                <th>E-Manual Viewing</th>
                <th>Email Address</th>
                <th>Picture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->user_id; ?></td>
                <td><?php echo $user->firstname; ?> <?php echo $user->lastname; ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->department; ?></td>
                <td><?php echo $user->office; ?></td>
                <td><?php echo $user->e_manual_viewing; ?></td>
                <td><?php echo $user->email_add; ?>
                <?php
                if($user->verification_status=='UNVERIFIED'){
                echo "<br/> <i style='color:gray;'>(UNVERIFIED)</i>";
                }
                else if($user->verification_status=='VERIFIED'){
                echo "<br/> <i style='color:green;'>(VERIFIED)</i>";
                }
                ?>
                </td>
                <td>
                    <img src="<?php echo site_url('profile_settings/profile_image/'. $user->user_id .'/'. $user->my_img) ?>"
                    style='height:50px; width:50px; border-radius:10px; border:2px solid #ccc8c8;' />
                </td>
                <td>
                    <a href="<?= base_url('/admin/profile/'. $user->user_id)?>" class="btn btn-warning">Edit</a>

                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#modal_delete_user<?= $user->user_id ?>">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                        <div class="modal fade" id="modal_delete_user<?= $user->user_id ?>"  aria-labelledby="addDocumentationLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <?php echo form_open('admin/user/delete/'. $user->user_id); ?>

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <!-- Confirmation Message -->
                                            <center><h3 class="text-danger">Are you sure you want to delete this User?</h3></center>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <!-- Close and Submit Buttons -->
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button name="yes_delete_documentation" class="btn btn-success">Yes</button>
                                </div>

                            <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
