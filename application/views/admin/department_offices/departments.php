<div class="container">
    <h1>Departments</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">
        Create Department
    </button>
    <!-- Modal -->
    <div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <?php echo form_open('admin/department/create'); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input
                    id="Department_Name"
                    name="Department_Name"
                    type="text"
                    class="form-control"
                    placeholder="Department Name"
                    aria-label="Department Name"
                    aria-describedby="addon-wrapping">
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
    <table id="table" class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo $department->ID_Department; ?></td>
                <td><?php echo $department->Department_Name; ?></td>
                <td class="d-flex flex-row">
                    <button type="button" class="btn btn-warning mx-2"data-bs-toggle="modal" data-bs-target="#editDepartmentModal<?php echo $department->ID_Department; ?>">Edit</button>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editDepartmentModal<?php echo $department->ID_Department; ?>" tabindex="-1" aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <?php echo form_open('admin/department/edit/' . $department->ID_Department); ?>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <input
                                    id="Department_Name"
                                    name="Department_Name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Department Name"
                                    aria-label="Department Name"
                                    aria-describedby="addon-wrapping"
                                    value=<?php echo $department->Department_Name; ?>>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('admin/department/delete/' . $department->ID_Department, ['onsubmit' => "return confirm('Are you sure you want to delete this department?');"]); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    <?php echo form_close(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>