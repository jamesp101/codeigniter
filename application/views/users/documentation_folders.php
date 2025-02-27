<?php $this->load->view('includes/header'); ?>


<div class="container" style="margin-top:25px;">


    <!-- Modal -->
    <div class="modal fade" id="addEManual" tabindex="-1" aria-labelledby="addEManualLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Documentations Folder</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open_multipart('documentations/create_folder'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file_title">Folder Name</label>
                        <input type="text" name="folder_name" id="file_title" class="form-control" required="required" maxlength="100"/>
                    </div>
                    <div class="form-group">
                        <label for="file_title">Office Access Control</label>
                        <div class="row">
                            <?php if (!empty($offices)): ?>
                                <?php
                                $half = ceil(count($offices) / 2); // Calculate the halfway point
                                $chunks = array_chunk($offices, $half); // Split the offices array into two chunks
                                ?>

                                <!-- First column -->
                                <div class="col-md-6">
                                    <?php foreach ($chunks[0] as $office): ?>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="office_<?= $office->ID_Office; ?>"
                                                name="office_ids[]"
                                                value="<?= $office->ID_Office; ?>"
                                            >
                                            <label class="form-check-label" for="office_<?= $office->ID_Office; ?>">
                                                <?= $office->Office_Name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Second column -->
                                <div class="col-md-6">
                                    <?php foreach ($chunks[1] as $office): ?>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="office_<?= $office->ID_Office; ?>"
                                                name="office_ids[]"
                                                value="<?= $office->ID_Office; ?>"
                                            >
                                            <label class="form-check-label" for="office_<?= $office->ID_Office; ?>">
                                                <?= $office->Office_Name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            <?php else: ?>
                                <div>No offices available</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Folder</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>


</div>
<div class="docs-page">
<h2>Documentations</h2>
<div class="container" style="margin-top:25px">
    <h3>List of Documentations Folders</h3> <br/>
    <?php
        if($this->session->userdata('role') === 'Document Controller') {
            echo '
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEManual">
                Add Documentations Folder
            </button>
            ';
        }
    ?>

    <?php if ($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
    } ?>
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>Folder</th>
                <th>Date Created</th>
                <th>Who has Access</th>
                <?php
                    if($this->session->userdata('role') === 'Document Controller') {
                        echo '<th>Actions</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($folders as $folder):
            ?>
                <tr>
                    <td><a href="<?= site_url('/documentations/folder/' . $folder['id']); ?>"><?= $folder['name']; ?></a></td>
                    <td><?= $folder["created_at"]; ?></td>
                    <td><?= implode(', ',$folder["access"]) ?></td>
                    <?php
                    if($this->session->userdata('role') === 'Document Controller') {
                        echo '
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditAccess'.$folder['id'].'">Edit User Access</button>&nbsp;
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_delete'.$folder['id'].'">Delete Folder</button>
                        </td>
                        ';
                    }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="EditAccess<?= $folder['id'] ?>" tabindex="-1" aria-labelledby="addEManualLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Documentations Folder Access</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?= form_open_multipart('documentations/update_access/'.$folder['id']); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="file_title">Office Access Control</label>
                                        <div class="row">
                                            <?php if (!empty($offices)): ?>
                                                <?php
                                                $half = ceil(count($offices) / 2); // Calculate the halfway point
                                                $chunks = array_chunk($offices, $half); // Split the offices array into two chunks
                                                ?>

                                                <!-- First column -->
                                                <div class="col-md-6">
                                                    <?php foreach ($chunks[0] as $office): ?>
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                id="office_<?= $office->ID_Office; ?>"
                                                                name="office_ids[]"
                                                                value="<?= $office->ID_Office; ?>"
                                                                <?= in_array($office->Office_Name, $folder['access']) ? 'checked' : ''; ?>
                                                            >
                                                            <label class="form-check-label" for="office_<?= $office->ID_Office; ?>">
                                                                <?= $office->Office_Name; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                                <!-- Second column -->
                                                <div class="col-md-6">
                                                    <?php foreach ($chunks[1] as $office): ?>
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                id="office_<?= $office->ID_Office; ?>"
                                                                name="office_ids[]"
                                                                value="<?= $office->ID_Office; ?>"
                                                                <?= in_array($office->Office_Name, $folder['access']) ? 'checked' : ''; ?>
                                                            >
                                                            <label class="form-check-label" for="office_<?= $office->ID_Office; ?>">
                                                                <?= $office->Office_Name; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                            <?php else: ?>
                                                <div>No offices available</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Access</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal_delete<?php echo $folder['id']; ?>"  aria-labelledby="addEManualLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <?php echo form_open('documentations/delete_folder/'. $folder['id']); ?>

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Documentations Folder</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Hidden Input Fields for Data Passing -->
                                            <input type="hidden" name="File_ID_Brkt" value="<?php echo $folder['id']; ?>" class="form-control" readonly="readonly"/>

                                            <!-- Confirmation Message -->
                                            <center><h3 class="text-danger">Are you sure you want to delete this Documentations Folder?</h3></center>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <!-- Close and Submit Buttons -->
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button name="yes_delete_emanual" class="btn btn-success">Yes</button>
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>


<?php $this->load->view('includes/footer'); ?>