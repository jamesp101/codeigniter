<?php $this->load->view('includes/header'); ?>
<div class="container-user">
    <h1>User List</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Create User
    </button>



    <!-- Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
                <td><?php echo $user->email_add; ?></td>
                <td>
                    <img src="<?php echo site_url('profile_settings/profile_image/'. $user->user_id .'/'. $user->my_img) ?>"
                    style='height:50px; width:50px; border-radius:10px; border:2px solid #ccc8c8;' />
                </td>
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('includes/footer'); ?>
