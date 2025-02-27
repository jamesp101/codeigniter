<?php $this->load->view('includes/header'); ?>

<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group"> <br/>
                <center><label><h2>Documentations</h2></label></center> <br/><br/>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
</div>

<div class="container" style="margin-top:25px;">
    <?php
        if($this->session->userdata('role') === 'Document Controller') {
            echo '
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEManual">
                Add E-Manual Folder
            </button>
            ';
        }
    ?>

    <?php if ($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
    } ?>

    <!-- Modal -->
    <div class="modal fade" id="addEManual" tabindex="-1" aria-labelledby="addEManualLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add E-Manual Folder</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open_multipart('emanuals/create_folder'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file_title">Folder Name</label>
                        <input type="text" name="folder_name" id="file_title" class="form-control" required="required" maxlength="100"/>
                    </div>
                    <div class="form-group">
                        <label for="file_title">Office Access Control</label>
                        <select class="form-select" id="mySelect" name="office_ids[]" multiple>
                            <?php if (!empty($offices)): ?>
                                <?php foreach ($offices as $office): ?>
                                    <option value="<?= $office->ID_Office; ?>"><?= $office->Office_Name; ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No offices available</option>
                            <?php endif; ?>
                        </select>
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

<div class="container" style="margin-top:25px">
    <h3>List of E-Manual Folders</h3> <br/>
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>Folder</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($folders as $folder):
            ?>
                <tr>
                    <td><a href="<?= site_url('/emanuals/folder/' . $folder['id']); ?>"><?= $folder['name']; ?></a></td>
                    <td><?= $folder["created_at"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('includes/footer'); ?>