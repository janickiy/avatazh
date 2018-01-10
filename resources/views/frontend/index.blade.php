@extends('layouts.frontend.app')

@section('title', 'Автокредит' )

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

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
            <select class="turnintodropdown">
                <option>Марка</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk select disabled">
            <select class="turnintodropdown">
                <option>Модель</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
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
            <select class="turnintodropdown">
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
    <script type="text/javascript">

    </script>
@endsection
