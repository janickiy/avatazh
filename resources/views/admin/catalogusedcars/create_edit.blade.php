@extends('layouts.admin.app')

@section('title', 'Меню')

@section('css')
        <!-- iCheck for checkboxes and radio inputs -->
{!! Html::style('assets/plugins/iCheck/all.css') !!}
@endsection

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-list-alt"></i> {{ isset($menu) ? 'Редактировать' : 'Добавить' }} автомобиль
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li><a href="{{ url('admin/menus') }}"><i class="fa fa-list-alt"></i> Меню</a></li>
        <li class="active"><i class="fa {{ isset($menu) ? 'fa-pencil' : 'fa-plus' }}"></i> {{ isset($menu) ? 'Редактировать' : 'Добавить' }}
            автомобиль
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Форма данных автомобили</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            {!! Form::open(['mark' => isset($catalogusedcar) ? URL::to('admin/catalogusedcars/'.$catalogusedcar->id )  :  URL::to('admin/catalogusedcars') , 'method' => isset($catalogusedcar) ? 'put': 'post', 'class' => 'form-horizontal', 'id'=>'validate']) !!}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('mark', 'Марка *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('mark', old('mark', isset($catalogusedcar) ? $catalogusedcar->mark : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Марка']) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('model', 'Модель *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('model', old('model', isset($catalogusedcar) ? $catalogusedcar->model : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Модель']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Цена *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Год *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('price', old('price', isset($catalogusedcar) ? $catalogusedcar->price : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цена']) !!}
                    </div>
                </div>






                <div class="form-group">
                    {!! Form::label('status', 'Статус', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        <label class="check">{!! Form::checkbox('status',1,  old('status' , (isset($catalogusedcar) && ($catalogusedcar->getOriginal('status') == 1) ) ? true : false ) ,['class'=>'minimal']) !!}
                            Active</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        {!! Form::submit( (isset($catalogusedcar) ? 'Обновить': 'Добавить') . '', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div><!-- .col-md-12 -->
            {!! Form::close() !!}
        </div><!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection


@section('js')

        <!-- iCheck 1.0.1 -->
{!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}

{!! Html::script('assets/plugins/validationengine/languages/jquery.validationEngine-ru.js') !!}

{!! Html::script('assets/plugins/validationengine/jquery.validationEngine.js') !!}

<script type="text/javascript">
    $(document).ready(function () {

        $('input[type="checkbox"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });

        //Initialize Select2 Elements
        $(".select2").select2();

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