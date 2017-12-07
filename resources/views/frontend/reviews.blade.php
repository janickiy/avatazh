@extends('layouts.frontend.app')

@section('title', $title)

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line">{{ $title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach($reviews as $review)
                {{ $review->author }}
                {{ $review->email }}
                {{ $review->message }}
            @endforeach
        </div>
    </div>

    <div class="Compose-Message">
        <div class="panel panel-success">
            <div class="panel-heading">
                Оствить отзыв
            </div>
            <div class="panel-body">
                {!! Form::open(['url' =>  '/reviews', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>'validate']) !!}
                <div class="form-group">
                    {!! Form::label('author', 'Автор', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('author', old('author'), ['class' => 'form-control validate[required]', 'placeholder'=>'Имя']) !!}
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
                    {!! Form::label('message', 'Сообщение', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('message', old('message'), ['class' => 'form-control  validate[required]', 'rows'=> 5]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::submit('Отправить', ['class'=>'btn btn-primary pull-right']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('js')
    {!! Html::script('http://maps.googleapis.com/maps/api/js') !!}
    {!! Html::script('assets/plugins/validationengine/languages/jquery.validationEngine-ru.js') !!}
    {!! Html::script('assets/plugins/validationengine/jquery.validationEngine.js') !!}

    <script type="text/javascript">


        $(document).ready(function () {
            // Validation Engine init
            var prefix = 's2id_';
            $("form[id^='validate']").validationEngine('attach',
                {
                    promptPosition: "bottomRight", scroll: false,
                    prettySelect: true,
                    usePrefix: prefix
                });
        });
    </script>
@endsection