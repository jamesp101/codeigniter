<?php $this->load->view('includes/header'); ?>
<div class="container-login">
    <div class="login-box">
        <?php echo validation_errors(); ?>

        <?php if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger text-center">' . $this->session->flashdata('error') . '</div>';
        } ?>

        <?php if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-info">' . $this->session->flashdata('message') . '</div>';
        } ?>
        <?php echo form_open('auth/login_submit'); ?>
        <div class="input-group flex-nowrap">
           
            <input
                id="username"
                name="username"
                type="text"
                class="form-control"
                placeholder="Username"
                aria-label="Username"
                aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap" style="position: relative;">
            <input
                id="password"
                name="password"
                type="password"
                class="form-control"
                style="background-color: #fff; padding-right: 40px;"
                placeholder="Password"
                aria-label="Password"
                aria-describedby="addon-wrapping">
            <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer; position: absolute; right: 10px; top: 50%; transform: translateY(-70%); background: none; border: none; display: flex; align-items: center; z-index: 99;">
                <i class="fa fa-eye" id="togglePasswordIcon"></i>
            </span>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var toggleIcon = document.getElementById('togglePasswordIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>