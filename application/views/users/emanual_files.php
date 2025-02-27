
<?php $this->load->view('includes/header'); ?>

<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group"> <br/>
                <center><label><h2>  E-Manuals</h2></label></center> <br/><br/>
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
                Add E-Manual
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add E-manual</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open_multipart('emanuals/create'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file_title">File Title</label>
                        <input type="text" name="File_Title_Brkt" id="file_title" class="form-control" required="required" maxlength="100"/>
                    </div>
                    <div class="form-group">
                        <label for="emanualtype">E-Manual Type
                            <a href="<?= site_url('/manage_emanual_type'); ?>" class="btn btn-success btn-sm ml-2">+</a>
                        </label>
                        <select name="emanualtype" class="form-control" id="emanualtype" required="required">
                            <option value="" selected disabled>---Select E-Manual Type---</option>
                            <?php foreach($emanual_types as $type): ?>
                                <option value="<?= $type['Name_of_Emanual_Type']; ?>"><?= $type['Name_of_Emanual_Type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file_inp">Upload File</label>
                        <input type="file" name="file" id="file_inp" class="form-control-file" required="required"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Upload</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:25px">
    <h3>List of E-Manuals</h3> <br/>
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Date Uploaded</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($emanuals as $emanual):
            ?>
                <tr>
                    <td><?= $emanual['File_Title']; ?></td>
                    <td><?= $emanual["Date_Uploaded"]; ?></td>
                    <td>
                    <a href="<?= site_url('emanuals/view/' . $emanual['File_ID']) ?>" class="btn btn-warning" target="_blank">
                        <span class="glyphicon glyphicon-eye-open"></span> View
                    </a>
                    <?php if ($this->session->userdata('role') === 'Document Controller'): ?>
                        <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#modal_delete_emanual<?= $emanual['File_ID'] ?>">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                    <?php endif; ?>
                    <!-- Bootstrap Modal for Deleting E-Manual -->
                    <div class="modal fade" id="modal_delete_emanual<?php echo $emanual['File_ID']; ?>"  aria-labelledby="addEManualLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <?php echo form_open('emanuals/delete/'. $emanual['File_ID']); ?>

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete E-manual</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Hidden Input Fields for Data Passing -->
                                            <input type="hidden" name="File_ID_Brkt" value="<?php echo $emanual['File_ID']; ?>" class="form-control" readonly="readonly"/>
                                            <input type="hidden" name="File_Title_Brkt_I" value="<?php echo $emanual['File_Title']; ?>" />
                                            <input type="hidden" name="Date_Uploaded_Brkt_I" value="<?php echo $emanual['Date_Uploaded']; ?>" />

                                            <!-- Confirmation Message -->
                                            <center><h3 class="text-danger">Are you sure you want to delete this E-Manual?</h3></center>
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

                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('includes/footer'); ?>