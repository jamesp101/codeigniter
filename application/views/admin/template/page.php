<?php $this->load->view('includes/admin/header'); ?>
<?php $this->load->view('includes/admin/side-nav'); ?>
<div class="d-flex  flex-column justify-content-center align-items-center w-100">
    <button class="btn sidebar-toggle d-md-none" onclick="toggleSidebar()">☰ Toggle Sidebar</button>
    <div class="d-flex flex-column flex-grow-1 w-100 p-4">
        <?= isset($content) ? $content : '' ?>
    </div>
</div>
<?php $this->load->view('includes/admin/footer'); ?>