<!--GLOBAL HEADER BOX-->
<header class="header">
	<div class="p-hd-box c-grid clearfix">
		<div class="p-hd-box__logo"><a href="/singapore25/"><img src="/assets/singapore25/images/common/header/logo_header_ana.png" alt="ANA Inspiration of JAPAN"></a></div>
@if (isset($isClosed) && !$isClosed)
		<div class="p-hd-box__links">
			<div class="p-hd-box__nav clearfix">
				﻿<ul class="p-hd-box__nav-sns">
					<li class="p-hd-box__nav-sns__item c-snsbt"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</li>
					<li class="p-hd-box__nav-sns__item c-snsbt">
						@if (isset($fbShareUrl))
						<div class="fb-share-button" data-href="{{ $fbShareUrl or "https://" . $_SERVER['HTTP_HOST'] . "/singapore25" }}" data-layout="button_count" data-mobile_iframe="false"></div>
			@else
			<div class="fb-share-button" data-href="https://{!! $_SERVER['HTTP_HOST'] !!}/singapore25" data-layout="button_count" data-mobile_iframe="false"></div>
			@endif
			</li>
			</ul>
		</div><!--/hd-box__nav-->
	</div><!--/hd-box__links-->

@endif
	</div><!--/.hd-box-->
</header>
<!--GLOBAL HEADER BOX-->

