
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
          
            <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Quick Actions</h5>
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <a type="button" class="btn px-0" href="RoomList.php"> <i class="icon-user me-2"></i> Add Room</a>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <a type="button" class="btn px-0" href="Tenants.php"><i class="icon-docs me-2"></i> Add Tenant</a>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <a type="button" class="btn px-0" href="Payments.php"><i class="icon-folder me-2"></i>Add Payment</a>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <a type="button" class="btn px-0" href="Expenses.php"><i class="icon-book-open me-2"></i>Add Expenses</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Rooms</span>
                          <h4 id="total_room">$32123</h4>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Occupied Rooms</span>
                          <h4 id="occupied_status">95,458</h4>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-briefcase"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Available Rooms</span>
                          <h4 id="available_rooms">2650</h4>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Rooms Maintained</span>
                          <h4 id="maintained_rooms">25,542</h4>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Tenants</span>
                          <h4 id="tenant">$32123</h4>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Rent</span>
                          <h4 id="rent">95,458</h4>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-briefcase"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Expenses</span>
                          <h4 id="expenses">2650</h4>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Profit </span>
                          <h4 id="status">25,542</h4>
                          <h4 id="amount">25,542</h4>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Unpaid Tenants Lists</h4>
                      <a href="https://tms-portal.up.railway.app/api/report/receipt" class=" btn btn-success text-dark ms-auto mb-3 mb-sm-0"> View all Products</a>
                    </div>
                    <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                          <tr>
                                    <th scope="col"> full_name</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">email</th>
                                    <th scope="col">id number</th>
                                    <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                      </table>
                    </div>
                    <div class="row g-0 align-items-center pb-4">
  <div class="col-sm-6">
    <div><p id="entry-info" class="mb-sm-0"></p></div>
  </div>
  <div class="col-sm-6">
    <ul class="pagination" id="pagination" class="mb-sm-0"></ul>
  </div>
</div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 TMS. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i> by Lyamuya Heaven</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   

    <script>
    $(document).ready(function(){
      
      getTotalPaymentExpenses();
      getTenantCounts();
      getUnpaidTenants();
      getRoomCounts();

      function getRoomCounts()
      {
        $.ajax({
            method:'GET',
            url:`https://tms-portal.up.railway.app/api/report/getRoomCounts`,
            dataType:'json',
            success:function(response){
              $('#total_room').text(response.data.total_rooms)
              $('#occupied_status').text(response.data.occupied_rooms)
              $('#available_rooms').text(response.data.vacant_rooms)
              $('#maintained_rooms').text(response.data.maintenance_rooms)
            },
            error:function(error){
            }
           
          })
      }

      function getUnpaidTenants(page = 1)
      {
       // console.log('work')
  $.ajax({
            method:'GET',
            url:`https://tms-portal.up.railway.app/api/report/getUnpaidTenants?page=${page}`,
            dataType:'json',
            success:function(response){
              console.log(response.data.data)
              let tbody=$('#tbody');
              tbody.empty();
              response.data.this_month.data.forEach(function(details)
            {
              tbody.append(`
               <tr id="row-${details.id}">
                                    <td>${details.full_name}</td>
                                    <td>${details.phone}</td>
                                    <td>${details.email}</td>
                                    <td>${details.id_number}</td>
                                    <td><span class="badge badge-danger mb-0">Unpaid</span></td>
                                </tr>
              `)
            }
            )
              // Entry Info Text
  const start = (response.data.this_month.current_page - 1) * response.data.this_month.per_page + 1;
  const end = Math.min(response.data.this_month.total, response.data.this_month.current_page * response.data.this_month.per_page);
  const total = response.data.this_month.total;

  $('#entry-info').text(`Showing ${start} to ${end} of ${total} entries`);

            renderPagination(response.data.this_month);
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
  if (page) getUnpaidTenants(page);
});

      function getTenantCounts()
      {
        $.ajax({
            method:'GET',
            url:`https://tms-portal.up.railway.app/api/report/getTenantCounts`,
            dataType:'json',
            success:function(response){
              $('#tenant').text(response.data)
            },
            error:function(error){
            }
           
          })
      }

      function getTotalPaymentExpenses()
      {
        $.ajax({
            method:'GET',
            url:`https://tms-portal.up.railway.app/api/report/getTotalPaymentExpenses`,
            dataType:'json',
            success:function(response){
              console.log(response)
              $('#rent').text(response.data.totalPaidThisMonth)
              $('#expenses').text(response.data.totalExpensesPaidThisMonth)
              $('#status').text(response.data.status)
              $('#amount').text(response.data.amount)
             
            },
            error:function(error){
            }
           
          })
      }



    })

    </script>
  </body>
</html>