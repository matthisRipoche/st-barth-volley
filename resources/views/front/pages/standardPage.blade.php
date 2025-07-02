@extends('front.layout')

@section('content')
    @include('front.components.hero', [
        'title' => $page->title
    ])
    <div class="wrapper">
        <div class="content">
        </div>
    </div>
@endsection
