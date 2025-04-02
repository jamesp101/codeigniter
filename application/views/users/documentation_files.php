<?php $this->load->view('includes/header'); ?>
<style>
	.docs-page h2 {
		margin-bottom: 1.2em;
	}

	.docs-page .heading {
		text-align: center;
	}
</style>

<div class="container" style="margin-top:25px;">


	<!-- Modal -->
	<div class="modal fade" id="addDocumentation" tabindex="-1" aria-labelledby="addDocumentationLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Add Document</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?= form_open_multipart('documentations/create'); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="file_title">File Title</label>
						<input type="text" name="File_Title_Brkt" id="file_title" class="form-control" required="required" maxlength="100" />
						<input type="text" name="folder_id" id="file_title" class="form-control" hidden required="required" maxlength="100" value="<?= $folder_id ?>" />
					</div>
					<div class="form-group">
						<label for="file_inp">Upload File</label>
						<input type="file" name="file" id="file_inp" class="form-control-file" required="required" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Upload</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>

<!-- Subfolder Modal -->
<div class="modal fade" id="addSubfolder" tabindex="-1" aria-labelledby="addDocumentationLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Add Document</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open_multipart('documentations/create_subfolder'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="file_title">File Title</label>
					<input type="text" name="subfolder_name" id="subfolder_name" class="form-control" required="true" maxlength="100">
					<input type="hidden" name="folder_id" id="folder_id" class="form-control" hidden required maxlength="100" value="<?= $folder_id ?>" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>





<div class="docs-page">
	<div class="heading">
		<h2> Documentations</h2>

		<?php $allowed_roles = ['Document Controller', 'Director for QAIE', 'QAIE Management Officer']; ?>

		<?php if (in_array($this->session->userdata('role'), $allowed_roles)): ?>
			<?php if (!$current_folder['is_archived']): ?>

				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDocumentation">
					Add Documentation
				</button>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubfolder">
					Add Subfolder
				</button>

			<?php endif; ?>
		<?php endif; ?>

		<?php if ($this->session->flashdata('error')) {
			echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
		} ?>

	</div>
	<div class="container" style="margin-top:25px">
		<h3>List of Documentations</h3> <br />
		<br>
		<ul>
		</ul>
		<table id="table" class="table table-bordered">
			<thead>
				<tr>
					<th>File Name</th>
					<th>Date Uploaded</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php $parent_link =
							$current_folder['parent_id'] === NULL
							? '/documentations/'
							:  $current_folder['parent_id']
						?>
						<a href="<?= $parent_link ?>">
							📁 ..
						</a>
					</td>
					<td />
					<td />
				</tr>

				<?php foreach ($subfolders as $folder): ?>
					<tr>
						<td>
							<?php $subfolder_url = site_url('/documentations/folder/' . $folder['id']) ?>
							<a href="<?= $subfolder_url ?>">
								📁 <?= $folder['name'] ?>
							</a>
						</td>
						<td>
							<?= $folder['created_at'] ?>
						</td>
						<td></td>
					</tr>
				<?php endforeach; ?>

				<?php foreach ($documentations as $documentation): ?>
					<tr>
						<td>📄 <?= $documentation['File_Title']; ?></td>
						<td><?= $documentation["Date_Uploaded"]; ?></td>

						<td>

							<a href="<?= site_url('documentations/view/' . $documentation['File_ID']) ?>"
								class="btn btn-outline-primary" target="_blank">
								<span class="fa fa-eye"></span>
							</a>

							<?php if ($this->session->userdata('role') === 'Document Controller'): ?>

								<?php if (!$current_folder['is_archived']): ?>
									<button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal_delete_documentation<?= $documentation['File_ID'] ?>">
										<i class="fa fa-trash"></i>
									</button>
								<?php endif; ?>

								<div class="modal fade" id="modal_delete_documentation<?php echo $documentation['File_ID']; ?>" aria-labelledby="addDocumentationLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<?php echo form_open('documentations/delete/' . $documentation['File_ID']); ?>

											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">Delete File</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>

											<div class="modal-body">

												<div class="col-md-12">
													<div class="form-group">
														<!-- Hidden Input Fields for Data Passing -->
														<input type="hidden" name="File_ID_Brkt" value="<?php echo $documentation['File_ID']; ?>" class="form-control" readonly="readonly" />
														<input type="hidden" name="File_Title_Brkt_I" value="<?php echo $documentation['File_Title']; ?>" />
														<input type="hidden" name="Date_Uploaded_Brkt_I" value="<?php echo $documentation['Date_Uploaded']; ?>" />

														<!-- Confirmation Message -->
														<center>
															<h3 class="text-danger">Are you sure you want to delete this File?</h3>
														</center>
													</div>
												</div>
											</div>

											<div class="modal-footer">
												<!-- Close and Submit Buttons -->
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button name="yes_delete_documentation" class="btn btn-success">Yes</button>
											</div>

											<?php echo form_close(); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<?php $this->load->view('includes/footer'); ?>
