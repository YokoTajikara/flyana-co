<!--GLOBAL HEADER BOX-->
<div class="header_all">
	<div class="global-header-box clearfix">
		<?php if (('jp' == $language)&& ('am' == $origin)) { ?>
		<div class="header_logo"><a href="/ninjawifi/" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
		<?php } else if (('jp' == $language)&& ('pm' == $origin)) { ?>
		<div class="header_logo"><a href="/ninjawifi/japanese-po" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
		<?php } else if (('en' == $language)&& ('am' == $origin)) { ?>
		<div class="header_logo"><a href="/ninjawifi/english" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
		<?php } else if (('en' == $language)&& ('pm' == $origin)) { ?>
		<div class="header_logo"><a href="/ninjawifi/english-po" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
		<?php } else if ('hk' == $language) { ?>
		<div class="header_logo"><a href="/ninjawifi/hkch" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
		<?php } else if ('th' == $language) { ?>
		<div class="header_logo"><a href="/ninjawifi/thai-po" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
		<?php } ?>
		<div class="header_links">
			<div class="header-links-nav clearfix">
				<ul class="btn_lang">
					<?php if (('jp' == $language)&& ('am' == $origin)) { ?>
					<li class="language_e"><a href="/ninjawifi/english">English</a></li>
					<li class="language_c"><a href="/ninjawifi/hkch">中文</a></li>
					<?php } else if (('jp' == $language)&& ('pm' == $origin)) { ?>
					<li class="language_e"><a href="/ninjawifi/english-po">English</a></li>
					<li class="language_c"><a href="/ninjawifi/thai-po">ภาษาไทย</a></li>
					<?php } else if (('en' == $language)&& ('am' == $origin)) { ?>
					<li class="language_e"><a href="/ninjawifi/japanese-po">日本語</a></li>
					<li class="language_c"><a href="/ninjawifi/thai-po">ภาษาไทย</a></li>
					<?php } else if (('en' == $language)&& ('pm' == $origin)) { ?>
					<li class="language_e"><a href="/ninjawifi/japanese-po">日本語</a></li>
					<li class="language_c"><a href="/ninjawifi/thai-po">ภาษาไทย</a></li>
					<?php } else if ('hk' == $language) { ?>
					<li class="language_e"><a href="/ninjawifi/">日本語</a></li>
					<li class="language_c"><a href="/ninjawifi/english">English</a></li>
					<?php } else if ('th' == $language) { ?>
					<li class="language_e"><a href="/ninjawifi/japanese-po">日本語</a></li>
					<li class="language_c"><a href="/ninjawifi/english-po">English</a></li>
					<?php } ?>
				</ul>
				<ul class="btn_sns">
					<li><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
					<li><div class="fb-share-button" data-layout="button_count" data-mobile_iframe="false">
					</div></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--GLOBAL HEADER BOX-->