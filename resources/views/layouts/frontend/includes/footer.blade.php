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

    {!! Form::open(['url' => '/callback', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'validate']) !!}

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
</script>

