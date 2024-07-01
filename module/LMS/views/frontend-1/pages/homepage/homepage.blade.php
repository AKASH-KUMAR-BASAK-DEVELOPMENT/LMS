@extends('frontend-1.layout.app')
@section('content')
    @include('frontend-1.pages.homepage.features.banner')
    @include('frontend-1.pages.homepage.features.clients')
    @include('frontend-1.pages.homepage.features.about-us')
    @include('frontend-1.pages.homepage.features.courses')
    @include('frontend-1.pages.homepage.features.video-divider')
{{--    @include('frontend-1.pages.homepage.features.events')--}}
{{--    @include('frontend-1.pages.homepage.features.news-letter')--}}
@endsection
