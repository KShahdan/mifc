<?php

session_start();
include('dbimicf.php');
// include('checksession.php');
// include('analyticstracking.php');
// $username = $_SESSION['id'];


//$sql = "SELECT * FROM sales where username='$username'";
//$result = mysql_query($sql) or die(mysql_error());
// echo $username;
//while($row = mysql_fetch_array($result)){
// $id=$i;
     // $username=$row['username'];
//   $date=$row['date'];
//   $guarantor=$row['guarantor'];
//   $hp=$row['hp'];
//   $model=$row['last_visited_block'];
//   $sales=$row['sales'];
//   $gaji=$row['gaji'];
     //$timestamp= $row['timestamp'];
//}
date_default_timezone_set("Asia/Kuala_Lumpur");

//main();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="botstate.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>BotCar | Botsphere</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     --> 
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" >
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="assets/css/styles1.css" />

	<!-- Font Awesome -->

	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- EnjoyHint JS and CSS files -->
	<link href="enjoyhint/enjoyhint.css" rel="stylesheet">
	<style type="text/css">
		.fontt{ font-size: 12pt; }
		*{font-size: 12pt;}
		.pp{z-index: 100;}
		.remove{color: red;}
	</style> 
</head>
<body>
	<div class="wrapper">

		<div class="sidebar" data-background-color="black" data-active-color="danger"> 
	    <!--
	        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
	        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	    --> 
	    <div class="sidebar-wrapper">
	    	<div class="logo">
	    		<a href="http://www.botsphere.biz/etauke/pages/dashboard.php" class="simple-text">
	    			<img src="<?php echo $logo; ?>" height="32" width="32" class="img-circle" alt="logo">  <?php echo $username; ?>
	    		</a>
	    	</div> 
	    	<ul class="nav"> 
	    		<li class="active"> 
	    			<a href="dashboard.php">
	    				<i class="ti-view-list-alt"></i>
	    				<p>Dashboard</p>
	    			</a>
	    		</li>
	    		<li>
	    			<a href="user.php">
	    				<i class="ti-user"></i>
	    				<p>Profile</p>
	    			</a>
	    		</li>  
	    		<li>
	    			<a href="order.php">
	    				<i class="ti-shopping-cart-full"></i>
	    				<p>Customers</p>
	    			</a>
	    		</li> 
	    		<li>
	    			<a href="index.php">
	    				<i class="ti-layout-media-right-alt"></i>
	    				<p>Logout</p>
	    			</a>
	    		</li> 
	    	</ul>
	    </div>
	</div>

	<div class="main-panel">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar bar1"></span>
						<span class="icon-bar bar2"></span>
						<span class="icon-bar bar3"></span>
					</button>
					<a class="navbar-brand" href="#">Dashboard</a>

				</div> 

				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
			        <!--li>
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                <i class="ti-user"></i>
			                <p><!-?php echo "Merchant Name:- $merchant_name"; ?></p>
			            </a>
			        </li>
			        <li>
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                <i class="ti-credit-card"></i>
			                <p><!-?php echo "Merchant ID:- $merchant_id"; ?></p>
			            </a>
			        </li--> 
			    </ul> 
			</div>
		</div>
	</nav>
	<!--  END NAVBAR WEB/MOBILE -->
	
	<div class="content">
		<div class="container-fluid">
			<div class="row">
                    <!--div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-money" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p class="text-center">
                                                <small>Sales Count</small><br/>
                                                <b class="fontt">
                                            </p> 
                                    	</div>
                                	</div>
                            	</div>
                        	</div>
                    	</div>
                    </div --> 
                    <!-- Modal -->
                    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
                    	<div class="modal-dialog">
                    		<div class="modal-content">
                    			<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button>
                    				<h4 class="modal-title" id="memberModalLabel">Thank you for signing in!</h4>
                    			</div>
                    			<div class="modal-body">
                    				<?php

                    				// $duesql = "select validity from sales where username = '$username' ";
                    				// $resut = mysql_query($duesql) or die(mysql_error());
                    				// while($nos = mysql_fetch_array($resut)){
                    				// 	$merchant_time = $nos['validity'];
                    				// }
                    				// $real_time = new DateTime("2013-07-31 10:29:00");
                    				// $days_left = $merchant_time->diff($real_time); 
                    				// if($days_left > 14){
                    				// 	// $merchant_time->modify('+1 week');
                    				// 	// $merchant_time = $merchant_time->format('Y-m-d'); 
                    				// 	echo "<p>Your expire date is on: '$merchant_time'; </p>";
                    				// }else{
                    				echo "There is an issue. Please contact technical team.";
                    				// } 
                    				?>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <script type="text/javascript">
                    	$(document).ready(function () {
                    		$('#memberModal').modal('show');
                    	});
                    </script>
                    <!-- END MODAL SIGN IN/VALIDITY -->

                    <div class="col-lg-3 col-sm-6">
                    	<div class="card">
                    		<div class="content">
                    			<div class="row">
                    				<div class="col-xs-5">
                    					<div class="icon-big icon-danger text-center">
                    						<i class="ti-user" aria-hidden="true"></i>
                    					</div>
                    				</div>
                    				<div class="col-xs-7">
                    					<p align="center">
                    						Number of Bookings
                    						<br>
                    						<?php
                    						// $sql1= "select count(userid) from data where sales = '$username' ";
                    						// $resuts = mysql_query($sql1) or die(mysql_error());
                    						// while($rowd = mysql_fetch_array($resuts)){
                    						// 	$merchCount = $rowd['count(userid)'];
                    						// 	echo "$merchCount";
                    						// }
                    						?>
                    					</p>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>

                    <div class="col-lg-9 col-sm-9">
                    	<div class="card">
                    		<div class="content">
                    			<div class="row">
                    				<div class="col-lg-2 col-xs-5">
                    					<div class="icon-big icon-danger text-center">
                    						<i class="ti-sharethis" aria-hidden="true"></i>
                    					</div>
                    				</div>
                    				<div class="col-lg-10 col-xs-7">
                    					<div class="numbers">
                    						<p class="text-left">
                    							<small>
                    								<b>
                    									<font  color="red">
                    										Share this link on your Facebook posts, WhatsApp, WeChat and all your advertising channel:
                    										<br/>
                    										<span id="copyme">m.me/AUTOrised?ref=<?php echo "$username"; ?></span>
                    										<br/>
                    										<!-- </span><span class="glyphicon glyphicon-link"></span> -->
                    									</font>
                    									<br/>
                    								</b>
                    							</small>
                    						</p>
                    					</div>
                    				</div> 
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <!--div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="fa fa-line-chart"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p class="text-center">
                                                <small>Gross Profit</small><br/>
                                                <b class="fontt"> RM -->
                                                	<!-- update 27/2  > 
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div-->
                </div> 
                <!-- END OF ROW 1 -->
                <div class="col-xs-12 col-md-3 pull-left pp">
                	<a href="receipt.php">
                		<button type="button" class="btn btn-default btn-lg btn-block" onclick="location.href='receipt.php'">
                			<span class="fa fa-credit-card" aria-hidden="true"></span>
                			Make Payment
                		</button>
                	</a>
                </div>

                <div class="content">
                	<section class="content">
                		<div class="row">
                			<div class="col-xs-12">
                				<div class="box">
                					<div class="box-header">
                					</div>
                					<!-- /.box-header -->
                					<div class="box-body">
                						<table id="datatable" class="table table-striped">
                							<thead>
                								<tr> 
                									<!--th width="1%"  align="left"></th-->
                									<th align="left"></th>
                									<th align="left">Date</th>
                									<th align="left">Model</th>
                									<th align="left">Status</th>
                									<th align="left">Guarantor</th>
                									<th align="left">Name</th>
                									<th align="left">Phone Number</th>
                									<th align="left">Salary (RM)</th>
                								</tr> 
                							</thead>
                							<tbody>

                								<?php 
                								$sql="select * from visitors ";
                								$resulta = mysql_query($sql) or die(mysql_error());
                								$i  = $ff = $xi = 0; 
												// $countday = array ('mon','tue','wed','thu','fri','sat','sun');

                								while($row = mysql_fetch_array($resulta)){
                									$i++;
                									$id=$i;
                									$xi = 0;
                									$timestamp     =$row['timestamp'];
                									$model         =$row['last_visited_block_name'];
                									$job_status    =$row['job_status'];
                									$guarantor     =$row['guarantor'];
                									$name          =$row['nama'];
                									$hp            =$row['hp'];
                									$gaji          =$row['gaji']; 
                									?>

                									<tr>
                										<td align=left><?php echo $id ?></td>
                										<td align=left><?php echo $timestamp ?></td>
                										<td align=left><?php echo $model ?></td>
                										<td align=left><?php echo $job_status ?></td>
                										<td align=left><?php echo $guarantor ?></td>
                										<td align=left><?php echo $name ?></td>
                										<td align=left><?php echo $hp ?></td>
                										<td><?php echo $gaji ?></td>
                									</tr>
                									<?php
                								}
                								?>
                							</tbody>
                						</table>
                					</div> 
                				</div>
                			</div> 
                		</div>
                	</section>
                </div>
                <footer class="footer">
                	<div class="container-fluid">
                		<nav class="pull-left">
                			<ul>
		                       <!-- <li>
		                            <a href="http://www.creative-tim.com">
		                                Creative Tim
		                            </a>
		                        </li>
		                        <li>
		                            <a href="http://blog.creative-tim.com">
		                               Blog
		                            </a>
		                        </li>
		                        <li>
		                            <a href="http://www.creative-tim.com/license">
		                                Licenses
		                            </a>
		                        </li>-->
		                    </ul>
		                </nav>
		                <div class="copyright pull-right">
		                	&copy; <script>document.write(new Date().getFullYear())</script>,<a href="http://www.botsphere.biz/">Botsphere</a>
		                </div>
		            </div>
		        </footer>
		    </div>
		    <!-- END DIV CONTAINER-FLUID -->
		</div>
		<!-- END DIV CONTENT -->
	</body> 

	<!--   Core JS Files   -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- DATATABLE -->
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<!-- BOOTSTRRAP -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
	<!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
	<!-- <script src="assets/js/bootstrap.min.js" type="text/javascript"></script> -->
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>
	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
	<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>
	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<!-- for copy link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.1/clipboard.min.js"></script>
	<script src="enjoyhint/enjoyhint.min.js"></script>
	<!--script type="text/javascript">
	  $(document).ready(function(){
	      demo.initChartist();
	      $.notify({
	          icon: 'ti-bell', message: "Welcome to <b>Etauke</b> - You have <?php echo $notify; ?> new orders"
	      },{ type: 'success', timer: 1000000 });
	  });
	</script-->
	<script>
		var target_date = new Date("May 11, 2017 15:37:25").getTime(); // set the countdown date
		var days, hours, minutes, seconds; // variables for time units
		var countdown = document.getElementById("tiles"); // get tag element
		getCountdown();
		setInterval(function () { getCountdown(); }, 1000);
		function getCountdown(){
			// find the amount of "seconds" between now and target
			var current_date = new Date().getTime();
			var seconds_left = (target_date - current_date) / 2000;
			days = pad( parseInt(seconds_left / 86400) );
			seconds_left = seconds_left % 86400;
			hours = pad( parseInt(seconds_left / 3600) );
			seconds_left = seconds_left % 3600;
			minutes = pad( parseInt(seconds_left / 60) );
			seconds = pad( parseInt( seconds_left % 60 ) );
			// format countdown string + set tag value
			countdown.innerHTML = "<span>" + days + "</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>";
		}
		function pad(n) {
			return (n < 10 ? '0' : '') + n;
		}
	</script>
	<!-- ======================== -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatable').DataTable( {
				lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
				]
			} );
		} );
	</script>
<!-- <script src="/etauke/hint-sequence.js"></script>
</body-->
</html>
