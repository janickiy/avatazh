<section>
    <div class="main_width">
        <div class="main_marks main_models">
            <div class="row">
                <ul>
				@foreach($models as $model)
                            <li><a href="{!! url('/auto/used/' . $model->mark_slug . '/' . $model->slug) !!}">{!! $model->name !!} ({!! $model->countusedcars !!})</a><span
                                        style="display:none;"> {!! $model->countusedcars !!} </span></li>
                            
                @endforeach
				</ul> 
            </div>
        </div>
    </div>
</section>
