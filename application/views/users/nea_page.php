<?php $this->load->view('includes/header'); ?>

<style>
    .nea-page-content {
    flex-direction: column;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
    }
    .nea-page-content img {
        width: 25%;
        height: auto;
    }
</style>

<div class=" py-5 container">
    <a href="<?= base_url('') ?>"><button class="btn btn-info text-white">< Go Back Home</button></a>
</div>


<div class="nea-page-content container">
    <img src="<?= base_url('/nea_files/'.$nea_data['NEA_Image'])?>" height="100"/>
<h3><?= $nea_data['NEA_Title'] ?></h3>
<h5><?= $nea_data['NEA_Description'] ?></h5>
</div>


<?php $this->load->view('includes/footer'); ?>