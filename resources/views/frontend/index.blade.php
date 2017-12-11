@extends('layouts.frontend.app')

@section('title', 'Автокредит' )

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

@endsection


@section('marks')
    <div class="main_marks row">
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
            <li><a href="">Dodge</a><span>520</span></li>
        </ul>
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
            <li><a href="">Dodge</a><span>520</span></li>
        </ul>
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
            <li><a href="">Dodge</a><span>520</span></li>
        </ul>
        <ul>
            <li><a href="">LADA (ВАЗ)</a><span>6943</span></li>
            <li><a href="">Audi</a><span>5197</span></li>
            <li><a href="">BMW</a><span>7243</span></li>
        </ul>
        <ul>
            <li><a href="">Citroen</a><span>1313</span></li>
            <li><a href="">Daewoo</a><span>973</span></li>
        </ul>
        <a href="" class="allmarks">Все марки</a>
    </div>
@endsection




@section('content')

    <div class="main_banner">
        <img src="images/index_banner.jpg" />
    </div>
    <div class="search_bloсk_container row">
        <div class="search_bloсk select">
            <select class="turnintodropdown">
                <option>Марка</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk select disabled">
            <select class="turnintodropdown">
                <option>Модель</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk select">
            <select class="turnintodropdown">
                <option>Год от</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk select">
            <select class="turnintodropdown">
                <option>Коробка</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
                <option>Вариант</option>
            </select>
        </div>
        <div class="search_bloсk ">
            <input type="text" class="form_control" placeholder="Цена от" />
        </div>
        <div class="search_bloсk ">
            <input type="text" class="form_control" placeholder="Цена до" />
        </div>
        <div class="search_bloсk ">
            <input type="submit" class="btn" value="Подобрать" />
        </div>
    </div>
    <section class="specials">
        <h1>Специальные предложения</h1>
        <div class="index_items_list row">
            <div class="quantity_cars_block">
                <div class="row">
                    <div class="quantity_cars fl_l">4567</div>
                    <label>автомобилей на сайте</label>
                </div>
                <div class="row">
                    <div class="quantity_cars fl_l">167</div>
                    <label>продано на прошлой неделе</label>
                </div>
                <div class="autocode">

                </div>
            </div>
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
    <section>
        <h2>Новинки в каталоге</h2>
        <div class="index_items_list row">
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
            <a href="" class="more_cars"><img src="images/more_cars.jpg" /></a>
        </div>
    </section>
    </div>




@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
