<html>
    <head> 
        <link rel="icon" href="{{asset("assets/img/favicon.ico/")}}">
    </head>
    <header>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
         <style>
         .toast {
         opacity: 1 !important;
         z-index: 9999; /* Ensure it appears above other elements */
         }
         .toast-success {
             background-color: #1d9f3c !important; /* Light green */
             color: #dfe0df !important; /* Dark green text */
         }
         </style>
    </header>

    @extends('publicSite.source.template')
    @section('content')
    <main>
    
        @include('publicSite.homePage.sections.banner-slider')
        @include('publicSite.homePage.sections.about-section')
        @include('publicSite.homePage.sections.category-section')
        @include('publicSite.homePage.sections.collection-section')
        @include('publicSite.homePage.sections.product-section')
        @include('publicSite.homePage.sections.testimonial-slider')
        
    </main>

    @if(session('success'))
  <script>
      toastr.success("{{ session('success') }}");
  </script>
@endif
@if (auth()->check())
@if (auth()->user()->isAdmin())
<script>
    window.location.href = '{{route("admin.dashboard")}}'
</script>
@endif
@endif
    @endsection
    
</html>