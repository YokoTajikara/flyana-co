<!DOCTYPE HTML>
<html lang="en" class="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="">
	<title>System error | ANA</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel=stylesheet href="/ninjawifi/css/common.css">
	<link rel=stylesheet href="/ninjawifi/css/index.css">
	<link rel="stylesheet" href="/ninjawifi/css/lightbox.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	@include('entry.tag-inside-head')
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1368322086529428";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="wrapper">
	<!--GLOBAL HEADER BOX-->
	<div class="header_all">
		<div class="global-header-box clearfix">
			<div class="header_logo"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"</div>
			</div>
	</div>
</div>
	<!--GLOBAL HEADER BOX-->


	<!--CONTENTS-->
	<div id="contents_wrapper">
		<!-- nav for PC-->
		<div class="nav"></div>
		<div class="detail_wrapper">
			<div class="contents">
				<h2 class="ttl01">System error</h2>
				<div class="detail_summary">
					<dl class="summary">
						@if (isset($errorCode))
						<dt></dt>
						<dd class="multiline">
							Please contact us with the displayed error code<br>
							error code: {{ $errorCode }}<br>
							<span class="mailto"><a href="mailto:info@flyana.co">info@flyana.co</a></span>
						</dd>
						@else
						<dt></dt>
						<dd class="multiline">
							Please contact us<br>
							<span class="mailto"><a href="mailto:info@flyana.co">info@flyana.co</a></span>
						</dd>
						@endif
					</dl>
				</div>
			</div>
		</div>
	<!--CONTENTS-->


	<!--FOOTER-->
	<footer>
		<div class="inquiry">
			<ul class="clearfix">
				<li><span class="inq">CONTACT</span><span class="mailto"><a
							href="mailto:info@flyana.co">info@flyana.co</a></span></li>
				<li><a href="http://www.staralliance.com/" target="_blank"><img src="/ninjawifi/image/footer_logo.png"
																				alt="A STAR ALLIANCE MEMBER"></a></li>
			</ul>
		</div>
		<div class="copyright">Copyright &copy; ANA</div>
	</footer>
	<!--FOOTER-->


</div>
<script src="/ninjawifi/js/jquery-1.11.3.min.js"></script>
<script src="/ninjawifi/js/lightbox-plus-jquery.min.js"></script>
<script src="/ninjawifi/js/index.js"></script>
<!--▼SiteCatalyst----------------------------------------------------------------------->
<!-- SiteCatalyst code version: H.2.
Copyright 1997-2005 Omniture, Inc. More info available at http://www.omniture.com -->
<script language="JavaScript"><!--
	SiteCatalystReportSuites = "GLOBAL_OTHER";
	SiteCatalystCharSet   = "UTF-8";
	SiteCatalystChannel   = "ANA-CAMPAIGN";
	//--></script>
<script language="JavaScript"><!--
	strSCodePath="//www.ana.co.jp/common/js/sitecatalyst/s_code_" + SiteCatalystReportSuites + ".js";
	strSCodeToPaste="//www.ana.co.jp/wws/js/code_to_paste_wws.js";
	document.write("<script type='text/javascript' src='" + strSCodePath +"'></scri"+"pt>");
	document.write("<script type='text/javascript' src='" + strSCodeToPaste +"'></scri"+"pt>");
	// --></script>
<!-- End SiteCatalyst code version: H.2. -->
<!--▲SiteCatalyst----------------------------------------------------------------------->
<script language="JavaScript"><!--
	function SCClick(LinkName){
		var s=s_gi(s_account);
		s.linkTrackVars='prop7,eVar7,prop13,prop14';
		s.prop7		= LinkName;
		s.eVar7		= LinkName;
		s.prop13	= SiteCatalystCookie0;
		s.prop14	= SiteCatalystDateTimeSec;
		s.tl(this,'o',LinkName);
	}
	//--></script>

</body>
</html>
