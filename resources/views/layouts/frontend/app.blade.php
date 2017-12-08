<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    {!! Html::style('assets/bootstrap/css/style.css') !!}

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="@yield('meta_desc')"/>
    <meta name="keywords" content="@yield('met_keywords')"/>
    <meta name="author" content=""/>
    <title> {{ getSetting('SITE_TITLE') }} | @yield('title') </title>

    {!! Html::script('assets/plugins/jQuery/jquery-1.11.1.min.js') !!}
    {!! Html::script('assets/plugins/jQuery/select.js') !!}
    {!! Html::script('assets/plugins/jQuery/jquery.maskedinput.js') !!}

</head>
<body>


<body>
<div class="site_wrapper">
    <div class="site row">
        @include('layouts.frontend.includes.header')
        <div class="page main_width">
        @include('layouts.frontend.includes.breadcrumbs')




                @yield('content')


    <!-- CONTENT-WRAPPER SECTION END-->
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