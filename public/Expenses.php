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
                    <h5 class="card-title">expense List <span class="text-muted fw-normal ms-2" id="total_list">(834)</span></h5>
                </div>
            </div>
            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    
                <div>
    <a href="#" data-bs-toggle="modal" data-bs-target="#addexpenseModal" class="btn btn-add">
        <i class="bx bx-plus me-1"></i> Add New
    </a>

</div>
<div>
    <a href="https://tms-production-65c4.up.railway.app/api/expense/receipt" class="btn btn-add" target="_blank" >
    <i class="bx bx-printer font-size-18"></i> View All
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
                                    <th scope="col">title</th>
                                    <th scope="col">amount</th>
                                    <th scope="col">description</th>
                                    <th scope="col">expense date</th>
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

                
          



        <!-- Add expense Modal -->
<div class="modal fade" id="addexpenseModal" tabindex="-1" aria-labelledby="addexpenseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header" style=" color: #38ce3c;">
        <h5 class="modal-title" id="addexpenseModalLabel">Add New expense</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form action="" method="" id="addexpenseForm">
          <div class="mb-3">
          <label for="title" class="form-label">title</label>
            <select class="form-select" id="title" name="title" required>
            </select>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">amount</label>
            <input type="text" class="form-control" id="amount" name="amount" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>
          <div class="mb-3">
            <label for="expense_date" class="form-label">expense date</label>
            <input type="date" class="form-control" id="expense_date" name="expense_date" required>
          </div>


        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addexpenseForm" class="btn" style="background-color: #38ce3c; color: white;" id="save_btn">Save</button>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="editexpenseModal" tabindex="-1" aria-labelledby="editexpenseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="color: #38ce3c;">
        <h5 class="modal-title" id="editexpenseModalLabel">Edit expense</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form id="editexpenseForm">
          <input type="hidden" id="edit_expense_id">
          <div class="mb-3">
          <label for="edit_title" class="form-label">title</label>
            <select class="form-select" id="edit_title" name="edit_title" required>
            </select>
          </div>
          <div class="mb-3">
            <label for="edit_amount" class="form-label">amount</label>
            <input type="text" class="form-control" id="edit_amount" name="edit_amount" required>
          </div>
          <div class="mb-3">
            <label for="edit_description" class="form-label">description</label>
            <input type="text" class="form-control" id="edit_description" name="edit_description" required>
          </div>
          <div class="mb-3">
            <label for="edit_expense_date" class="form-label">expense date</label>
            <input type="date" class="form-control" id="edit_expense_date" name="edit_expense_date" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editexpenseForm" id="update_btn" class="btn" style="background-color: #38ce3c; color: white;">Update</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="deleteexpenseModal" tabindex="-1" aria-labelledby="deleteexpenseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header text-danger">
        <h5 class="modal-title" id="deleteexpenseModalLabel">Delete expense</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <p>Are you sure you want to delete this expense?</p>
        <input type="hidden" id="delete_expense_id">
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
  loadexpense();
  
  $.ajax({
                method:'GET',
                url:'https://tms-production-65c4.up.railway.app/api/expense/getAll',
                dataType:'json',
                success:function(response){
    let title_select=$('#title');
    title_select.empty();
    title_select.append(`
    <option >Select Tenant</option>
        
        `)
    response.data.forEach(function(expense){
        title_select.append($(' <option ></option>').attr('value',expense.id).text(expense.name));
   
      // console.log(tenant)
    })
    //console.log(response)
                },
                error:function(error){
            
                console.log(error)
    },
            })


 $('#save_btn').click(function(e){
    
  e.preventDefault();
 
  const formData = {
    title:$('#title').val(),
    amount:$('#amount').val(),
    expense_date:$('#expense_date').val(),
    description:$('#description').val(),
  };
  console.log(formData)
  $.ajax({
            method:'POST',
            url:'https://tms-production-65c4.up.railway.app/api/expense/save',
            dataType:'json',
            headers:{
                'Content-Type':'application/json'
            },
            data:JSON.stringify(formData),
            success:function(response){
              $('#addexpenseModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
               location.reload();

               //updateRoomStatus(room_ids)
              // window.open(response.data.receipt_url, '_blank');
                console.log(response.data.receipt_url)
            },
            error:function(error){
              $('#addexpenseModal').modal('hide');
               //window.location.href='http://localhost/stellar-admin-free/dist/expense.php'
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

    const id = $('#edit_expense_id').val();
    const formData = {
        title:$('#edit_title').val(),
    amount:$('#edit_amount').val(),
    expense_date:$('#edit_expense_date').val(),
    description:$('#edit_description').val(),
    };
   // console.log(formData)

    $.ajax({
        method: 'PUT', 
        url: `https://tms-production-65c4.up.railway.app/api/expense/update/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#editexpenseModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
           location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#editexpenseModal').modal('hide');
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

    const id = $('#delete_expense_id').val();
  
    console.log(id)

    $.ajax({
        method: 'DELETE', 
        url: `https://tms-production-65c4.up.railway.app/api/expense/delete/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#deleteexpenseModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#deleteexpenseModal').modal('hide');
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
    const title = $(this).data('title');
    const amount = $(this).data('amount');
    const expense_date = $(this).data('expense_date');
    const description = $(this).data('description');

    $('#edit_expense_id').val(id);
    $('#edit_amount').val(amount);
    $('#edit_expense_date').val(expense_date);
    $('#edit_description').val(description);
   // $('#edit_room_id').val(room_id);
    $('#edit_title').val(title)
                //let options='<option >Select</option>'
                let options
                options +=`<option value="${title}">${title}</option>`
                $('#edit_title').html(options)


    const editModal = new bootstrap.Modal(document.getElementById('editexpenseModal'));
    editModal.show();

    
});

$(document).on('click', '.openDeleteModal', function() {
  const id = $(this).data('id');
  $('#delete_expense_id').val(id);

  const deleteModal = new bootstrap.Modal(document.getElementById('deleteexpenseModal'));
  deleteModal.show();
});


function loadexpense(page = 1)
{
 
  $.ajax({
            method:'GET',
            url:`https://tms-production-65c4.up.railway.app/api/expense/get?page=${page}`,
            dataType:'json',
            success:function(response){
            
              let tbody=$('#tbody');
              tbody.empty();
              response.data.data.forEach(function(details)
            
            {
              tbody.append(`
               <tr id="row-${details.id}">
                                    <td><a href="#" class="text-body">${details.title}</a></td>
                                    <td><span class="badge badge-soft-success mb-0">${details.amount}</span></td>
                                    <td>${details.description}</td>
                                    <td>${details.expense_date}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                             <li class="list-inline-item">
          <a href="javascript:void(0);" 
             class="px-2 text-edit openEditModal" 
             data-id="${details.id}"
             data-title="${details.title}"
             data-amount="${details.amount}"
             data-description="${details.description}"
             data-expense_date="${details.expense_date}"
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

         <li class="list-inline-item">
        <a href="https://tms-production-65c4.up.railway.app/api/expense/receipt/${details.id}" 
           target="_blank" 
           class="px-2 text-primary" 
           title="Print Receipt">
           <i class="bx bx-printer font-size-18"></i>
        </a>
      </li>

                                        </ul>
                                    </td>
                                </tr>
              `)
             // console.log(response.data.data)
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
  if (page) loadexpense(page);
});

})

    </script>
      
     
  
      
