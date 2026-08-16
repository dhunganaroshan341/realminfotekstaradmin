@extends('frontend.layout.main')

@section('title', 'Roshan — Laravel Developer')

@section('content')

    @include('frontend.sections.hero')

    @include('frontend.sections.about')
    @include('frontend.sections.projects')
    @include('frontend.sections.open-source')
    @include('frontend.sections.experience')
    @include('frontend.sections.contact')


@endsection
