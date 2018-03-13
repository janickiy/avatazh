<section>
    <div class="main_width">
        <div class="main_marks">
            <div class="row">
                <?php $i = 0; ?>
                @foreach($models as $model)
                    @if($i == 0)
                        <ul> @endif
                            <li><a href="{!! url('/auto/used/' . $model->mark_slug . '/' . $model->slug) !!}">{!! $model->name !!}</a><span
                                        style="display:none;"> {!! $model->countusedcars !!} </span></li>
                            <?php $i++; ?>
                            @if($i == 3) </ul>  <?php $i = 0; ?> @endif
                @endforeach
            </div>
        </div>
    </div>
</section>