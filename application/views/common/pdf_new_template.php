<style>
    .pdf-preview {
  max-width: 690px;
  border: 1px solid #000;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.pdf-head,
.pdf-date,
.pdf-settings,
.pdf-details,
.pdf-changes,
.pdf-approval,
.pdf-status,
.pdf-footer{
  padding: 10px;
}
.pdf-head td,
.pdf-details tr:first-child td,
.pdf-changes tr:first-child td,
.pdf-comments tr:first-child td,
.pdf-approval tr:first-child td,
.pdf-status tr:first-child td,
.pdf-footer {
  font-weight: 700;
}
.text-center td {
  text-align: center !important;
}

</style>

<?php foreach($records as $record): ?>
  <div class="pdf-preview">

<div class="pdf-head">
<table><thead>
  <tr>
    <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_SchoolDesc<?php echo $record['ID']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['School_DESC']; ?></td>
    <td colspan="5" rowspan="2"></td>
  </tr>
  <tr>
    <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_DCR_DESC<?php echo $record['ID']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['DCR_DESC']; ?></td>
  </tr></thead>
</table>
</div>
<hr>
<div class="pdf-date">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Date_Of_Request_DESC<?php echo $record['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Date_Of_Request_DESC']; ?>:</td>
  <td colspan="4"></td>
</tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_To_Who_DESC<?php echo $record['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['To_Who_DESC']; ?>:</td>
  <td colspan="4"></td>
</tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_From_Office_DESC<?php echo $record['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['From_Office_DESC']; ?>:</td>
  <td colspan="4"></td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-settings">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Amend_Document_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Amend_Document_DESC']; ?>:</td>
  <td>[ Test ]</td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_New_Document_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['New_Document_DESC']; ?>:</td>
  <td>[ Test ]</td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Delete_Document_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Delete_Document_DESC']; ?>:</td>
  <td>[ Test ]</td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-details">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Details_Of_Document_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['#_Details_Of_Document_DESC']; ?> <?= $record['Details_Of_Document_DESC']; ?></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Document_Number_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Document_Number_DESC']; ?>:</td>
  <td colspan="2"></td>
</tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Document_Title_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Document_Title_DESC']; ?>:</td>
  <td colspan="2"></td>
</tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Revision_Status_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Revision_Status_DESC']; ?>:</td>
  <td colspan="2"></td>
</tr>
<tr>
  <td></td>
  <td colspan="2"><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Note_Attach_DraftCopy_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Note_Attach_DraftCopy_DESC']; ?></td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-changes">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Changes_Requested_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['#_Changes_Requested_DESC']; ?> <?= $record['Changes_Requested_DESC']; ?></td>
  <td colspan="3" rowspan="6"></td>
</tr>
    <tr><td><br></td></tr>
<tr>
  <td><strong><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Reason_For_The_Change_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Reason_For_The_Change_DESC']; ?></strong></td>
</tr>
<tr>
  <td rowspan="6">Test</td>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr class="text-center">

  <td colspan="3">John Doe<hr></td>
</tr>
<tr class="text-center">
  <td colspan="3"><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Requested_By_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Requested_By_DESC']; ?></td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-comments">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_QAIE_Director_Comments_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['#_QAIE_Director_Comments_DESC']; ?> <?= $record['QAIE_Director_Comments_DESC']; ?></td>
  <td colspan="3"></td>
  <td rowspan="2"></td>
</tr>
<tr>
  <td colspan="4" rowspan="2"></td>
</tr>
<tr class="text-center">
  <td>John Doe<hr></td>
</tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Request_Denied_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Request_Denied_DESC']; ?></td>
  <td>[ ]</td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Request_Accepted_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Request_Accepted_DESC']; ?></td>
  <td>[ ]</td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_SignatureDate_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Signature/Date_DESC']; ?></td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-approval">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Approving_Authority_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['#_Approving_Authority_DESC']; ?> <?= $record['Approving_Authority_DESC']; ?></td>
  <td colspan="4" rowspan="3"></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr class="text-center">
  <td >Jane Doe <hr></td>
  <td style="width:250px" colspan="4"></td>
  <td>09/29/2024 <hr></td>
</tr>
<tr  class="text-center">
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Signature_Over_Printed_Name_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Signature_Over_Printed_Name_DESC']; ?></td>
  <td colspan="4"></td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Date_Of_Approval_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Date_Of_Approval_DESC']; ?></td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-status">
  <table><tbody>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Document_Status_DESC<?php echo $record['ID']; ?>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['#_Document_Status_DESC']; ?> <?= $record['Document_Status_DESC']; ?></td>
  <td colspan="12" rowspan="3"></td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
</tr>
    <tr><td><br></td></tr>
<tr>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_New_Document_Status_DESC<?php echo $record['ID']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['New_Document_Status_DESC']; ?></td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_New_Document_No_DESC<?php echo $record['ID']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['New_Document_No_DESC']; ?></td>
  <td colspan="3">11123232132</td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_New_Document_Version_DESC<?php echo $record['ID']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['New_Document_Version_DESC']; ?></td>
  <td colspan="3">1.1</td>
  <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_New_Document_Revision_DESC<?php echo $record['ID']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['New_Document_Revision_DESC']; ?></td>
  <td colspan="3">1.2</td>
</tr>
</tbody>
</table>
</div>
<hr>

<div class="pdf-footer">
  <div><button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal_Revision_Date_Version_DESC<?php echo $record['ID']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <?= $record['Revision_Date_Version_DESC']; ?>
</div>
</div>

<!-- Modal Window for School Description Starts -->
<div class="modal fade" id="edit_modal_SchoolDesc<?php echo $record['ID']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('dcrform/update'); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update School Description</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="ID_Brkt" value="<?php echo $record['ID']; ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>School Description</label>
                            <input type="text" name="School_DESC_Brkt" value="<?php echo $record['School_DESC']; ?>" class="form-control" required="required" maxlength="100" />
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="update_school_description" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Update</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal Window for School Description Ends -->

<!-- Modal Window for School Description Starts -->
<div class="modal fade" id="edit_modal_DCR_DESC<?php echo $record['ID']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('dcrform/update'); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update DCR Description</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="ID_Brkt" value="<?php echo $record['ID']; ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>DCR Description</label>
                            <input type="text" name="DCR_DESC_Brkt" value="<?php echo $record['DCR_DESC']; ?>" class="form-control" required="required" maxlength="100" />
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="update_school_description" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Update</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal Window for School Description Ends -->

<!-- Modal Window for Date_Of_Request_DESC Starts -->
<div class="modal fade" id="edit_modal_Date_Of_Request_DESC<?php echo $record['ID']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('dcrform/update'); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Date Of Request Description</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="ID_Brkt" value="<?php echo $record['ID']; ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Date Of Request Description</label>
                            <input type="text" name="Date_Of_Request_DESC_Brkt" value="<?php echo $record['Date_Of_Request_DESC']; ?>" class="form-control" required="required" maxlength="100" />
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="update_Date_Of_Request_DESCription" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Update</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal Window for Date_Of_Request_DESC Ends -->


<?php
// List of columns for which modals need to be generated
$columns = [
    "DCR_No_DESC", "To_Who_DESC", "From_Office_DESC", "Amend_Document_DESC", "New_Document_DESC", "Delete_Document_DESC",
    "#_Details_Of_Document_DESC", "Details_Of_Document_DESC", "Document_Number_DESC", "COLON_Document_Number_DESC",
    "Document_Title_DESC", "COLON_Document_Title_DESC", "Revision_Status_DESC", "COLON_Revision_Status_DESC",
    "Note_Attach_DraftCopy_DESC", "#_Changes_Requested_DESC", "Changes_Requested_DESC", "Reason_For_The_Change_DESC",
    "Requested_By_DESC", "#_QAIE_Director_Comments_DESC", "QAIE_Director_Comments_DESC", "Request_Denied_DESC",
    "Request_Accepted_DESC", "Signature/Date_DESC", "#_Approving_Authority_DESC", "Approving_Authority_DESC",
    "Signature_Over_Printed_Name_DESC", "Date_Of_Approval_DESC", "#_Document_Status_DESC", "Document_Status_DESC",
    "New_Document_Status_DESC", "New_Document_No_DESC", "New_Document_Version_DESC", "New_Document_Revision_DESC",
    "Revision_Date_Version_DESC"
];

// Track unique columns without #_ prefix
$generatedModals = [];

// Loop through each column to generate a modal for it
foreach ($columns as $column) {
    // Normalize the column name by removing the #_ prefix
    $normalizedColumn = ltrim($column, '#_');

    // Skip if the modal for the normalized column has already been generated
    if (isset($generatedModals[$normalizedColumn])) {
        continue;
    }

    // Check if there's a related prefixed column
    $prefixedColumn = "#_$normalizedColumn";
    $hasPrefixedColumn = in_array($prefixedColumn, $columns);

    // Add normalized column to generated modals to avoid duplicates
    $generatedModals[$normalizedColumn] = true;

    // Generate modal ID and label
    $modalID = preg_replace('/[^A-Za-z0-9_]/', '', $normalizedColumn);
    $label = ucwords(str_replace("_", " ", $normalizedColumn));
?>
<!-- Modal Window for <?php echo $normalizedColumn; ?> Starts -->
<div class="modal fade" id="edit_modal_<?php echo $modalID; ?><?php echo $record['ID']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('dcrform/update'); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update <?php echo $label; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="ID_Brkt" value="<?php echo $record['ID']; ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label><?php echo $label; ?></label>
                            <input type="text" name="<?php echo $normalizedColumn; ?>_Brkt" value="<?php echo $record[$normalizedColumn]; ?>" class="form-control" required="required" maxlength="100" />
                        </div>

                        <?php if ($hasPrefixedColumn) : ?>
                        <div class="form-group">
                            <label><?php echo ucwords(str_replace("_", " ", $prefixedColumn)); ?></label>
                            <input type="text" name="<?php echo $prefixedColumn; ?>_Brkt" value="<?php echo $record[$prefixedColumn]; ?>" class="form-control" maxlength="100" />
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="update_<?php echo $modalID; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Update</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal Window for <?php echo $normalizedColumn; ?> Ends -->
<?php } ?>

<?php endforeach; ?>

