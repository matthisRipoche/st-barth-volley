@extends('front.layout')

@section('content')
    @include('front.components.hero', [
        'title' => $page->title
    ])
    <div class="wrapper">
        <div class="content">
            @foreach ($page->blockCollections as $collection)
                @includeIf('front.blocks.' . $collection->block->type, [
                    'data' => $collection->block->content,
                ])
            @endforeach
        </div>
    </div>
@endsection
