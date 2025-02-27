<?php $this->load->view('includes/header'); ?>

<div class="main-index container">
  <div class="header"><h1><img src="assets/img/SDCALOGO.jpg"/> Office of the Quality Assurance & Institutional Effectiveness</h1></div>
        <div id='calendar'></div>
  <div class="who-we-are">
    <h2>Who We Are</h2>
    <?php include('assets/text-slider/who-we-are-slider.php'); ?>
  </div>
  <div class="announcements">
    <h2>News, Events & Announcement</h2>
    
    <?php include ('assets/announcements-slider/announcements-slider.php');?>
    <a href="news_and_events"><button class="btn btn-lg btn-info text-white">View All</button></a>
  </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open('events/add_event', ['class' => 'form-horizontal']); ?>

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Event</h1>
        <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#ModalAdd"  aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" required="required" maxlength="100">
            <input type="hidden" name="UsernameII_Brkt_LOG" value="<?php echo $this->session->userdata('username'); ?>" />
          </div>
        </div>

        <div class="form-group">
          <label for="color" class="col-sm-2 control-label">
            <a href="<?php echo base_url('docucontroller_manage-ACET'); ?>" class="btn btn-success" style="padding:1px 5px;">+</a>&nbsp;Event Type
          </label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color" required="required">
              <option value="" selected disabled>---Select Event Type---</option>
              <?php foreach($event_types as $type): ?>
                <option value="<?php echo $type['Color_of_Event_Type']; ?>" style="color: <?php echo $type['Color_of_Event_Type']; ?>;">&#9724; <?php echo $type['Name_of_Event_Type']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Start date</label>
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="end" class="col-sm-2 control-label">End date</label>
          <div class="col-sm-10">
            <input type="text" name="end" class="form-control" id="end" readonly>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="saveAuditCalendarEvent" class="btn btn-success">Save changes</button>
      </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Change the form action to point to a CodeIgniter controller method -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('events/update_event'); ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editEventLable">Edit Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="titleEdit" class="form-control" id="titleEdit" placeholder="Title" required="required" maxlength="100">
                            <!-- These hidden fields should be filled dynamically when editing the event -->
                            <input type="hidden" name="Start_Brkt_I" id="startEdit" />
                            <input type="hidden" name="End_Brkt_I" id="endEdit" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">
                            <a href="<?php echo site_url('event_types/manage'); ?>" class="btn btn-success" style="padding:1px 5px;">+</a>&nbsp;Event Type
                        </label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="colorEdit" required="required">
                                <option value="" selected disabled>---Select Event Type---</option>
                                <!-- Loop through event types from the controller -->
                                <?php foreach($event_types as $event_type): ?>
                                    <option value="<?php echo $event_type['Color_of_Event_Type']; ?>" style="color:<?php echo $event_type['Color_of_Event_Type']; ?>">
                                        &#9724; <?php echo $event_type['Name_of_Event_Type']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label class="text-danger">
                                    <input type="checkbox" name="delete"> Delete event
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" class="form-control" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>
