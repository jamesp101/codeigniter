<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QAADMS Admin</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon">
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/v/dt/dt-2.1.4/datatables.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.4/datatables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/css/admin-css/custom-styles.css')?>" rel="stylesheet">


    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
            // Handle form submission
        $('#registerForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            // Clear previous errors
            $('#form_errors').html('').hide();

            // Perform AJAX request
            $.ajax({
              url: '<?= base_url('admin/user/create') ?>', // URL to submit to
                type: 'POST',
                data: $(this).serialize(), // Serialize form data
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    console.log(response);
                    if (response.status == 'error') {
                        // Show validation errors
                        $('#form_errors').html(response.errors).show();
                    } else if (response == 'success') {
                        // Show success message (you can also close the modal here)
                        window.location.href = "<?= current_url() ?>";
                        alert('User created successfully, and verification email sent!');
                        // $('#createUserModal').modal('hide'); // Hide modal on success
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.log(xhr.responseText);
                    window.location.href = "<?= current_url() ?>";
                }
            });
        });
      });
    </script>
     <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

</head>
<body>