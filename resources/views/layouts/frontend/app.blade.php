<!DOCTYPE html>
<html>
<head>

{!! Html::style('css/style.css') !!}

{!! Html::style('css/lightslider.css') !!}

{!! Html::style('css/eagle.gallery.min.css') !!}

{!! Html::style('assets/plugins/select2/select2.min.css') !!}

{!! Html::style('css/fancybox/jquery.fancybox.css') !!}

<!-- iCheck for checkboxes and radio inputs -->
    {!! Html::style('assets/plugins/iCheck/all.css') !!}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="@yield('meta_desc')"/>
    <meta name="keywords" content="@yield('meta_keywords')"/>
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/ico">
    <title> {{ getSetting('SITE_TITLE') }} | @yield('title') </title>

    {!! Html::script('js/jquery-1.11.1.min.js') !!}
    {!! Html::script('js/select.js') !!}
    {!! Html::script('js/script.js') !!}
    {!! Html::script('js/jquery.maskedinput.js') !!}
    {!! Html::script('js/jquery.fancybox.js') !!}
    {!! Html::script('assets/plugins/select2/select2.full.min.js') !!}
    {!! Html::script('js/eagle.gallery.min.js') !!}

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	
    @yield('css')

</head>
<body>
<div class="site_wrapper row">
@include('layouts.frontend.includes.header')


@yield('marks')

@yield('models')

@include('layouts.frontend.includes.notifications')
@yield('content')

<!-- CONTENT-WRAPPER SECTION END-->


</div>
@include('layouts.frontend.includes.footer')
<!-- Bootstrap 3.3.5 -->
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('assets/dist/js/jquery.singlePageNav.min.js') !!}

{!! Html::script('assets/dist/js/wow.min.js') !!}

{!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}

{!! Html::script('assets/plugins/validationengine/languages/jquery.validationEngine-ru.js') !!}

{!! Html::script('assets/plugins/validationengine/jquery.validationEngine.js') !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('.preloader').fadeOut(1000);

        $('input[type="checkbox"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });

        // Validation Engine init
        var prefix = 's2id_';
        $("form[id^='validate']").validationEngine('attach',
            {
                promptPosition: "bottomRight", scroll: false,
                prettySelect: true,
                usePrefix: prefix
            });
    })
</script>
@yield('js')


</body>
</html>

















