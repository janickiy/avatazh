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
        <i class="fa fa-automobile"></i> {{ isset($catalogusedcar) ? 'Редактировать' : 'Добавить' }} автомобиль
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li><a href="{{ url('admin/catalogusedcars') }}"><i class="fa fa-automobile"></i> Автомобили</a></li>
        <li class="active"><i class="fa {{ isset($catalogusedcar) ? 'fa-pencil' : 'fa-plus' }}"></i> {{ isset($catalogusedcar) ? 'Редактировать' : 'Добавить' }}
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
            <p>* - обязательные поля</p>
            {!! Form::open(['mark' => isset($catalogusedcar) ? URL::to('admin/catalogusedcars/'.$catalogusedcar->id )  :  URL::to('admin/catalogusedcars') , 'method' => isset($catalogusedcar) ? 'put': 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id'=>'validate']) !!}
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
                        {!!  Form::selectYear('year', 1980, date("Y"), isset($catalogusedcar) ? $catalogusedcar->year_begin : date("Y"), ['class' => 'form-control select2 validate[required]']) !!}
                         </div>
                     </div>

                <div class="form-group">
                    {!! Form::label('mileager', 'Пробег *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('mileage', old('mileage', isset($catalogusedcar) ? $catalogusedcar->mileage : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Пробег']) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('gearbox', 'КПП *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('gearbox', old('gearbox', isset($catalogusedcar) ? $catalogusedcar->gearbox : null), ['class' => 'form-control validate[required]', 'placeholder'=>'КПП']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('drive', 'Привод *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('drive', old('drive', isset($catalogusedcar) ? $catalogusedcar->drive : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Привод']) !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('engine_type', 'Тип двигателя *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('engine_type', old('engine_type', isset($catalogusedcar) ? $catalogusedcar->engine_type : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Тип двигателя']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('power', 'Мощность двигателя *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('power', old('power', isset($catalogusedcar) ? $catalogusedcar->power : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Мощность двигателя']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Кузов *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('body', old('body', isset($catalogusedcar) ? $catalogusedcar->body : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Кузов']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('wheel', 'Руль *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('wheel', old('wheel', isset($catalogusedcar) ? $catalogusedcar->wheel : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Руль']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('color', 'Цвет *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('color', old('color', isset($catalogusedcar) ? $catalogusedcar->color : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Цвет']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('salon', 'Салон *', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('salon', old('salon', isset($catalogusedcar) ? $catalogusedcar->salon : null), ['class' => 'form-control validate[required]', 'placeholder'=>'Салон']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Комментарий продовца', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::textarea('description', old('description', isset($review) ? $review->message : null), ['class' => 'form-control validate[required]', 'placeholder'=>'комментарий продовца', 'rows' => 5]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_title', 'meta title', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('meta_title', old('meta_title', isset($catalogusedcar) ? $catalogusedcar->meta_title : null), ['class' => 'form-control validate[required]', 'placeholder'=>'meta title']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_keywords', 'meta keywords', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('meta_keywords', old('meta_keywordse', isset($catalogusedcar) ? $catalogusedcar->meta_keywords : null), ['class' => 'form-control validate[required]', 'placeholder'=>'meta keywords']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('meta_description', 'meta description', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::textarea('meta_description', old('message', isset($catalogusedcar) ? $catalogusedcar->meta_description : null), ['class' => 'form-control validate[required]', 'placeholder'=>'meta description', 'rows' => 2]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('image[]', 'Фото (jpeg, png, gif)*', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::file('image[]',  ['class' => 'validate[required]', 'multiple' => true]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('published', 'Публиковать', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-sm-10">
                        <label class="check">{!! Form::checkbox('published', 1, isset($catalogusedcar) ? ($catalogusedcar->published == 'published' ? true: false) : true, ['class'=>'minimal']) !!}
                            Да
                        </label>
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