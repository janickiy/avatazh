@extends('layouts.frontend.app')

@section('title', 'Контакт')

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

@endsection

@section('marks')
    @include('layouts.frontend.includes.mark_list')
@endsection


@section('content')

    <section>
        <h1>Контакты</h1>
        <div class="row">
              <div class="contacts_info">
                <div class="phones">
                    <a href="tel:+78123132274">{!! getSetting('TELEPHONE_1') !!}</a><span>(звонок по России бесплатный)</span>
                    <a href="tel:+78005001463">{!! getSetting('TELEPHONE_2') !!}</a>
                </div>
                <p>{!! getSetting('FRONTEND_ADDRESS') !!}</p>
                <p>{!! getSetting('FRONTEND_TIMES') !!}</p>
                <a class="btn recall_link">Обратный звонок</a>
            </div>
            <div  style="float: right; margin-top: -45px;" ><div style="width:460px;height:280px;" id="googleMap"></div> </div>
        </div>
    </section>

@endsection

@section('js')
    {!! Html::script('http://maps.googleapis.com/maps/api/js') !!}


    <script type="text/javascript">
        function initialize() {
            var mapProp = {
                center: new google.maps.LatLng( {{ getSetting('MAP_LATITUDE') }}, {{ getSetting('MAP_LONGITUDE') }}),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);


    </script>
@endsection