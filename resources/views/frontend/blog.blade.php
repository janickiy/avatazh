@extends('layouts.frontend.app')

@section('title', 'Blog')

@section('css')

@endsection

@section('marks')
    @include('layouts.frontend.includes.mark_list')
@endsection

@section('content')
    <section>
	<div class="page main_width">
		@include('layouts.frontend.includes.breadcrumbs')
        <h1>Blog</h1>
        <div class="row">
            @foreach($posts as $post)
                    <h4><a href="{{ url($post->slug) }}">{{ $post->title }}</a></h4>
                    <div class="post-content">
                        {!! $post->excerpt()  !!}
                    </div>
                    <div class="read-more">
                        <a href="{{ url($post->slug) }}">Read More &gt;&gt;</a>
                    </div>
            @endforeach
        </div>

                {!! $posts->links() !!}
       </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
