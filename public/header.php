<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TMS Admin</title>

    <link rel="icon" type="image/svg+xml" href="/assets/image/logo.svg">
<link rel="shortcut icon" href="/assets/image/logo.ico">

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/vertical-light-layout/style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery 3.6.0 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="boxicons/css/boxicons.min.css">


    <!-- End layout styles -->

  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="assets/images/logo.svg" alt="logo" class="logo" style="width:100%;height: auto;" />
          </a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Tenants Management System dashboard</h5>
          <ul class="navbar-nav navbar-nav-right">
        
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ms-2" src="assets/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal" id="name"> Harryson</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3" id="name">Harryson</p>
                  <p class="font-weight-light text-muted mb-0" id="email">Harryson@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item" id="logout"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
  
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/moment/moment.min.js"></script>
    <script src="assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

        <script>
      $(document).ready(function(){
        const profileJson = localStorage.getItem('profile');
        //console.log(localStorage.getItem('profile'))
const profile = profileJson ? JSON.parse(profileJson) : null;
if (!profile || profile == null) {
     // window.location.href = 'https://tms-portal.up.railway.app/login.php';
      return;
    }
    else{
      console.log(profile.name)
      $('#name').text(profile.name);
     $('#email').text(profile.email);
    }


      $('#logout').on('click',function(e){
        e.preventDefault();
       // console.log('working')
        localStorage.removeItem('profile');
      // 2) Redirect back to login (or home)
      window.location.href = 'https://tms-portal.up.railway.app/login.php';
      })
      })
    </script>