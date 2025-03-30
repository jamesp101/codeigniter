<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>QAADMS</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon">
	<!-- Bootstrap CSS -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



	<!--<link src="<?= base_url('/assets/css/admin-css/custom-styles.css') ?>" rel="stylesheet">-->

	<link href="https://cdn.datatables.net/v/dt/dt-2.1.4/datatables.min.css" rel="stylesheet">
	<link href="<?= base_url('/assets/css/custom-css.css') ?>" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>


	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.datatables.net/v/dt/dt-2.1.4/datatables.min.js"></script>

	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script async defer src="https://cdn.jsdelivr.net/npm/altcha/dist/altcha.min.js" type="module"></script>
	<script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table').DataTable({
				"paging": true,
				"searching": true,
				"ordering": true,
				"info": true
			});
		});
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('') ?>">
				<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="logo"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= base_url('') ?>">Home</a>
					</li>
					<?php if (!$this->session->userdata("username")) {
						echo '<li class="nav-item">
            <a class="nav-link" href=' . base_url("/login") . '> Login</a>
        </li>';
					} ?>

					<?php if ($this->session->userdata("username")) {
						echo '
            <li class="nav-item">
                <a class="nav-link" href="' . base_url('profile') . '">Profile Settings</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                    Tools
                </a>
                <ul class="dropdown-menu dropdown-menu-end">';

						// Only display "Document Change Request" if the user is not "President"
						if ($this->session->userdata('role') != 'President') {
							echo '
                    <li>
                        <a class="dropdown-item" href="' . base_url('dcrform/list') . '">
                            Document Change Request ' . (($this->session->userdata('role') == 'Requester') ? "List" : "(Received Forms)") . '
                        </a>
                    </li>';
						}

						// Show "Document Change Request Form" only for "Requester" role
						if ($this->session->userdata('role') == 'Requester') {
							echo '
                    <li>
                        <a class="dropdown-item" href="' . base_url('dcrform') . '">Document Change Request Form</a>
                    </li>';
						}
						// Show "News, Events & Announcements" only for President and Director for QAIE roles
						if ($this->session->userdata('role') == 'President' || $this->session->userdata('role') == 'Director for QAIE') {
							echo '
                    <li><a class="dropdown-item" href="' . base_url('news_and_events') . '">News, Events & Announcements</a></li>';
						}

						echo '
                    <li><a class="dropdown-item" href="' . base_url('emanuals/list') . '">E-manuals</a></li>
                    <li><a class="dropdown-item" href="' . base_url('documentations') . '">Documentations</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="' . base_url('auth/logout') . '">Logout</a>
            </li>';
					} ?>

				</ul>

			</div>
		</div>
	</nav>
