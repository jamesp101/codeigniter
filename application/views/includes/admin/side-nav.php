<nav id="sidebar" class="bg-dark">
    <h4 class="site-title">QAADMS</h4>
    <div class="user-img"><img src="<?= base_url('profile_settings/profile_image/'.$this->session->userdata('user_id').'/'.$this->session->userdata('avatar')) ?>" width="170px" height="170px"></div>
    <ul class="list-unstyled">
        <li><a href="<?= base_url("/")?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <li><a href="<?= base_url("/admin/profile")?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a></li>
        <li>
            <a href="#departmentsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-briefcase" aria-hidden="true"></i> Departments/Offices</a>
            <ul class="collapse list-unstyled" id="departmentsSubmenu">
                <li><a href="<?= base_url("/admin/department")?>">Departments</a></li>
                <li><a href="<?= base_url("/admin/office")?>">Offices</a></li>
            </ul>
        </li>
        <li><a href="<?= base_url('admin/events_type') ?>"><i class="fa fa-calendar" aria-hidden="true"></i> Audit Calendar Types</a></li>
      <li><a href="<?= base_url("/admin/user/Administrator")?>"><i class="fa fa-user-secret" aria-hidden="true"></i> Admins</a></li>
      <li>
            <a href="#usersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users" aria-hidden="true"></i> Users</a>
            <ul class="collapse list-unstyled" id="usersSubmenu">
                <li><a href="<?= base_url("/admin/user/Requester")?>">Requesters</a></li>
                <li><a href="<?= base_url("/admin/user/Department Head")?>">Department Heads</a></li>
                <li><a href="<?= base_url("/admin/user/Director for QAIE")?>">Director for QAIE</a></li>
                <li><a href="<?= base_url("/admin/user/QAIE Management Officer")?>">QAIE Management Officers</a></li>
                <li><a href="<?= base_url("/admin/user/Document Controller")?>">Document Controllers</a></li>
                <li><a href="<?= base_url("/admin/user/President")?>">President</a></li>
            </ul>
        </li>
      <li>
            <a href="#logsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs" aria-hidden="true"></i> Action Logs</a>
            <ul class="collapse list-unstyled" id="logsSubmenu">
                <li><a href="<?= base_url("/admin/logs/user")?>">User Logs</a></li>
                <li><a href="<?= base_url("/admin/logs/audit_calendar")?>">Audit Calendar Events</a></li>
                <li><a href="<?= base_url("/admin/logs/audit_calendar_event_type")?>">Audit Calendar Event Types</a></li>
                <li><a href="<?= base_url("/admin/logs/nea")?>">News, Events, Announcements</a></li>
                <li><a href="<?= base_url("/admin/logs/user")?>">Audit Summary Reports(TO confirm)</a></li>
                <li><a href="<?= base_url("/admin/logs/emanual")?>">E-Manuals</a></li>
            </ul>
        </li>
      <li><a href="<?= base_url("/auth/logout")?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
    </ul>
</nav>