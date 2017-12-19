<div class="main_marks row">
    <?php $i=0; ?>
    @foreach($marks as $mark)
        @if($i == 0) <ul> @endif
            <li><a href="/auto/{!! $mark->slug !!}/used">{!! $mark->name !!}</a><span> 0 </span></li>
            <?php $i++; ?>
            @if($i == 3) </ul>  <?php $i=0; ?> @endif
    @endforeach
    <a href="/auto/used" class="allmarks">Все марки</a>
</div>