<?php include 'header.php' ?>
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
<?php include 'sidebar.php' ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
    <div class="form-container">
        <h4 class="form-title">Add New Room</h4>
        <form action="/rooms" method="POST">
            <div class="mb-3">
                <label for="room_number" class="form-label">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Room Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">-- Select Type --</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">-- Select Status --</option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rent_amount" class="form-label">Rent Amount ($)</label>
                <input type="number" class="form-control" id="rent_amount" name="rent_amount" step="0.01" required>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-green px-4">Add Room</button>
            </div>
        </form>
    </div>
</div>
</div>