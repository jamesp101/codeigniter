<?php $this->load->view('includes/admin/header'); ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>View Details</h2> <br/>
                <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-step-backward"></span>
                    <a href="<?= base_url('admin/logs/user') ?>" style="color:white; text-decoration:none;">Go Back</a>
                </button>
            </div>
        </div>
        <hr />
        <br/>
        <?php if (!empty($user_log) && !empty($user_details)) : ?>
            <!-- User Image -->
            <center>
                <?php if (empty($user_details['my_img'])): ?>
                    <img src="<?= base_url('profile_settings/profile_image/default.png') ?>" class="user-image img-responsive" style="margin:10px auto; border:2px solid #ccc8c8; border-radius:10px;" />
                <?php else: ?>
                    <img src="<?= base_url('profile_settings/profile_image/' . $user_details['user_id'] . '/' . $user_details['my_img']) ?>" class="user-image img-responsive" style="margin:10px auto; border:2px solid #ccc8c8; border-radius:10px;" />
                <?php endif; ?>
                <div style="font-size:20px; margin:6px auto;">Profile Picture</div>
            </center>
            <br/><br/><br/>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th class="center"><center>Date and Time of Action</center></th>
                                        </tr>
                                        <tr>
                                            <td class="center"><center><?= $user_log['Date_and_Time_of_Action'] ?></center></td>
                                        </tr>
                                        <tr>
                                            <th class="center"><center>Action Made</center></th>
                                        </tr>
                                        <tr>
                                            <td class="center"><center><?= $user_log['Action_Made'] ?></center></td>
                                        </tr>
                                        <tr>
                                            <th class="center"><center>Firstname</center></th>
                                        </tr>
                                        <tr>
                                            <td class="center"><center><?= $user_details['firstname'] ?></center></td>
                                        </tr>
                                        <tr>
                                            <th class="center"><center>Lastname</center></th>
                                        </tr>
                                        <tr>
                                            <td class="center"><center><?= $user_details['lastname'] ?></center></td>
                                        </tr>
                                        <tr>
                                            <th class="center"><center>Username</center></th>
                                        </tr>
                                        <tr>
                                            <td class="center"><center><?= $user_log['Username'] ?></center></td>
                                        </tr>
                                        <tr>
                                            <th class="center"><center>User Type</center></th>
                                        </tr>
                                        <tr>
                                            <td class="center"><center><?= $user_log['User_Type'] ?></center></td>
                                        </tr>
                                        <?php if ($user_details['department'] != 'No Department' && $user_details['office'] != 'No Office') : ?>
                                            <tr>
                                                <th class="center"><center>Department/Office</center></th>
                                            </tr>
                                            <tr>
                                                <td class="center"><center><?= $user_details['department'] . '/' . $user_details['office'] ?></center></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>No user log details found.</p>
        <?php endif; ?>
        <br/><br/><br/>
    </div>
</div>
<?php $this->load->view('includes/admin/footer'); ?>