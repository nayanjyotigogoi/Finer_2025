<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Finer Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/admin" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">FINER Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon -->

        <li class="nav-item dropdown">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a>
          <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Finer Admin</h6>
              <span>ADMIN</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="{{route('admin.logout')}}" method="post">
                @csrf
                    <input type="hidden" name="_method" value="POST">
                    <button type="submit" class="dropdown-item d-flex align-items-center">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </button>
    
              </form>
              <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a> -->
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-postcard-fill"></i><span>Banner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('banners.view') }}">
              <i class="bbi bi-list-ul"></i><span>View Banner</span>
            </a>
          </li>
          <li>
            <a href="{{ route('banners.create') }}">
              <i class="bi bi-plus-circle"></i><span>Add Banner</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('events.view') }}">
              <i class="bi bi-list-ul"></i><span>View Events</span>
            </a>
          </li>
          <li>
            <a href="{{ route('events.create') }}">
              <i class="bi bi-plus-circle"></i><span>Add Events</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Press Release</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('press_releases.view') }}">
              <i class="bi bi-list-ul"></i><span>View Press Release</span>
            </a>
          </li>
          <li>
            <a href="{{ route('press_releases.create') }}">
              <i class="bi bi-plus-circle"></i><span>Add Press Release</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

       <!-- Magazines Section -->
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#magazines-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i><span>Magazines</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="magazines-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('magazines.view') }}">
              <i class="bi bi-list-ul"></i><span>View Magazines</span>
            </a>
          </li>
          <li>
            <a href="{{ route('magazines.create') }}">
              <i class="bi bi-plus-circle"></i><span>Add Magazine</span>
            </a>
          </li>
        </ul>
      </li><!-- End Magazines Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Board Members</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('director_profiles.view') }}">
              <i class="bi bi-list-ul"></i><span>View Member</span>
            </a>
          </li>
          <li>
            <a href="{{ route('director_profiles.create') }}">
              <i class="bi bi-plus-circle"></i><span>Add Member</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- past president -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#past-presidents-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-circle"></i><span>Past Presidents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
         <ul id="past-presidents-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('past_presidents.view') }}">
                    <i class="bi bi-list-ul"></i><span>All Past Presidents</span>
                </a>
            </li>
            <li>
                <a href="{{ route('past_presidents.create') }}">
                    <i class="bi bi-plus-circle"></i><span>Add New Past President</span>
                </a>
            </li>

        </ul>
      </li><!-- End Past Presidents Nav -->
<!-- End Charts Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <!-- Vendor JS Files -->
  <script src="/admin_assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin_assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/admin_assets/vendor/echarts/echarts.min.js"></script>
  <script src="/admin_assets/vendor/quill/quill.min.js"></script>
  <script src="/admin_assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/admin_assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin_assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin_assets/js/main.js"></script>

</body>

</html>