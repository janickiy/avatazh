@extends('layouts.frontend.app')

@section('title', 'Контакт')

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

    {!! Html::style('css/fancybox/jquery.fancybox.css') !!}


@endsection

@section('marks')
    @include('layouts.frontend.includes.mark_list')
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
						<a href="tel:+78123132274">{!! getSetting('TELEPHONE_1') !!}</a></br><span>(звонок по России бесплатный)</span>
					</div>
					</br>
					<div>
						<a href="tel:+78005001463">{!! getSetting('TELEPHONE_2') !!}</a>
					</div>
                </div>
                <p>{!! getSetting('FRONTEND_ADDRESS') !!}</p>
                <p>{!! getSetting('FRONTEND_TIMES') !!}</p>
                <a  href="#inline" class="btn recall_link modalbox">Обратный звонок</a>
            </div>
            <div  style="float: right; margin-top: -45px;" ><div style="width:460px;height:280px;" id="googleMap"></div> </div>
        </div>
		  </div>
    </section>

@endsection

@section('js')

    {!! Html::script('http://maps.googleapis.com/maps/api/js') !!}
   

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2();
        })


        $(function(){
            $(".form_phone").mask("+7 (999) 999-9999");
        })

        function initialize() {
            var mapProp = {
                center: new google.maps.LatLng( {{ getSetting('MAP_LATITUDE') }}, {{ getSetting('MAP_LONGITUDE') }}),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        $(document).ready(function() {
            $(".modalbox").fancybox();

        });

    </script>

@endsection