@extends('layouts.frontend.app')

@section('title', isset($title) ? $title : '' )

@section('meta_desc', isset($meta_desc) ? $meta_desc : '')

@section('meta_keywords', isset($meta_keywords) ? $meta_keywords : '')

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
    <section>
        <h1>Отзывы</h1>
        <div class="row mentions">
            <div class="mentions_list">
                <ul>
                    <li>
                        <div class="row">
                            <div class="mention_pic"><img src="images/mention.jpg" /></div>
                            <div class="mention_text">
                                <div class="mention_title">Игорь Ку</div>
                                <div class="mention_date">04.09.2016</div>
                                <p>Хочу выразить огромную благодарность менеджеру салона Евгению, за подход к клиентам и профессионализм в его работе. 02.09.2016 года преобретал автомобиль hyundai creta. Остался очень доволен в обслуживании персонала!!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="mention_pic"><img src="images/mention.jpg" /></div>
                            <div class="mention_text">
                                <div class="mention_title">Кто-то, придумавший себе слишком слинное имя.</div>
                                <div class="mention_date">04.09.2016</div>
                                <p>Хочу выразить огромную благодарность менеджеру салона Евгению, за подход к клиентам и профессионализм в его работе. 02.09.2016 года преобретал автомобиль hyundai creta. Остался очень доволен в обслуживании персонала!!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="mention_pic"><img src="images/mention.jpg" /></div>
                            <div class="mention_text">
                                <div class="mention_title">Игорь Ку</div>
                                <div class="mention_date">04.09.2016</div>
                                <p>Хочу выразить огромную благодарность менеджеру салона Евгению, за подход к клиентам и профессионализм в его работе. 02.09.2016 года преобретал автомобиль hyundai creta. Остался очень доволен в обслуживании персонала!!</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="pager">
                    <a href="">1</a>
                    <a href="" class="active">2</a>
                    <a href="">3</a>
                    <a href="">4</a>
                </div>
            </div>
            <div class="sidebar">
                <div class="feedback_form">
                    <div class="form_title">Напишите свой отзыв</div>
                    <form>
                        <input type="text" class="form_control" placeholder="Ваше имя">
                        <input type="mail" class="form_control" placeholder="E-mail">
                        <textarea  class="form_control" placeholder="Ваш отзыв"></textarea>
                        <input type="submit" class="btn" value="отправить отзыв" />
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection

