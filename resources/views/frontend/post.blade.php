@extends('layouts.frontend.app')

@section('title', $post->title)

@section('meta_desc', $post->meta_desc)

@section('meta_keywords', $post->meta_keywords)

@section('css')

@endsection

@section('content')


    <section>
        <div class="page main_width">
            @include('layouts.frontend.includes.breadcrumbs')
            <h1>{{ $post->title }}</h1>
            <div class="row">
                {!! $post->content !!}
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
