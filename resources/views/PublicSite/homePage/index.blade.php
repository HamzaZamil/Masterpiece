@extends('publicSite.source.template')
@section('content')
<main>

@include('publicSite.homePage.sections.banner-slider')
@include('publicSite.homePage.sections.about-section')
@include('publicSite.homePage.sections.category-section')
@include('publicSite.homePage.sections.collection-section')
@include('publicSite.homePage.sections.product-section')
@include('publicSite.homePage.sections.testimonial-slider')
@include('publicSite.homePage.sections.quick-view-popup')

</main>
@endsection