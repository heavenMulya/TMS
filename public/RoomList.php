<?php include 'header.php' ?>

<style>
    html,
body,
.intro {
  height: 100%;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}
body{margin-top:20px;
background-color:#eee;
}
.project-list-table {
    border-collapse: separate;
    border-spacing: 0 12px
}

.project-list-table tr {
    background-color: #fff
}

.table-nowrap td, .table-nowrap th {
    white-space: nowrap;
}
.table-borderless>:not(caption)>*>* {
    border-bottom-width: 0;
}
.table>:not(caption)>*>* {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}



a {
    color:#38ce3c;
    text-decoration: none;
}

.badge-soft-danger {
    color: #f56e6e !important;
    background-color: rgba(245,110,110,.1);
}
.badge-soft-success {
    color: #63ad6f !important;
    background-color: rgba(99,173,111,.1);
}

.badge-soft-primary {
    color: #3b76e1 !important;
    background-color: rgba(59,118,225,.1);
}

.badge-soft-info {
    color: #57c9eb !important;
    background-color: rgba(87,201,235,.1);
}


.bg-soft-primary {
    background-color: rgba(59,118,225,.25)!important;
}
.btn-add{
  background-color:#38ce3c;
  color:white;
}
.text-edit{
  color:#38ce3c;
}
  </style>

<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
<?php include 'sidebar.php' ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">

    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="success-alert">
        <strong>Success</strong> <p id="success-message">You should check in on some of those fields below.</p> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;" id="error-alert">
            <strong>Error</strong><p id="error-message">You should check in on some of those fields below.</p> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <div class="row align-items-center mt-3">
            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <h5 class="card-title">Rooms List <span class="text-muted fw-normal ms-2" id="total_list">(834)</span></h5>
                </div>
            </div>
            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    
                <div>
    <a href="#" data-bs-toggle="modal" data-bs-target="#addRoomModal" class="btn btn-add">
        <i class="bx bx-plus me-1"></i> Add New
    </a>
</div>

                  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">room number</th>
                                    <th scope="col">type</th>
                                    <th scope="col">status</th>
                                    <th scope="col">rent amount</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>
                                    <td><a href="#" class="text-body">Simon Ryles</a></td>
                                    <td><span class="badge badge-soft-success mb-0">Full Stack Developer</span></td>
                                    <td>SimonRyles@minible.com</td>
                                    <td>125</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-2 text-edit"><i class="bx bx-pencil font-size-18"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                            </li>

                                        </ul>
                                    </td>
                                </tr>
                           
              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-0 align-items-center pb-4">
  <div class="col-sm-6">
    <div><p id="entry-info" class="mb-sm-0"></p></div>
  </div>
  <div class="col-sm-6">
    <ul class="pagination" id="pagination" class="mb-sm-0"></ul>
  </div>
</div>

                
          



        <!-- Add Room Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header" style=" color: #38ce3c;">
        <h5 class="modal-title" id="addRoomModalLabel">Add New Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form action="" method="" id="addRoomForm">
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
              <option value="vacant">vacant</option>
              <option value="occupied">Occupied</option>
              <option value="maintenance">Maintenance</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="rent_amount" class="form-label">Rent Amount ($)</label>
            <input type="number" class="form-control" id="rent_amount" name="rent_amount" step="0.01" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addRoomForm" class="btn" style="background-color: #38ce3c; color: white;" id="save_btn">Save</button>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="color: #38ce3c;">
        <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form id="editRoomForm">
          <input type="hidden" id="edit_room_id">
          <div class="mb-3">
            <label for="edit_room_number" class="form-label">Room Number</label>
            <input type="text" class="form-control" id="edit_room_number" name="room_number" required>
          </div>
          <div class="mb-3">
            <label for="edit_type" class="form-label">Room Type</label>
            <select class="form-select" id="edit_type" name="type" required>
              <option value="Single">Single</option>
              <option value="Double">Double</option>
              <option value="Suite">Suite</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="edit_status" class="form-label">Status</label>
            <select class="form-select" id="edit_status" name="status" required>
              <option value="vacant">Vacant</option>
              <option value="occupied">Occupied</option>
              <option value="maintenance">Maintenance</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="edit_rent_amount" class="form-label">Rent Amount ($)</label>
            <input type="number" class="form-control" id="edit_rent_amount" name="rent_amount" step="0.01" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editRoomForm" id="update_btn" class="btn" style="background-color: #38ce3c; color: white;">Update</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="deleteRoomModal" tabindex="-1" aria-labelledby="deleteRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header text-danger">
        <h5 class="modal-title" id="deleteRoomModalLabel">Delete Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <p>Are you sure you want to delete this room?</p>
        <input type="hidden" id="delete_room_id">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
      </div>

    </div>
  </div>
</div>



    </div>

    <script>
