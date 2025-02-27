<div class="row">
    <div class="col-md-12">
        <h2>News, Events, Announcements Logs</h2> <br/>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"  id="table">
                        <thead>
                            <tr>
                                <th class="center">Date and Time of Action</th>
                                <th class="center">Action Made</th>
                                <th class="center">Username</th>
                                <th class="center">User Type</th>
                                <th class="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($nea_logs)) : ?>
                                <?php foreach ($nea_logs as $log) : ?>
                                    <tr>
                                        <td class="center"><?= $log['Date_and_Time_of_Action']; ?></td>
                                        <td class="center"><?= $log['Action_Made']; ?></td>
                                        <td class="center"><?= $log['Username']; ?></td>
                                        <td class="center"><?= $log['User_Type']; ?></td>
                                        <td class="center">
                                            <button class="btn btn-danger">
                                                <a href="<?= base_url('admin/logs/nea_view_details/'.$log['UR_Code']); ?>" style="color:white; text-decoration: none;">
                                                    View
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr><td colspan="5" class="center">No logs found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>