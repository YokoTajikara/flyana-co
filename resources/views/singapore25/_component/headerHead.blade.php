<!DOCTYPE html>
<html lang="en">
<head prefix="{{ $headPrefix or "og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" }}">
	<meta charset="UTF-8">
@if (isset($canonical) && !empty($canonical))
	<link rel="canonical" href="{!! $canonical !!}">
@else
	<link rel="canonical" href="https://{!! $_SERVER["HTTP_HOST"] !!}/singapore25">
@endif
	<title>
@if (isset($title) && !empty($title))
        ANA 25th Anniversary Campaign - {{ $title }}
@else
        ANA 25th Anniversary Campaign
@endif
    </title>
	<meta name="description" content="{{ $description or "ANA 25th Anniversary 'Just By Saying Thank You Is Never Enough'. desired destination to Japan or North America from 18th Aug - 31st Oct 2016!" }}">
	<meta name="keywords" content="{{ $keywords or "ANA, 25th anniversary campaign, fly to Japan, fly to North America" }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="format-detection" content="telephone=no">

@if (false == isset($noOgp))
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="{{ $ogType or "article" }}">
	<meta property="og:site_name" content="ANA 25th Anniversary Campaign">
	<meta property="og:title" content="{{ $ogTitle or "ANA 25th Anniversary: Win a pair of ANA tickets and travel to ANY destination in Japan or North America" }}">
	<meta property="og:url" content="{{ $ogUrl or "https://" . $_SERVER["HTTP_HOST"] . "/singapore25" }}">
	<meta property="og:description" content="{{ $ogDescription or "Rejoice &amp; Celebrate ANA’s 25 Exciting Years in Singapore." }}">
	@if (isset($ogImage) && !empty($ogImage))
	<meta property="og:image" content="https://{!! $_SERVER['HTTP_HOST'] !!}{{ $ogImage }}">
	@else
	<meta property="og:image" content="https://{!! $_SERVER['HTTP_HOST'] !!}/assets/singapore25/images/ogp/ogp_noremal.jpg">
	@endif
	<meta property="fb:app_id" content="989762894412580" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@MasaoOfficial">
	<meta name="twitter:creator" content="@MasaoOfficial">
	<meta name="twitter:title" content="{{ $twitterTitle or "ANA 25th Anniversary &#39;Just By Saying Thank You Is Never Enough&#39;" }}">
	<meta name="twitter:description" content="{{ $twitterDescription or "Rejoice &amp; Celebrate ANA’s 25 Exciting Years in Singapore. Embark on our virtual tour with us to win a trip to any destination in Japan or North America" }}">
	@if (isset($twitterImage) && !empty($twitterImage))
	<meta name="twitter:image" content="https://{!! $_SERVER['HTTP_HOST'] !!}{{ $twitterImage}}">
	@else
	<meta name="twitter:image" content="https://{!! $_SERVER['HTTP_HOST'] !!}/assets/singapore25/images/ogp/ogp_noremal.jpg">
	@endif
@endif
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:400,700">
	<link rel="stylesheet" href="/assets/singapore25/css/common.css">
	<link rel="stylesheet" href="/assets/singapore25/css/font-awesome.css">
    @yield("beforeHeaderHead")
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '288668771331051');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=288668771331051&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
@include('singapore25._component.bodyAfter')
{{-- facebook SDK --}}
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1368322086529428";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
