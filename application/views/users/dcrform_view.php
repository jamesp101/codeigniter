<?php $this->load->view('includes/header'); ?>
<div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Document Change Request Form</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo base_url('requester/dcrform/submit'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" name="Date_Of_Request_Brkt" value="<?php echo date('m/d/Y'); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="toWho">To</label>
                <input type="text" class="form-control" name="To_Who_Brkt" value="Document Controller" readonly>
            </div>

            <div class="form-group">
                <label for="department">From (Department)</label>
                <select id="department-list" class="form-control" name="department" onchange="getOffices(this.value)" required>
                    <option value="" disabled selected>---Select Department---</option>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?php echo $department->Department_Name; ?>"><?php echo $department->Department_Name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="office">From (Office)</label>
                <select name="From_Office_Brkt" id="office_list" class="form-control" required>
                    <option value="" disabled selected>---Select Office---</option>
                    <?php foreach ($offices as $office): ?>
                        <option value="<?php echo $office->Office_Name; ?>"><?php echo $office->Office_Name; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="typeOfRequest">Type of Request</label>
                <select name="Type_Of_Request_Brkt" class="form-control" required>
                    <option value="" disabled selected>---Select Type of Request---</option>
                    <option value="Amend Document">Amend Document</option>
                    <option value="New Document">New Document</option>
                    <option value="Delete Document">Delete Document</option>
                </select>
            </div>

            <div class="form-group">
                <label for="documentNo">Document Number</label>
                <input type="text" class="form-control" name="Document_No_Brkt" required maxlength="100">
            </div>

            <div class="form-group">
                <label for="documentTitle">Document Title</label>
                <input type="text" class="form-control" name="Document_Title_Brkt" required maxlength="100">
            </div>

            <div class="form-group">
                <label for="revisionStatus">Revision Status</label>
                <input type="text" class="form-control" name="Revision_Status_Brkt" required maxlength="100">
            </div>

            <div class="form-group">
                <label for="file">Attach Draft Copy of Document</label>
                <input type="file" class="form-control-file" name="file" accept="application/pdf" required>
            </div>

            <div class="form-group">
                <label for="changesRequested">Changes Requested</label>
                <input type="text" class="form-control" name="Changes_Requested_Brkt" required maxlength="100">
            </div>

            <div class="form-group">
                <label for="reasonForChange">Reason for the Change</label>
                <input type="text" class="form-control" name="Reason_For_The_Change_Brkt" required maxlength="100">
            </div>

            <div class="form-group">
                <label for="newDocumentNo">New Document Number</label>
                <input type="text" class="form-control" name="New_Document_No_Brkt" maxlength="100">
            </div>

            <div class="form-group">
                <label for="newDocumentVersion">New Document Version</label>
                <input type="text" class="form-control" name="New_Document_Version_Brkt" maxlength="100">
            </div>

            <div class="form-group">
                <label for="newDocumentRevision">New Document Revision</label>
                <input type="text" class="form-control" name="New_Document_Revision_Brkt" maxlength="100">
            </div>
                <br>
            <button type="submit" name="Register_Brkt" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
<?php $this->load->view('includes/footer'); ?>