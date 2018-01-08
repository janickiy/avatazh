@extends('layouts.frontend.app')

@section('title', 'Trade-in' )

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

    <style>

        .search{
            position:relative;
        }

        .search_result {
            background: #FFF;
            border: 1px #ccc solid;
            border-radius: 4px;
            max-height:100px;
            overflow-y:scroll;
            display:none;
        }

        .dropdownvisible {
            max-height:100px;
            overflow-y:scroll;

        }

        .search_result li{
            list-style: none;
            padding: 5px 10px;
            margin: 0;
            color: #0896D3;
            border-bottom: 1px #ccc solid;
            cursor: pointer;
            transition:0.3s;
        }

        .search_result li:hover{
            background: #F9FF00;
        }

    </style>

@endsection

@section('marks')
    @include('layouts.frontend.includes.mark_list')
@endsection

@section('content')
    <section>
        <h1>Заявка на Trade-in</h1>
        <div class="row">
            <div class="tradein">
                <h2>Ваш автомобиль</h2>

                {!! Form::open(['url' =>  '/request-tradein', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'validate']) !!}

                <div class="select">
                    {!! Form::hidden('id_mark', null, ['id' => 'id_mark']) !!}
                    {!! Form::text('mark', old('mark'), ['class' => 'form_control validate[required]', 'placeholder' => 'Марка', 'autocomplete' => 'off', 'id' => 'search_mark']) !!}
                    <ul class="search_result_mark search_result"></ul>
                </div>

                <div class="select">
                    {!! Form::hidden('id_model', null, ['id' => 'id_model']) !!}
                    {!! Form::text('model', old('model'), ['class' => 'form_control validate[required]', 'placeholder' => 'Модель', 'autocomplete' => 'off', 'id' => 'search_model']) !!}
                    <ul class="search_result_model search_result"></ul>
                </div>

                <div class="select">
                    <div class="select">
                        {!! Form::text('year', old('year'), ['class' => 'form_control validate[required]', 'placeholder' => 'Год выпуска']) !!}
                    </div>
                </div>

                <div class="select">
                    <div class="select">
                        {!! Form::text('mileage', old('mileage'), ['class' => 'form_control validate[required]', 'placeholder' => 'Пробег (тыс. км)']) !!}
                    </div>
                </div>

                <div class="select">
                    <div class="select">
                        {!! Form::select('gearbox', [
                         null => 'КПП',
                         'MT' => 'Механическая',
                         'AT' => 'Автоматическая',
                         'RGT' => 'Роботизированная',
                         'CVT' => 'Вариатор',
                         'AMT' => 'Автоматизированная механическая',
                        ], '0', ['class' => 'turnintodropdown validate[required]']
                        ) !!}
                    </div>
                </div>

                <div class="select">
                    <div class="file-upload">
                        <label>
                            {{ Form::file('photo', ['class' => 'field', 'onchange' => 'getFileParam();', 'id' => 'uploaded-file1']) }}
                            <span>Выберите файл</span><br />
                        </label>
                    </div>
                    <div id="preview1">&nbsp;</div>
                    <div id="file-name1" class="disp_n">&nbsp;</div>
                    <div id="file-size1" class="disp_n">&nbsp;</div>
                </div>

            </div>
            <div class="tradein newcar">
                <h2>Новый автомобиль</h2>
                <div class="select">
                    {!! Form::hidden('id_trade_in_mark', null, ['id' => 'id_trade_in_mark']) !!}
                    {!! Form::text('trade_in_mark', old('trade_in_mark'), ['class' => 'form_control validate[required]', 'placeholder' => 'Марка', 'autocomplete' => 'off', 'id' => 'search_trade_in_mark']) !!}
                    <ul class="search_result_trade_in_mark search_result"></ul>
                </div>
                <div class="select">
                    <div class="select">
                        {!! Form::hidden('id_trade_in_model', null, ['id' => 'id_trade_in_model']) !!}
                        {!! Form::text('trade_in_model', old('trade_in_model'), ['class' => 'form_control validate[required]', 'placeholder' => 'Модель', 'autocomplete' => 'off', 'id' => 'search_trade_in_model']) !!}
                        <ul class="search_result_trade_in_model search_result"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tradein">
                <div class="select">
                    {!! Form::text('name', old('name'), ['class' => 'form_control form_phone validate[required]', 'placeholder' => 'ФИО']) !!}
                </div>
                <div class="checkboxes">
                    <div class="row">
                        {!! Form::checkbox('confirmation', null, null, ['class' => 'checkbox', 'id' => 'confirmation']) !!}
                        {!! Form::label('confirmation', 'Я понимаю, что автосалон находится в Москве') !!}
                    </div>
                    <div class="row">
                        {!! Form::checkbox('agree', null, null, ['class' => 'checkbox', 'id' => 'agree']) !!}
                        {!! Form::label('agree', 'Я даю согласие на обработку моих персональных данных') !!}
                    </div>
                </div>
            </div>
            <div class="tradein">
                <div class="select">
                      {!! Form::text('phone', old('phone'), ['class' => 'form_control form_phone validate[required]', 'placeholder' => 'Телефон']) !!}
                </div>

                {!! Form::submit('отправить заявку', ['class'=>'btn']) !!}

            </div>

            {!! Form::close() !!}

        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

        $(function(){
            $("#search_trade_in_mark").on("change keyup input click", function() {
                if(this.value.length >= 2){
                    $.ajax({
                        type: 'GET',
                        url: './ajax?action=search_mark&mark=' + this.value,
                        dataType : "json",
                        success: function(data){

                            if (data != null && data.item != null) {
                                var html = '';

                                for(var i=0; i < data.item.length; i++) {
                                    html += '<li data-item="' + data.item[i].id + '">' + data.item[i].name + '</li>';
                                }

                                console.log(html);

                                if (html != '')
                                    $(".search_result_trade_in_mark").html(html).fadeIn();
                                else
                                    $(".search_result_trade_in_mark").fadeOut();
                            }
                        }
                    })
                }
            })

            $(".search_result_trade_in_mark").hover(function(){
                $(".search_trade_in_mark").blur();
            })

            $(".search_result_trade_in_mark").on("click", "li", function(){
                $("#search_trade_in_mark").val($(this).text());
                $("#id_trade_in_mark").val($(this).attr('data-item'));
                $(".search_result_trade_in_mark").fadeOut();
            })

            $("#search_trade_in_model").on("change keyup input click", function() {
                if (this.value.length >= 2){

                    var idCarMark =  $("#id_trade_in_mark").val();

                    $.ajax({
                        type: 'GET',
                        url: './ajax?action=search_model&model=' + this.value + '&id_car_mark=' + idCarMark,
                        dataType : "json",
                        success: function(data){
                            if (data != null && data.item != null) {
                                var html = '';

                                for(var i=0; i < data.item.length; i++) {
                                    html += '<li data-item="' + data.item[i].id + '">' + data.item[i].name + '</li>';
                                }

                                console.log(html);

                                if (html != '')
                                    $(".search_result_trade_in_model").html(html).fadeIn();
                                else
                                    $(".search_result_trade_in_model").fadeOut();
                            }
                        }
                    })
                }
            })

            $(".search_result_trade_in_model").hover(function(){
                $(".search_trade_in_model").blur();
            })

            $("#search_mark").on("change keyup input click", function() {
                if(this.value.length >= 2){
                    $.ajax({
                        type: 'GET',
                        url: './ajax?action=search_mark&mark=' + this.value,
                        dataType : "json",
                        success: function(data){

                            if (data != null && data.item != null) {
                                var html = '';

                                for(var i=0; i < data.item.length; i++) {
                                    html += '<li data-item="' + data.item[i].id + '">' + data.item[i].name + '</li>';
                                }

                                console.log(html);

                                if (html != '')
                                    $(".search_result_mark").html(html).fadeIn();
                                else
                                    $(".search_result_mark").fadeOut();
                            }
                        }
                    })
                }
            })

            $(".search_result_mark").hover(function(){
                $(".search_mark").blur();
            })

            $(".search_result_mark").on("click", "li", function(){
                $("#search_mark").val($(this).text());
                $("#id_mark").val($(this).attr('data-item'));
                $(".search_result_mark").fadeOut();
            })

            $("#search_model").on("change keyup input click", function() {
                if (this.value.length >= 2){

                    var idCarMark =  $("#id_mark").val();

                    $.ajax({
                        type: 'GET',
                        url: './ajax?action=search_model&model=' + this.value + '&id_car_mark=' + idCarMark,
                        dataType : "json",
                        success: function(data){
                            if (data != null && data.item != null) {
                                var html = '';

                                for(var i=0; i < data.item.length; i++) {
                                    html += '<li data-item="' + data.item[i].id + '">' + data.item[i].name + '</li>';
                                }

                                console.log(html);

                                if (html != '')
                                    $(".search_result_model").html(html).fadeIn();
                                else
                                    $(".search_result_model").fadeOut();
                            }
                        }
                    })
                }
            })

            $(".search_result_model").hover(function(){
                $(".search_model").blur();
            })

            $(".search_result_model").on("click", "li", function(){
                $("#search_model").val($(this).text());

                var idModel = $(this).attr('data-item')

                if (idModel != null) {
                    $("#id_model").val(idModel);

                    var request = $.ajax({
                        url: './ajax?action=get_modifications&id_car_model=' + idModel,
                        method: "GET",
                        dataType: "json"
                    });

                    request.done(function( data ) {

                        var html = '<select name="modification" class="turnintodropdown">';

                        for (var i=0; i < data.item.length; i++) {
                            html += '<option value="' + data.item[i].name + '">' + data.item[i].name + '</option>';
                        }

                        html += '</select>';

                        console.log(html);

                        if (html != '')
                            $("#search_result_modification").html(html).fadeIn();
                        else
                            $("#search_result_modification").fadeOut();

                        tamingselect();

                    });
                }

                $(".search_result_model").fadeOut();
            })

        })

    </script>
@endsection
