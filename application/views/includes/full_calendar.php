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
				<?php foreach ($events as $event) {
					$e['id'] = $event['id'];
					$e['title'] = $event['title'];
					$e['start'] = ($event['start'][1] == '00:00:00') ? $start[0] : $event['start'];
					$e['end'] = ($event['end'][1] == '00:00:00') ? $end[0] : $event['end'];
					$e['backgroundColor'] = $event['color'];

					echo json_encode($e);
				} ?>
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