$(document).ready(function(){
  loadRooms();
 $('#save_btn').click(function(e){
  e.preventDefault();
  const formData = {
    room_number:$('#room_number').val(),
    type:$('#type').val(),
    status:$('#status').val(),
    rent_amount:$('#rent_amount').val(),
  };

  $.ajax({
            method:'POST',
            url:'https://tms-portal.up.railway.app/api/room/save',
            dataType:'json',
            headers:{
                'Content-Type':'application/json'
            },
            data:JSON.stringify(formData),
            success:function(response){
              $('#addRoomModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
                location.reload();
                console.log(response)
            },
            error:function(error){
              $('#addRoomModal').modal('hide');
               window.location.href='http://localhost/stellar-admin-free/dist/RoomList.php'
                $('#error-alert').show();
                $('#error-message').text(error.responseJSON.message)
                setTimeout(function(){
                    $('#error-alert').hide();
                },3000);
               

                console.log(error.responseJSON.message)
            }

            })

  //console.log(formData);
 })


 $('#update_btn').click(function (e) {
    e.preventDefault();

    const id = $('#edit_room_id').val();
    const formData = {
        room_number: $('#edit_room_number').val(),
        type: $('#edit_type').val(),
        status: $('#edit_status').val(),
        rent_amount: $('#edit_rent_amount').val(),
    };
   // console.log(formData)

    $.ajax({
        method: 'PUT', 
        url: `https://tms-portal.up.railway.app/api/room/update/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#editRoomModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#editRoomModal').modal('hide');
          $('#error-alert').show();
                $('#error-message').text(error.responseJSON.message)
                setTimeout(function(){
                    $('#error-alert').hide();
                },3000);
        }
    });

   // console.log(formData);
});

$('#confirmDeleteBtn').click(function (e) {
    e.preventDefault();

    const id = $('#delete_room_id').val();
  
    console.log(id)

    $.ajax({
        method: 'DELETE', 
        url: `https://tms-portal.up.railway.app/api/room/delete/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#deleteRoomModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#deleteRoomModal').modal('hide');
          $('#error-alert').show();
                $('#error-message').text(error.responseJSON.message)
                setTimeout(function(){
                    $('#error-alert').hide();
                },3000);
        }
    });

    //console.log(formData);
});

 

    $(document).on('click', '.openEditModal', function () {
    const id = $(this).data('id');
    const room_number = $(this).data('room_number');
    const type = $(this).data('type');
    const status = $(this).data('status');
    const rent_amount = $(this).data('rent_amount');

    $('#edit_room_id').val(id);
    $('#edit_room_number').val(room_number);
    $('#edit_type').val(type);
    $('#edit_status').val(status);
    $('#edit_rent_amount').val(rent_amount);

    const editModal = new bootstrap.Modal(document.getElementById('editRoomModal'));
    editModal.show();

    
});

$(document).on('click', '.openDeleteModal', function() {
  const id = $(this).data('id');
  $('#delete_room_id').val(id);

  const deleteModal = new bootstrap.Modal(document.getElementById('deleteRoomModal'));
  deleteModal.show();
});

function loadRooms(page = 1)
{
 
  $.ajax({
            method:'GET',
            url:`https://tms-portal.up.railway.app/api/room/get?page=${page}`,
            dataType:'json',
            success:function(response){
              console.log(response.data.data)
              let tbody=$('#tbody');
              tbody.empty();
              response.data.data.forEach(function(details)
            {
              tbody.append(`
               <tr id="row-${details.id}">
                                    <td><a href="#" class="text-body">${details.room_number}</a></td>
                                    <td><span class="badge badge-soft-success mb-0">${details.type}</span></td>
                                    <td>${details.status}</td>
                                    <td>${details.rent_amount}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                             <li class="list-inline-item">
          <a href="javascript:void(0);" 
             class="px-2 text-edit openEditModal" 
             data-id="${details.id}"
             data-room_number="${details.room_number}"
             data-type="${details.type}"
             data-status="${details.status}"
             data-rent_amount="${details.rent_amount}">
             <i class="bx bx-pencil font-size-18"></i>
          </a>
        </li>
                                            <li class="list-inline-item">
          <a href="javascript:void(0);" 
             class="px-2 text-danger openDeleteModal" 
             data-id="${details.id}">
             <i class="bx bx-trash-alt font-size-18"></i>
          </a>
        </li>

                                        </ul>
                                    </td>
                                </tr>
              `)
            }
            )
              // Entry Info Text
  const start = (response.data.current_page - 1) * response.data.per_page + 1;
  const end = Math.min(response.data.total, response.data.current_page * response.data.per_page);
  const total = response.data.total;
$('#total_list').text(`( ${total} ) Records`)
  $('#entry-info').text(`Showing ${start} to ${end} of ${total} entries`);

            renderPagination(response.data);
              console.log(response.data);
            },
            error:function(error){

            }
           
          })

}



function renderPagination(data) {
   console.log('working')
  const pagination = $('#pagination');
  pagination.empty();

  // Previous button
  pagination.append(`
    <li class="page-item ${data.current_page === 1 ? 'disabled' : ''}">
      <a href="#" class="page-link" data-page="${data.current_page - 1}">&laquo;</a>
    </li>
  `);

  // Page numbers
  for (let i = 1; i <= data.last_page; i++) {
    pagination.append(`
      <li class="page-item ${i === data.current_page ? 'active' : ''}">
        <a href="#" class="page-link" data-page="${i}">${i}</a>
      </li>
    `);
  }

  // Next button
  pagination.append(`
    <li class="page-item ${data.current_page === data.last_page ? 'disabled' : ''}">
      <a href="#" class="page-link" data-page="${data.current_page + 1}">&raquo;</a>
    </li>
  `);
}

$(document).on('click', '.page-link', function(e) {
  e.preventDefault();
  const page = $(this).data('page');
  if (page) loadRooms(page);
});

})








    </script>
      
     
  
      
