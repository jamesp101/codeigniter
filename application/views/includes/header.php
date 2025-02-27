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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                editable: <?= ($this->session->userdata('role') !== 'Requester') ? 'true' : 'false' ?>,
                selectable: <?= ($this->session->userdata('role') !== 'Requester') ? 'true' : 'false' ?>,
                select: function(info) {
                    <?php if ($this->session->userdata('role') !== 'Requester') : ?>
                        console.log(JSON.stringify(info));
                        console.log(moment(info.start).format('YYYY-MM-DD HH:mm:ss'));
                        // // Show modal to add event
                        document.getElementById('start').value = moment(info.start).format('YYYY-MM-DD HH:mm:ss');
                        document.getElementById('end').value = moment(info.end).format('YYYY-MM-DD HH:mm:ss');
                        var addModal = new bootstrap.Modal(document.getElementById('ModalAdd'));
                        addModal.show();
                    <?php endif; ?>
                },
                events: [
                    <?php foreach ($events as $event):
                        $start = explode(" ", $event['start']);
                        $end = explode(" ", $event['end']);
                        $start = ($start[1] == '00:00:00') ? $start[0] : $event['start'];
                        $end = ($end[1] == '00:00:00') ? $end[0] : $event['end'];
                    ?>,
                        {
                            id: "<?php echo $event['id']; ?>",
                            title: "<?php echo $event['title']; ?>",
                            start: "<?php echo $start; ?>",
                            end: "<?php echo $end; ?>",
                            backgroundColor: "<?php echo $event['color']; ?>"
                        },
                    <?php endforeach; ?>
                ],
                eventClick: function(info) {
                    <?php if ($this->session->userdata('role') !== 'Requester') : ?>
                        console.log('event click');
                        // Show modal to edit event
                        document.getElementById('id').value = info.event.id;
                        document.getElementById('titleEdit').value = info.event.title;
                        document.getElementById('colorEdit').value = info.event.backgroundColor;
                        document.getElementById('startEdit').value = moment(info.event.start).format('YYYY-MM-DD HH:mm:ss');
                        document.getElementById('endEdit').value = info.event.end ? moment(info.event.end).format('YYYY-MM-DD HH:mm:ss') : moment(info.event.start).format('YYYY-MM-DD HH:mm:ss');
                        var editModal = new bootstrap.Modal(document.getElementById('ModalEdit'));
                        editModal.show();
                    <?php endif; ?>
                },
                eventDrop: function(info) {
                    <?php if ($this->session->userdata('role') !== 'Requester') : ?>
                        editEvent(info.event);
                    <?php endif; ?>
                },
                eventResize: function(info) {
                    <?php if ($this->session->userdata('role') !== 'Requester') : ?>
                        editEvent(info.event);
                    <?php endif; ?>
                }
            });
            calendar.render();
        });

        function editEvent(event) {
            let start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
            let end = event.end ? moment(event.end).format('YYYY-MM-DD HH:mm:ss') : start;
            let id = event.id;

            // Prepare data to send via AJAX
            let eventData = {
                id,
                start,
                end
            };

            // Send the updated event data to the backend
            $.ajax({
                url: 'editEventDate.php',
                type: 'POST',
                data: eventData,
                success: function(response) {
                    if (response === 'OK') {
                        alert('Event updated successfully');
                    } else {
                        alert('Failed to update event. Please try again.');
                    }
                }
            });
        }
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