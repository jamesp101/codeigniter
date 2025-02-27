<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>View Details</h2>
                <br/>
                <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-step-backward"></span>
                    <a href="<?= site_url('admin/logs/audit_calendar_event_type') ?>" style="color:white; text-decoration:none;"> Go Back</a>
                </button>
            </div>
        </div>

        <hr />
        <br/>

        <?php if (!empty($log_details)) : ?>
            <?php foreach ($log_details as $log): ?>
                <h2>Action Log (Details)</h2>
                <br/><br/>
                <table style='border: 1px solid black; border-collapse: collapse;'>
                    <tr>
                        <td style='font-weight:bold; border: 1px solid black; width: 5cm;'>Date and Time of Action:</td>
                        <td style='border: 1px solid black; width: 10cm;'><?= $log['Date_and_Time_of_Action']; ?></td>
                    </tr>
                    <tr>
                        <td style='font-weight:bold; border: 1px solid black;'>Action Made:</td>
                        <td style='border: 1px solid black;'><?= $log['Action_Made']; ?></td>
                    </tr>
                    <tr>
                        <td style='font-weight:bold; border: 1px solid black;'>Username:</td>
                        <td style='border: 1px solid black;'><?= $log['Username']; ?></td>
                    </tr>
                    <tr>
                        <td style='font-weight:bold; border: 1px solid black;'>User Type:</td>
                        <td style='border: 1px solid black;'><?= $log['User_Type']; ?></td>
                    </tr>
                </table>

                <br />
                <hr />

                <h2>Audit Calendar Event Type (Details)</h2>
                <br/><br/>
                <table>
                    <tr>
                        <td style='font-weight:bold; border: 1px solid black; width: 5cm;'>Color of Event Type:</td>
                        <td style='width: 10cm; border: 1px solid black; color:<?= $log['Color_of_Event_Type_I']; ?>;'>&#9724;</td>
                    </tr>
                    <tr>
                        <td style='font-weight:bold; border: 1px solid black;'>Name of Event Type:</td>
                        <td style='border: 1px solid black;'><?= $log['Name_of_Event_Type_I']; ?></td>
                    </tr>
                </table>

                <br/>
                <hr/>

                <?php if ($log['Action_Made'] == 'Updated Audit Calendar Event Type' && !empty($log_new_details)) : ?>
                    <h2>Audit Calendar Event Type (Old Details)</h2>
                    <br/><br/>
                    <table>
                        <tr>
                            <td style='font-weight:bold; border: 1px solid black; width: 5cm;'>Color of Event Type:</td>
                            <td style='width: 10cm; border: 1px solid black; color:<?= $log['Color_of_Event_Type_I']; ?>;'>&#9724;</td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold; border: 1px solid black;'>Name of Event Type:</td>
                            <td style='border: 1px solid black;'><?= $log['Name_of_Event_Type_I']; ?></td>
                        </tr>
                    </table>

                    <br/>
                    <hr/>

                    <h2>Audit Calendar Event Type (New Details)</h2>
                    <br/><br/>
                    <table>
                        <?php foreach ($log_new_details as $new_log): ?>
                            <tr>
                                <td style='font-weight:bold; border: 1px solid black; width: 5cm;'>Color of Event Type:</td>
                                <td style='width: 10cm; border: 1px solid black; color:<?= $new_log['Color_of_Event_Type_II']; ?>;'>&#9724;</td>
                            </tr>
                            <tr>
                                <td style='font-weight:bold; border: 1px solid black;'>Name of Event Type:</td>
                                <td style='border: 1px solid black;'><?= $new_log['Name_of_Event_Type_II']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php endif; ?>

        <br/><br/><br/>
    </div>
</div>
