@extends('layouts.frontend.app')

@section('title', isset($title) ? $title : '' )

@section('meta_desc', isset($meta_desc) ? $meta_desc : '')

@section('meta_keywords', isset($meta_keywords) ? $meta_keywords : '')

@section('css')

@endsection


@section('marks')

@endsection

@section('content')
    <section>
        <h1>Автомобили с пробегом</h1>

        <div class="main_marks row">
            <table width="100%">


                <?php $i=0; ?>
                @foreach($models as $model)
                    @if($i == 0) <tr> @endif
                        <td><a href="/auto/used/{!! $model->mark !!}/{!! $model->model !!}">{!! $model->name !!}</a><span> 0 </span></td>
                        <?php $i++; ?>
                        @if($i == 6) </tr> <?php $i=0; ?> @endif
                @endforeach

            </table>
        </div>

        <ul>

            @foreach($model_list as $model)

            <li class="item">
                <div class="item_pic"><img src="images/item.jpg" /></div>
                <div class="idem_desc">
                    <a class="item_name" href="">Nissan NP300</a>
                    <p>2012 г., 56 274 км, Дизель, КППМКПП</p>
                    <div class="item_price">758 000<span class="rub">o</span></div>
                    <a class="item_btn" href="">Подробнее</a>
                </div>
            </li>

            @endforeach


                <div class="pager">
                    {{ $model_list->render() }}
                </div>

        </ul>

    </section>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection







