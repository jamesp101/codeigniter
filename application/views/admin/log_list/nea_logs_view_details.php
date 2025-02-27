<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>View Details</h2> <br/>
                <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-step-backward"></span>
                    <a href="<?= base_url('admin/logs/nea'); ?>" style="color:white; text-decoration:none;"> Go Back</a>
                </button>
            </div>
        </div>

        <hr />
        <br/>

        <?php if (isset($log_details)): ?>
            <?php if ($log_details['Action_Made'] == 'Added News/Event/Announcement'): ?>
                <h2>Action Log (Details)</h2>
                <br/><br/>
                <table style="border: 1px solid black; border-collapse: collapse;">
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black; width: 5cm;">Date and Time of Action:</td>
                        <td style="border: 1px solid black; width: 10cm;"><?= $log_details['Date_and_Time_of_Action']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">Action Made:</td>
                        <td style="border: 1px solid black;"><?= $log_details['Action_Made']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">Username:</td>
                        <td style="border: 1px solid black;"><?= $log_details['Username']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">User Type:</td>
                        <td style="border: 1px solid black;"><?= $log_details['User_Type']; ?></td>
                    </tr>
                </table>

                <br />
                <hr />

                <h2>News/Event/Announcement (Details)</h2>
                <br/><br/>
                <table>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black; width: 5cm;">Image:</td>
                        <td style="border: 1px solid black; width: 10cm;">
                            <center>
                                <img src="<?= base_url('All_User/audit_calendar/images_NEA/' . $log_details['Image_I']); ?>" style="width:300px;height:300px;" />
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">Category:</td>
                        <td style="border: 1px solid black;"><?= $log_details['Category_I']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">Title:</td>
                        <td style="border: 1px solid black;"><?= $log_details['Title_I']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">Description:</td>
                        <td style="border: 1px solid black;"><?= $log_details['Description_I']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; border: 1px solid black;">Date Uploaded:</td>
                        <td style="border: 1px solid black;"><?= $log_details['Date_Uploaded_I']; ?></td>
                    </tr>
                </table>
            <?php endif; ?>
        <?php endif; ?>

        <br/><br/><br/>
    </div>
</div>
