<!DOCTYPE html>
<html>
<head>

    {!! Html::style('css/style.css') !!}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="@yield('meta_desc')"/>
    <meta name="keywords" content="@yield('met_keywords')"/>
    <meta name="author" content=""/>
    <title> {{ getSetting('SITE_TITLE') }} | @yield('title') </title>

    {!! Html::script('js/jquery-1.11.1.min.js') !!}
    {!! Html::script('js/select.js') !!}
    {!! Html::script('js/jquery.maskedinput.js') !!}
</head>
<body>
<div class="site_wrapper">
    <div class="site row">
        @include('layouts.frontend.includes.header')
        <div class="page main_width">

        @yield('marks')

        @include('layouts.frontend.includes.breadcrumbs')

        @include('layouts.frontend.includes.notifications')
        @yield('content')

        <!-- CONTENT-WRAPPER SECTION END-->
        </div>

        @include('layouts.frontend.includes.footer')
    </div>
</div>

<!-- Bootstrap 3.3.5 -->
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('assets/dist/js/jquery.singlePageNav.min.js') !!}

{!! Html::script('assets/dist/js/wow.min.js') !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('.preloader').fadeOut(1000); // set duration in brackets
    })
</script>
@yield('js')


</body>
</html>

















