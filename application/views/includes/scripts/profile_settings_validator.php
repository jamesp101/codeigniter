<?php $this->load->view('includes/scripts/helpers'); ?>
<script>
	// Form submission handler
	function submitFirstNameForm() {
		// Apply validation
		var isValid = validateInput('#first_name', {
			required: true,
			regex: /^[a-zA-Z ]{2,50}$/, // 2-50 chars, letters and spaces
			minLength: 2,
			maxLength: 50
		}, {
			required: 'First Name is required',
			regex: 'First Name must be 2-50 characters and only letters and spaces',
			minLength: 'First Name must be at least 2 characters',
			maxLength: 'First Name cannot be longer than 50 characters'
		});

		if (isValid) {
			// Proceed with form submission (AJAX or regular form submit)
			var first_name = $('#first_name').val().trim();
			// AJAX call for updating the first name
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('user/update_first_name/' . $user['user_id']); ?>', // CI controller method
				data: {
					first_name: first_name
				},
				success: function(response) {
					if (response.status == 'success') {
						alert('Your firstname has been successfully updated!');
						window.location.href = "<?php echo current_url(); ?>";
					} else {
						alert('Error updating information!');
						window.location.href = "<?php echo current_url(); ?>";
					}
				}
			});
		} else {
			alert('Form validation failed. Please check the input.');
		}
	}


	function submitLastNameForm() {
		// Apply validation
		var isValid = validateInput('#last_name', {
			required: true,
			regex: /^[a-zA-Z ]{2,50}$/, // 2-50 chars, letters and spaces
			minLength: 2,
			maxLength: 50
		}, {
			required: 'Last Name is required',
			regex: 'Last Name must be 2-50 characters and only letters and spaces',
			minLength: 'Last Name must be at least 2 characters',
			maxLength: 'Last Name cannot be longer than 50 characters'
		});

		if (isValid) {
			// Proceed with form submission (AJAX or regular form submit)
			var last_name = $('#last_name').val().trim();
			// AJAX call for updating the last name
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('user/update_last_name/' . $user['user_id']); ?>', // CI controller method
				data: {
					last_name: last_name
				},
				success: function(response) {
					if (response.status == 'success') {
						alert('Your lastname has been successfully updated!');
						window.location.href = "<?php echo current_url(); ?>";
					} else {
						alert('Error updating information!');
						window.location.href = "<?php echo current_url(); ?>";
					}
				}
			});
		} else {
			alert('Form validation failed. Please check the input.');
		}
	}

	function submitUsernameForm() {
		// Apply validation
		var isValid = validateInput('#username', {
			required: true,
			regex: /^[a-zA-Z ]{2,50}$/, // 2-50 chars, letters and spaces
			minLength: 2,
			maxLength: 50
		}, {
			required: 'Username is required',
			regex: 'Username must be 2-50 characters and only letters and spaces',
			minLength: 'Username must be at least 2 characters',
			maxLength: 'Username cannot be longer than 50 characters'
		});

		if (isValid) {
			// Proceed with form submission (AJAX or regular form submit)
			var username = $('#username').val().trim();
			// AJAX call for updating the last name
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('user/update_username/' . $user['user_id']); ?>', // CI controller method
				data: {
					username: username
				},
				success: function(response) {
					if (response.status == 'success') {
						alert('Your username has been successfully updated!');
						window.location.href = "<?php echo current_url(); ?>";
					} else {
						alert('Error updating information!');
						window.location.href = "<?php echo current_url(); ?>";
					}
				}
			});
		} else {
			alert('Form validation failed. Please check the input.');
		}
	}


	function submitPasswordForm() {
		// Apply validation
		var isValid = validateInput('#password', {
			required: true,
			regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
			minLength: 2,
			maxLength: 50
		}, {
			required: 'Password is required',
			regex: `Password requirements not met:
• Must be at least 8 characters long
• Must contain at least one uppercase letter
• Must contain at least one number
• Must contain at least one special character (@$!%*?&)`,
			minLength: 'Password must be at least 2 characters',
			maxLength: 'Password cannot be longer than 50 characters'
		});

		if (isValid) {
			// Proceed with form submission (AJAX or regular form submit)
			var password = $('#password').val().trim();
			// AJAX call for updating the last name
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('user/update_password/' . $user['user_id']); ?>', // CI controller method
				data: {
					password: password
				},
				success: function(response) {
					if (response.status == 'success') {
						alert('Your Password has been successfully updated!');
						window.location.href = "<?php echo current_url(); ?>";
					} else {
						alert('Error updating information!');
						window.location.href = "<?php echo current_url(); ?>";
					}
				}
			});
		} else {
			alert('Form validation failed. Please check the input.');
		}
	}

	function submitEmailForm() {
		// Apply validation
		var isValid = validateInput('#email', {
			required: true,
			regex: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/, // 2-50 chars, letters and spaces
		}, {
			required: 'Email is required',
			regex: 'Email must be valid.',
		});

		if (isValid) {
			// Proceed with form submission (AJAX or regular form submit)
			var email = $('#email').val().trim();
			// AJAX call for updating the last name
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('user/update_email/' . $user['user_id']); ?>', // CI controller method
				data: {
					email: email
				},
				success: function(response) {
					if (response == 'success') {
						alert('Your Email has been successfully updated!');
						window.location.href = "<?php echo current_url(); ?>";
					} else {
						alert('Error updating information!');
						window.location.href = "<?php echo current_url(); ?>";
					}
				}
			});
		} else {
			alert('Form validation failed. Please check the input.');
		}
	}
</script>
