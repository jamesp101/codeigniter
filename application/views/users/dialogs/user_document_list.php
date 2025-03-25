<script>
	document.setAccess = async (folder, user) => {
		const loading = document.getElementById(`loading-${user}`)
		const checkbox = document.getElementById(`checkbox-${user}`)


		loading.classList.remove('d-none');
		checkbox.disabled = true


		if (checkbox.checked) {
			await fetch(`add_user_access/${folder}/${user}`, {
				method: 'post'
			});
		} else {

			await fetch(`remove_user_access/${folder}/${user}`, {
				method: 'post'
			});
		}

		checkbox.disabled = false
		loading.classList.add('d-none');
	}
</script>


<table id="users-list" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Has Access</th>
			<th>Name</th>
			<th>Office</th>
			<th>Type</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user) : ?>
			<?php $has_access_by_office = in_array($user['office'], $access);
			?>
			<tr>
				<td>
					<?php if ($has_access_by_office) : ?>
						<input
							type="checkbox"
							class="form-check-input"
							checked
							disabled>
						<br>
						<small>Office has access.</small>
					<?php else : ?>
						<input
							name="isSelected"
							type="checkbox"
							id="checkbox-<?= $user['user_id'] ?>"
							class="form-check-input"
							onclick="setAccess(<?= $folder_id ?>, <?= $user['user_id'] ?>)"
							<?= $user['has_access'] ? 'checked' : '' ?>>

						<div id="loading-<?= $user['user_id'] ?>" class="spinner-border d-none" role="status">
							<span class="visually-hidden">Loading...</span>
						</div>
					<?php endif; ?>


				</td>
				<td>
					<div>
						<span class="fa-solid fa-person"> </span>
						<?= $user['lastname'] ?>, <?= $user['firstname'] ?>
					</div>
					<small>
						<span class="fa-solid fa-email"> </span>
						<i>
							<?= $user['email_add'] ?>
						</i>
					</small>
				</td>
				<td>
					<small>
						<?= $user['office'] ?>
					</small>
				</td>

				<td>
					<div>
						<?= $user['type'] ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
