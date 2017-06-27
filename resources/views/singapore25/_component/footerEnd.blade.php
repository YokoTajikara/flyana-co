</div><!--/wrapper-->

<script src="/assets/singapore25/js/lib.js"></script>
<script src="/assets/singapore25/js/config.js"></script>

@if (isset($isClosed) && $isClosed)
<script type="text/javascript">
	$(function() {
		var $elem = $('.js-image-switch');
		var sp = '_sp.';
		var pc = '_pc.';
		var replaceWidth = 639;

			function imageSwitch() {
				var windowWidth = parseInt($(window).width());

					$elem.each(function() {
						var $this = $(this);
						if(windowWidth >= replaceWidth) {
							$this.attr('src', $this.attr('src').replace(sp, pc));

								} else {
							$this.attr('src', $this.attr('src').replace(pc, sp));
							}
						});
				}
		imageSwitch();

			var resizeTimer;
		$(window).on('resize', function() {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() {
				imageSwitch();
				}, 200);
			});
		});
	</script>
@endif
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

@yield("beforeFooterBody")
</body>
</html>

