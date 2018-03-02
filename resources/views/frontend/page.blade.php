@extends('layouts.frontend.app')

@section('title', isset($title) ? $title : '' )

@section('meta_desc', isset($meta_desc) ? $meta_desc : '')

@section('meta_keywords', isset($meta_keywords) ? $meta_keywords : '')

@section('css')

@endsection

@section('marks')

@section('content')
    <h1>{{ $page->title }}</h1>

    {!! $page->content !!}
@endsection

@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection