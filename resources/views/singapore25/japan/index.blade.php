@include('singapore25._component.header', [
'title' => "Japan",
"canonical" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/japan",
"description" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\".  Win a pair of ANA tickets and travel to any desired destination in Japan",
"keywords" => "ANA, 25th anniversary campaign, fly to Japan",
"ogUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/japan",
"fbShareUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/japan",
"ogTitle" => "ANA 25th Anniversary: Win a pair of ANA tickets and travel to ANY destination in Japan",
"ogDescription" => "Rejoice & Celebrate ANA’s 25 Exciting Years in Singapore.",
"ogImage" => "/assets/singapore25/images/ogp/ogp_noremal.jpg",
"twitterTitle" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\"",
"twitterDescription" => "Win a pair of ANA tickets and travel to any desired destination in Japan",
"twitterImage" => "/assets/singapore25/images/ogp/ogp_noremal.jpg",
])

<main class="main">
	<article class="p-destination">
		<header class="p-destination__header--japan">
			<div class="c-grid p-destination__header-inner">
				<h1 class="p-destination__title"><img src="/assets/singapore25/images/destination/japan/ttl_destination.png" alt="We Fly Over40 Japan Destinations"></h1>
				<div class="p-destination__header-map"><img src="/assets/singapore25/images/destination/japan/img_map.png" alt=""></div>
			</div>
		</header>

		<section class="p-businessclass--japan c-slantingbox--left">
			<div class="c-slantingbox__text c-grid">
				<div class="c-slantingbox__text-inner">
					<h2 class="c-slantingbox__title">ANA Business Class Staggered Seat</h2>

						<h3 class="c-slantingbox__subtitle">Did you know?</h3>
						<ul class="c-hasiconlist">
							<li class="c-hasiconlist__item">
								<span class="c-hasiconlist__icon u-icon-seat"></span>
								<span class="c-hasiconlist__text">ANA is the first Japanese Airline with perfectly staggered seat configuration.</span>
							</li>
							<li class="c-hasiconlist__item">
								<span class="c-hasiconlist__icon u-icon-aisle"></span>
								<span class="c-hasiconlist__text">First Japanese airline to have aisle access for every seat.</span>
							</li>
							<li class="c-hasiconlist__item">
								<span class="c-hasiconlist__icon u-icon-monitor--17"></span>
								<span class="c-hasiconlist__text">17-inch Largest Touch Panel LCD Wide Screen Monitor, with Full Flat Seats for maximum comfort.</span>
							</li>
							<li class="c-hasiconlist__item">
								<span class="c-hasiconlist__icon u-icon-entertainment"></span>
								<span class="c-hasiconlist__text">Enjoy a wide selection of entertainment on a large 17-inch LCD touch-panel screen.</span>
							</li>
						</ul>
				</div><!-- /.c-slantingbox__text-inner -->
			</div><!-- /.c-slantingbox__text -->
		</section>
		<section class="p-diningbar--japan c-slantingbox--right">
			<div class="c-slantingbox__text c-grid">
				<div class="c-slantingbox__text-inner">
					<h2 class="c-slantingbox__title">ANA Fine Dining &amp; Bar</h2>

					<ul class="c-hasiconlist">
						<li class="c-hasiconlist__item">
							<span class="c-hasiconlist__icon u-icon-chefhat"></span>
							<span class="c-hasiconlist__text">Enjoy the finest cuisine, only with ANA that goes beyond the realm of in-flight dining created by THE CONNOISSERUS.</span>
						</li>
						<li class="c-hasiconlist__item">
							<span class="c-hasiconlist__icon u-icon-wine"></span>
							<span class="c-hasiconlist__text">Dine and Drink to your heart’s content in the sky and pamper yourself with a Japanese or International Course menu.</span>
						</li>
						<li class="c-hasiconlist__item">
							<span class="c-hasiconlist__icon u-icon-cuisine"></span>
							<span class="c-hasiconlist__text">Originality and Seasonal delicacies which bring happiness to your palates.</span>
						</li>
						<li class="c-hasiconlist__item">
							<span class="c-hasiconlist__icon u-icon-dining"></span>
							<span class="c-hasiconlist__text">Making dining a more enjoyable experience!</span>
						</li>
					</ul>
				</div><!-- /.c-slantingbox__text-inner -->
			</div><!-- /.c-slantingbox__text -->
		</section>

		<section class="c-destinationmap c-grid">
			<h1 class="c-destinationmap__title">Choose your preferred destination in Japan<br>
				and stand a chance to win free air tickets!</h1>
			<div class="c-pulldown">
				<h2 class="c-pulldown__title">Where is your destination?<i class="fa fa-angle-down c-pulldown__title-icon" aria-hidden="true"></i></h2>
				<ul class="c-pulldown__list">
