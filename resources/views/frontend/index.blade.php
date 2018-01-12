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
        <div class="search_bloсk select">
            <select id="mark" class="select2">
                <option>Марка</option>

                @foreach($mark_search as $mark)
                    <option value="{{ $mark->id }}">{{ $mark->name }}</option>
                @endforeach


            </select>
        </div>
        <div id="search_model" class="search_bloсk select">
            <select class="select2" disabled>
                <option >Модель</option>



            </select>
        </div>
        <div class="search_bloсk select">
            <select class="turnintodropdown">
                <option>Год от</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk select">
            <select class="select2">
                <option>Коробка</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk ">
            <input type="text" class="form_control" placeholder="Цена от" />
        </div>
        <div class="search_bloсk ">
            <input type="text" class="form_control" placeholder="Цена до" />
        </div>
        <div class="search_bloсk ">
            <input type="submit" class="btn" value="Подобрать" />
        </div>
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


                        var html = '<select class="select2"  ' + (data.item.length == 0 ? 'disabled' : '') + '>';

                        html += '<option>Модель</option>';

                        for (var i = 0; i < data.item.length; i++) {
                            html += '<option value="' + data.item[i].id + '">' + data.item[i].name + '</option>';
                        }

                        html += '</select>';

                        console.log(html);

                        if (html != '')
                            $("#search_model").html(html).fadeIn();
                        else
                            $("#search_model").fadeOut();

                        $(".select2").select2({
                            width: '100%'
                        });
                    });

                }

            })
        })

    </script>
@endsection
