
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

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
                    var officeSelect = $('#office_list');  // The office dropdown
                    officeSelect.empty();  // Clear existing options

                    // Append new options from the response
                    $.each(response, function(index, office) {
                        officeSelect.append($('<option>', {
                            value: office.Office_Name,
                            text: office.Office_Name
                        }));
                    });
                },
                error: function() {
                    alert('Error fetching offices');
                }
            });
        }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.querySelector('.btn-warning').addEventListener('click', function () {
    var modalElement = document.getElementById('ModalAdd');
    if (modalElement) {
      var modal = new bootstrap.Modal(modalElement);
      modal.hide();
    }
  });
</script>

</body>
</html>
