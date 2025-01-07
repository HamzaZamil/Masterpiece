<html>
    
        
<link rel="icon" href="{{asset("assets/img/favicon.ico/")}}">

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