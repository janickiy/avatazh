@extends('layouts.frontend.app')

@section('title', 'Blog')

@section('css')

@endsection


@section('marks')
    <div class="main_marks row">
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
            <li><a href="">Dodge</a><span>520</span></li>
        </ul>
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
            <li><a href="">Dodge</a><span>520</span></li>
        </ul>
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
            <li><a href="">Dodge</a><span>520</span></li>
        </ul>
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
        </ul>
        <a href="" class="allmarks">Все марки</a>
    </div>
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line">Blog</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach($posts as $post)
                <div class="col-md-11">
                    <h4><a href="{{ url($post->slug) }}">{{ $post->title }}</a></h4>
                    <div class="post-content">
                        {!! $post->excerpt()  !!}
                    </div>
                    <div class="read-more">
                        <a href="{{ url($post->slug) }}">Read More &gt;&gt;</a>
                    </div>
                    <hr/>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
