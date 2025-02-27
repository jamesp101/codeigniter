<?php $this->load->view('includes/header'); ?>
<div class="d-flex  flex-column justify-content-center align-items-center w-100">
    <div class="d-flex flex-column flex-grow-1 w-100 p-4">
        <?= isset($content) ? $content : '' ?>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>