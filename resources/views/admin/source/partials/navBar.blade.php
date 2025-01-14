
<link href="{{asset('assets/img/favicon.png')}}" rel="icon">
<link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<head>
<style>
.table-container {
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* A stronger shadow for depth */
    margin: 20px auto;
    width: 90%;
}

.table {
    margin: 0;
    background-color: #f9f9f9; /* Soft light background */
    border-collapse: separate;
    border-spacing: 0;
}

.table thead {
    background-color: #6c63ff; /* Vibrant purple header */
    color: #ffffff; /* White text for contrast */
}

.table thead th {
    padding: 15px;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 3px solid #5a55d6; /* Subtle border for header */
}

.table tbody tr {
    transition: background-color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #e7e7ff; /* Soft hover effect */
}

.table tbody td {
    padding: 12px;
    font-size: 0.9rem;
    color: #333; /* Neutral text color */
    border-top: 1px solid #ddd; /* Subtle row separation */
    text-align: center;
}

.btn-primary {
    background-color: #4caf50; /* Fresh green buttons */
    border-color: #4caf50;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #3e8e41;
}

.btn-danger {
    background-color: #f44336; /* Bright red for delete */
    border-color: #f44336;
    color: #ffffff;
}

.btn-danger:hover {
    background-color: #d32f2f;
}
  
</style>
</head>
<header id="header" class="header fixed-top d-flex align-items-center">

  <i class="bi bi-list toggle-sidebar-btn" style="color:#b27659;"></i>
    <div class="d-flex align-items-center justify-content-between logo-color">
      <a href="/" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logoPettiePic.png')}}"></img>
        <img src="{{asset('assets/img/logoTextPic.png')}}"></img>
      </a>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

<!--Message icon-->
        <li class="nav-item dropdown">

<a class="nav-link nav-icon" href="{{route('admin.contactUs.index')}}"  >
  <i class="bi bi-chat-left-text" ></i>
</a><!-- End Messages Icon -->

{{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
  <li class="dropdown-header">
    You have 3 new messages
    <a href="{{route('admin.contactUs.index')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="{{route('admin.contactUs.index')}}">
      <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
      <div>
        <h4>Maria Hudson</h4>
        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
        <p>4 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="{{route('admin.contactUs.index')}}">
      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
      <div>
        <h4>Anna Nelson</h4>
        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
        <p>6 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="{{route('admin.contactUs.index')}}">
      <img src="{{asset('assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
      <div>
        <h4>David Muldon</h4>
        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
        <p>8 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="dropdown-footer">
    <a href="{{route('admin.contactUs.index')}}">Show all messages</a>
  </li>

</ul><!-- End Messages Dropdown Items --> --}}

</li><!-- End Messages Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle " style="font-size: 1.4rem;"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:#080808;"></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('adminProfile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>



            <li>
              <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                  @csrf
                  <a class="dropdown-item d-flex align-items-center" href="#"
                     onclick="event.preventDefault(); this.closest('form').submit();">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                  </a>
              </form>
          </li>
          

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>


