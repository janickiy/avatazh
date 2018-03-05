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
	<div class="main_width">
		<div class="main_banner"></div>
	
		<div class="search_bloсk_container row">
			{!! Form::open(['url' =>  '/', 'method' => 'get']) !!}
			{!! Form::hidden('search', 'Y') !!}
			<div class="search_bloсk select">
			   {!! Form::select('mark', $mark_options, isset($request->mark) ? $request->mark : 'Марка', ['class' => 'select2', 'id' => 'mark']) !!}
			</div>
			<div id="model_filter" class="search_bloсk select">
				{!! Form::select('model', $models_options, isset($request->model) ? $request->model : 'Модель', ['class' => 'select2', 'id' => 'model', !isset($request->model) ? 'disabled' : '']) !!}
			</div>
			<div id="year_filter" class="search_bloсk select">

				@if(isset($request->year))
					{!! Form::selectYear('year', isset($year['from']) ? $year['from'] : null, isset($year['to']) ? $year['to'] : null, isset($request->year) ? $request->year : null, ['class' => 'select2', 'id' => 'year', 'placeholder' => 'Год от']) !!}
				@else
					{!! Form::select('year', [], 'Год от', ['class' => 'select2', 'id' => 'year', 'disabled', 'placeholder' => 'Год от']) !!}
				@endif

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
	</div>
    @if($request->search)

    <section>
		<div class="main_width">
			<h1>Подбор автомобиля</h1>

			<div class="index_items_list row">


				@if (count($usedcars) > 0)

					<ul>

						@foreach($usedcars as $usedcar)
							<li class="item">
								<div class="item_pic"><img src="{!! mainSmallPic($usedcar->image) !!}" /></div>
								<div class="idem_desc">
									<a class="item_name" href="{!! url('/auto/used/detail/' . $usedcar->id) !!}">{!! $usedcar->mark !!} {!! $usedcar->model !!}</a>
									<p>{!! $usedcar->year !!} г., {!! number_format($usedcar->mileage,0,'',' ') !!} км, {!! $usedcar->engine_type !!}, КПП {!! $usedcar->gearbox !!}</p>
									<div class="item_price">{!! number_format($usedcar->price,0,'',' ') !!}<span class="rub">o</span></div>
									<a class="item_btn" href="{!! url('/auto/used/detail/' . $usedcar->id) !!}">Подробнее</a>
								</div>
							</li>


						@endforeach

					</ul>

					<div class="pager">
						{{ $usedcars->render() }}
					</div>

				@else

					<p>По вашему запросу ничего не найдено!</p>
				@endif

			</div>
		</div>
   </section>

    @else

    <section class="specials">
		<div class="main_width">
			<h1>Специальные предложения</h1>
			<div class="index_items_list row">

				<div class="quantity_cars_block">
					<div class="item_container">
					<div class="autocode"></div>
						<table width="100%">
							<tr>
								<td align="right"><span class="quantity_cars">{{ $numberCars }}</span></td>
								<td align="left">автомобилей на сайте</td>
							</tr>
							<!--
							<tr>
								<td align="right"><span class="quantity_cars">{{ $soldLastWeek }}</span></td>
								<td align="left">продано на прошлой неделе</td>
							</tr>
							-->
						</table>
					</div>
				</div>
				@if (count($specialOffer) > 0)

				<ul>

					@foreach($specialOffer as $special)

					<li class="item">
						<div class="item_container">
							<a href="{!! url('/auto/used/detail/' . $special->id) !!}">
								<div class="item_pic" style="background-image:url({!! mainSmallPic($special->image) !!})"></div>
								<div class="idem_desc">
									<div class="item_name" >{!! $special->mark !!} {!! $special->model !!}</div>
									<p>{!! $special->year !!} г., {!! number_format($special->mileage,0,'',' ') !!} км, {!! $special->engine_type !!}, КПП {!! $special->gearbox !!}</p>
									<div class="item_price">{!! number_format($special->price,0,'',' ') !!}<span>руб.</span></div>
									<a class="btn green" href="{!! url('/auto/used/detail/' . $special->id) !!}">Подробнее</a>
								</div>
							</a>
						</div>
					</li> 

					@endforeach

				</ul>

				@endif

			</div>
		</div>
    </section>
    <section class="grey">
		<div class="main_width">
			<h2>Новинки в каталоге</h2>
			<div class="index_items_list row">

				@if(count($newCars)>0)

				<ul class="row">

					@foreach($newCars as $newCar)

					<li class="item">
						<div class="item_container" href="{!! url('/auto/used/detail/' . $newCar->id) !!}">
							<a href="{!! url('/auto/used/detail/' . $newCar->id) !!}">
								<div class="item_pic" style="background-image:url({!! mainSmallPic($newCar->image) !!})"></div>
								<div class="idem_desc">
									<div class="item_name" >{!! $newCar->mark !!} {!! $newCar->model !!}</div>
									<p>{!! $newCar->year !!} г., {!! number_format($newCar->mileage,0,'',' ') !!} км, {!! $newCar->engine_type !!}, КПП {!! $newCar->gearbox !!}</p>
									<div class="item_price">{!! number_format($newCar->price,0,'',' ') !!}<span>руб.</span></div>
									<a class="btn" href="{!! url('/auto/used/detail/' . $newCar->id) !!}">Подробнее</a>
								</div>
							</a>
						</div>
					</li>

					@endforeach

				</ul>

				<div class="pager">
					{{ $newCars->render() }}
				</div>

				@endif

			</div>
		</div>
    </section>

    @endif

</div>

@endsection

@section('js')

    {!! Html::script('assets/plugins/select2/select2.full.min.js') !!}
<style>
	.breadcrumbs {display:none;}
</style>
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
                        var html = '<option>Модель</option>';

                        for (var i = 0; i < data.item.length; i++) {
                            html += '<option value="' + data.item[i].id + '">' + data.item[i].name + '</option>';
                        }

                        console.log(html);

                        if (data.item.length > 0) {
                            $('#model').prop('disabled',false);
                            $("#model").html(html).fadeIn();
                        } else {
                            $("#model").html(html).fadeIn();
                            $('#model').prop('disabled',true);
                        }

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

                        var html = '<option value="">Год от</option>';

                        for (var i = data.min; i < data.max; i++) {
                            html += '<option value="' + i + '">' + i + '</option>';
                        }

                        if (data.min != null || data.max != null) {
                            $('#year').prop('disabled',false);
                            $("#year").html(html).fadeIn();
                        } else {
                            $("#year").html(html).fadeIn();
                            $('#year').prop('disabled',true);
                        }

                        $(".select2").select2({
                            width: '100%'
                        });
                    });
                }
            })
        })

    </script>
@endsection
