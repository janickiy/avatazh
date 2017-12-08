@extends('layouts.frontend.app')

@section('title', isset($title) ? $title : '' )

@section('meta_desc', isset($meta_desc) ? $meta_desc : '')

@section('meta_keywords', isset($meta_keywords) ? $meta_keywords : '')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line"></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
