<header>
    <div class="top row">
        <div class="main_width">
            <div class="address">{!! getSetting('FRONTEND_ADDRESS') !!}</div>
            <div class="times">{!! getSetting('FRONTEND_TIMES') !!}</div>
            <a href="tel:+78123132274">{!! getSetting('TELEPHONE_1') !!}</a>
            <a href="tel:+78005001463">{!! getSetting('TELEPHONE_2') !!}</a>
        </div>
    </div>
    <div class="header row">
        <div class="main_width">
            <a href="/" class="logo"><img src="{!! getSetting('SITE_LOGO') !!}" /></a>
            <nav>
                <ul>
                    @foreach(getMenuItems('HEADER') as $item)
                        <li><a href="{{ url($item->url) }}"><b>{{ $item->title }}</b></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="page main_width">
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
