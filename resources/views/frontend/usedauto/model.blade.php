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
								<a href="{{ url('/auto/used/detail/' . $car->id) }}">
									<div class="item_pic"
										 style="background-image:url({{ mainSmallPic($car->image) }})"></div>
									<div class="idem_desc">
										<div class="item_name">{{ $car->mark }} {{ $car->name }}</div>
										<p>{{ $car->year }} г., {{ number_format($car->mileage,0,'',' ') }} км, {{ $car->engine_type }}
											, {{ $car->gearbox }}</p>
										<div class="item_price">{{ number_format($car->price,0,'',' ')  }}<span>руб.</span></div>
										<a class="btn" href="{{ url('/auto/used/detail/' . $car->id) }}">Подробнее</a>
									</div>
								</a>
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







