@extends('layouts.frontend.app')

@section('title', $detail->meta_title ? $detail->meta_title : $detail->mark . ' ' . $detail->model )

@section('meta_desc', $detail->meta_description)

@section('meta_keywords', $detail->meta_keywords)

@section('css')
    <style>

        .search{
            position:relative;
        }

        .search_result {
            background: #FFF;
            border: 1px #ccc solid;
            border-radius: 4px;
            max-height:100px;
            overflow-y:scroll;
            display:none;
        }

        .dropdownvisible {
            max-height:100px;
            overflow-y:scroll;

        }

        .search_result li{
            list-style: none;
            padding: 5px 10px;
            margin: 0;
            color: #0896D3;
            border-bottom: 1px #ccc solid;
            cursor: pointer;
            transition:0.3s;
        }

        .search_result li:hover{
            background: #F9FF00;
        }

    </style>
@endsection


@section('marks')

@endsection

@section('content')
    <section>
        <h1>{{ $detail->mark }} {{ $detail->model }}</h1>
        <div class="row">
            <div class="detail">
                <div class="row">
                    <div class="detail_image_block">
                        <div class="main_pic"><img src="images/item.jpg" /></div>
                        <ul class="more_pics">
                            <li><a href=""><img src="images/item.jpg" /></a></li>
                            <li><a href=""><img src="images/item.jpg" /></a></li>
                            <li><a href=""><img src="images/item.jpg" /></a></li>
                        </ul>
                    </div>
                    <div class="detail_main_info">
                        <div class="detail_price">
                           {{ $detail->price }} <span class="rub">i</span>
                        </div>
                        <ul>
                            <li><span>Год выпуска</span><strong>{{ $detail->year }} г</strong></li>
                            <li><span>Пробег</span><strong>{{ $detail->mileage }} км</strong></li>
                            <li><span>Кузов</span><strong>{{ $detail->body }}</strong></li>
                            <li><span>Двигатель</span><strong>{{ $detail->power }} л., {{ $detail->engine_type }}</strong></li>
                            <li><span>КПП</span><strong>{{ $detail->gearbox }}</strong></li>
                            <li><span>Привод</span><strong>{{ $detail->drive }} привод</strong></li>
                            <li><span>Цвет</span><strong>{{ $detail->color }}</strong></li>
                            <li><span>Салон</span><strong>{{ $detail->salon }}</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="detail_banners row">
                    <div><img src="images/detail_banner_1.jpg" /></div>
                    <div><img src="images/detail_banner_2.jpg" /></div>
                    <div><img src="images/detail_banner_3.jpg" /></div>
                </div>
                <section>
                    <h3>Комплектация:</h3>
                    <ul class="detail_options">
                        <li>эл.привод зеркал</li>
                        <li>тканевый салон</li>
                        <li>тонировка</li>
                        <li>парктроник</li>
                        <li>корректор фар</li>
                        <li>ABS</li>
                        <li>4 эл.стеклоподъемника</li>
                        <li>ГУР</li>
                        <li>центральный замок</li>
                        <li>климат-контроль</li>
                        <li>обогрев заднего стекла</li>
                        <li>2 Air-Bag</li>
                        <li>омыватели фар</li>
                        <li>иммобилайзер</li>
                    </ul>
                </section>
                <section>
                    @if ($detail->description)
                    <h3>Комментарии продавца:</h3>
                      {!! $detail->description !!}
                    @endif

                </section>
            </div>
            <div class="sidebar">
                <div class="request_form">
                    <div class="form_title">Заявка на кредит</div>
                    {!! Form::open(['url' =>  '/request-credit', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'validate']) !!}
                    {!! Form::hidden('mark', $detail->mark) !!}
                    {!! Form::hidden('model', $detail->model) !!}
                        <div class="form_field">
                            {!! Form::text('name', old('name'), ['class' => 'form_control validate[required]', 'placeholder'=>'ФИО']) !!}
                        </div>
                          <div class="form_field">
                            {!! Form::text('registration', old('registration'), ['class' => 'form_control validate[required]', 'placeholder'=>'Регион по прописке', 'autocomplete' => 'off', 'id' => 'search_registration']) !!}
                            <ul class="search_result_registration search_result"></ul>
                        </div>
                        <div class="row">
                            <div class="form_field form_field_age">
                                 {!! Form::selectRange('age', 18, 85, 18, ['class' => 'turnintodropdown validate[required]']) !!}
                            </div>
                            <div class="form_field form_field_phone">
                                {!! Form::text('phone', old('phone'), ['class' => 'form_control form_phone validate[required]', 'placeholder' => 'Телефон']) !!}

                            </div>
                        </div>
                        <div class="form_field">
                            {!! Form::select('fee', [
                '0' => 'Первоначальный взнос 0%',
                 '10' => 'Первоначальный взнос 10%',
                 '20' => 'Первоначальный взнос 20%',
                 '30' => 'Первоначальный взнос 30%',
                 '40' => 'Первоначальный взнос 40%',
                 '50' => 'Первоначальный взнос 50%',
                 '60' => 'Первоначальный взнос 60%',
                 '70' => 'Первоначальный взнос 70%',
                 '80' => 'Первоначальный взнос 80%',
                ], '0', ['class' => 'turnintodropdown validate[required]']
                ) !!}
                        </div>
                {!! Form::submit('Купить в кредит', ['class'=>'btn']) !!}
                {!! Form::close() !!}
                </div>
                <div class="map">
                    <div>
                        <div class="address">{!! getSetting('FRONTEND_ADDRESS') !!}</div>
                        <div class="times">{!! getSetting('FRONTEND_TIMES') !!}</div>
                    </div>
                </div>
                <div>
                    <img src="images/right_banner_detail.jpg" />
                </div>
            </div>
        </div>
        <section class="similar">
            <h3>Похожие автомобили с пробегом:</h3>
            <div class="items_list row">
                <ul>
                    <li class="item">
                        <div class="item_pic"><img src="images/item.jpg" /></div>
                        <div class="idem_desc">
                            <a class="item_name" href="">Nissan NP300</a>
                            <p>2012 г., 56 274 км, Дизель, КППМКПП</p>
                            <div class="item_price">758 000<span class="rub">o</span></div>
                            <a class="item_btn" href="">Подробнее</a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item_pic"><img src="images/item.jpg" /></div>
                        <div class="idem_desc">
                            <a class="item_name" href="">Nissan NP300</a>
                            <p>2012 г., 56 274 км, Дизель, КППМКПП</p>
                            <div class="item_price">758 000<span class="rub">o</span></div>
                            <a class="item_btn" href="">Подробнее</a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item_pic"><img src="images/item.jpg" /></div>
                        <div class="idem_desc">
                            <a class="item_name" href="">Nissan NP300</a>
                            <p>2012 г., 56 274 км, Дизель, КППМКПП</p>
                            <div class="item_price">758 000<span class="rub">o</span></div>
                            <a class="item_btn" href="">Подробнее</a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item_pic"><img src="images/item.jpg" /></div>
                        <div class="idem_desc">
                            <a class="item_name" href="">Nissan NP300</a>
                            <p>2012 г., 56 274 км, Дизель, КППМКПП</p>
                            <div class="item_price">758 000<span class="rub">o</span></div>
                            <a class="item_btn" href="">Подробнее</a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item_pic"><img src="images/item.jpg" /></div>
                        <div class="idem_desc">
                            <a class="item_name" href="">Nissan NP300</a>
                            <p>2012 г., 56 274 км, Дизель, КППМКПП</p>
                            <div class="item_price">758 000<span class="rub">o</span></div>
                            <a class="item_btn" href="">Подробнее</a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(function(){
            $("#search_registration").on("change keyup input click", function() {
                if (this.value.length >= 2){

                    $.ajax({
                        type: 'GET',
                        url: '/ajax?action=search_registration&registration=' + this.value,
                        dataType : "json",
                        success: function(data){
                            if (data != null && data.item != null) {
                                var html = '';

                                for(var i=0; i < data.item.length; i++) {
                                    html += '<li data-item="' + data.item[i].id + '">' + data.item[i].name + '</li>';
                                }

                                console.log(html);

                                if (html != '')
                                    $(".search_result_registration").html(html).fadeIn();
                                else
                                    $(".search_result_registration").fadeOut();
                            }
                        }
                    })
                }
            })

            $(".search_result_registration").hover(function(){
                $(".search_registration").blur();
            })

            $(".search_result_registration").on("click", "li", function(){
                $("#search_registration").val($(this).text());
                $(".search_result_registration").fadeOut();
            })
        })

    </script>
@endsection







