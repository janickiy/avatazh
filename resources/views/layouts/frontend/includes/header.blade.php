
<header>
    <div class="top row">
        <div class="main_width">
            <div class="address">{!! getSetting('FRONTEND_ADDRESS') !!}</div>
			 <div class="phone"> 
				<a href="tel:{!! getSetting('TELEPHONE_2') !!}">{!! getSetting('TELEPHONE_2') !!}</a>
				<span>Бесплатно по России</span>
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
				<a href="/" class="logo"><img src="/images/logo.png" /></a> 
                 <ul>
                    @foreach(getMenuItems('HEADER') as $item)
                        <li><a href="{{ url($item->url) }}"><b>{{ $item->title }}</b></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
	<!--mobile-->
	<div class="nav_mobile">
		<a class="nav_mobile_ico" id="show_nav"></a>
		<div class="nav_mobile_content" id="nav_mobile" >
		<div class="mobile_nav_header">
			<a class="logo"><img src="images/logo.png" /></a>
			<a class="nav_mobile_ico" id="hide_nav"></a>
		</div>
			<nav>
				<ul>
					<li><a href="">О компании</a></li>
					<li><a href="">Услуги</a></li>                              
					<li><a href="">Направления перевозок</a></li>
					<li><a href="">Цены</a></li>
					<li><a href="">Контакты</a></li>
					<li><a href="tel:+7 (343) 379-98-80">+7 (343) 379-98-80</a></li>
				</ul>
			</nav>
		</div>	
	</div>
</header>





