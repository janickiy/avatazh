@extends('layouts.frontend.app')

@section('title', 'Контакт')

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

    {!! Html::style('css/fancybox/jquery.fancybox.css') !!}


@endsection

@section('marks')

@endsection

@section('content')


    <section>
        <div class="page main_width">
            @include('layouts.frontend.includes.breadcrumbs')
            <h1>Контакты</h1>
            <div class="row">
                <div class="contacts_info">
                    <div class="phones">
                        <div>
                            <a href="tel:{!! getSetting('TELEPHONE_1') !!}">{!! getSetting('TELEPHONE_1') !!}</a>
                        </div>
                    </div>
					 <p>{!! getSetting('FRONTEND_CITY') !!}</p> 
                    <p>{!! getSetting('FRONTEND_ADDRESS') !!}</p>
                    <p>{!! getSetting('FRONTEND_TIMES') !!}</p>
                    <a href="#inline" class="btn recall_link modalbox">Обратный звонок</a>
                </div>
                <div id="map" style="width: 400px; height: 300px;margin-bottom: 20px;float: right;"></div>
            </div>
        </div>
    </section>
 
@endsection

@section('js')

    {!! Html::script('http://maps.googleapis.com/maps/api/js') !!}


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


@endsection