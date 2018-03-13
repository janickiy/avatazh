@extends('layouts.frontend.app')

@section('title', isset($title) ? $title : '' )

@section('meta_desc', isset($meta_desc) ? $meta_desc : '')

@section('meta_keywords', isset($meta_keywords) ? $meta_keywords : '')

@section('css')

@endsection


@section('marks')

@endsection

@section('content')
    <section>
        <div class="page main_width">
            @include('layouts.frontend.includes.breadcrumbs')
            <h1>Автомобили с пробегом</h1>

            <div class="left_content items_list">
                <ul class="row">

                    @foreach($model_list as $car)

                        <li class="item">
                            <div class="item_container">
                                <div class="item_pic"
                                     style="background-image:url({{ mainSmallPic($car->image) }})"></div>
                                <div class="idem_desc">
                                    <a class="item_name"
                                       href="{{ url('/auto/used/detail/' . $car->id) }}">{{ $car->mark }} {{ $car->model }}</a>
                                    <p>{{ $car->year }} г., {{ $car->mileage }} км, {{ $car->engine_type }}
                                        , {{ $car->gearbox }}</p>
                                    <div class="item_price">{{ $car->price }}<span>руб.</span></div>
                                    <a class="btn" href="{{ url('/auto/used/detail/' . $car->id) }}">Подробнее</a>
                                </div>
                            </div>
                        </li>

                    @endforeach

                </ul>
            </div>
            <div class="pager">
                {{ $model_list->render() }}
            </div>



        </div>
    </section>


@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection







