<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>View Details</h2><br/>
                <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-step-backward"></span>
                    <a href="<?= base_url('admin/logs/audit_calendar') ?>" style="color:white; text-decoration:none;">Go Back</a>
                </button>
            </div>
        </div>
        <hr /><br/>

        <?php if (!empty($log_details)): ?>
            <?php foreach ($log_details as $log): ?>
                <?php if ($log['Action_Made'] == 'Added Audit Calendar Event' || $log['Action_Made'] == 'Deleted Audit Calendar Event'): ?>
                    <h2>Action Log (Details)</h2><br/><br/>
                    <table style="border: 1px solid black; border-collapse: collapse;">
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black; width: 5cm;">Date and Time of Action:</td>
                            <td style="border: 1px solid black; width: 10cm;"><?= $log['Date_and_Time_of_Action']; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black;">Action Made:</td>
                            <td style="border: 1px solid black;"><?= $log['Action_Made']; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black;">Username:</td>
                            <td style="border: 1px solid black;"><?= $log['Username']; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black;">User Type:</td>
                            <td style="border: 1px solid black;"><?= $log['User_Type']; ?></td>
                        </tr>
                    </table>

                    <hr/>
                    <h2>Audit Calendar Event (Details)</h2><br/><br/>
                    <table style="border: 1px solid black; border-collapse: collapse;">
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black; width: 5cm;">Title:</td>
                            <td style="border: 1px solid black; font-weight:bold; color:<?= $log['color_I']; ?>; width: 10cm;"><?= $log['title_I']; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black;">Start Date:</td>
                            <td style="border: 1px solid black;"><?= $log['start_I']; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; border: 1px solid black;">End Date:</td>
                            <td style="border: 1px solid black;"><?= $log['end_I']; ?></td>
                        </tr>
                    </table>
                <?php endif; ?>

                <?php if ($log['Action_Made'] == 'Updated Audit Calendar Event'): ?>
                    <h2>Audit Calendar Event (Old Details)</h2>
                    <table style="border: 1px solid black; border-collapse: collapse;">
                        <!-- Old details -->
                    </table>

                    <hr/>

                    <h2>Audit Calendar Event (New Details)</h2>
                    <table style="border: 1px solid black; border-collapse: collapse;">
                        <!-- New details -->
                    </table>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
