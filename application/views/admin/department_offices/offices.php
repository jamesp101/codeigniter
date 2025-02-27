<div class="container">
    <h1>Offices</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createOfficeModal">
        Create Office
    </button>
    <!-- Modal -->
    <div class="modal fade" id="createOfficeModal" tabindex="-1" aria-labelledby="createOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <?php echo form_open('admin/office/create'); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Department" style="color:black;">Office Name:</label>
                        <input
                            id="Office_Name"
                            name="Office_Name"
                            type="text"
                            class="form-control"
                            placeholder="Office Name"
                            aria-label="Office Name"
                            aria-describedby="addon-wrapping"
                            required
                            >
                    </div>
                    <div class="form-group">
                        <label for="Department" style="color:black;">Department:</label>
                        <select name="Department_Category" id="department-list" class="form-control" required>
                            <option value="" selected disabled>---Select Department---</option>
                            <?php foreach ($departments as $department): ?>
                                <option value="<?= $department['Department_Name']; ?>"><?= $department['Department_Name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <table  id="table" class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offices as $office): ?>
            <tr>
                <td><?php echo $office->ID_Office; ?></td>
                <td><?php echo $office->Office_Name; ?></td>
                <td><?php echo $office->Department_Category; ?></td>
                <td class="d-flex flex-row">
                    <button type="button" class="btn btn-warning mx-2"data-bs-toggle="modal" data-bs-target="#editOfficeModal<?php echo $office->ID_Office; ?>">Edit</button>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editOfficeModal<?php echo $office->ID_Office; ?>" tabindex="-1" aria-labelledby="editOfficeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <?php echo form_open('admin/office/edit/' . $office->ID_Office); ?>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <input
                                    id="Office_Name"
                                    name="Office_Name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Office Name"
                                    aria-label="Office Name"
                                    aria-describedby="addon-wrapping"
                                    value=<?php echo $office->Office_Name; ?>>
                                <div class="form-group">
                                    <label for="Department" style="color:black;">Department:</label>
                                    <select name="Department_Category" id="department-list" class="form-control" required
                                        >
                                        <option value="" selected disabled>---Select Department---</option>
                                        <?php foreach ($departments as $department): ?>
                                            <option value="<?= $department['Department_Name']; ?>"
                                            <?php echo set_select('Department_Category', $department['Department_Name'], $office->Department_Category == $department['Department_Name']); ?>><?= $department['Department_Name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('admin/office/delete/' . $office->ID_Office, ['onsubmit' => "return confirm('Are you sure you want to delete this office?');"]); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    <?php echo form_close(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>