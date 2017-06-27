@include('singapore25._component.header', [
'title' => "Thank You",
"canonical" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/thankyou?destination={$destination}",
"description" => "Thank You for Celebrating Our 25th Anniversary with Us",
"keywords" => "ANA, 25th anniversary campaign, fly to Japan, fly to North America",
"ogTitle" => "ANA 25th Anniversary: Win a pair of ANA tickets and travel to ANY destination in North America",
"ogDescription" => "I love {$destinationLabel}, let's fly! Thank you for celebrating our 25th Anniversary, join us to WIN a trip with ANA!",
"ogImage" => "/assets/singapore25/images/ogp/fb/{$fbOgpImageName}",
"ogUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/thankyou?destination={$destination}",
"fbShareUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/thankyou?destination={$destination}",
"twitterTitle" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\" Win a trip to ANY desired destination in Japan or North America",
"twitterDescription" => "I love {$destinationLabel}, let's fly! Thank you for celebrating our 25th Anniversary, join us to WIN a trip with ANA!",
"twitterImage" => "/assets/singapore25/images/ogp/tw/{$twitterOgpImageName}",
])

<main class="main p-thankyou">
	<article class="headline c-grid--full">
		<div class="p-hb-thankyou c-grid--content-over">
			<h1 class="p-hb-thankyou__logo"><img src="/assets/singapore25/images/common/headline/logo_headline_25th.png" alt="25th ANA Anniversary"></h1>
			<dl class="p-hb-thankyou__txt">
				<dt class="p-hb-thankyou__txt-h"><img src="/assets/singapore25/images/thankyou/txt_message_01.png" alt="Thank You for Celebrating Our 25th Anniversary with Us."></dt>
				<dd class="p-hb-thankyou__txt-comment"><img src="/assets/singapore25/images/thankyou/txt_message_02.png" alt="All winners will be notified via email."></dd>
			</dl>
		</div>
		<div class="p-hb__thankyou-visual c-grid--content-over">
			<div class="p-hb__tv-skyrax"><img src="/assets/singapore25/images/thankyou/logo_skytrax.png" alt="SKY RAX"></div>
			<div class="p-hb__tv-airplane"><img src="/assets/singapore25/images/thankyou/img_airplane.png" alt=""></div>
			<ul class="p-hb__tv-share p-col-three__smt--center u-dot-none">
				<li class="p-hb__tv-share__item"><img src="/assets/singapore25/images/thankyou/txt_share.png" alt="Like and Share on"></li>
				<li class="p-hb__tv-share__item"><a href="http://www.facebook.com/share.php?u=https://{!! $_SERVER["HTTP_HOST"] !!}/singapore25/thankyou?destination={{ $destination }}" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="/assets/singapore25/images/thankyou/bt_facebook.png" alt="facebook"></a></li>
                <li class="p-hb__tv-share__item">@include('singapore25._component.twitterButton',
                    ["shareUrl" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25&text=I love {$urlEncodedDestination}, let's fly! Thank you for celebrating our 25th Anniversary, join us to WIN a trip with ANA!"])<img src="/assets/singapore25/images/thankyou/bt_twitter.png" alt="twitter"></a></li>
			</ul>
		</div>
	</article><!--/headline-->
</main>

@include('singapore25._component.footer')
