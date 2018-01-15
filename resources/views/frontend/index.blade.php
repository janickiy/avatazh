@extends('layouts.frontend.app')

@section('title', 'Автокредит' )

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

    <style>
        .select2-container .select2-selection--single {
            height: 50px;
            width: 120px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 50px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 50px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #747474;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #ee8116;

        }

        .select2-container .select2-selection--single {height: 52px;width: 120px; }.select2-container--default .select2-selection--single .select2-selection__rendered {line-height: 50px; }.select2-container--default .select2-selection--single .select2-selection__arrow {height: 50px;}.select2-container--default .select2-selection--single .select2-selection__rendered {color: #747474;}.select2-container--default .select2-results__option--highlighted[aria-selected] {background-color: #ee8116;}
        .select:first-child .select2-container--default .select2-selection--single{border-radius:4px 0 0 4px;}

    </style>

@endsection

@section('marks')
    @include('layouts.frontend.includes.mark_list')
@endsection

@section('content')

    <div class="main_banner">
        <img src="images/index_banner.jpg" />
    </div>
    <div class="search_bloсk_container row">
        {!! Form::open(['url' =>  '/', 'method' => 'get']) !!}
        {!! Form::hidden('serch', 'Y') !!}
        <div class="search_bloсk select">
           {!! Form::select('mark', $mark_options, isset($request->mark) ? $request->mark : 'Марка', ['class' => 'select2', 'id' => 'mark']) !!}
        </div>
        <div id="model_filter" class="search_bloсk select">
            {!! Form::select('model', ['Модель'], isset($request->model) ? $request->model : 'Модель', ['class' => 'select2', 'id' => 'model', 'disabled' => isset($request->model) ? false : true]) !!}
        </div>
        <div id="year_filter" class="search_bloсk select">
            {!! Form::select('year', ['Год от'], isset($request->year) ? $request->year : 'Год от', ['class' => 'select2', 'id' => 'year', 'disabled' => isset($request->year) ? false : true]) !!}

            {!!  Form::selectYear('year', isset($year['from']) ? $year['from'] : 'Год от', isset($year['to']) ? $year['to'] : null, isset($request->year) ? $request->year : 'Год от', ['class' => 'select2', 'disabled' => isset($request->year) ? false : true]) !!}
        </div>
        <div class="search_bloсk select">
            {!! Form::select('gearbox',
            [null => 'Коробка',
            'Механическая' => 'Механическая',
            'Автоматическая' => 'Автоматическая',
            'Роботизированная' => 'Роботизированная',
            'Вариатор' => 'Вариатор',
            'Автоматизированная механическая' => 'Автоматизированная механическая'], isset($request->gearbox) ? $request->gearbox : 'Коробка', ['class' => 'select2']) !!}
        </div>
        <div class="search_bloсk ">
            {!! Form::text('price_from', old('price_from', isset($request->price_from) ? $request->price_from : null), ['class' => 'form_control', 'placeholder'=>'Цена от']) !!}
        </div>
        <div class="search_bloсk ">
            {!! Form::text('price_to', old('price_to', isset($request->price_to) ? $request->price_to : null), ['class' => 'form_control', 'placeholder'=>'Цена до']) !!}
        </div>
        <div class="search_bloсk ">
            {!! Form::submit('Подобрать', ['class'=>'btn']) !!}
        </div>
        {!! Form::close() !!}

    </div>
    <section class="specials">
        <h1>Специальные предложения</h1>
        <div class="index_items_list row">
            <div class="quantity_cars_block">
                <div class="row">
                    <div class="quantity_cars fl_l">{{ $numberCars }}</div>
                    <label>автомобилей на сайте</label>
                </div>
                <div class="row">
                    <div class="quantity_cars fl_l">{{ $soldLastWeek }}</div>
                    <label>продано на прошлой неделе</label>
                </div>
                <div class="autocode">

                </div>
            </div>

            @if (count($specialOffer) > 0)

            <ul>

                @foreach($specialOffer as $special)

                <li class="item">
                    <div class="item_pic"><img src="{!! mainSmallPic($special->image) !!}" /></div>
                    <div class="idem_desc">
                        <a class="item_name" href="{!! url('/auto/used/detail/' . $special->id) !!}">{!! $special->mark !!} {!! $special->model !!}</a>
                        <p>{!! $special->year !!} г., {!! number_format($special->mileage,0,'',' ') !!} км, {!! $special->engine_type !!}, КПП {!! $special->gearbox !!}</p>
                        <div class="item_price">{!! number_format($special->price,0,'',' ') !!}<span class="rub">o</span></div>
                        <a class="item_btn" href="{!! url('/auto/used/detail/' . $special->id) !!}">Подробнее</a>
                    </div>
                </li>

                @endforeach

            </ul>

            @endif

        </div>
    </section>
    <section>
        <h2>Новинки в каталоге</h2>
        <div class="index_items_list row">

            @if(count($newCars)>0)

            <ul>

                @foreach($newCars as $newCar)

                <li class="item">
                    <div class="item_pic"><img src="{!! mainSmallPic($newCar->image) !!}" /></div>
                    <div class="idem_desc">
                        <a class="item_name" href="{!! url('/auto/used/detail/' . $newCar->id) !!}">{!! $newCar->mark !!} {!! $newCar->model !!}</a>
                        <p>{!! $newCar->year !!} г., {!! number_format($newCar->mileage,0,'',' ') !!} км, {!! $newCar->engine_type !!}, КПП {!! $newCar->gearbox !!}</p>
                        <div class="item_price">{!! number_format($newCar->price,0,'',' ') !!}<span class="rub">o</span></div>
                        <a class="item_btn" href="{!! url('/auto/used/detail/' . $newCar->id) !!}">Подробнее</a>
                    </div>
                </li>

                @endforeach

            </ul>

            <div class="pager">
                {{ $newCars->render() }}
            </div>

            @endif

        </div>
    </section>
</div>

@endsection

@section('js')

    {!! Html::script('assets/plugins/select2/select2.full.min.js') !!}

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2({
                width: '100%'
            });
        })

        $(function(){
            $("#mark").on("change keyup input click", function() {

                var idMark = this.value;

                if(idMark != null) {

                    var request = $.ajax({
                        url: './ajax?action=get_models&id_car_mark=' + idMark,
                        method: "GET",
                        dataType: "json"
                    });

                    request.done(function (data) {

                        var html = '<select id="model" class="select2"  ' + (data.item.length == 0 ? 'disabled' : '') + '>';

                        html += '<option>Модель</option>';

                        for (var i = 0; i < data.item.length; i++) {
                            html += '<option value="' + data.item[i].id + '">' + data.item[i].name + '</option>';
                        }

                        html += '</select>';

                        console.log(html);

                        if (html != '')
                            $("#model_filter").html(html).fadeIn();
                        else
                            $("#search_filter").fadeOut();

                       $(".select2").select2({
                          width: '100%'
                       });
                    });
                }
            })

            $(document).on('change keyup input click','#model',function(){
                var idModel = this.value;

                if (idModel != null) {
                    var request = $.ajax({
                        url: './ajax?action=get_year&id_car_model=' + idModel,
                        method: "GET",
                        dataType: "json"
                    });

                    request.done(function (data) {

                        var html = '<option>Год от</option>';

                        for (var i = data.min; i < data.max; i++) {
                            html += '<option value="' + i + '">' + i + '</option>';
                        }

                        if (data.min || data.max) {
                            $('#year').prop('disabled',false);
                            $("#year").html(html).fadeIn();
                        } else {
                            $("#year").html(html).fadeIn();
                            $('#year').prop('disabled',true);
                        }
                    });
                }
            })
        })

    </script>
@endsection
