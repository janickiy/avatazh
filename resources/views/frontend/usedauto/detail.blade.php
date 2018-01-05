@extends('layouts.frontend.app')

@section('title', $detail->meta_title ? $detail->meta_title : $detail->mark . ' ' . $detail->model )

@section('meta_desc', $detail->meta_description)

@section('meta_keywords', $detail->meta_keywords)

@section('css')

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
                            758 000 <span class="rub">i</span>
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
                    <form>
                        <div class="form_field">
                            <input type="text" class="form_control" placeholder="ФИО">
                        </div>
                        <div class="form_field">
                            <select class="turnintodropdown">
                                <option>Регион по прописке</option>
                                <option>Вариант</option>
                                <option>Вариант</option>
                                <option>Вариант</option>
                                <option>Вариант</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form_field form_field_age">
                                <select class="turnintodropdown">
                                    <option>Возраст</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                </select>
                            </div>
                            <div class="form_field form_field_phone">
                                <input type="text" class="form_control form_phone" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="form_field">
                            <select class="turnintodropdown">
                                <option>Первоначальный взнос</option>
                                <option>Вариант</option>
                                <option>Вариант</option>
                                <option>Вариант</option>
                                <option>Вариант</option>
                            </select>
                        </div>
                        <input type="submit" class="btn" value="Купить в кредит" />
                    </form>
                </div>
                <div class="map">
                    <div>
                        <div class="address">г. Санкт-Петербург,ул. Кушелевская дорога, д. 20</div>
                        <div class="times">Ежедневно с 9:00 до 20:00</div>
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

    </script>
@endsection