@foreach ($destinationGroupList as $grpValue => $grpLabel)
					<li class="c-pulldown__item--haschild"><span class="c-pulldown__place">{{ $grpLabel }}</span>
						<ul class="c-pulldown__list-children">
	@foreach ($destinationList[$grpValue] as $value => $label)
							<li><span class="c-pulldown__place" data-destination="{{ $value }}">{{ $label }}</span></li>
	@endforeach
						</ul>
					</li>
@endforeach
				</ul>
			</div><!-- /.c-pulldown -->

			<div class="c-destinationmap__map--japan">
				<img src="/assets/singapore25/images/destination/japan/img_destinationmap_pc.png" alt="" class="c-destinationmap__map-pc">
				<img src="/assets/singapore25/images/destination/japan/img_destinationmap_smp.png" alt="" class="c-destinationmap__map-smp">

				<span class="c-destinationmap__dot--sapporo"></span>
				<dl class="c-destinationmap__flights--sapporo">
					<dt>SAPPORO<br>(CHITOSE)</dt>
					<dd>32 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--hakodate"></span>
				<dl class="c-destinationmap__flights--hakodate">
					<dt>HAKODATE</dt>
					<dd>5 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--akita"></span>
				<dl class="c-destinationmap__flights--akita">
					<dt>AKITA</dt>
					<dd>5 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--toyama"></span>
				<dl class="c-destinationmap__flights--toyama">
					<dt>TOYAMA</dt>
					<dd>4 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--tokyo"></span>
				<dl class="c-destinationmap__flights--tokyo">
					<dt>TOKYO</dt>
					<dd>4 Daily Flights<br>from SIN</dd>
				</dl>

				<span class="c-destinationmap__dot--osaka"></span>
				<dl class="c-destinationmap__flights--osaka">
					<dt>OSAKA</dt>
					<dd>29 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--matsuyama"></span>
				<dl class="c-destinationmap__flights--matsuyama">
					<dt>MATSUYAMA</dt>
					<dd>6 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--hiroshima"></span>
				<dl class="c-destinationmap__flights--hiroshima">
					<dt>HIROSHIMA</dt>
					<dd>10 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--kagoshima"></span>
				<dl class="c-destinationmap__flights--kagoshima">
					<dt>KAGOSHIMA</dt>
					<dd>11 Daily Flights<br>from TYO</dd>
				</dl>

				<span class="c-destinationmap__dot--okinawa"></span>
				<dl class="c-destinationmap__flights--okinawa">
					<dt>OKINAWA<br>(NAHA)</dt>
					<dd>14 Daily Flights<br>from TYO</dd>
				</dl>

				<div class="c-changecountry">
					<p class="c-changecountry__text">or change to North America</p>
					<div class="c-slatinglink"><a href="/singapore25/na">
						<img src="/assets/singapore25/images/destination/japan/img_na.jpg" alt="North America" class="u-noopacity">
						<span class="c-slatinglink__text">North<br>America</span>
					</a></div>
				</div><!-- /.c-changecountry -->
			</div><!-- /.c-destinationmap__map -->

			<div class="c-destinationpopup">
				<h3 class="c-destinationpopup__title">Is <span class="c-destinationpopup__place"></span> your dream destination?</h3>
				<ul class="c-destinationpopup__navi">
					<li><a href="javascript:void(0);" class="c-destinationpopup__naviitem--no"><span><img src="/assets/singapore25/images/destination/img_no.png" alt=""></span> No</a></li>
					<li><a href="#" class="c-destinationpopup__naviitem--yes"><span><img src="/assets/singapore25/images/destination/img_yes.png" alt=""></span> Yes</a></li>
				</ul>
			</div><!-- /.c-destinationpopup -->
			@include('singapore25._component.enterRegistrationForm')
		</section>
	</article>
</main>

@include('singapore25._component.footer')
