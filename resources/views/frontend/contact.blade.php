@extends('layouts.frontend.app')

@section('title', isset($title) ? $title : '' )

@section('meta_desc', isset($meta_desc) ? $meta_desc : '')

@section('meta_keywords', isset($meta_keywords) ? $meta_keywords : '')

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
            <h2 class="page-head-line"></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <h3>Address</h3>
                        {!!  getSetting('ADDRESS') !!}
                    </div>
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                </div>
                <div class="col-md-6">
                    <div class="Compose-Message">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Contact Form Details
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['url' =>  '/contact-us', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>'validate']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name', ['class' => 'control-label col-md-2']) !!}
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            {!! Form::text('name', old('name'), ['class' => 'form-control validate[required]', 'placeholder'=>'Name']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class' => 'control-label col-md-2']) !!}
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            {!! Form::email('email', old('email'), ['class' => 'form-control  validate[required,custom[email]]', 'placeholder'=>'Email']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('subject', 'Subject', ['class' => 'control-label col-md-2']) !!}
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                            {!! Form::text('subject', old('subject'), ['class' => 'form-control  validate[required]', 'placeholder'=>'Subject']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('message', 'Message', ['class' => 'control-label col-md-2']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('message', old('message'), ['class' => 'form-control  validate[required]', 'rows'=> 5]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        {!! Form::submit('Send', ['class'=>'btn btn-primary pull-right']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-footer text-muted">
                                <strong>Note : </strong>Please note that we track all messages so don't send any spams.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection