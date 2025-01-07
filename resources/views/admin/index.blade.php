@extends('admin.source.template')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Orders </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalOrders }} </h6> <!-- Display total revenue -->
                      <span class="text-muted small pt-2 ps-1">Total Orders</span>
                    </div>
                
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

               

                <div class="card-body">
                  <h5 class="card-title">Revenue</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $rounded }} JD</h6> <!-- Display total revenue -->
                      <span class="text-muted small pt-2 ps-1">Revenue From Orders</span>
                    </div>
                  </div>
              </div>
              </div>
            </div>
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">


                <div class="card-body">
                  <h5 class="card-title">Customers </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalCustomers }}</h6> <!-- Display total customers -->
                      <span class="text-muted small pt-2 ps-1">Total registered users</span>
                  </div>
                    
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

           


          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->
@endsection