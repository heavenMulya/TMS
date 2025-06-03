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
                    <h5 class="card-title">tenants List <span class="text-muted fw-normal ms-2" id="total_list">(834)</span></h5>
                </div>
            </div>
            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    
                <div>
    <a href="#" data-bs-toggle="modal" data-bs-target="#addtenantModal" class="btn btn-add">
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
                                    <th scope="col"> full_name</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">email</th>
                                    <th scope="col">id number</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">lease start</th>
                                    <th scope="col">lease end</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>
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

                
          



        <!-- Add tenant Modal -->
<div class="modal fade" id="addtenantModal" tabindex="-1" aria-labelledby="addtenantModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header" style=" color: #38ce3c;">
        <h5 class="modal-title" id="addtenantModalLabel">Add New tenant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form action="" method="" id="addtenantForm">
          <div class="mb-3">
            <label for="full_name" class="form-label">full name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="id_number" class="form-label">id number</label>
            <input type="text" class="form-control" id="id_number" name="id_number" required>
          </div>
          <div class="mb-3">
          <label for="room_id" class="form-label">room</label>
            <select class="form-select" id="room_id" name="room_id" required>
              <option value="Single">Single</option>
              <option value="Double">Double</option>
              <option value="Suite">Suite</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="lease_start" class="form-label">lease start</label>
            <input type="date" class="form-control" id="lease_start" name="lease_start" required>
          </div>
          <div class="mb-3">
            <label for="lease_end" class="form-label">lease end</label>
            <input type="date" class="form-control" id="lease_end" name="lease_end" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addtenantForm" class="btn" style="background-color: #38ce3c; color: white;" id="save_btn">Save</button>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="edittenantModal" tabindex="-1" aria-labelledby="edittenantModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="color: #38ce3c;">
        <h5 class="modal-title" id="edittenantModalLabel">Edit tenant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form id="edittenantForm">
          <input type="hidden" id="edit_tenant_id">
          <div class="mb-3">
            <label for="full_name" class="form-label">full name</label>
            <input type="text" class="form-control" id="edit_full_name" name="full_name" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="phone" class="form-control" id="edit_phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="edit_email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="id_number" class="form-label">id number</label>
            <input type="text" class="form-control" id="edit_id_number" name="id_number" required>
          </div>
          <div class="mb-3">
          <label for="room_id" class="form-label">room</label>
            <select class="form-select" id="edit_room_id" name="room_id" required>
              <option value="Single">Single</option>
              <option value="Double">Double</option>
              <option value="Suite">Suite</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="lease_start" class="form-label">lease start</label>
            <input type="date" class="form-control" id="edit_lease_start" name="lease_start" required>
          </div>
          <div class="mb-3">
            <label for="lease_end" class="form-label">lease end</label>
            <input type="date" class="form-control" id="edit_lease_end" name="lease_end" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="edittenantForm" id="update_btn" class="btn" style="background-color: #38ce3c; color: white;">Update</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="deletetenantModal" tabindex="-1" aria-labelledby="deletetenantModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header text-danger">
        <h5 class="modal-title" id="deletetenantModalLabel">Delete tenant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <p>Are you sure you want to delete this tenant?</p>
        <input type="hidden" id="delete_tenant_id">
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
  loadtenants();
  
  $.ajax({
                method:'GET',
                url:'https://tms-production-65c4.up.railway.app/api/room/getAll',
                dataType:'json',
                success:function(response){
    let room_id_select=$('#room_id');
    room_id_select.empty();
    room_id_select.append(`
    <option >Select Room</option>
        
        `)
    response.data.forEach(function(room){
        room_id_select.append($(' <option ></option>').attr('value',room.id).text(room.room_number));
   
       // console.log(category.categoryName)
    })
    //console.log(response)
                },
                error:function(error){
            
                console.log(error)
    },
            })


 $('#save_btn').click(function(e){
    
  e.preventDefault();
  let room_ids=$('#room_id').val()
  const formData = {
    full_name:$('#full_name').val(),
    phone:$('#phone').val(),
    email:$('#email').val(),
    id_number:$('#id_number').val(),
    lease_start:$('#lease_start').val(),
    lease_end:$('#lease_end').val(),
    room_id:$('#room_id').val(),
  };
  console.log(formData)
  $.ajax({
            method:'POST',
            url:'https://tms-production-65c4.up.railway.app/api/tenant/save',
            dataType:'json',
            headers:{
                'Content-Type':'application/json'
            },
            data:JSON.stringify(formData),
            success:function(response){
              $('#addtenantModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
              
               updateRoomStatus(room_ids)
             
                console.log(response)
            },
            error:function(error){
              $('#addtenantModal').modal('hide');
               //window.location.href='http://localhost/stellar-admin-free/dist/Tenants.php'
                $('#error-alert').show();
                $('#error-message').text(error.responseJSON.message)
                setTimeout(function(){
                    $('#error-alert').hide();
                },3000);
               

                console.log(error)
            }

            })

  //console.log(formData);
 })


 $('#update_btn').click(function (e) {
    e.preventDefault();

    const id = $('#edit_tenant_id').val();
    const formData = {
    full_name:$('#edit_full_name').val(),
    phone:$('#edit_phone').val(),
    email:$('#edit_email').val(),
    id_number:$('#edit_id_number').val(),
    lease_start:$('#edit_lease_start').val(),
    lease_end:$('#edit_lease_end').val(),
    room_id:$('#edit_room_id').val(),
    };
   // console.log(formData)

    $.ajax({
        method: 'PUT', 
        url: `https://tms-production-65c4.up.railway.app/api/tenant/update/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#edittenantModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#edittenantModal').modal('hide');
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

    const id = $('#delete_tenant_id').val();
  
    console.log(id)

    $.ajax({
        method: 'DELETE', 
        url: `https://tms-production-65c4.up.railway.app/api/tenant/delete/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#deletetenantModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#deletetenantModal').modal('hide');
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
    const full_name = $(this).data('full_name');
    const phone = $(this).data('phone');
    const email = $(this).data('email');
    const id_number = $(this).data('id_number');
    const room_id = $(this).data('room_id');
    const room_number = $(this).data('room_number');
    const lease_start = $(this).data('lease_start');
    const lease_end = $(this).data('lease_end');

    console.log(room_number)

    $('#edit_tenant_id').val(id);
    $('#edit_full_name').val(full_name);
    $('#edit_phone').val(phone);
    $('#edit_email').val(email);
    $('#edit_id_number').val(id_number);
   // $('#edit_room_id').val(room_id);
    $('#edit_room_id').val(room_id)
                //let options='<option >Select</option>'
                let options
                options +=`<option value="${room_id}">${room_number}</option>`
                $('#edit_room_id').html(options)
    $('#edit_lease_start').val(lease_start);
    $('#edit_lease_end').val(lease_end);

    const editModal = new bootstrap.Modal(document.getElementById('edittenantModal'));
    editModal.show();

    
});

$(document).on('click', '.openDeleteModal', function() {
  const id = $(this).data('id');
  $('#delete_tenant_id').val(id);

  const deleteModal = new bootstrap.Modal(document.getElementById('deletetenantModal'));
  deleteModal.show();
});

function updateRoomStatus(id)
{
    console.log('updateRoomStatus')
    $.ajax({
        method: 'PUT', 
        url: `https://tms-production-65c4.up.railway.app/api/room/updatestatus/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        success: function (response) {
          location.reload();
        },
        error: function (error) {
         
        }
    });  
}

function loadtenants(page = 1)
{
 
  $.ajax({
            method:'GET',
            url:`https://tms-production-65c4.up.railway.app/api/tenant/get?page=${page}`,
            dataType:'json',
            success:function(response){
              let tbody=$('#tbody');
              tbody.empty();
              response.data.data.forEach(function(details)
            {
              tbody.append(`
               <tr id="row-${details.id}">
                                    <td><a href="#" class="text-body">${details.full_name}</a></td>
                                    <td><span class="badge badge-soft-success mb-0">${details.phone}</span></td>
                                    <td>${details.email}</td>
                                    <td>${details.id_number}</td>
                                    <td>${details.room.room_number}</td>
                                    <td>${details.lease_start}</td>
                                    <td>${details.lease_end}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                             <li class="list-inline-item">
          <a href="javascript:void(0);" 
             class="px-2 text-edit openEditModal" 
             data-id="${details.id}"
             data-full_name="${details.full_name}"
             data-phone="${details.phone}"
             data-email="${details.email}"
             data-id_number="${details.id_number}"
             data-room_number="${details.room.room_number}"
             data-room_id="${details.room_id}"
             data-lease_start="${details.lease_start}"
             data-lease_end="${details.lease_end}"
             
             >
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
              console.log(details.room)
            }
            )
              // Entry Info Text
  const start = (response.data.current_page - 1) * response.data.per_page + 1;
  const end = Math.min(response.data.total, response.data.current_page * response.data.per_page);
  const total = response.data.total;
$('#total_list').text(`( ${total} ) Records`)
  $('#entry-info').text(`Showing ${start} to ${end} of ${total} entries`);

            renderPagination(response.data);
             // console.log(response.data);
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
  if (page) loadtenants(page);
});

})








    </script>
      
     
  
      
