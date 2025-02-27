<div id="page-wrapper">

    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <h2>Audit Calendar Event Types</h2> <br/>
                <button class="btn btn-success" data-toggle="modal" data-target="#modal_add_eventtype">
                    <span class="glyphicon glyphicon-plus"></span> Add Event Type
                </button>
            </div>
        </div>
        <div class="modal fade" id="modal_add_eventtype" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="<?php echo site_url('admin/events_type/create'); ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Event Type</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Color of Event Type</label>
                                    <input type="color" name="Color_of_Event_Type_Brkt" class="form-control" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label>Name of Event Type</label>
                                    <input type="text" name="Name_of_Event_Type_Brkt" class="form-control" required="required" maxlength="100"/>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                            <button type="submit" name="save_event_type" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr />

        <button class="btn btn-danger" type="button" id="Delete_Selected_JV">
            <span class="glyphicon glyphicon-trash"></span> Delete Selected
        </button>

        <hr />

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="ChkAll_JV"></th>
                                        <th class="center">Event Type</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($event_types as $event_type): ?>
                                        <tr>
                                            <td><input type="checkbox" class="check" value="<?php echo $event_type['ID_Event_Type']; ?>"></td>
                                            <td class="center" style="color:<?php echo $event_type['Color_of_Event_Type']; ?>">&#9724; <?php echo $event_type['Name_of_Event_Type']; ?></td>
                                            <td class="center">
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal_update_eventtype<?php echo $event_type['ID_Event_Type']; ?>">
                                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                                </button>
                                                <button class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modal_delete_eventtype<?php echo $event_type['ID_Event_Type']; ?>">
                                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Window for Edit Event Type -->
                                        <div class="modal fade" id="modal_update_eventtype<?php echo $event_type['ID_Event_Type']; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <?php echo form_open('admin/events_type/update'); ?>
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Update Event Type</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="ID_Event_Type_Brkt" value="<?php echo $event_type['ID_Event_Type']; ?>" class="form-control"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Color of Event Type</label>
                                                                <input type="color" name="Color_of_Event_Type_Brkt" value="<?php echo $event_type['Color_of_Event_Type']; ?>" class="form-control" required="required"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Name of Event Type</label>
                                                                <input type="text" name="Name_of_Event_Type_Brkt" value="<?php echo $event_type['Name_of_Event_Type']; ?>" class="form-control" required="required" maxlength="100"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                            <button name="yes_update_eventtype" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Update</button>
                                                        </div>
                                                    <?= form_close(); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Window for Delete Event Type -->
                                        <div class="modal fade" id="modal_delete_eventtype<?php echo $event_type['ID_Event_Type']; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <?php echo form_open('admin/events_type/delete'); ?>
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h2 class="modal-title">Delete Event Type</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="ID_Event_Type_Brkt" value="<?php echo $event_type['ID_Event_Type']; ?>" class="form-control" readonly="readonly"/>
                                                            <center><h3 class="text-danger">Are you sure you want to delete this event type?</h3></center>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="yes_delete_eventtype" class="btn btn-success">Yes</button>
                                                        </div>
                                                    <?= form_close(); ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
