<!-- Bootstrap JS -->


    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>

    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";  // Get base_url from PHP

        function getOffices(departmentName) {
    // Construct the URL using base_url + controller/method + departmentName as a slug
    var url = base_url + "office/get_offices_by_department/" + departmentName;

    // Make AJAX request
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var officeSelect = $('#Office_JV');  // The office dropdown
            officeSelect.empty();  // Clear existing options

            // Append a disabled default option
            officeSelect.append($('<option>', { 
                value: '', 
                text: 'Select an office', 
                disabled: true,  // Disable the option
                selected: true    // Make it the default selected option
            }));

            // Append new options from the response
            $.each(response, function(index, office) {
                // Format the value to include both ID and Name (separated by a pipe)
                var value = office.ID_Office + '|' + office.Office_Name;
                officeSelect.append($('<option>', {
                    value: value,  // Set the value to both office ID and name
                    text: office.Office_Name  // Display the office name
                }));
            });
        },
        error: function() {
            alert('Error fetching offices');
        }
    });
}

    </script>
  </body>
</html>