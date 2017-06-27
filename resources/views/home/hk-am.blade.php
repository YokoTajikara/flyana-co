<!DOCTYPE HTML>
<html lang="zh" class="zh">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="推廣期內於對象國的ANA網站購入往日本的機票，再於本網站登記的客戶，即可獲NINJA WIFI優惠編號。凡於推廣期內於NINJA WIFI網站使用優惠編號，將可免費享用日本WIFI ROUTER 3天。">
	<meta property="og:title" content="Free WiFi Router Campaign -3 days- | ANA × NINJA WiFi 推廣優惠 : GET CONNECTED with ANA">
	<meta property="og:type" content="website">
	<meta property="og:description" content="推廣期內於對象國的ANA網站購入往日本的機票，再於本網站登記的客戶，即可獲NINJA WIFI優惠編號。凡於推廣期內於NINJA WIFI網站使用優惠編號，將可免費享用日本WIFI ROUTER 3天。">
	<meta property="og:url" content="https://www.ana-campaign.com/ninjawifi/hkch/">
	<meta property="og:image" content="https://www.ana-campaign.com/ninjawifi/image/ogp3.png">
	<meta property="og:site_name" conten="ANA Free WiFi Campaign | GET Connected with ANA">
	<title>Free WiFi Router Campaign -3 days- | ANA × NINJA WiFi 推廣優惠 : GET CONNECTED with ANA</title>
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="css/index.css">
@if ($isClosed)
	<link rel="stylesheet" href="css/index-closed.css">
@endif
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!--google analytics
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-73016360-1', 'auto');
      ga('send', 'pageview');

    </script>
    google analytics-->
	@include('entry.tag-inside-head')
</head>

<body>
@include('entry.tag-body-after')
<div id="wrapper">
	<!--GLOBAL HEADER BOX-->
	<div class="header_all">
		<div class="global-header-box clearfix">
			<div class="header_logo"><a href="/ninjawifi/hkch"><img src="../image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<div class="header_links">
				<div class="header-links-nav clearfix">
					<ul class="btn_lang">
						<li class="language_e"><a href="/ninjawifi/">日本語</a></li>
						<li class="language_c"><a href="/ninjawifi/english">English</a></li>
					</ul>
					@include('entry.sns')
				</div>
			</div>
		</div>
	</div>
	<!--GLOBAL HEADER BOX-->


	<!--CONTENTS-->
	<div id="contents_wrapper">
@if (!$isClosed)
		<!-- nav for PC-->
		<div class="nav">
			<a href="/ninjawifi/form?Reservation_number={{ $REC_LOC }}&language={{ $language }}&origin={{ $origin }}"><p><img
						src="image/index/nav_entry.png" alt="お申込み"></p></a>
		</div>
@endif


		<div class="summary_wrapper">
			<div class="contents">
				<p class="summary_image"><img src="image/index/summary_img.png" alt="Ninjya WiFi"></p>
				<h1 class="ttl01">推廣優惠</h1>
				<dl class="summary">
					<dt><img src="image/index/campaign_img01_sp.png" alt="優惠對象" class="switch"></dt>
					<dd>推廣期內於ANA指定網站購買ANA營運航班機票的顧客。</dd>
				</dl>
				<dl class="summary">
					<dt><img src="image/index/campaign_img02_sp.png" alt="推廣期間" class="switch"></dt>
					<dd class="period"><span class="pc_br">2016年4月27日(三)10:00am～2016年8月1日（一）12:59pm※</span>
						<span class="pc_br"><span class="note">（香港時間）</span></span></dd>
				</dl>
			</div>
		</div>


		<div class="campaign_wrapper">
			<div class="contents">
				<h2 class="ttl02"><span class="sp_br"><img src="image/index/campaign_ttl_sp.png" alt="ANA×Ninjya WiFi"
														   class="switch"></span><span class="sp_br ttl"> 推廣優惠</span>
				</h2>

				<div class="campaign_title">
					<div class="campaign_title_img"><img src="image/index/summary_img.png" alt="NINJA WiFi"></div>
					<div class="campaign_title_txt">
						<h3><img src="image/index/campaign_ttl01_sp.png" alt="[只限於網站預約前往日本機票的客?]3天免費WiFi合約"
								 class="switch"></h3>
						<h4 class="ttl03"><span class="sp_br">可體驗業界No.1的服務質素</span>
							<span class="note">*請參考以下活動規定詳細。</span></h4>
						<ul>
							<li>3天 NINJA WiFi 相等免費享用2,700日圓服務</li>
							<li>加上3天安心補償 相等免費享用900日圓服務</li>
						</ul>
					</div>
				</div>


				<div class="campaign_entry">
					<h3 class="ttl01"><span class="campaign_icon"><img src="image/index/icon_enter.png"
																	   alt="簡單登記"></span><span class="sp_br">參加辦法</span>
					</h3>
					<ul class="entry_list">
						<li class="entry01">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img01_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no1.png" alt="1"></p>
									<p>在指定的ANA網站購買機票*。</p>
									<p class="note">※請參考以下活動規定詳細。<br><a href="http://www.anaskyweb.com/?cid=SBN1604NINJAWIFI3daysHK0439kc" target="_blank">ANA網站</a></p>
								</div>
							</div>
						</li>
						<li class="entry02">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img02_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no2.png" alt="2"></p>
									<p>登入活動網站(本網站)</p>
								</div>
							</div>
						</li>
						<li class="entry03">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img03_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no3.png" alt="3"></p>
									<p>輸入預約編號及所需資料</p>
									<p class="note"><a href="image/index/confirm.png" data-lightbox="confirm">※甚麼是預約編號</a></p>
								</div>
							</div>
						</li>
						<li class="entry04">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img04_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no4.png" alt="4"></p>
									<p>取得優惠編號</p>
									<p class="note">必須於2017年3月31日或以前，以本推廣所得之有效優惠編號在日本領取WIFI ROUTER。</p>
								</div>
						</li>
						<li class="entry05">
							<div class="entry_contents05">
								<div class="entry_img"><img src="image/index/entry_img05_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no5.png" alt="5"></p>
									<p>在NINJA WiFi的版面登記</p>
									<p class="note">※請確認優惠編號有否顯示於輸入欄中。如沒有顯示，煩請自行輸入。</p>
								</div>
						</li>
					</ul>
				</div>

				<!-- あなたの予約番号 -->
				@if (!empty($REC_LOC))
					<div class="campaign_code">
						<p><span class="sp_br">如預約編號已顯示，</span><span class="sp_br">則毋須另外輸入預約編號</span></p>
						<div class="code">
							<p>閣下的預約編號：{{ $REC_LOC }}</p>
						</div>
					</div>
				@endif

				<div class="campaign_btn">
@if (!$isClosed)
					<a href="/ninjawifi/form?Reservation_number={{ $REC_LOC }}&language={{ $language }}&origin={{ $origin }}">
						<div class="btn"><p>立即參加！ <i class="fa-angle-down"></i></p></div>
					</a>
@else
					<div class="btn"><p>活動已經完滿結束。</p></div>
@endif
				</div>


				<div class="router_wrapper">
					<h2 class="ttl02"><p class="pc_br"><span class="sp_br">可於日本使用的</span><span class="sp_br">Mobile WiFi Router</span>
						</p>
						<p class="pc_br"><span class="sp_br"> NINJA WiFi</span></p></h2>

					<div class="router">
						<div class="router_img"><img src="image/index/router_img_sp.png" alt="NINJA WiFi"
													 class="switch"></div>
						<dl class="router_list">
							<dt>NINJA WiFi</dt>
							<dd><span class="pc_br">是把智能電話、平板電腦等接駁到日本的手提電話通信網，使器材能上網的租用服務。</span></dd>
							<dd><span class="pc_br">1台Mobile WiFi Router能同時接駁多部智能電話及手提電腦，因此可與朋友或家人分享使用。</span></dd>
						</dl>
					</div>
				</div>


				<div class="useful_wrapper">
					<h2 class="ttl02"><span class="sp_br">NINJA WiFi </span><span class="sp_br">最方便！</span></h2>
					<ul class="useful_list">
						<li>
							<p><img src="image/index/useful_img01.png" alt=""></p>
							<div class="useful_ttl"><h3>用量不設上限</h3></div>
							<div class="useful_txt"><p class="pc_br"><span class="sp_br">無限使用4GLTE，</span></p>
								<p class="pc_br"><span class="sp_br">可安心上網</span></p></div>
						</li>
						<li>
							<p><img src="image/index/useful_img02.png" alt=""></p>
							<div class="useful_ttl"><h3>何時何地都可使用</h3></div>
							<div class="useful_txt"><p class="pc_br">在免費WiFi不多的日本都能暢通無阻</p></div>
						</li>
						<li>
							<p><img src="image/index/useful_img03.png" alt=""></p>
							<div class="useful_ttl"><h3>使用方法簡單</h3></div>
							<div class="useful_txt">
								<p class="pc_txt">開啟WiFi Router電源，<br>輸入密碼，<br>即可使用。</p>
								<p class="sp_txt">開啟WiFi Router電源，<br>輸入密碼，即可使用。</p>
						</li>
						<li>
							<p><img src="image/index/useful_img04.png" alt=""></p>
							<div class="useful_ttl"><h3><span class="pc_br">取機還機都方便</span></h3></div>
							<div class="useful_txt"><p class="pc_br">在日本九個主要機場都能取機和還機。</p></div>
						</li>
						<li>
							<p><img src="image/index/useful_img05.png" alt=""></p>
							<div class="useful_ttl"><h3><span class="pc_br">可多人、</span><span class="pc_br">多機同時使用</span>
								</h3></div>
							<div class="useful_txt">
								<p class="pc_br">能與朋友和家人的智能電話和電腦同時分享。</p>
							</div>
						</li>
					</ul>

					<div class="useful_link">
						<p>詳情請登入<br>
							NINJA WiFi網站</p>
						<div class="btn"><a href="http://ninjawifi.com/tw/about" target="_blank">查看詳情 <i class="fa-external-link"></i></a></div>
					</div>
				</div>

			</div>
		</div><!-- /.campaign_wrapper -->


		<div class="detail_wrapper">
			<div class="contents">
				<h2 class="ttl01">優惠詳情</h2>
				<div class="detail_summary">
					<dl class="summary">
						<dt><img src="image/index/campaign_img02_sp.png" alt="推廣期間" class="switch"></dt>
						<dd class="period"><span class="pc_br">2016年4月27日(三)10:00am～2016年8月1日（一）12:59pm※</span><span
								class="pc_br"><span class="note">（香港時間）</span></span></dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img02_sp.png" alt="優惠詳情" class="switch"></dt>
						<dd class="multiline">
							- 推廣期內於ANA網站購買從香港出發往日本的機票，再於本網站登記的客戶，即可獲NINJA WIFI優惠編號。凡於推廣期內於NINJA
							WIFI網站使用優惠編號，將可免費享用日本WIFI ROUTER 3天。<br>
							- 如租用4天或以上，每日將收取 NINJA WiFi 主機 900日圓、安心補償計劃 300日圓的租借費用。<br>
							- 本計劃限每個預約號碼只能免費租用1部WIFI ROUTER。
						</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img05_sp.png" alt="對象國家" class="switch"></dt>
						<dd class="multiline">香港</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img03_sp.png" alt="優惠對象" class="switch"></dt>
						<dd class="multiline">
							<ul>
								<li>推廣期內於ANA指定網站購買ANA營運航班機票的顧客。</li>
								<li>此優惠不適用於購買其他航空或代碼共享航班機票。</li>
								<li>此優惠不適用於以里程兌換的機票。</li>
								<li>每個預約號碼只能免費租用1部WIFI ROUTER。</li>
							</ul>
						</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img04_sp.png" alt="クーポンご利用方法" class="switch"></dt>
						<dd class="multiline">成功登記後，於NINJA WIFI網站以優惠編號預約NINJA WIFI ROUTER。<br>
						必須於2017年3月31日或以前，以本推廣所得之有效優惠編號在日本領取WIFI ROUTER。</dd>
					</dl>
				</div>
			</div>
		</div>


		<div class="attention_wrapper">
			<div class="contents">
				<h2 class="ttl02">注意事項</h2>
				<div class="attention_txt">ANA機票×NINJA WiFi活動優惠券規章<br>

					- 本推廣活動只適用於前往日本的行程(日本專用WIFI路由器)。<br>
					- WIFI路由器免費租用服務適用於每個預約編號中的旅客本人，該旅客可免費租用一個WIFI路由器一次。<br>
					- 即使一個預約中有多位旅客，一個預約編號只可免費租用一個WIFI路由器一次。<br>
					- WIFI路由器免費租用服務只包含WIFI路由器的租用費及安心補償計劃費用。<br>
					- 如申請租用WIFI路由器日數超出本推廣活動的免費租用日數，顧客須承擔所有超出日數的租用費、安心補償計劃費用及相關附加項目等的費用。<br>
					- NINJA Wifi網站(http://ninjawifi.com/)所載費用適用於計算超出日數費用。<br>
					- WIFI路由器數量有限。在本推廣活動期間，因應WIFI路由器存貨數量，WIFI路由器免費租用申請可能不獲受理。敬請見諒。<br>
					- WIFI路由器只限在NINJA Wifi網站(http://ninjawifi.com/)所載日本國內地點及方法領取和交還。<br>
					- 如顧客提交申請時沒有輸入本推廣活動的優惠券編號，本公司將收取全額租用費及相關附加項目等費用。<br>
					- 本推廣活動的優惠不能與其他推廣活動的優惠一併使用。
					<br>
					第一條（目的、優惠券之發行條件）<br>
					<br>
					1 本規章係針對從「ANA官方網站」購買機票使用者（下稱「使用者」）提供其使用「NINJA Wifi」優惠碼之服務（下稱「本服務」）制定優惠碼之發行及使用等諸項條件。<br>
					<br>
					2. AdAsia Holdings PTE LTD（下稱「本公司」）係受全日空航空公司（下稱「ANA」）之委託，實施「ANA機票×NINJA WiFi活動」並提供優惠碼。<br>
					<br>
					3. 本公司僅針對購買提供優惠碼適用對象機票（下稱「適用對象機票」）之使用者，發行優惠碼。<br>
					<br>
					第二條（本規章及其他諸條件之適用範圍）<br>
					<br>
					1. 本規章適用於「ANA機票×NINJA WiFi活動」優惠碼之發行及其使用，以及本公司與使用者之所有關係。<br>
					<br>
					2. 使用者於「ANA官方網站」購買適用對象機票之際，須遵守ANA所出示之各項規章與指導方針。購買、變更、取消機票等則適用該相關規章等所定之內容。<br>
					<br>
					3. 使用者於「ANA官方網站」購買適用對象機票之際，須遵守ANA所出示之各項規章與指導方針。購買、變更、取消機票等則適用該相關規章等所定之內容。<br>
					<br>
					4.
					本規章之外，若ANA抑或VISION有出示有關優惠碼之發行、使用等之條件等存在時，則該條件亦適用於優惠碼之發行、使用。本規章與ANA抑或VISION所出示之條件相違時，則ANA抑或VISION所出示之條件優先適用於本規章。<br>
					<br>
					第三條（優惠券之發行）<br>
					<br>
					1. 本公司針對購買適用對象機票之使用者提供申請優惠碼之網址。使用者申請提供優惠券服務時，須於申請用網址之表格內填寫機票預約號碼、住址、姓名等必須事項，按下傳送鍵便可完成申請。<br>
					<br>
					2. 本公司於使用者申請提供前項優惠券服務完成之際，視同該使用者同意本規章之所有條款內容。<br>
					<br>
					3. 本公司於認可使用者申請提供優惠券之服務時，會將附載優惠碼之電子郵件與本公司所指定之網頁，發送至使用者申請服務時所指定之電子郵件信箱。<br>
					<br>
					4. 使用者於申請服務時，所指定的電子郵件信箱若設有過濾垃圾郵件之功能，則須變更該設定，以接收本公司所寄送之郵件。若因使用者疏於變更該設定，導致無法成功收到優惠碼，本公司概不負一切責任。<br>
					<br>
					5. 本公司之服務在提供優惠碼之際即告完成。<br>
					<br>
					第四條（優惠碼之使用及使用時之注意事項）<br>
					<br>
					1. 使用者須自負申請NINJA WiFi使用契約之責任。<br>
					<br>
					2. 使用者須於收到優惠碼後，在本公司規定期間內進入NINJA WiFi網頁申請該服務。超過該期間未使用之優惠碼則為無效。<br>
					<br>
					3. 使用者須使用優惠碼來申請NINJA WiFi服務。<br>
					<br>
					4. 使用者若未使用優惠碼來申請NINJA WiFi服務，甚或未在前項所述期間內使用優惠碼，恕本公司對該未使用之行為概不負一切責任。<br>
					<br>
					5. 使用者須謹慎保管優惠碼。<br>
					<br>
					6. 優惠碼僅供申請服務之使用者本人使用。使用者不可將優惠碼轉讓或出借給第三者。且使用者不可用第三者之名義申請優惠碼及申請NINJA WiFi使用服務。<br>
					<br>
					7. 本公司不接受使用者對已發行優惠碼之歸還、兌現等任何要求。<br>
					<br>
					8. 不論使用者遺失抑或遺忘優惠碼，本公司並無再提供該優惠碼之義務。<br>
					<br>
					第五條（優惠碼之取消）<br>
					<br>
					1. 本公司若斷定使用者有任何下列情形，則可未行事先通知並取消該使用者之優惠碼，設優惠碼為無效之權利。<br>
					　1 取消訂購適用對象機票時。<br>
					　2 前項之外，任何未達優惠券發行對象條件時。<br>
					　3 取消使用優惠碼來利用NINJA WiFi契約時。<br>
					　4 使用者若原為ANA哩程俱樂部會員，購買適用對象機票後被ANA剝奪該會員資格時。<br>
					　5 有任何違法或不正當行為時。<br>
					　6 申請內容有造假、遺漏時。<br>
					　7 違反本規章各條款時。<br>
					<br>
					2. 無論優惠券因何原因被取消，恕本公司不負賠償再發行、取消所產生之損失等責任。<br>
					<br>
					第六條（免責）<br>
					<br>
					1. 使用優惠碼以利用NINJA WiFi服務之良否的最終決定權歸VISION所有。若VISION拒絕提供優惠碼之使用，本公司亦無須對使用者負擔使用該優惠碼應得利益等一切賠償義務。<br>
					<br>
					2. 使用者於優惠券發行後，若欲變更適用對象機票的搭乘日期時間、搭乘班機等，須視ANA所定之辦法等而定。恕本公司不負上述變更所致無法使用優惠碼之一切責任。<br>
					<br>
					3. 使用者於前項變更所產生之NINJA WiFi服務使用契約之日期、管道、領取地點等之變更，須視VISION所定之辦法等而定。恕本公司不負上述變更所致無法使用優惠碼之一切責任。<br>
					<br>
					第七條（輸入之資料等處理）<br>
					<br>
					1. 使用者於申請本服務時所輸入之資料等（下稱「使用者資料」）本公司僅做為本服務之運作及提供目的來使用。<br>
					<br>
					2. 本公司不會未徵得使用者之同意，將使用者資料提供或告知第三者。但有下列情況之一者，不在此限。<br>
					　1 提供ANA或VISION優惠碼的發行及使用相關資訊時。<br>
					　2 使用者同意時。<br>
					　3 透過無法特定使用者之方法告知或提供資料時。<br>
					　4 基於法令認可，可告知或提供資料時。<br>
					　5 基於法令要求須告知或提供資料時。<br>
					　6 為了本服務的提供目的，將本服務的部分或全部委託第三者負責時。<br>
					<br>
					3. 本公司基於本網站上隱私條款，管理與使用使用者資料中所謂個人資料保護法之「個人資料」。但本公司無法保證可絕對防止個人資料洩漏、消失或竄改等情形發生。<br>
					<br>
					4. 本公司可搜集使用者個人資料及嗜好等資訊，以寄送本公司所提供各服務之介紹郵件，請使用者見諒。<br>
					<br>
					第八條（本公司的重要通知）<br>
					<br>
					1. 本公司針對使用者發送有關本服務重要通知郵件時，該通知皆合於第三條３項傳送至電子郵件信箱之電子郵件所規定或其他本公司判斷為適當之方法。<br>
					<br>
					2. 若因使用者疏於第三條4項電子郵件收件設定之變更，而致無法接收本公司所寄送之重要通知，恕本公司不負賠償使用者因其產生之損失等一切責任。<br>
					<br>
					3. 使用者若未在本公司所定期間之內，對本條重要通知提出異議，則視同使用者於通知日起同意該通知內容。<br>
					<br>
					第九條（本服務之暫時中斷、終止）<br>
					<br>
					1. 本公司系統、伺服器等之維修或本服務可因天災或其他緊急情況之發生而暫時中斷。<br>
					<br>
					2. 若因前項因素之持續，導致本公司繼續提供本服務之困難，則雖在活動期間內亦可終止本服務之提供。<br>
					<br>
					3. 若因前項因素導致本服務終止，已發行之優惠碼可有效延續使用。但VISION拒絕提供優惠碼之服務時，則不在此限。<br>
					<br>
					第十條（合意管轄、約束條款）<br>
					<br>
					1. 本規章其他有關本服務之各項規章與指導方針係以日本國法為基準來釋義。<br>
					<br>
					2. 使用者因本規章其他有關本服務之各項規章與指導方針而發生糾紛等情況時，須受東京地方裁判所第一審之審理，請見諒。<br>
					<br>
					3. 有關適用對象機票之紛爭、使用NINJA WiFi服務所產生之相關紛爭，使用者須與ANA或VISION解決，本公司除對該紛爭提供必要資訊之協助外，概不負一切責任。<br>
					<br>
					4. 本規章其他有關本服務之各項規章與指導方針的他國語言翻譯版為方便使用者所製，本公司和使用者之一切關係適用於日文版之規章內容，請見諒。<br>
					<br>
					第十一條（本規章之變更）<br>
					<br>
					1. 本公司有不另行通知使用者變更本規章之權利。<br>
					<br>
					2. 本規章若有變更，本公司可依第八條之方法寄信通知及將變更後的規章放至提供本服務的網站上刊登，以完成該變更。<br>
					<br>
					【平成28年（西元2016年）4月5日制定】
				</div>
			</div>
		</div>
		<div class="attention_btn">
@if (!$isClosed)
			<a href="/ninjawifi/form?Reservation_number={{ $REC_LOC }}&language={{ $language }}&origin={{ $origin }}">
				<div class="btn"><p>參加推廣優惠 <i class="fa-angle-right"></i></p></div>
			</a>
@else
			<div class="btn"><p>活動已經完滿結束。</p></div>
@endif
		</div>

	</div>
	<!--CONTENTS-->


	<!--FOOTER-->
	<footer>
		<div class="inquiry">
			<ul class="clearfix">
				<li><span class="inq">查詢電郵</span><span class="mailto"><a
							href="mailto:info@ana-campaign.com">info@ana-campaign.com</a></span></li>
				<li><a href="http://www.staralliance.com/" target="_blank"><img src="../image/footer_logo.png" alt="A STAR ALLIANCE MEMBER"></a></li>
			</ul>
		</div>
		<div class="copyright">Copyright &copy; ANA</div>
	</footer>
	<!--FOOTER-->


</div>


<script src="js/jquery-1.11.3.min.js"></script>
<script>
	$(function () {
		var $setElem = $('.switch'),
			pcName = '_pc',
			spName = '_sp',
			replaceWidth = 641;

		$setElem.each(function () {
			var $this = $(this);

			function imgSize() {
				var windowWidth = parseInt($(window).width());
				if (windowWidth >= replaceWidth) {
					$this.attr('src', $this.attr('src').replace(spName, pcName)).css({visibility: 'visible'});
				} else if (windowWidth < replaceWidth) {
					$this.attr('src', $this.attr('src').replace(pcName, spName)).css({visibility: 'visible'});
				}
			}

			$(window).resize(function () {
				imgSize();
			});
			imgSize();
		});
	});
</script>
<script src="js/index.js"></script>
<script src="js/lightbox-plus-jquery.min.js"></script>
<!-- Yahoo Code for your Target List
<script type="text/javascript">
/* <![CDATA[ */
var yahoo_ss_retargeting_id = 1000280463;
var yahoo_sstag_custom_params = window.yahoo_sstag_params;
var yahoo_ss_retargeting = true;
/* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//b97.yahoo.co.jp/pagead/conversion/1000280463/?guid=ON&script=0&disvt=false"/>
</div>
</noscript> -->
<!-- Yahoo
<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=FPH1u0U";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=FPH1u0U" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = 'QSVI6GTRQK';
var yahoo_retargeting_label = '';
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script> -->
@include('entry.tag-endbody-before')
</body>
</html>
