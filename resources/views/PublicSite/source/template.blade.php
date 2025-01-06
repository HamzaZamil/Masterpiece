<html>
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
         .toast-error {
            opacity: 2 !important;
    background-color: red !important;
    color: white !important;
    border-left: 6px solid #f5c2c7;
}
         </style>
    </header>
@include('PublicSite.source.partials.header')

<body id="top">

@include('PublicSite.source.partials.nav-bar')

@include('PublicSite.source.partials.wish-list-side-bar')

@yield('content')

@include('PublicSite.source.partials.footer-public')


@include('PublicSite.source.partials.cart-side-bar')

@include('PublicSite.source.partials.xs-side-bar')

@include('PublicSite.source.partials.scroll-up')


@include('PublicSite.source.partials.scripts-public')
</body>
</html>