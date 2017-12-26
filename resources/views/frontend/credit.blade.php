@extends('layouts.frontend.app')

@section('title', 'Автокредит' )

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

    <h1>Заявка на автокредит</h1>
    <div class="row">
        <div class="autoredit">
            <div class="select">
                <input type="hidden" name="id_mark" value="" id="id_mark">
                <input type="text" name="mark" placeholder="Марка" value="" class="form_control" id="search_mark" autocomplete="off">
                <ul class="search_result_mark search_result"></ul>
            </div>

            <div class="select">
                <input type="hidden" name="id_model" value="" id="id_model">
                <input type="text" name="model" placeholder="Модель" value="" class="form_control" id="search_model" autocomplete="off">
                <ul class="search_result_model search_result"></ul>
            </div>

            <div class="select" id="search_result_modification">
                <select name="modification" class="turnintodropdown">
                    <option>Коплектация</option>
                </select>
            </div>


            <div class="select">
                <select class="turnintodropdown">
                    <option value="0">Первоначальный взнос 0%</option>
                    <option value="10">Первоначальный взнос 10%</option>
                    <option value="20">Первоначальный взнос 20%</option>
                    <option value="30">Первоначальный взнос 30%</option>
                    <option value="40">Первоначальный взнос 40%</option>
                    <option value="50">Первоначальный взнос 50%</option>
                    <option value="60">Первоначальный взнос 60%</option>
                    <option value="70">Первоначальный взнос 70%</option>
                    <option value="80">Первоначальный взнос 80%</option>
                </select>
            </div>
            <div class="select">
                <input type="text" class="form_control" placeholder="ФИО">
            </div>
            <div class="select">
                <select class="turnintodropdown">
                    @for($i=18; $i < 81; $i++)
                    <option>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="select">
                <select class="turnintodropdown">
                    <option>Регион по прописке</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                </select>
            </div>
            <div class="select">
                <input type="text" class="form_control form_phone" placeholder="Телефон">
            </div>
            <div class="checkboxes">
                <div class="row">
                    <input class="checkbox" type="checkbox" id="1">
                    <label for="1">Я понимаю, что автосалон находится в Москве</label>
                </div>
                <div class="row">
                    <input class="checkbox" type="checkbox" id="2">
                    <label for="2">Я даю согласие на обработку моих персональных данных</label>
                </div>
            </div>
            <input type="submit" class="btn" value="отправить заявку" />
        </div>
        <div class="autoredit condition">
            <h2>Условия кредитования</h2>
            <ul>
                <li>Минимальный пакет документов паспорт, водительское удостоверение.</li>
                <li>Первоначальный взнос от 0%</li>
                <li>Сумма кредитования до 3,5 млн. рублей</li>
                <li>Рассмотрение 15 минут!</li>
                <li>Досрочное погашение без штрафов и комиссий!</li>
                <li>Срок кредита от 3 месяцев до 7 лет.</li>
                <li>Индивидуальный подход к каждому клиенту.</li>
            </ul>

        </div>
    </div>
    <div class="logos"><img src="images/logos.jpg" /></div>


@endsection

@section('js')
    <script type="text/javascript">
        $(function(){
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



            $(".search_result_mark").hover(function(){
                $(".search_mark").blur();
            })

            $(".search_result_mark").on("click", "li", function(){
                $("#search_mark").val($(this).text());
                $("#id_mark").val($(this).attr('data-item'));
                $(".search_result_mark").fadeOut();
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

                        for(var i=0; i < data.item.length; i++) {
                            html += '<option value="' + data.item[i].name + '">' + data.item[i].name + '</option>';
                        }

                        html += '</select>';


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
