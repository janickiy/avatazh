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
        <h1>Заявка на Trade-in</h1>
        <div class="row">
            <div class="tradein">
                <h2>Ваш автомобиль</h2>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Марка</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Модель</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Год выпуска</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Пробег (тыс. км)</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>КПП</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <div class="file-upload">
                        <label>
                            <input id="uploaded-file1" type="file" name="file" onchange="getFileParam();" />
                            <span>Выберите файл</span><br />
                        </label>
                    </div>
                    <div id="preview1">&nbsp;</div>
                    <div id="file-name1" class="disp_n">&nbsp;</div>
                    <div id="file-size1" class="disp_n">&nbsp;</div>
                </div>
            </div>
            <div class="tradein newcar">
                <h2>Новый автомобиль</h2>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Марка</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Модель</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
                <div class="select">
                    <select class="turnintodropdown">
                        <option>Год выпуска</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                        <option>Вариант</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tradein">
                <div class="select">
                    <input type="text" class="form_control" placeholder="ФИО">
                </div>
                <div class="checkboxes">
                    <div class="row">
                        <input class="checkbox" type="checkbox" id="1">
                        <label for="1">Я понимаю, что автосалон находится в Москве</label>
                    </div>
                    <div class="row">
                        <input class="checkbox" type="checkbox" id="2">
                        <label for="2">Я даю согласие на обработку моих персональных данных</label>
                    </div>
                </div>
            </div>
            <div class="tradein">
                <div class="select">
                    <input type="text" class="form_control form_phone" placeholder="Телефон">
                </div>
                <input type="submit" class="btn" value="отправить заявку" />
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
