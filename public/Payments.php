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
                    <h5 class="card-title">payment List <span class="text-muted fw-normal ms-2" id="total_list">(834)</span></h5>
                </div>
            </div>
            <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#addpaymentModal" class="btn btn-add">
        <i class="bx bx-plus me-1"></i> Add New
    </a>   
       
                <div>
   
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
                                    <th scope="col"> full name</th>
                                    <th scope="col">amount</th>
                                    <th scope="col">payment date</th>
                                    <th scope="col">month paid for</th>
                                    <th scope="col">method</th>
                                    <th scope="col">receipt number</th>
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

                
          



        <!-- Add payment Modal -->
<div class="modal fade" id="addpaymentModal" tabindex="-1" aria-labelledby="addpaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header" style=" color: #38ce3c;">
        <h5 class="modal-title" id="addpaymentModalLabel">Add New payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form action="" method="" id="addpaymentForm">
        <div class="mb-3">
          <label for="tenant_id" class="form-label">tenant</label>
            <select class="form-select" id="tenant_id" name="tenant_id" required>
            </select>
          </div>

          <div class="mb-3">
            <label for="amount" class="form-label">amount</label>
            <input type="text" class="form-control" id="amount" name="amount" required>
          </div>

          <div class="mb-3">
            <label for="payment_date" class="form-label">payment date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
          </div>
          <div class="mb-3">
            <label for="month_paid_for" class="form-label">month paid for</label>
            <input type="month" class="form-control" id="month_paid_for" name="month_paid_for" required>
          </div>

          <div class="mb-3">
          <label for="method" class="form-label">method</label>
            <select class="form-select" id="method" name="method" required>
              <option value="Cash">Cash</option>
              <option value="Online">Online</option>
            </select>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addpaymentForm" class="btn" style="background-color: #38ce3c; color: white;" id="save_btn">Save</button>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="editpaymentModal" tabindex="-1" aria-labelledby="editpaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="color: #38ce3c;">
        <h5 class="modal-title" id="editpaymentModalLabel">Edit payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <form id="editpaymentForm">
          <input type="hidden" id="edit_payment_id">
          <div class="mb-3">
          <label for="edit_tenant_id" class="form-label">tenant</label>
            <select class="form-select" id="edit_tenant_id" name="edit_tenant_id" required>
            </select>
          </div>

          <div class="mb-3">
            <label for="edit_amount" class="form-label">amount</label>
            <input type="text" class="form-control" id="edit_amount" name="edit_amount" required>
          </div>

          <div class="mb-3">
            <label for="edit_payment_date" class="form-label">payment date</label>
            <input type="date" class="form-control" id="edit_payment_date" name="edit_payment_date" required>
          </div>
          <div class="mb-3">
            <label for="edit_month_paid_for" class="form-label">month paid for</label>
            <input type="month" class="form-control" id="edit_month_paid_for" name="edit_month_paid_for" required>
          </div>
          
          <div class="mb-3">
          <label for="method" class="form-label">method</label>
            <select class="form-select" id="edit_method" name="edit_method" required>
              <option value="Cash">Cash</option>
              <option value="Online">Online</option>
            </select>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editpaymentForm" id="update_btn" class="btn" style="background-color: #38ce3c; color: white;">Update</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="deletepaymentModal" tabindex="-1" aria-labelledby="deletepaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header text-danger">
        <h5 class="modal-title" id="deletepaymentModalLabel">Delete payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>

      <div class="modal-body">
        <p>Are you sure you want to delete this payment?</p>
        <input type="hidden" id="delete_payment_id">
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
  loadpayment();
  
  $.ajax({
                method:'GET',
                url:'https://tms-portal.up.railway.app/api/tenant/getAll',
                dataType:'json',
                success:function(response){
    let tenant_id_select=$('#tenant_id');
    tenant_id_select.empty();
    tenant_id_select.append(`
    <option >Select Tenant</option>
        
        `)
    response.data.forEach(function(tenant){
        tenant_id_select.append($(' <option ></option>').attr('value',tenant.id).text(tenant.full_name));
   
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
    tenant_id:$('#tenant_id').val(),
    amount:$('#amount').val(),
    payment_date:$('#payment_date').val(),
    month_paid_for:$('#month_paid_for').val(),
    method:$('#method').val(),
  };
  console.log(formData)
  $.ajax({
            method:'POST',
            url:'https://tms-portal.up.railway.app/api/payment/save',
            dataType:'json',
            headers:{
                'Content-Type':'application/json'
            },
            data:JSON.stringify(formData),
            success:function(response){
              $('#addpaymentModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
               //location.reload();

               //updateRoomStatus(room_ids)
               window.open(response.data.receipt_url, '_blank');
                console.log(response.data.receipt_url)
            },
            error:function(error){
              $('#addpaymentModal').modal('hide');
               //window.location.href='http://localhost/stellar-admin-free/dist/payment.php'
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

    const id = $('#edit_payment_id').val();
    const formData = {
        tenant_id:$('#edit_tenant_id').val(),
    amount:$('#edit_amount').val(),
    payment_date:$('#edit_payment_date').val(),
    month_paid_for:$('#edit_month_paid_for').val(),
    method:$('#edit_method').val(),
    };
   // console.log(formData)

    $.ajax({
        method: 'PUT', 
        url: `https://tms-portal.up.railway.app/api/payment/update/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#editpaymentModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#editpaymentModal').modal('hide');
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

    const id = $('#delete_payment_id').val();
  
    console.log(id)

    $.ajax({
        method: 'DELETE', 
        url: `https://tms-portal.up.railway.app/api/payment/delete/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        success: function (response) {
            // Hide modal properly
            //alert(response.message);
            $('#deletepaymentModal').modal('hide');
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            location.reload(); // or refresh table only
        },
        error: function (error) {
          $('#deletepaymentModal').modal('hide');
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
    const amount = $(this).data('amount');
    const payment_date = $(this).data('payment_date');
    const month_paid_for = $(this).data('month_paid_for');
    const method = $(this).data('method');
    const tenant_id = $(this).data('tenant_id');


    //console.log(month_paid_for)
    //console.log(tenant_id)

    $('#edit_payment_id').val(id);
    $('#edit_amount').val(amount);
    $('#edit_payment_date').val(payment_date);
    $('#edit_month_paid_for').val(month_paid_for);
    $('#edit_method').val(method);
   // $('#edit_room_id').val(room_id);
    $('#edit_tenant_id').val(tenant_id)
                //let options='<option >Select</option>'
                let options
                options +=`<option value="${tenant_id}">${full_name}</option>`
                $('#edit_tenant_id').html(options)


    const editModal = new bootstrap.Modal(document.getElementById('editpaymentModal'));
    editModal.show();

    
});

$(document).on('click', '.openDeleteModal', function() {
  const id = $(this).data('id');
  $('#delete_payment_id').val(id);

  const deleteModal = new bootstrap.Modal(document.getElementById('deletepaymentModal'));
  deleteModal.show();
});

function updateRoomStatus(id)
{
    console.log('updateRoomStatus')
    $.ajax({
        method: 'PUT', 
        url: `https://tms-portal.up.railway.app/api/room/updatestatus/${id}`,
        dataType: 'json',
        contentType: 'application/json',
        success: function (response) {
        },
        error: function (error) {
         
        }
    });  
}

function loadpayment(page = 1)
{
 
  $.ajax({
            method:'GET',
            url:`https://tms-portal.up.railway.app/api/payment/get?page=${page}`,
            dataType:'json',
            success:function(response){
            
              let tbody=$('#tbody');
              tbody.empty();
              response.data.data.forEach(function(details)
            
            {
              tbody.append(`
               <tr id="row-${details.id}">
                                    <td><a href="#" class="text-body">${details.tenant.full_name}</a></td>
                                    <td><span class="badge badge-soft-success mb-0">${details.amount}</span></td>
                                    <td>${details.payment_date}</td>
                                    <td>${details.month_paid_for}</td>
                                    <td>${details.method}</td>
                                    <td>${details.receipt_number}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                             <li class="list-inline-item">
          <a href="javascript:void(0);" 
             class="px-2 text-edit openEditModal" 
             data-id="${details.id}"
             data-full_name="${details.tenant.full_name}"
             data-tenant_id="${details.tenant_id}"
             data-amount="${details.amount}"
             data-payment_date="${details.payment_date}"
             data-month_paid_for="${details.month_paid_for}"
             data-method="${details.method}"
             
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
        <a href="https://tms-portal.up.railway.app/api/payment/receipt/${details.id}" 
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
  if (page) loadpayment(page);
});

})








    </script>
      
     
  
      
