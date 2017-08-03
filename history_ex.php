<?php

include('dbimicf.php');
// include("checksession.php");
// include('analyticstracking.php');

$_SESSION['userid'] = "lyanna.anne";
$_SESSION['merchant_id'] = "AAA01";
$_SESSION['merchant_name'] = "Lyanna.Anne";

// $action=$_REQUEST['action'];
$userid = $_SESSION['userid'];
$merchant_id=$_SESSION['merchant_id'];
$merchant_name=$_SESSION['merchant_name'];



	 $sql="select * from sales where username ='$userid'";
	 $result = mysql_query($sql) or die(mysql_error());
	    while($row = mysql_fetch_array($result)){

	    $id=$row['id'];
		  $username=$row['username'];

	    $company=$row['company'];
		  $email=$row['email'];
			$merchant_name=$row['merchant_name'];
			$merchant_id=$row['merchant_id'];

	    $first_name=$row['first_name'];
			$last_name=$row['last_name'];
			$acct_name=$row['acct_name'];
			$acct_num=$row['acct_num'];
			$bank_account=$row['bank_account'];
			$address=$row['address'];
			$city=$row['city'];
			$country=$row['country'];
			$postal=$row['postal'];
			$greeting=$row['greeting'];
			$logo=$row['logo'];



		}

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Botsphere | Etauke</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


      <!-- Bootstrap core CSS     -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="assets/css/themify-icons.css" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="96x96" href="botstate.png">
		<style type="text/css">
        h6::first-letter {
            text-transform: uppercase !important;
        }
        h6{
            text-transform: lowercase !important;
            font-style: none; font-weight: normal;
            text-align: left; font-size: 14px;
            color: #9A9A9A;
        }
        h6 span{ text-transform: capitalize !important; }
        @media screen and (max-width: 780px){
            h6{text-align: center;}
            .btn-block{ font-size: 14px; }
            h4{ text-align: center; }
        }
		 $(window).load(function(){
                $('#onload').modal('show');
            });
    </style>

	<!-- EnjoyHint JS and CSS files -->
	<link href="enjoyhint/enjoyhint.css" rel="stylesheet">

</head>
<body>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Free Trial Expired</h4>
            </div>
            <div class="modal-body">
				<p>Auwww...Your free trial has expired. Kindly unfreeze your dashboard by clicking this button!</p>

                <form>
                   
                    <button type="button" class="btn btn-primary" onclick="location.href='receipt_ex.php'">Make Payment</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>   	

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">


 <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.botsphere.biz/etauke/pages/dashboard.php" class="simple-text">


          <img src="<?php echo $logo; ?>" height="32" width="32" class="img-circle" alt="logo">  <?php echo $merchant_name; ?></a>
            </div>

            <ul class="nav">
                <li>
                    <a href="">
                        <i class="ti-view-list-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

									<li>
										<a href="">
                        <i class="ti-layout-accordion-list"></i>
                        <p>Product List</p>
                    </a>
                </li>
              <!--  <li>
					<a href="inventory.php">
                        <i class="fa fa-edit fa-fw"></i>
                        <p>Inventory</p>
                    </a>
                </li> -->
                <li>
                    <a href="">
                        <i class="ti-shopping-cart-full"></i>
                        <p>Customers</p>
                    </a>
                </li>
				<li class="active">
						<a href="history_ex.php">
								<i class="fa fa-usd" aria-hidden="true"></i>
								<p>Transaction History</p>
						</a>
				</li>
                <li>
                    <a href="">
                        <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        <p>Tutorial</p>
                    </a>
                </li>
								<li>
                    <a href="mailto: hello@botsphere.biz">
                        <i class="fa fa-bullhorn"></i>
                        <p>Talk to Us</p>
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
                    <a class="navbar-brand" href="#">Transaction History</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p><?php echo "Merchant Name:- $merchant_name"; ?></p>
                            </a>
                        </li>
                       <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-credit-card"></i>
                                <p><?php echo "Merchant ID:- $merchant_id"; ?></p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="col-xs-12 col-md-12">
                                    <div class="col-xs-12 col-md-8 pull-left">
                                        <h4 class="title">
                                            Sales Report Monthly
                                        </h4>
                                    </div>
                                    <div class="col-xs-12 col-md-4 pull-right">
                                        <a href="receipt_ex.php">
                                            <button type="button" class="btn btn-default btn-lg btn-block" onclick="location.href='receipt_ex.php'">
                                                <span class="fa fa-credit-card" aria-hidden="true"></span>
                                                Make Payment
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th width="40%"  align="center">Month</th>
										<th width="40%"  align="center">Total Sales</th>
										<th width="40%"  align="center">Total Revenue</th>
										<!--th width="20%"  align="center">Total Earnings</th-->
                                        <!--th>Type</th>
                                    	<th>Price</th>
                                    	<th>Quantity</th-->
                                    </thead>

                                    <?php
                                    	#$sql="SELECT DATE_FORMAT(FROM_unixtime(b.dtime), '%Y-%m') AS MONTH,COUNT(b.uid),sum(c.harga),ROUND(SUM(c.harga) * 0.05,2) from payment b,checkout c where b.chkid=c.chkid and b.mid='$merchant_id' and FROM_unixtime(b.dtime) BETWEEN DATE_FORMAT(NOW(), '2017-03-01 00:00:01') AND DATE_FORMAT(NOW(), '%Y-%m-%d  23:59:59')and b.paytype in ('Pos','Cod') and b.status='5' GROUP BY MONTH";
                                    	$sql="SELECT DATE_FORMAT(FROM_unixtime(b.dtime), '%Y-%m') AS MONTH,COUNT(b.uid),sum(b.total),count(b.id) * 0.50  from payment b,checkout c where b.chkid=c.chkid and b.mid=c.mid and b.mid='$merchant_id' and b.status in ('4','5') and b.paytype in ('Pos','Cod') GROUP BY MONTH";

                                    	$result = mysql_query($sql) or die(mysql_error());

                                    	while($row = mysql_fetch_array($result)){
                                    	        $month=$row['MONTH'];
                                    	        $sales=$row['COUNT(b.uid)'];
                                    		      $revenue=$row['sum(b.total)'];
                                    	        /*$profit=$row['ROUND(SUM(c.harga) * 0.05,2)']; */

                                                echo "<tbody>";
                                    						echo "<tr>";
                                                echo "<td width=40% align=left><a href=history-daily-ex.php?month=$month>$month</a></td>";
                                                echo "<td width=40% align=left>$sales</td>";
                                                echo "<td width=40% align=left>$revenue</td>";
                                                echo "</tr>";
                                                /*echo "<td width=20% align=left>$profit</td>"; */

                                    			#echo "<td><a class=aspect-ratio aspect-ratio--square aspect-ratio--square--50 aspect-ratio--interactive><img class=block aspect-ratio__content src=\"$product_loc\" /</a>  </td>";
                                    			#echo "<td><img class=\"thumbimage\" src=\"$product_loc\"></td>";
                                                }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				
               <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <p class="description">
                                <h6>
                                    *Note: <span>K</span>indly click “Make Payment” if you wish to pay for your monthly subscription.
                                    <br> <span>P</span>lease note that <span>RM</span>0.50 will be imposed for every successful transaction. </br>
                                </h6>
                            </p>
                        </nav>
        				<div class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script>,<a href="http://www.botsphere.biz/">Botsphere</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>



</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

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

		<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
   
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>   
<!--	<script src="enjoyhint/enjoyhint.min.js"></script>
	<script src="/etauke/hint-sequence.js"></script>-->
	


</html>
