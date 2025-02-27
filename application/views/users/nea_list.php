<?php $this->load->view('includes/header'); ?>
<style>
  .announcement-table {
    margin: 100px auto;
  }
  .announcement-table td img {
    width: 150px;
    height: 150px;
    object-fit: fill;
    border: 1px solid #333;
    border-radius: 10px;
  }
  .before-table {
    text-align: center;
  }
  .before-table button,
  .before-table h2{
    margin-bottom: 50px;
  }
  .before-table h5{
    margin-bottom: 20px;
  }

</style>

<div class="announcement-table container">
<a href="<?= base_url('') ?>"><button class="btn btn-info text-white">< Go Back Home</button></a>
  <div class="before-table">
  <h2>View News, Events & Announcements</h2>
  <?php
    if (in_array($this->session->userdata('role'), ['President', 'Director for QAIE'])) {
        echo '<button id="add-nea" data-bs-target="#neaModal" data-bs-toggle="modal" class="btn btn-success">Add New</button>';
    }
  ?>
  </div>


<!-- Modal -->
<div id="neaModal" class="modal fade"
              tabindex="-1"
              aria-labelledby="neaModal"
              aria-hidden="true">
  <!-- Modal Content -->
  <div class="modal-dialog">
    <div class="modal-content p-3">
    <?= form_open_multipart('news_and_events/create'); ?>
      <!-- Image Upload -->
      <div class="mb-3">
        <label for="imageUpload" class="form-label">Upload Image</label>
        <input type="file" name="NEA_Image" class="form-control" id="imageUpload" required accept="image/*">
      </div>

      <!-- Category Dropdown -->
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select"  name="Category" id="category" required>
          <option value="" disabled selected>Select a category</option>
          <option value="News">News</option>
          <option value="Events">Events</option>
          <option value="Announcements">Announcements</option>
        </select>
      </div>

      <!-- Title -->
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="NEA_Title" class="form-control" id="title" placeholder="Enter title" required>
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="NEA_Description" id="description" rows="5" placeholder="Enter description here..." required></textarea>
      </div>

      <!-- Buttons -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary my-close-btn">Close</button>
      </div>
    <?= form_close(); ?>
    </div>
  </div>
</div>


  <h5>List of News, Events & Announcements</h5>
  <table id="table" class="table table-bordered">
    <thead>
      <tr>
        <th>Date Uploaded</th>
        <th>Image</th>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
            foreach ($neas as $nea):
        ?>
      <tr>
        <td><?= $nea['Date_Uploaded'] ?></td>
        <td><img src="<?= base_url('nea_files/'.$nea['NEA_Image']) ?>"/></td>
        <td><?= $nea['Category'] ?></td>
        <td><?= $nea['NEA_Title'] ?></td>
        <td><?= $nea['NEA_Description'] ?></td>
        <td>
        <?php
          if (in_array($this->session->userdata('role'), ['President', 'Director for QAIE'])) {
              echo '<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#neaModalEdit' . $nea['ID_NEA'] . '">Edit/View</button>';
          }
        ?>

        <a href="<?php echo base_url('news_and_events/' . $nea['ID_NEA']); ?>"><button class="btn btn-info">Read More</button></a></td>
        <!-- Modal -->
        <div id="neaModalEdit<?= $nea['ID_NEA'] ?>"
              class="modal fade"
              tabindex="-1"
              aria-labelledby="neaModalEdit<?= $nea['ID_NEA'] ?>"
              aria-hidden="true"
              >
          <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content  p-3">
              <?= form_open_multipart('news_and_events/edit/'.$nea['ID_NEA']); ?>
                <!-- Image Upload -->
                <div class="mb-3">
                  <label for="imageUpload" class="form-label">Upload Image</label>
                  <input type="file" name="NEA_Image" class="form-control" id="imageUpload" accept="image/*">
                  <div id="currentImage" style="margin-top: 10px;">
                      <img src="<?= base_url('nea_files/'.$nea['NEA_Image']); ?>" id="editCurrentImagePreview" alt="Current Image" height="100">
                  </div>
                </div>

                <!-- Category Dropdown -->
                <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-select"  name="Category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="News" <?= $nea['Category'] == "news" ? 'selected' : '' ?>>News</option>
                    <option value="Events" <?= $nea['Category'] == "events" ? 'selected' : '' ?>>Events</option>
                    <option value="Announcements" <?= $nea['Category'] == "announcements" ? 'selected' : '' ?>>Announcements</option>
                  </select>
                </div>

                <!-- Title -->
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="NEA_Title" class="form-control" id="title" placeholder="Enter title" value="<?= $nea['NEA_Title'] ?>" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" name="NEA_Description" id="description" rows="5" placeholder="Enter description here..." required><?= $nea['NEA_Description'] ?></textarea>

                </div>

                <!-- Buttons -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                  <button type="button" data-bs-dismiss="modal" class="btn btn-secondary close">Close</button>
                  <button class="btn btn-danger delete-btn" data-id="<?= $nea['ID_NEA'] ?>">Delete</button>
                </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        if (confirm('Are you sure you want to delete this item?')) {
          fetch(`<?= base_url('news_and_events/delete/') ?>${id}`, {
            method: 'POST',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Content-Type': 'application/json',
            },
          })
          .then(response => {
            if (response.ok) {
              alert('Item deleted successfully!');
              location.reload(); // Reload the table
            } else {
              alert('Failed to delete the item. Please try again.');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
          });
        }
      });
    });
  });
</script>

<?php $this->load->view('includes/footer'); ?>