@include('singapore25._component.header', [
'title' => "North America",
"canonical" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/na",
"description" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\".  Win a pair of ANA tickets and travel to any desired destination in North America",
"keywords" => "ANA, 25th anniversary campaign, fly to North America",
"ogUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/na",
"fbShareUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/na",
"ogTitle" => "ANA 25th Anniversary: Win a pair of ANA tickets and travel to ANY destination in North America",
"ogDescription" => "Rejoice & Celebrate ANA’s 25 Exciting Years in Singapore.",
"ogImage" => "/assets/singapore25/images/ogp/ogp_noremal.jpg",
"twitterTitle" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\"",
"twitterDescription" => "Win a pair of ANA tickets and travel to any desired destination in North America",
"twitterImage" => "/assets/singapore25/images/ogp/ogp_noremal.jpg",
])

<main class="main">
	<article class="p-destination">
		<header class="p-destination__header--na">
			<div class="c-grid p-destination__header-inner">
				<h1 class="p-destination__title"><img src="/assets/singapore25/images/destination/na/ttl_destination.png" alt="We Fly To 10 North America Destinations"></h1>
				<div class="p-destination__header-map"><img src="/assets/singapore25/images/destination/na/img_map.png" alt=""></div>
			</div>
		</header>

		<section class="p-businessclass--na c-slantingbox--left">
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
		<section class="p-diningbar--na c-slantingbox--right">
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
			<h1 class="c-destinationmap__title">Choose your preferred destination in North America<br>
				and stand a chance to win free air tickets!</h1>

			<div class="c-pulldown">
				<h2 class="c-pulldown__title">Where is your destination?<i class="fa fa-angle-down c-pulldown__title-icon" aria-hidden="true"></i></h2>
				<ul class="c-pulldown__list">
@foreach ($destinationList as $value => $label)
					<li class="c-pulldown__item"><span class="c-pulldown__place" data-destination="{{ $value}}">{{ $label }}</span></li>
@endforeach
				</ul>
			</div><!-- /.c-pulldown -->

			<div class="c-destinationmap__map--na">
				<img src="/assets/singapore25/images/destination/na/img_destinationmap_pc.png" alt="" class="c-destinationmap__map-pc">
				<img src="/assets/singapore25/images/destination/na/img_destinationmap_smp.png" alt="" class="c-destinationmap__map-smp">

				<span class="c-destinationmap__dot--honolulu"></span>
				<dl class="c-destinationmap__flights--honolulu">
					<dt>Honolulu</dt>
					<dd>3 Daily Flights</dd>
				</dl>

				<span class="c-destinationmap__dot--vancouver"></span>
				<dl class="c-destinationmap__flights--vancouver">
					<dt>Vancouver</dt>
					<dd>1 Daily Flight</dd>
				</dl>

				<span class="c-destinationmap__dot--sanjose"></span>
				<dl class="c-destinationmap__flights--sanjose">
					<dt>San Jose</dt>
					<dd>1 Daily Flight</dd>
				</dl>

				<span class="c-destinationmap__dot--los"></span>
				<dl class="c-destinationmap__flights--los">
					<dt>Los Angeles</dt>
					<dd>2 Daily Flights</dd>
				</dl>

				<span class="c-destinationmap__dot--seattle"></span>
				<dl class="c-destinationmap__flights--seattle">
					<dt>Seattle</dt>
					<dd>1 Daily Flight</dd>
				</dl>

				<span class="c-destinationmap__dot--sanfrancisco"></span>
				<dl class="c-destinationmap__flights--sanfrancisco">
					<dt>San francisco</dt>
					<dd>1 Daily Flight</dd>
				</dl>

				<span class="c-destinationmap__dot--houston"></span>
				<dl class="c-destinationmap__flights--houston">
					<dt>Houston</dt>
					<dd>1 Daily Flight</dd>
				</dl>

				<span class="c-destinationmap__dot--chicago"></span>
				<dl class="c-destinationmap__flights--chicago">
					<dt>Chicago</dt>
					<dd>2 Daily Flights</dd>
				</dl>

				<span class="c-destinationmap__dot--washington"></span>
				<dl class="c-destinationmap__flights--washington">
					<dt>Washington</dt>
					<dd>1 Daily Flight</dd>
				</dl>

				<span class="c-destinationmap__dot--newyork"></span>
				<dl class="c-destinationmap__flights--newyork">
					<dt>New York</dt>
					<dd>2 Daily Flights</dd>
				</dl>

				<div class="c-changecountry">
					<p class="c-changecountry__text">or change to Japan</p>
					<div class="c-slatinglink"><a href="/singapore25/japan">
						<img src="/assets/singapore25/images/destination/na/img_japan.jpg" alt="Japan" class="u-noopacity">
						<span class="c-slatinglink__text">Japan</span>
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
