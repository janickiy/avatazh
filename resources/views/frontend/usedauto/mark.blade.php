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

        <div class="main_marks row">
            <table width="100%">

                <?php $i=0; ?>
                @foreach($models as $model)
                    @if($i == 0) <tr> @endif
                        <td><a href="/auto/used/{!! $model->mark !!}/{!! $model->model !!}">{!! $model->name !!}</a></td>
                        <?php $i++; ?>
                        @if($i == 5) </tr> <?php $i=0; ?> @endif
                @endforeach

            </table>
        </div>

        <ul>

            @foreach($model_list as $car)

            <li class="item">
				<div class="item_container">
					<div class="item_pic" style="background-image:url({{ mainSmallPic($car->image) }})"></div>
					<div class="idem_desc">
						<a class="item_name" href="{{ url('/auto/used/detail/' . $car->id) }}">{{ $car->mark }} {{ $car->model }}</a>
						<p>{{ $car->year }} г., {{ $car->mileage }} км, {{ $car->engine_type }}, {{ $car->gearbox }}</p>
						<div class="item_price">{{ $car->price }}<span class="rub">o</span></div>
						<a class="btn" href="{{ url('/auto/used/detail/' . $car->id) }}">Подробнее</a>
					</div>
				 </div>
            </li>

            @endforeach

        </ul>

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







