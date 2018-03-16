@extends('layouts.frontend.app')

@section('title', $detail->meta_title ? $detail->meta_title : $detail->mark . ' ' . $detail->model )

@section('meta_desc', $detail->meta_description)

@section('meta_keywords', $detail->meta_keywords)

@section('css')

@endsection

@section('marks')

@endsection

@section('content')
    <section>
        <div class="page main_width">

            <div class="breadcrumbs">
                <a href="/">Главная</a> - <a href="{{ url('/auto/used') }}">Автомобили с пробегом</a> - <a href="{{ url('/auto/used/' .  $detail->slug) }}">{{ $detail->mark }}</a> - <span>{{ $detail->model }}</span>
            </div>

            <h1>{{ $detail->mark }} {{ $detail->model }}</h1>
            <div class="row">
                <div class="detail">
                    <div class="row">
                        <div class="detail_image_block">
                            <div>
                                @if(count($images) > 0)

                                    <div id="image-gallery" class="eagle-gallery img300">
                                        <div class="owl-carousel">
                                            @foreach($images as $image)

                                                <img src="{!! $image['small'] !!}"
                                                     data-medium-img="{!! $image['big'] !!}"
                                                     data-big-img="{!! $image['big'] !!}" data-title="" alt="">

                                            @endforeach
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>
                        <div class="detail_main_info">
                            <div class="detail_price">
                                {{ number_format($detail->price,0,'',' ') }} <span>руб.</span>
                            </div>
                            <ul>
                                <li><span>Год выпуска</span><strong>{{ $detail->year }} г</strong></li>
                                <li><span>Пробег</span><strong>{{ number_format($detail->mileage,0,'',' ') }}
                                        км</strong></li>
                                <li><span>Кузов</span><strong>@if($detail->body) {{ $detail->body }} @else
                                            - @endif</strong></li>
                                <li><span>Двигатель</span><strong>{{ number_format($detail->power,0,'',' ')  }}
                                        л., {{ $detail->engine_type }}</strong></li>
                                <li><span>КПП</span><strong>{{ $detail->gearbox }}</strong></li>
                                <li><span>Привод</span><strong>@if($detail->drive) {{ $detail->drive }} @else
                                            - @endif</strong></li>
                                <li><span>Цвет</span><strong>@if($detail->color) {{ $detail->color }} @else
                                            - @endif</strong></li>
                                <li><span>Салон</span><strong>@if($detail->salon) {{ $detail->salon }} @else
                                            - @endif</strong></li>
                            </ul>
                        </div>
                    </div>
                   
                    @if(is_array($equipments))
                        <section>
                            <h3>Комплектация:</h3>
                            <ul class="detail_options">
                                @foreach($equipments as $equipment)
                                    <li>{!! $equipment !!}</li>
                                @endforeach
                            </ul>
                        </section>
                    @endif

                    <section>
                        @if ($detail->description)
                            <h3>Комментарии продавца:</h3>
                            {!! $detail->description !!}
                        @endif

                    </section>
					<div class="detail_banners row">
                            <div><img src="/images/detail_banner_1.jpg"/></div>
                            <div><img src="/images/detail_banner_2.jpg"/></div>
							<div><img src="/images/detail_banner_3.jpg"/></div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="request_form">
                        <div class="form_title">Заявка на кредит</div>
                        {!! Form::open(['url' => '/usedcar-request-credit', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'validate']) !!}
                        {!! Form::hidden('id_car', $detail->id) !!}
                        <div class="form_field"> 
                            {!! Form::text('name', old('name'), ['class' => 'form_control validate[required]', 'placeholder'=>'ФИО']) !!}
                        </div>
                        <div class="form_field">
                            {!! Form::text('registration', old('registration'), ['class' => 'who form_control validate[required]', 'placeholder'=>'Регион по прописке', 'autocomplete' => 'off', 'id' => 'search_registration']) !!}
                            <ul class="search_result_registration search_result"></ul>
                        </div>
                        <div class="row">
                            <div class="form_field form_field_age">
                                {!! Form::selectRange('age', 18, 85, 'Возраст', ['class' => 'select2 validate[required]', 'placeholder' => 'Возраст']) !!}
                            </div>
                            <div class="form_field form_field_phone">
                                {!! Form::text('phone', old('phone'), ['class' => 'form_control form_phone validate[required]', 'placeholder' => 'Телефон']) !!}
                            </div>
                        </div>
                        <div class="form_field">
                            {!! Form::select('fee', [
                            '0' => 'Первоначальный взнос 0%',
                            '10' => 'Первоначальный взнос 10%',
                            '20' => 'Первоначальный взнос 20%',
                            '30' => 'Первоначальный взнос 30%',
                            '40' => 'Первоначальный взнос 40%',
                            '50' => 'Первоначальный взнос 50%',
                            '60' => 'Первоначальный взнос 60%',
                            '70' => 'Первоначальный взнос 70%',
                            '80' => 'Первоначальный взнос 80%',
                            ], 'Первоначальный взнос', ['class' => 'select2', 'placeholder' => 'Первоначальный взнос']
                            ) !!}
                        </div>
                        {!! Form::submit('Купить в кредит', ['class'=>'btn green']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="map">
                        <div>
                            <div class="address"><span>{!! getSetting('FRONTEND_CITY') !!}</span>, {!! getSetting('FRONTEND_ADDRESS') !!}</div>
                            <div class="times">{!! getSetting('FRONTEND_TIMES') !!}</div>

                            <div>
                                <div style="width:288px;height:300px;margin-left: -15px;margin-right: -15px;"
                                     id="map"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>
    @if(count($similarCars) > 0)

        <section class="similar grey">
            <div class="main_width">
                <h3>Похожие автомобили с пробегом:</h3>
                <div class="items_list row">
                    <ul>

                        @foreach($similarCars as $similarCar)

                            <li class="item">
                                <div class="item_container">
                                    <a href="{!! url('/auto/used/detail/' .  $similarCar->id) !!}">
                                        <div class="item_pic"
                                             style="background-image:url({!! mainSmallPic($similarCar->image) !!})"></div>
                                        <div class="idem_desc">
                                            <div class="item_name">{!! $similarCar->mark !!} {!! $similarCar->model !!}</div>
                                            <p>{!! $similarCar->year !!}
                                                г., {!! number_format($similarCar->mileage,0,'',' ') !!}
                                                км, {!! $similarCar->engine_type !!},
                                                КПП {!! $similarCar->gearbox !!}</p>
                                            <div class="item_price">{!! number_format($similarCar->price,0,'',' ') !!}
                                                <span>руб.</span></div>
                                            <a class="btn green"
                                               href="{!! url('/auto/used/detail/' .  $similarCar->id) !!}">Подробнее</a>
                                        </div>
                                    </a>
                                </div>
                            </li>

                        @endforeach
                    </ul>

                </div>
            </div>
        </section>

    @endif
@endsection

@section('js')

    {!! Html::script('assets/plugins/select2/select2.full.min.js') !!}

    <script type="text/javascript">


        ymaps.ready(init);
        var myMap,
            myPlacemark;

        function init() {
            myMap = new ymaps.Map("map", {
                center: [{!! getSetting('MAP_LONGITUDE') !!}, {!! getSetting('MAP_LATITUDE') !!}],
                zoom: 16
            });

            myPlacemark = new ymaps.Placemark([{!! getSetting('MAP_LONGITUDE') !!}, {!! getSetting('MAP_LATITUDE') !!}], {
                hintContent: '{!! getSetting('FRONTEND_ADDRESS') !!}',
                balloonContent: '{!! getSetting('SITE_TITLE') !!}'
            });

            myMap.geoObjects.add(myPlacemark);
        }

    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $(".select2").select2({
                width: '100%'
            });
        })

        $(document).ready(function () {
            $('#image-gallery').eagleGallery({
                miniSliderArrowPos: 'inside',
                changeMediumStyle: true,
                autoPlayMediumImg: true,
                openGalleryStyle: 'transform',
                bottomControlLine: true
            });

            new WOW().init();
        });

        $(function () {
            $("#search_registration").on("change keyup input click", function () {
                if (this.value.length >= 2) {

                    $.ajax({
                        type: 'GET',
                        url: '/ajax?action=search_registration&registration=' + this.value,
                        dataType: "json",
                        success: function (data) {
                            if (data != null && data.item != null) {
                                var html = '';

                                for (var i = 0; i < data.item.length; i++) {
                                    html += '<li data-item="' + data.item[i].id + '">' + data.item[i].name + '</li>';
                                }

                                console.log(html);

                                if (html != '')
                                    $(".search_result_registration").html(html).fadeIn();
                                else
                                    $(".search_result_registration").fadeOut();
                            }
                        }
                    })
                }
            })

            $(".search_result_registration").hover(function () {
                $(".who").blur();
            })

            $(".search_result_registration").on("click", "li", function () {
                $("#search_registration").val($(this).text());
                $(".search_result_registration").fadeOut();
            })

            $(".form_phone").mask("+7 (999) 999-9999");

        })

    </script>
@endsection







