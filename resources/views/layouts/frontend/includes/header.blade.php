<div id="shadow"></div>
<header>
    <div class="top row">
        <div class="main_width">
            <div class="address">
			{!! getSetting('FRONTEND_CITY') !!}<br/>
			{!! getSetting('FRONTEND_ADDRESS') !!}</div>
            <div class="phone">
               &nbsp;
            </div>
            <div class="phone">
                <a href="tel:{!! getSetting('TELEPHONE_1') !!}">{!! getSetting('TELEPHONE_1') !!}</a>
                <span>{!! getSetting('FRONTEND_TIMES') !!}</span>
            </div>
            <button href="#inline" class="btn green recall_link modalbox">Обратный звонок</button>
        </div>
    </div>
    <div class="header row">
        <div class="main_width">
            <nav>
                <a href="/" class="logo"><img src="/images/logo.png"/></a>
                <ul>
                    @foreach(getMenuItems('HEADER') as $item)
                        <li><a href="{{ url($item->url) }}"><b>{{ $item->title }}</b></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="nav_mobile">
            <a class="nav_mobile_ico" id="show_nav"></a>
            <div class="nav_mobile_content" id="nav_mobile">
                <div class="mobile_nav_header">
                    <a class="logo"><img src="/images/logo.png"/></a>
                    <a class="nav_mobile_ico" id="hide_nav"></a>
                </div>
                <nav>
                    <ul>
                        @foreach(getMenuItems('HEADER') as $item)
                            <li><a href="{{ url($item->url) }}"><b>{{ $item->title }}</b></a></li>
                        @endforeach
                    </ul>
                </nav>
                <div class="mobile_info">
                    <div class="address">{!! getSetting('FRONTEND_ADDRESS') !!}</div>
                    <div class="phone">
                        <a href="tel:{!! getSetting('TELEPHONE_2') !!}">{!! getSetting('TELEPHONE_2') !!}</a>
                        <span>Бесплатно по России</span>
                    </div>
                    <div class="phone">
                        <a href="tel:{!! getSetting('TELEPHONE_1') !!}">{!! getSetting('TELEPHONE_1') !!}</a>
                        <span>{!! getSetting('FRONTEND_TIMES') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--mobile-->

</header>





