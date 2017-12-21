@extends('layouts.frontend.app')

@section('title', 'Автокредит' )

@section('meta_desc', '')

@section('meta_keywords', '')

@section('css')

@endsection


@section('marks')
    @include('layouts.frontend.includes.mark_list')
@endsection

@section('content')

    <h1>Заявка на автокредит</h1>
    <div class="row">
        <div class="autoredit">
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
                    <option>Коплектация</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                </select>
            </div>
            <div class="select">
                <select class="turnintodropdown">
                    <option>Первоначальный взнос (от 20%)</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                </select>
            </div>
            <div class="select">
                <input type="text" class="form_control" placeholder="ФИО">
            </div>
            <div class="select">
                <select class="turnintodropdown">
                    <option>Возраст</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                </select>
            </div>
            <div class="select">
                <select class="turnintodropdown">
                    <option>Регион по прописке</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                    <option>Вариант</option>
                </select>
            </div>
            <div class="select">
                <input type="text" class="form_control form_phone" placeholder="Телефон">
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
            <input type="submit" class="btn" value="отправить заявку" />
        </div>
        <div class="autoredit condition">
            <h2>Условия кредитования</h2>
            <ul>
                <li>Минимальный пакет документов паспорт, водительское удостоверение.</li>
                <li>Первоначальный взнос от 0%</li>
                <li>Сумма кредитования до 3,5 млн. рублей</li>
                <li>Рассмотрение 15 минут!</li>
                <li>Досрочное погашение без штрафов и комиссий!</li>
                <li>Срок кредита от 3 месяцев до 7 лет.</li>
                <li>Индивидуальный подход к каждому клиенту.</li>
            </ul>

        </div>
    </div>
    <div class="logos"><img src="images/logos.jpg" /></div>


@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection
