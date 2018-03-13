<!-- start footer -->

<footer>
    <div class="main_width">
        <div class="row">
            <a href="/" class="logo"><img src="/images/logo.png"/></a>
            <div class="address">
                {!! getSetting('FRONTEND_ADDRESS') !!}<br/>
                {!! getSetting('FRONTEND_TIMES') !!}
            </div>
            <div class="phone">
                <a href="tel:{!! getSetting('TELEPHONE_2') !!}">{!! getSetting('TELEPHONE_2') !!}</a>
            </div>
            <div class="phone">
                <a href="tel:{!! getSetting('TELEPHONE_1') !!}">{!! getSetting('TELEPHONE_1') !!}</a>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<div id="inline" class="popup_form">
    <h3>Заказать обратный звонок</h3>

    {!! Form::open(['url' => '/callback', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'validate', 'onsubmit' => "yaCounter48034634.reachGoal('callback'); return true;"]) !!}

    <div class="form_field">
        {!! Form::text('name', old('name'), ['class' => 'form_control  validate[required]', 'placeholder'=>'Ваше имя']) !!}
    </div>

    <div class="form_field">
        {!! Form::text('phone', old('phone'), ['class' => 'form_control form_phone validate[required,custom[phone]]', 'placeholder'=>'Ваше телефон']) !!}
    </div>

    <div class="form_field call_time">
        <label>Удобное время звонка:</label>
        <div class="fl_l">
            {!! Form::select('from_time', [
                '9:00' => '9:00',
                '10:00' => '10:00',
                '11:00' => '11:00',
                '12:00' => '12:00',
                '13:00' => '13:00',
                '14:00' => '14:00',
                '15:00' => '15:00',
                '16:00' => '16:00',
                '17:00' => '17:00',
                '18:00' => '18:00',
                '19:00' => '19:00',
                ], '9:00', ['class' => 'select2 validate[required[alertTextCheckboxMultiple]', 'placeholder' => 'От']
                )
            !!}
        </div>
        <div class="fl_l">
            {!! Form::select('to_time', [
               '9:00' => '9:00',
               '10:00' => '10:00',
               '11:00' => '11:00',
               '12:00' => '12:00',
               '13:00' => '13:00',
               '14:00' => '14:00',
               '15:00' => '15:00',
               '16:00' => '16:00',
               '17:00' => '17:00',
               '18:00' => '18:00',
               '19:00' => '19:00',
               ], '19:00', ['class' => 'select2 validate[required[alertTextCheckboxMultiple]', 'placeholder' => 'От']
               )
           !!}
        </div>
    </div>

    {!! Form::submit('Отправить', ['class'=>'btn']) !!}
    {!! Form::close() !!}

</div>
<script>
    $(document).ready(function () {
        $(".select2").select2();
    })

    $(function () {
        $(".form_phone").mask("+7 (999) 999-9999");
    })

    $(document).ready(function () {
        $(".modalbox").fancybox();

    });
	   $(document).ready(function () {
        $("#show_nav").click(function () {
            $("#nav_mobile").addClass("visible");
            $("#shadow").addClass("shadow_layer");
        });
        $("#hide_nav").click(function () {
            $("#nav_mobile").removeClass("visible");
            $("#shadow").removeClass("shadow_layer");
        });
        $("#shadow").click(function () {
            $("#nav_mobile").removeClass("visible");
            $("#shadow").removeClass("shadow_layer");
        });
    });
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48034634 = new Ya.Metrika({
                    id:48034634,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48034634" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->