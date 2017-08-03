<?php

$id=$ctr=0;
include('dbimicf.php');

if(isset($_POST['action'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "select * from sales where username='$username' and password = '$password'";
	#echo  "SELECT * FROM merchant_profile where username='$userid' and password = '$password' and status='1'";

	$res = mysql_query($query) or die ('Failed :'.mysql_error().'\n');
	$ctr = mysql_num_rows($res);

	if ($ctr > 0) {
		echo "testt";
		session_start();
		$_SESSION['id']  = $username;
		$_SESSION['starttime'] = 0;

		$sql="select dactivate,dexpired,datediff(now(), dexpired) from merchant_profile where username='$userid' and password = '$password' and status='1'";

		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($result)){
			$datenotify=$row['datediff(now(), dexpired)'];
		}		
		if($datenotify >=1){
			header('Location: validate_pay.php');
		}else{
			header('Location: dashboard.php');
		}
	}
}
else if(isset($_POST['action1'])){

	$uname 		=$_POST['uname'];
	$upwd		=$_POST['upwd'];
	$uemail 	=$_POST['uemail'];
	$uhp 		=$_POST['uhp'];
	// $ustatus 	=$_POST['ustatus'];
	$dob		=$_POST['dob'];

	$sqlverify= "select username from sales";
	$getin = mysql_query($sqlverify) or die ('Failed :'.mysql_error().'\n');
	while(mysql_fetch_array($getin)){
		if($uname == $row['username']){
			echo "<script type='text/javascript'>alert('Oops! This username has been used. ')</script>";
			header('Location:index.php');
		}

		
		else{
			$sqll = "insert into sales( username, password, contactno, email, validity) values ('$uname','$upwd','$uhp','$uemail', DATE_ADD(now(),INTERVAL 14 DAY))";
			mysql_query($sqll) or die ($statusfail);
			echo "<script type='text/javascript'>alert('Your account has been created. Please login with your username and password. Happy Selling!')</script>";
		}
	}
}
	// $sql="update merchant_number set mname='$comp', noic='$nric', status='1' where mid='$mid' ";
	// mysql_query($sql) or die ('Failed :'.mysql_error().'\n');
	// $sql="insert into email_notify(id,date,email,first_name,status)values ('',now(),'$email','$fname','0');";
	// mysql_query($sql) or die ('Failed :'.mysql_error().'\n');
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Botsphere</title>
	<!--============================ CSS ====================-->
	<link rel="stylesheet" type="text/css" href="styleindex.css">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link href="assets/css/departure-board.css" rel="stylesheet"/>
	<!--===========================  JS  ===================-->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

	<!-- ========================= CUSTOM =================-->
	<link rel="shortcut icon" href="botstate.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		html{min-height: 100%; position: relative;}
		@font-face {
			font-family: "Century Gothic", sans-serif;
		}
		body{
			font-family: "Helvetica", sans-serif;
			background-image: url('assets/img/CSBbg.jpg');
			background-size: cover;
			background-position: flex;
			background-repeat: no-repeat;
		}
		.header{
			margin-top: 1em;
		}
		.modale, .modal-body{color: #000;}
		.modal-title, b .modal-title{color: #000; text-align: center;}
		.mods{text-align: justify;}
		.yellow{color: yellow}
		h1,a,div,small,h6, .white{ color: #fff; font-family: 'Helvetica';}
		.forms {
			border-radius: 20px;
			-moz-border-radius: 20px;
			-o-border-radius: 20px;
			-webkit-border-radius: 20px;
		}
		#signup{margin-left: -0.4em} .x1{ margin-left: -1em; }
		.box1{
			float: right;
			margin-top: 26em;
			text-align: center;
		}
		.box2{
			margin-top: -25em;
			float: left;
		}
		.deco2{
			width: 30px; height: 30px;
			margin-top: -4.7em; margin-left: 11.6em;
		}
		.footlogo{margin-left: 0px;}
		.inputbox{ margin-top: 10%; }
		.inputbox2{ margin-left: 2%; }
		.inputbox3{ margin-top: 2em; margin-left: 12%; }
		.field-error .control-label,
		.field-error .help-block,
		.field-error .form-control-feedback {
			color: #ff0039;
		}

		.field-success .control-label,
		.field-success .help-block,
		.field-success .form-control-feedback {
			color: #2780e3;
		}
		.btn-yellow{
			background-color: yellow;
		}
		.white{
			color: #fff;
		}
		.forgotten{
			margin-left: -1em;
		}
		.forgotten a{
			color: white;
		}
		.extramag{
			margin-top: -1.2em;
		}
		footer{
			position: absolute;
			left: 0;
			bottom: 0;
			height: 100%;
			width: 100%;
			overflow:hidden;
			margin-top: 6em;
		}
		p small a{
			font-style: none; color: #fff; text-align: center;
		}
		.foot{text-align: right; margin-left: 3em;}
		.foot span{text-align: right;}
		.small{font-size: 1.2em;}
		/* ============================ save for mobile ==========================*/
		.logo{
			visibility: hidden; display: none;
			width: 70px; height: 70px;
			clear: both; margin-bottom: 5px;
		}
		.hid{ visibility: hidden; display: none; }


		/* ============================ big ==========================*/
		@media screen and (min-width: 1500px){
			body{ font-size: 120%; }
			.box1{
				margin-top: 45em;
				margin-right: -10em;
			}
			.box2{
				margin-top: -40em;
				margin-left: -16em;
			}
			.foot{text-align: right;}
			footer{margin-top: 10em;}
		}
		/* ============================ normal ==========================*/
		@media screen and (max-width: 1400px){
			.righten{margin-left: 8.8em;}
			.foot{text-align: right;}

		}
		/* ============================ mobile ==========================*/
		@media screen and (max-width: 780px){
			@font-face {
				font-family: "Century Gothic", sans-serif;
			}
			body,h1,a,div,p,small,h6{ color: #fff; font-family: 'Century Gothic';}
			body{
				background-image: none;
				background-color: rgba(0,0,0,0.8);
			}
			.logo{
				visibility: visible;
				display: block; margin-top: 10px;
				margin-left: 40%;
			}
			.box1{
				float: none;
				clear: both;
				margin-top: -35em;
				z-index: 100;
			}
			.box2{
				float: none;
				clear: both;
				margin-top: 2em;
			}
			header{
				clear: both;
				float: none;
				margin-top: 0px;
			}
			.hid{ visibility: visible; display: block; }
			.inputbox2{	margin-top: -10px; margin-left: 0px;}
			.inputbox3{ margin-left: 0px; }

			.unhid{
				visibility: hidden; display: none; z-index: -500;
			}
			.lname{ margin-top: 12px; }
			.h1, big, .white{ text-align: center; }
			.btn-large{width: 100%;}
			.siz{ font-size: 1.3em; text-align: center;}
			p small a{ text-align: center; }
			.small{text-align: center; font-size: 1em;}
			.righten{margin-left: 0em; text-align: center;}
			.righten a{color: #fff;}
			.foot{text-align: center !important; margin-left: 0em;}
			.foot span{ text-align: center !important; }

		}
		@media screen and (max-width: 420px){
			.foot{text-align: center !important;}
			.foot span{ text-align: center !important; }
		}
		/* ======================== end styling ============================== */
	</style>
</head>
<body>
	<div class="container hid">
		<div class="row hid">
			<div class="col-xs-12 col-md-12 hid">
				<img src="assets/img/botstate.png" class="logo hid">
				<p class="caps hid siz">
					<big>Botsphere helps you create a sales bot to take orders, complaints, and enquiries 24/7.</big>
				</p><br/>
				<div id="test" class="col-xs-12" align="center"></div>
			</div>
		</div>

	</div>
	<!-- ============================== header =========================== -->
	<header class="header">
		<!-- DUMMY BIG BOX -->
		<div class="col-xs-12 col-md-12">
			<!-- dummy BOX ONE -->
			<div class="col-xs-12 col-md-6">
			</div>
			<!-- DUMMY BOX TWO -->
			<div class="col-xs-12 col-md-6" align="right">
				<form  name="contactForm" method="POST" action="index.php">
					<div class="form-group col-md-4">
						<input type="text" name="username" placeholder="Username" class="forms form-control " />
					</div>
					<div class=" form-group col-md-4">
						<input type="password" name="password" placeholder="Password" class="forms form-control"/>
					</div>
					<div class="form-group col-md-3">
						<button type="submit" class="btn btn-default btn-yellow forms btn-block" name="action"><b>Log In</b></button>
						<!--br/><p class="hid" align="center"><small><a href="#signup">Join Us!</a></small></p-->
					</div>
				</form>
			</div>
			<!-- DUMMY BOX THREE AFTER BOX ONE -->
			<div class="col-xs-12 col-md-5">
			</div>
			<!-- DUMMY BOX FOUR ALIGN RIGHT AFTER BOX TWO -->
			<div class="col-xs-12 col-md-7 extramag" align="right">
				<div class="col-xs-12 col-md-8">
					<p class=""><b><?php echo $failed;?></b></p>
				</div>
				<div class="col-xs-12 col-md-4">
					<p class="forgotten whte" align="center"><b><a href="forgot.php">Forgotten account?</a></b></p>
				</div>
			</div>
		</div>
	</header>
	<!-- ==================================== BOX 1: SIGN UP ============================= -->
	<div class="container">
		<div class="row unhid">
			<div class="col-xs-12 col-md-5 pull-right box1 unhid">
				<p class="caps unhid">
					<!-- <big>Botsphere helps you create a sales bot to take orders, complaints, and enquiries 24/7.</big> -->
				</p>
				<div id="test2"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-5 box2 pull-left">
				<div class="col-md-12">
					<h1 class="h1" id="signup"><b>Create an account</b></h1>
					<p class="white x1">Get a 14-day FREE trial</p>
				</div>

				<form id="contactForm" class="form-horizontal" method="POST" action="index.php">
					<input type="hidden" name="afi" value="<?php echo $afi; ?>">


					<div class="form-group">
						<div class="col-md-12">
							<input type="text" placeholder="username" name="uname" class="form-control forms"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="password" name="upwd" placeholder="New password" class="form-control forms"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="number" name="uhp" placeholder="(+60) Contact no." class="form-control forms"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="uemail" name="uemail"  placeholder="Your email" class="form-control forms"/>
						</div>
					<!-- </div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="date" name="dob"  placeholder="Your date" class="form-control forms"/>
						</div> -->
					<!-- </div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" name="ustatus" placeholder="Job status (self/company employed)" class="form-control forms"/>
						</div> -->
						<div class="col-md-12">
							<p class="white"><small class="white"><h6 class="white">
								By clicking Create an account you agree to our <a href="#myModal" data-toggle="modal" class="yellow" data-target="#myModal">Terms and Conditions</a> and confirm that you have read our
								<a href="#myModal2" class="yellow" data-toggle="modal" data-target="#myModal2">Data Policy</a>. You may receive email notification from Botsphere
								and can opt out at any time.</h6>
							</small></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<button type="submit" class="btn btn-default btn-yellow btn-large col-md-12 forms" name="action1"><big><b>Create an account</b></big></button>
						</div>
					</div>
				</form>
				<!-- Modal popup for T&C -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content -->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">TERM OF SERVICE OF BOTSPHERE</h4>
							</div>
							<div class="modal-body mods">
								<span class="modal-title" align="center">OVERVIEW</span><br/>

								This website is operated by Botpshere. Throughout the site, the terms “we”, “us” and “our” refer to Botsphere. Botsphere offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.
								<br/>
								By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply  to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.
								<br/>
								Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.
								<br/>
								Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.<hr/>

								<b class="modal-title">SECTION 1 - ONLINE STORE TERMS</b><br/>
								By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.
								You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).
								You must not transmit any worms or viruses or any code of a destructive nature.
								A breach or violation of any of the Terms will result in an immediate termination of your Services.<hr/>

								<b class="modal-title">SECTION 2 - GENERAL CONDITIONS</b><br/>
								We reserve the right to refuse service to anyone for any reason at any time.
								You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.

								You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.
								The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.<hr/>

								<b class="modal-title">SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</b><br/>
								We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.
								This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.<hr/>

								<b class="modal-title">SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</b><br/>
								Prices for our products are subject to change without notice.
								We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.
								We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.<hr/>

								<b class="modal-title">SECTION 5 - PRODUCTS OR SERVICES (if applicable)</b><br/>
								Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy. We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor's display of any color will be accurate. We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited. We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.<hr/>

								<b class="modal-title">SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</b><br/>
								We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors. You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as neede<hr/>

								<b class="modal-title">SECTION 7 - OPTIONAL TOOLS</b><br/>
								We may provide you with access to third-party tools over which we neither monitor nor have any control nor input. You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools. Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s). We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.<hr/>

								<b class="modal-title">SECTION 8 - THIRD-PARTY LINKS</b><br/>
								Certain content, products and services available via our Service may include materials from third-parties. Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties. We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party's policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.<hr/>

								<b class="modal-title">SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</b><br/>
								If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, 'comments'), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments. We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service. You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.<br/>

								<b class="modal-title">SECTION 10 - PERSONAL INFORMATION</b><br/>
								Your submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy.<hr/>

								<b>SECTION 11 - ERRORS, INACCURACIES AND OMISSIONS</b><br/>
								Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order). We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.<hr/>

								<b class="modal-title">SECTION 12 - PROHIBITED USES</b><br/>
								In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.<hr/>


								<b class="modal-title">SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</b><br/>
								We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free. We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable. You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you. You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided 'as is' and 'as available' for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement. In no case shall botsphere, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.<hr/>

								<b class="modal-title">SECTION 14 - INDEMNIFICATION</b><br/>
								You agree to indemnify, defend and hold harmless botsphere and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.<hr/>

								<b class="modal-title">SECTION 15 - SEVERABILITY</b><br/>
								In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.<hr/>

								<b class="modal-title">SECTION 16 - TERMINATION</b><br/>
								The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.
								These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site. If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).<hr/>

								<b class="modal-title">SECTION 17 - ENTIRE AGREEMENT</b><br/>
								The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision. These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service). Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.<hr/>

								<b class="modal-title">SECTION 18 - GOVERNING LAW</b><br/>
								These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of no 11 jalan bk5A/3A kinrara straits one, bandar kinrara, 10, 47180, Malaysia.<hr/>


								<b class="modal-title">SECTION 19 - CHANGES TO TERMS OF SERVICEb></b><br/>
								You can review the most current version of the Terms of Service at any time at this page.
								We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.<hr/>


								<b class="modal-title">SECTION 20 – SUBSCRIPTION </b><br/>
								After of 2 months free trial, merchant will be charged with a subscription fee of RM1 per day<br/>



								<b class="modal-title">SECTION 21 - CONTACT INFORMATION</b><hr/>
								Questions about the Terms of Service should be sent to us at info@botsphere.biz<br/>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal popup for data policy -->
				<div class="modal fade" id="myModal2" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content -->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Data Policy</h4>
							</div>
							<div class="modal-body">

								<h3>What kinds of information do we collect?</h3><br/>
								Depending on which Services you use, we collect different kinds of information from or about you.
								Things you do and information you provide.
								We collect the content and other information you provide when you use our Services, including when you sign up for an account, create or share, and message or communicate with others. This can include information in or about the content you provide, such as the location of a photo or the date a file was created. We also collect information about how you use our Services, such as the types of content you view or engage with or the frequency and duration of your activities.
								Information about payments.
								If you use our Services after the 14-day free trial, we collect information about the purchase or transaction. This includes your payment information, such as your credit or debit card number and other card information, and other account and authentication information, as well as billing, shipping and contact details.<hr/>

								<h3>How do we use this information?</h3><br/>
								We are passionate about creating engaging and customized experiences for people. We use all of the information we have to help us provide and support our Services. Here’s how:
								Provide, improve and develop Services.
								We are able to deliver our Services, personalize content, and make suggestions for you by using this information to understand how you use and interact with our Services and the people or things you’re connected to and interested in on and off our Services.
								Communicate with you.
								We use your information to send you marketing communications, communicate with you about our Services and let you know about our policies and terms. We also use your information to respond to you when you contact us.<hr/>



								<h3>How do we respond to legal requests or prevent harm?</h3><br/>
								We may access, preserve and share your information in response to a legal request (like a search warrant, court order or subpoena) if we have a good faith belief that the law requires us to do so. This may include responding to legal requests from jurisdictions outside of the Malaysia where we have a good faith belief that the response is required by law in that jurisdiction, affects users in that jurisdiction, and is consistent with internationally recognized standards. We may also access, preserve and share information when we have a good faith belief it is necessary to: detect, prevent and address fraud and other illegal activity; to protect ourselves, you and others, including as part of investigations; or to prevent death or imminent bodily harm. For example, we may provide information to third-party partners about the reliability of your account to prevent fraud and abuse on and off of our Services. Information we receive about you, including financial transaction data related to purchases made through Botsphere, may be accessed, processed and retained for an extended period of time when it is the subject of a legal request or obligation, governmental investigation, or investigations concerning possible violations of our terms or policies, or otherwise to prevent harm. We also may retain information from accounts disabled for violations of our terms for at least a year to prevent repeat abuse or other violations of our terms.<hr/>

								<h3>How will we notify you of changes to this policy?</h3><br/>
								We’ll notify you before we make changes to this policy and give you the opportunity to review and comment on the revised policy before continuing to use our Services.<hr/>

								<h3>How to contact Botsphere with questions?</h3><br/>
								To learn more about on Botsphere please click <a  class="modale" href="http://botsphere.biz">http://botsphere.biz</a>.<hr/> If you have questions about this policy, here’s how you can reach us on:<br/><br/>
								Email<br/>
								info@botsphere.biz<br/>
								Address:<br/>
								No 11 jalan BK5A/3A Straits One Bandar Kinrara<br/>
								47180, Puchong<br/>
								Selangor, Malaysia<br/>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end modal -->
			</div>
		</div>
		<!-- ====================================== footer =============================== -->
		<footer class="col-xs-12 col-md-12">
			<div class="col-xs-12 col-md-12 foot">
				<span class="small col-xs-12 col-md-12">
					<small>Powered by &copy;<b><a href="http://www.botsphere.biz/">Botsphere</a></b></small>
				</span>
				<!--img class="deco2 unhid" src="assets/img/botstate.png"-->
			</div>
		</footer>
	</div>
	<script>
		$(document).ready(function() {
			$('#contactForm').bootstrapValidator({
				framework: 'bootstrap',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				row: {
					valid: 'field-success',
					invalid: 'field-error'
				},
				fields: {
					fname: {
						validators: {
							notEmpty: {
								message: 'First name is required'
							},

                    //regexp: {
                    //    regexp: /[a-zA-Z]+ \S+/,
                    //    message: 'First name can only consist of alphabetical'
                    //}
                }
            },
            lname: {
            	validators: {
            		notEmpty: {
            			message: 'Last name is required'
            		},

                    //regexp: {
                    //    regexp: /[a-zA-Z]+ \S+/,
                    //    message: 'First name can only consist of alphabetical'
                    //}
                }
            },
            email: {
            	validators: {
            		notEmpty: {
            			message: 'Email address is required and cannot be empty'
            		},
            		emailAddress: {
            			message: 'Email address is not valid'
            		}
            	}
            },
            username: {
            	validators: {
            		notEmpty: {
            			message: 'Email address is required and cannot be empty'
            		},
            		emailAddress: {
            			message: 'Email address is not valid'
            		}
            	}
            },
            pwd: {
            	validators: {
            		notEmpty: {
            			message: 'Password is required'
            		}
            	}
            },
            password: {
            	validators: {
            		notEmpty: {
            			message: "Password is required <br/><a href='forgot.php'>Forgotten account?</a> "
            		}
            	}
            },
            companyname: {
            	validators: {
            		notEmpty: {
            			message: 'Company/Merchant Name is required and cannot be empty'
            		}
            	}
            },
            nric: {
            	validators: {
            		notEmpty: {
            			message: 'IC Number is required and cannot be empty'
            		},
            		regexp: {
            			regexp: /^[0-9]+$/,
            			message: 'IC Number is not valid'
            		},
            		nric: {
            			message: 'IC Number is not valid'
            		}
            	}
            }
        }
    });
		});
	</script>

	<!--<script src="assets/js/departure-board.js"></script>
	<script>

		var board = new DepartureBoard (document.getElementById ('test'), { rowCount: 2, letterCount: 24 });
		board.setValue (['Total Merchant: 140', 'Total Transaction: 385']);

		window.setTimeout (function () { -->
		<!--	board.setValue ('0');-->
		<!--}, 8000);

	// duplicate

	var board = new DepartureBoard (document.getElementById ('test2'), { rowCount: 2, letterCount: 24 });
	board.setValue ([' Total Merchant:    140', ' Total Transaction: 385']);

	window.setTimeout (function () { -->
	<!--	board.setValue ('0');-->
	<!--}, 8000);

</script-->
</body>
</html>
