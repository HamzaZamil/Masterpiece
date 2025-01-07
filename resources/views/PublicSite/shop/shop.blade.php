<html>
    {{-- <header>
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
    </header> --}}
    <link rel="icon" href="{{asset("assets/img/favicon.ico/")}}">
    @extends('publicSite.source.template')
    @section('content')
    <main>
        
        @include('publicSite.shop.sections.banner-inner-section')
        @include('publicSite.shop.sections.product-section')
        
        
    </main>
    @endsection
    </html>