@extends('front.layout')

@section('content')
    <div class="wrapper">
        @include('front.components.hero', [
            'title' => $page->title
        ])

        <div class="content">
            
        </div>
    </div>
@endsection
