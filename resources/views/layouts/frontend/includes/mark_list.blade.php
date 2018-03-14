<section>
    <div class="main_width">
        <div class="main_marks">
            <div class="row">
                <?php $i = 0; ?>
                @foreach($marks as $mark)
                    @if($i == 0)
                        <ul> @endif
                            <li><a href="{!! url('/auto/used/' . $mark->slug) !!}">{!! $mark->name !!}</a><span
                                        style="display:none;"> {!! $mark->countusedcars !!} </span></li>
                            <?php $i++; ?>
                            @if($i == 3) </ul>  <?php $i = 0; ?> @endif
                @endforeach
                <a href="{!! url('/auto/used/allmarks') !!}" class="allmarks">Все марки</a>
            </div>
        </div>
    </div>
</section>
