@extends('layouts.frontend.app')

@section('title', 'Service Unavailable')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Service Unavailable</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger text-center">
                <h1>503 Error</h1>
                <p>Thats an error. 
There was an error. Please Try again later. Thats all we know</p>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
