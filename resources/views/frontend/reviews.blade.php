@extends('layouts.frontend.app')

@section('title', 'Отзывы')
@section('meta_desc', '')
@section('meta_keywords','')

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

                    @foreach($reviews as $review)

                    <li>
                        <div class="row">
                            <div class="mention_pic"></div>
                            <div class="mention_text">
                                <div class="mention_title">{{ $review->author }}</div>
                                <div class="mention_date">{{ $review->published_at }}</div>
                                <p>{{ $review->message }}</p>
                            </div>
                        </div>
                    </li>

                   @endforeach

                </ul>

                <div class="pager">
                    {{ $reviews->render() }}
                </div>

            </div>
            <div class="sidebar">
                <div class="feedback_form">
                    <div class="form_title">Напишите свой отзыв</div>

                    {!! Form::open(['url' =>  '/reviews', 'method' => 'post', 'id'=>'validate']) !!}

                    {!! Form::text('author', old('author'), ['class' => 'form_control  validate[required]', 'placeholder'=>'Ваше имя']) !!}

                    {!! Form::email('email', old('email'), ['class' => 'form_control  validate[custom[email]]', 'placeholder'=>'E-mail']) !!}

                    {!! Form::textarea('message', old('message'), ['class' => 'form_control  validate[required]', 'rows'=>5, 'placeholder'=>'Ваш отзыв']) !!}

                    {!! Form::submit('отправить отзыв', ['class'=>'btn']) !!}

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection