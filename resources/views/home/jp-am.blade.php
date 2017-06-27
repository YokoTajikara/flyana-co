<!DOCTYPE HTML>
<html lang="ja" class="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="ANAウェブサイトで対象の航空券をご購入のお客様限定で、NINJA WiFiを3日間無料で使えるクーポンコードをプレゼント中です">
	<meta property="og:title" content="WiFi 3日間無料 キャンペーン | ANA × NINJA WiFi : GET CONNECTED with ANA">
	<meta property="og:type" content="website">
	<meta property="og:description" content="NINJA WiFiを3日間無料で使えるクーポンコードをプレゼント中です">
	<meta property="og:url" content="https://www.ana-campaign.com/ninjawifi/">
	<meta property="og:image" content="https://www.ana-campaign.com/ninjawifi/image/ogp3.png">
	<meta property="og:site_name" conten="ANA Free WiFi Campaign | GET Connected with ANA">
	<title>WiFi 3日間無料 キャンペーン | ANA × NINJA WiFi : GET CONNECTED with ANA</title>
	<link rel=stylesheet href="css/common.css">
	<link rel=stylesheet href="css/index.css">
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
			<div class="header_logo"><a href="/ninjawifi/" target="_new"><img
						src="image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<div class="header_links">
				<div class="header-links-nav clearfix">
					<ul class="btn_lang">
						<li class="language_e"><a href="/ninjawifi/english">English</a></li>
						<li class="language_c"><a href="/ninjawifi/hkch">中文</a></li>
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
			<a href="/ninjawifi/form?Reservation_number={{ $REC_LOC }}&language={{ $language }}&origin={{ $origin }}"><p><img src="image/index/nav_entry.png" alt="お申込み"></p></a>
		</div>
@endif
		<div class="summary_wrapper">
			<div class="contents">
				<p class="summary_image"><img src="image/index/summary_img.png" alt="Ninjya WiFi"></p>
				<h1 class="ttl01">キャンペーン概要</h1>
				<dl class="summary">
					<dt><img src="image/index/campaign_img01_sp.png" alt="対象のお客様" class="switch"></dt>
					<dd>キャンペーン期間中に、対象のANAウェブサイトにて対象の航空券をご購入のお客様</dd>
				</dl>
				<dl class="summary">
					<dt><img src="image/index/campaign_img02_sp.png" alt="キャンペーン期間" class="switch"></dt>
					<dd class="period"><span class="sp_br">2016年4月27日<span class="note">(水)</span> 10:00am ～ <span>
								<span class="sp_br">2016年8月1日<span class="note">(月)</span> 12:59pm<span class="note">※ (香港時間)</span></span>
					</dd>
				</dl>
			</div>
		</div>


		<div class="campaign_wrapper">
			<div class="contents">
				<h2 class="ttl02"><span class="sp_br"><img src="image/index/campaign_ttl_sp.png" alt="ANA×Ninjya WiFi"
														   class="switch"></span><span class="sp_br ttl"> キャンペーン</span>
				</h2>

				<div class="campaign_title">
					<div class="campaign_title_img"><img src="image/index/summary_img.png" alt="NINJA WiFi"></div>
					<div class="campaign_title_txt">
						<h3><img src="image/index/campaign_ttl01_sp.png" alt="[ANA日本行き航空券WEB予約のお客様 限定]WiFiご契約で3日間無料！"
								 class="switch"></h3>
						<h4 class="ttl03"><span class="sp_br">業界No.1 のクオリティを</span><span
								class="sp_br">お得に体験できるチャンス！</span>
							<span class="note">※下記の「キャンペーン詳細」をご確認ください</span></h4>
						<ul>
							<li>NINJA WiFi 3日間 2,700円相当が無料</li>
							<li>さらに安心補償プラン 3日間 900円相当も無料</li>
						</ul>
					</div>
				</div>


				<div class="campaign_entry">
					<h3 class="ttl01"><span class="campaign_icon"><img src="image/index/icon_enter.png"
																	   alt="簡単登録"></span><span
							class="sp_br">キャンペーン</span><span class="sp_br">参加方法</span></h3>
					<ul class="entry_list">
						<li class="entry01">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img01_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no1.png" alt="1"></p>
									<p>対象のANAウェブサイトにて、航空券をご購入</p>
									<p class="note">※キャンペーン期間内に、対象の航空券をご予約を行なっていただく必要があります。<a href="http://www.anaskyweb.com/?cid=SBN1604NINJAWIFI3daysJP0437kc" target="_blank">ANAウェブサイトはこちら</a></p>
								</div>
							</div>
						</li>
						<li class="entry02">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img02_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no2.png" alt="2"></p>
									<p>キャンペーンサイト（本サイト）を訪問</p>
								</div>
							</div>
						</li>
						<li class="entry03">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img03_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no3.png" alt="3"></p>
									<p>予約番号と必要情報を入力</p>
									<p class="note"><a href="image/index/confirm_pc.png" data-lightbox="confirm">※予約番号のご確認方法</a><br>
										※ANAの予約番号は、半角英数6桁の組み合わせです。
									</p>
								</div>
							</div>
						</li>
						<li class="entry04">
							<div class="entry_contents">
								<div class="entry_img"><img src="image/index/entry_img04_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no4.png" alt="4"></p>
									<p>クーポンコード取得</p>
									<p class="note">キャンペーン期間内に取得したクーポンコードは、2017年3月31日までにWiFiルーターを日本にて受け取るご予約にご利用いただけます。</p>
								</div>
						</li>
						<li class="entry05">
							<div class="entry_contents05">
								<div class="entry_img"><img src="image/index/entry_img05_sp.png" alt="" class="switch">
								</div>
								<div class="entry_txt">
									<p><img src="image/index/icon_no5.png" alt="5"></p>
									<p>NINJA WiFiの<br>お申込み画面でお申込み</p>
									<p class="note">※クーポンコード入力欄にクーポンコードが表示されていることをご確認ください。<br>
										表示されていない場合は、お手数ですがご入力ください。</p>
								</div>
						</li>
					</ul>
				</div>

				<!-- あなたの予約番号 -->
				@if (!empty($REC_LOC))
					<div class="campaign_code">
						<p><span class="sp_br">以下に、予約番号が表示されている方は、</span><span class="sp_br">予約番号を入力いただく必要は</span><span
								class="sp_br">ございません。</span></p>
						<div class="code">
							<p>あなたの予約番号：{{ $REC_LOC }}</p>
						</div>
					</div>
				@endif

				<div class="campaign_btn">
@if (!$isClosed)
					<a href="/ninjawifi/form?Reservation_number={{ $REC_LOC }}&language={{ $language }}&origin={{ $origin }}">
						<div class="btn"><p>今すぐ参加！ <i class="fa-angle-down"></i></p></div>
					</a>
@else
					<div class="btn"><p>キャンペーンは終了いたしました</p></div>
@endif
				</div>


				<div class="router_wrapper">
					<h2 class="ttl02"><p class="pc_br"><span class="sp_br">日本で使える</span><span class="sp_br">Mobile WiFi ルーター</span>
						</p>
						<p class="pc_br"><span class="sp_br"> NINJA WiFi</span></p></h2>

					<div class="router">
						<div class="router_img"><img src="image/index/router_img_sp.png" alt="WiFiルーターとは？"
													 class="switch"></div>
						<dl class="router_list">
							<dt>NINJA WiFi とは</dt>
							<dd><span class="pc_br">スマホや、タブレットなどを日本の携帯電話通信網につなぎ</span><span class="pc_br">インターネットを利用できる機器のレンタルサービスです。</span>
							</dd>
							<dd><span class="pc_br">また、１台の Mobile WiFi ルーターで同時に複数のスマホや</span><span class="pc_br">パソコンなどを利用できるので友人や家族で共有することも</span><span
									class="pc_br">可能です。</span></dd>
						</dl>
					</div>
				</div>


				<div class="useful_wrapper">
					<h2 class="ttl02"><span class="sp_br">NINJA WiFiの</span><span class="sp_br">ココが便利！</span></h2>
					<ul class="useful_list">
						<li>
							<p><img src="image/index/useful_img01.png" alt=""></p>
							<div class="useful_ttl"><h3>データ容量無制限</h3></div>
							<div class="useful_txt"><p class="pc_br"><span class="sp_br">高速 4GLTE が</span></p>
								<p class="pc_br"><span class="sp_br">無制限で使えるから安心。</span></p></div>
						</li>
						<li>
							<p><img src="image/index/useful_img02.png" alt=""></p>
							<div class="useful_ttl"><h3>どこでも使える</h3></div>
							<div class="useful_txt"><p class="pc_br"><span class="sp_br">フリー WiFi スポットが</span></p>
								<p class="pc_br"><span class="sp_br">少ない日本でも困りません。</span></p></div>
						</li>
						<li>
							<p><img src="image/index/useful_img03.png" alt=""></p>
							<div class="useful_ttl"><h3>ご利用はかんたん</h3></div>
							<div class="useful_txt">
								<p class="pc_txt">WiFi ルーターの電源を<br>入れてパスワードを<br>入力するだけ。</p>
								<p class="sp_txt">WiFi ルーターの電源を入れて<br>パスワードを入力するだけ。</p>
						</li>
						<li>
							<p><img src="image/index/useful_img04.png" alt=""></p>
							<div class="useful_ttl"><h3><span class="pc_br">受取り返却も</span><span class="pc_br">かんたん</span>
								</h3></div>
							<div class="useful_txt"><p class="pc_br"><span class="sp_br">メジャー９空港で</span></p>
								<p class="pc_br"><span class="sp_br">受取り返却ができます。</span></p></div>
						</li>
						<li>
							<p><img src="image/index/useful_img05.png" alt=""></p>
							<div class="useful_ttl"><h3><span class="pc_br">複数人、複数台で</span><span
										class="pc_br">利用可能</span></h3></div>
							<div class="useful_txt">
								<p class="pc_txt">友人や家族で<br>スマートフォンやパソコン<br>を同時に利用できます。</p>
								<p class="sp_txt">友人や家族でスマートフォン<br>やパソコンを同時に利用できます。</p>
							</div>
						</li>
					</ul>

					<div class="useful_link">
						<p>さらに詳しくお知りになりたい方はこちら<br>
							NINJA WiFi 本サイト</p>
						<div class="btn"><a href="http://ninjawifi.com/about" target="_blank">さらに詳しく <i
									class="fa-external-link"></i></a></div>
					</div>
				</div>

			</div>
		</div><!-- /.campaign_wrapper -->


		<div class="detail_wrapper">
			<div class="contents">
				<h2 class="ttl01">キャンペーン詳細</h2>
				<div class="detail_summary">
					<dl class="summary">
						<dt><img src="image/index/detail_img01_sp.png" alt="キャンペーン期間" class="switch"></dt>
						<dd class="period"><span class="sp_br">2016年4月27日<span class="note">(水)</span> 10:00am ～ <span>
									<span class="sp_br">2016年8月1日<span class="note">(月)</span> 12:59pm<span class="note">※ (香港時間)</span></span>
						</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img02_sp.png" alt="キャンペーン詳細" class="switch"></dt>
						<dd class="multiline">対象期間中、ANA香港ウェブサイトにて香港発日本行き航空券をご購入いただき、本サイトでキャンペーンにご応募いただいたお客様にNINJA WiFiクーポンコードをお渡しします。対象期間にNINJA WiFiウェブサイトにてクーポンコードを使用しお申し込みいただくと日本でのWiFiルーターレンタル料金の3日分が無料となります。
						</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img05_pc.gif" alt="対象国" class="switch" style="visibility: visible;"></dt>
						<dd class="multiline">香港</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img03_sp.png" alt="キャンペーン対象者" class="switch"></dt>
						<dd class="multiline">
							<ul>
								<li>対象期間中にANA香港ウェブサイトにて香港発日本行き航空券をご購入のお客様。</li>
								<li>ANA便をご利用の航空券をご購入いただくことが条件となります。コードシェア便のご利用はキャンペーン対象外となります。</li>
								<li>特典航空券をご利用のお客様は対象外となります。</li>
								<li>1つの予約番号につき1回のキャンペーン応募が可能です。</li>
							</ul>
						</dd>
					</dl>
					<dl class="summary">
						<dt><img src="image/index/detail_img04_sp.png" alt="クーポンご利用方法" class="switch"></dt>
						<dd class="multiline">本サイトでクーポンコードを取得してNINJA WiFiを該当ウェブサイトでお申し込みください。<br>
						キャンペーン期間内に取得したクーポンコードは、2017年3月31日までにWiFiルーターを日本にて受け取るご予約にご利用いただけます。</dd>
					</dl>
				</div>
			</div>
		</div>


		<div class="attention_wrapper">
			<div class="contents">
				<h2 class="ttl02">注意事項</h2>

				<div class="attention_txt">

					<p><strong>ANA航空券×NINJA WiFiキャンペーンクーポン規約</strong></p>
					<ul>
						<li>・本キャンペーンは、日本へのご渡航（日本専用WiFiルーター）のみが対象となります。</li>
						<li>・WiFiルーターの無料レンタルの対象は、ご旅行のお客様ご本人の１予約番号に対し１台、１回となります。<br>
							※１ご予約が複数人の場合でも１予約番号につき１台、１回のみの対象となります。<br>
						</li>
						<li>・無料レンタルの対象は、WiFiルーター本体のレンタル料金と安心補償プランのみとさせていただきます。</li>
						<li>・無料キャンペーンの日数を超えるお申込みの場合、超過日数分のレンタル料金、安心補償プランまたそれに関わるオプション等は全て、お客様ご自身のご負担となります。</li>
						<li>・超過日数分の料金につきましては、NINJA WiFiのサイト（http://ninjawifi.com/）に記載されております料金が適用されます。</li>
						<li>・WiFiルーターの在庫には限りがございます。キャンペーン期間中においても在庫状況により、お申込みの受付ができなかった場合の保証はいたし兼ねます。</li>
						<li>・WiFiルーターの受け取り返却は、NINJA WiFiのサイト（http://ninjawifi.com/）に記載されております日本国内の拠点、方法のみとなります。</li>
						<li>・キャンペーン対象のクーポンコードを入力されずにお客様がお申し込みになった場合、レンタル費用またそれに関わるオプション等の費用の全額を請求させていただきます。</li>
						<li>・本キャンペーンと他のキャンペーンとの併用はできません。<br>
						</li>
					</ul>
					<p>第１条（目的、クーポンの発行条件）</p>
					<ol>
						<li>1. 本規約は、「ANA公式WEBサイト」より対象となる航空券を購入した利用者（以下「ユーザー」といいます。）に対して「NINJA Wifi」の利用に関するクーポンコードを発行するサービス（以下「本サービス」といいます。）を提供するにあたり、そのクーポンコードの発行及び使用に関する諸条件を定めるものです。
						</li>
						<li>2. AdAsia Holdings PTE LTD（以下「当社」といいます。）は、「ANA航空券×NINJA WiFiキャンペーン」の実施及びクーポンコードの発行について、全日本空輸株式会社（以下「ANA」といいます。）から委託を受けています。
						</li>
						<li>3. 当社は、クーポンコード発行の対象となる航空券（以下「対象航空券」といいます。）を購入したユーザーに対してのみクーポンコードを発行します。</li>
					</ol>
					<p>第２条（本規約及びその他の諸条件の適用範囲）</p>
					<ol>
						<li>1. 本規約は、「ANA航空券×NINJA WiFiキャンペーン」におけるクーポンコードの発行及びその使用についての当社とユーザーとの間の一切の関係に適用されます。</li>
						<li>2. ユーザーは、「ANA公式WEBサイト」からの対象航空券の購入に際して、ANAが提示する各種規約、ガイドライン等を遵守しなければなりません。なお、航空券の購入、変更、キャンセル等については、当該規約等が適用となります。
						</li>
						<li>3. ユーザーは、クーポンコードを使用して「NINJA WiFi」サービスに契約申込して同サービスを利用する場合、「NINJA WiFi」サービスを運営する株式会社ビジョン（以下「ビジョン」といいます。）が提示する各種規約、ガイドライン等を遵守しなければなりません。なお、NINJA WiFiの利用申込、利用、変更、キャンセル等については、当該規約等が適用となります。
						</li>
						<li>4. 本規約のほか、クーポンコードの発行若しくは利用に関してANA若しくはビジョンが提示する条件等が存在する場合、同条件等も、クーポンコードの発行若しくは使用に適用されるものとします。なお、本規約とANA若しくはビジョンが提示する条件等に相違がある場合は、ANA若しくはビジョンが提示する条件等が本規約に優先して適用されるものとします。
						</li>
					</ol>
					<p>第３条（クーポンの発行）</p>
					<ol>
						<li>1. 当社は、対象航空券を購入したユーザーに対して、クーポンコードの申込用URLを提供します。クーポンの発行申込は、当該ユーザーが申込用URLのフォームを利用して航空券の予約番号及び住所氏名等の必要事項を入力し、送信ボタンを押下することにより完了するものとします。
						</li>
						<li>2. 当社は、ユーザーが前項のクーポンの発行申込を完了した時点をもって、当該ユーザーが本規約のすべての条項に同意したものとみなします。</li>
						<li>3. 当社は、ユーザーのクーポン発行申込を承認してクーポンコードを発行する場合、ユーザーが申込時に指定した電子メールアドレスへのクーポンコードを記載した電子メールの送信及び当社が指定するWEBページでの掲載によって、同クーポンコードを発行するものとします。
						</li>
						<li>4. ユーザーは、申込に際して指定した電子メールアドレスについて迷惑メール対策の設定をしている場合、同設定を変更し、当社からの電子メールを受信できるようにしなければなりません。同設定の変更を怠ったことによってユーザーがクーポンコードを入手できなかった場合でも、当社は、一切責任を負わないものとします。
						</li>
						<li>5. 当社による本サービスの提供は、クーポンコードの発行をもって完了するものとします。</li>
					</ol>
					<p>第４条（クーポンコードの使用及びその際の注意事項）</p>
					<ol>
						<li>1. ユーザーは、NINJA WiFiへの利用契約の申込を自己の責任においてしなければなりません。</li>
						<li>2. ユーザーは、クーポンコードの発行後、当社が定める期間内にNINJA WiFiに関するWEBサイトを訪問して、同サービスの利用申込をしなければなりません。同期間を経過した場合、未使用のクーポンコードは、無効になるものとします。
						</li>
						<li>3. ユーザーは、NINJA WiFiの利用申込の際にクーポンコードを使用して同申込をするものとします。</li>
						<li>4. ユーザーがクーポンコードを使用せずにNINJA WiFiの利用申込をした場合若しくは前項の期間内にクーポンコードを使用しなかった場合でも、当社は、同不使用について一切責任を負わないものとします。
						</li>
						<li>5. ユーザーは、クーポンコードを厳重に管理しなければなりません。</li>
						<li>6. 発行されたクーポンコードは、申込をしたユーザー本人のみ使用することができます。ユーザーは、クーポンコードを第三者に譲渡、貸与等をしてはなりません。また、ユーザーは、クーポンコードの申込及びNINJA WiFiの利用申込に際して、第三者の名義等を使用してはなりません。
						</li>
						<li>7. 当社は、ユーザーによる発行されたクーポンコードの返還、換金等の要求に一切応じないものとします。</li>
						<li>8. 当社は、ユーザーがクーポンコードを紛失した場合若しくは失念した場合でも、同クーポンコードの再発行の義務を負わないものとします。</li>
					</ol>
					<p>第５条（クーポンコードの取消）</p>
					<ol>
						<li>1.
							当社は、ユーザーが次の各号のいずれかに該当すると判断した場合、ユーザーに対して事前に通知することなく、当該ユーザーに対して発行したクーポンコードを取り消し、無効にすることができます。
							<ol>
								<li>1 対象航空券の購入をキャンセルした場合</li>
								<li>2 前号のほか、クーポンコード発行対象者としての条件を満たさないことが判明した場合</li>
								<li>3 クーポンコードを使用したNINJA WiFiの利用契約がキャンセルされた場合</li>
								<li>4 ユーザーがANAマイレージクラブ会員である場合で、当該対象航空券の購入後にANAより同会員資格をはく奪されたことが判明した場合</li>
								<li>5 違法行為または不正行為を行っていることが判明した場合</li>
								<li>6 申込内容に虚偽、記入漏れ等があった場合</li>
								<li>7 本規約の各条項に違反した場合</li>
							</ol>
						</li>
						<li>2. 当社は、取消されたクーポンについて、理由の如何を問わず、再発行、取消によって生じる損害の賠償等をしないものとします。</li>
					</ol>
					<p>第６条（免責）</p>
					<ol>
						<li>1. NINJA WiFiサービスでのクーポンコードの使用の是非に関する最終決定権は、ビジョンに帰属します。ビジョンがクーポンコードの使用を拒絶した場合でも、当社は、ユーザーに対して、同クーポンコードの使用によって得られるべき利益等の賠償義務を一切負わないものとします。
						</li>
						<li>2. ユーザーは、クーポンコードの発行後において対象航空券の搭乗日時、搭乗便等を変更する場合、ANAの定める手段等によって同変更等をするものとします。なお、当社は、同変更等によってクーポンコードを使用できなくなった場合でも、一切の責任を負わないものとします。
						</li>
						<li>3. ユーザーは、前項の変更に伴い、NINJA WiFiのサービス利用契約の日時、ルーター等の受取場所等を変更する場合、ビジョンが定める手段によって同変更等をするものとします。なお、当社は、同変更等によってクーポンコードを使用できなくなった場合でも、一切の責任を負わないものとします。
						</li>
					</ol>
					<p>第７条（入力された情報等の取り扱い）</p>
					<ol>
						<li>1. 当社は、ユーザーが本サービスの申込に際して入力した情報等（以下「ユーザー情報」といいます。）を本サービスの運営及び提供の目的でのみ利用します。</li>
						<li>2. 当社は、ユーザー情報をユーザーの事前の承諾なく第三者に対して提供若しくは開示しません。ただし、以下に定める場合は、この限りではありません。
							<ol>
								<li>1 クーポンコードの発行及び使用に関してANA若しくはビジョンに提供する場合</li>
								<li>2 ユーザーが許諾した場合</li>
								<li>3 ユーザーを特定できない方法にて開示・提供する場合</li>
								<li>4 法令にて開示又は提供が認められる場合</li>
								<li>5 法令に基づき開示又は提供を求められた場合</li>
								<li>6 本サービスの提供の目的のため本サービスの一部又は全部を第三者に委託する場合</li>
							</ol>
						</li>
						<li>3.
							当社は、ユーザー情報のうち、個人情報保護法の「個人情報」に該当する情報について、本サイト上のプライバシーポリシーに基づき管理及び使用するものとします。　ただし、当社は、個人情報の漏洩・消失又は改ざん等が完全に防止されることについての保証を一切行わないものとします。
						</li>
						<li>4. 当社は、ユーザーに対して、収集した個人情報及び嗜好情報等を利用して当社が提供する各サービスに関する案内等を送信することができ、ユーザーは、同利用に予め了承するものとします。
						</li>
					</ol>
					<p>第８条（当社からの重要な通知）</p>
					<ol>
						<li>1. 当社からユーザーに対して本サービスに係る重要な通知を送信する場合、同通知は、第３条３項に定める電子メールアドレスへの電子メールの送信若しくはその他当社が適当であると判断する手段によって行われるものとします。
						</li>
						<li>2. ユーザーが第３条４項の電子メールの受信設定の変更を怠ったことに起因して当社からの重要な通知を受領できなかった場合でも、当社は、それによってユーザーに生じる損害等について、一切責任を負わないものとします。
						</li>
						<li>3. 当社は、本条の重要な通知について当社が定める期間内にユーザーが異議申し立てをしない場合、通知日をもってユーザーが同通知の内容に同意したものとみなします。</li>
					</ol>
					<p>第９条（本サービスの一時的な中断、終了）</p>
					<ol>
						<li>1. 当社は、天変地異の発生、当社システム・サーバー等のメンテナンス若しくはその他の非常事態の発生等の事由により本サービスを一時的に中断できるものとします。</li>
						<li>2. 当社は、前項の事由の継続によって本サービスの継続的な提供が困難になった場合、本サービスのキャンペーン期間中であっても本サービスを終了できるものとします。</li>
						<li>3. 前項の事由により本サービスが終了した場合でも、すでに発行されたクーポンコードは、有効に存続するものとします。ただし、ビジョンがクーポンコードの使用を拒絶した場合は、この限りではありません。
						</li>
					</ol>
					<p>第１０条（合意管轄、準拠法）</p>
					<ol>
						<li>1. 本規約その他の本サービスに係る各規約及びガイドラインは、日本国法に準拠して解釈されるものとします。</li>
						<li>2. ユーザーは、本規約その他の本サービスに係る各規約及びガイドラインに関連して紛争等が発生した場合、東京地方裁判所において第一審の裁判を行うことに予め同意するものとします。</li>
						<li>3. 対象航空券に関する紛争、NINJA WiFiサービスの利用に係る紛争については、ANA若しくはビジョンが提示する規約等に基づいてユーザーとANA間若しくはユーザーとビジョン間で解決されるものとし、当社は、同紛争について、情報の提供等必要な協力以外の責任を一切負わないものとします。
						</li>
						<li>4. 本規約その他の本サービスに係る各規約及びガイドラインの他国語への翻訳版は、ユーザーの便宜を図ることのみを目的として当社が提供するものであり、ユーザーは、日本語版の規約が当社とユーザーとのすべての関係に適用されることに予め同意するものとします。
						</li>
					</ol>
					<p>第１１条（本規約の変更）</p>
					<ol>
						<li>1 .当社は、ユーザーに対して、事前に何らの通知を行うことなく、本規約を変更することができるものとします。</li>
						<li>2. 本規約を変更する場合、当社は、第８条の手段による通知の送信及び変更後の規約の本サービスを提供するサイト上への掲載をもって同変更を完了できるものとします。</li>
					</ol>
					<p>【制定：平成28年4月5日】</p>
				</div>
			</div>
		</div>
		<div class="attention_btn">
@if (!$isClosed)
			<a href="/ninjawifi/form?Reservation_number={{ $REC_LOC }}&language={{ $language }}&origin={{ $origin }}">
				<div class="btn"><p>今すぐ参加！ <i class="fa-angle-right"></i></p></div>
			</a>
@else
			<div class="btn"><p>キャンペーンは終了いたしました</p></div>
@endif
		</div>

	</div>
	<!--CONTENTS-->


	<!--FOOTER-->
	<footer>
		<div class="inquiry">
			<ul class="clearfix">
				<li><span class="inq">お問合わせ先</span><span class="mailto"><a
							href="mailto:info@ana-campaign.com">info@ana-campaign.com</a></span></li>
				<li><a href="http://www.staralliance.com/" target="_blank"><img src="image/footer_logo.png"
																				alt="A STAR ALLIANCE MEMBER"></a></li>
			</ul>
		</div>
		<div class="copyright">Copyright &copy; ANA</div>
	</footer>
	<!--FOOTER-->


</div>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/lightbox-plus-jquery.min.js"></script>
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
