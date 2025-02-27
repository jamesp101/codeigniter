
<?php $this->load->view('includes/header'); ?>

<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group"> <br/>
                <center><label><h2>E-Manuals</h2></label></center> <br/><br/>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
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
            <th>Folder</th>
            <th>File Title</th>
            <th>Date Uploaded</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $currentEmanualType = '';
        foreach ($emanuals as $emanual):
            if ($currentEmanualType != $emanual['Emanual_Type']) {
                $currentEmanualType = $emanual['Emanual_Type'];
                ?>
                <tr class="group-header" data-emanualtype="<?= $currentEmanualType ?>">
                    <td colspan="4" style="cursor: pointer;">
                        <strong><?= $currentEmanualType ?> (click to expand/collapse)</strong>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr class="group-content" data-emanualtype="<?= $currentEmanualType ?>">
                <!-- <td></td> -->
                <td><?= $emanual['File_Title'] ?></td>
                <td><?= $emanual['Date_Uploaded'] ?></td>
                <td>
                    <a href="<?= site_url('emanuals/view/' . $emanual['File_ID']) ?>" class="btn btn-warning" target="_blank">
                        <span class="glyphicon glyphicon-eye-open"></span> View
                    </a>
                    <?php if ($this->session->userdata('role') === 'Document Controller'): ?>
                        <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#modal_delete_emanual<?= $emanual['File_ID'] ?>">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



</div> <br/><br/><br/><br/>
<?php $this->load->view('includes/footer'); ?>