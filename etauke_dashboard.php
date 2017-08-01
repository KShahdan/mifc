<?php

include('db.php');
include("checksession.php");
include('analyticstracking.php');


     


$userid = $_SESSION['userid'];
$action=$_REQUEST['action'];
$merchant_id=$_SESSION['merchant_id'];
$merchant_name=$_SESSION['merchant_name'];



     $sql="select * from merchant_profile where username ='$userid'";
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
        
        $sql="select count(b.uid) from payment b,checkout c where b.chkid=c.chkid and b.mid='$merchant_id' and FROM_unixtime(b.dtime) like 'now()%' order by b.dtime desc";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){

            $notify=$row['count(b.uid)'];
            
        }

 $sql="select dactivate,dexpired,datediff(now(), dexpired) from merchant_profile where status='1' and merchant_id='$merchant_id'";

     $result = mysql_query($sql) or die(mysql_error());
     while($row = mysql_fetch_array($result)){
     $datenotify=$row['datediff(now(), dexpired)'];
        }

        if($datenotify == -3)
        {
            
            $ALERT="3 more days - Your free trial will end in 3 days. Click <b>here</b> to continue selling!";
            $url="http://www.botsphere.biz/etauke/pages/receipt.php";


        }
        elseif($datenotify == -1){
            
            $ALERT="1 more day - Your free trial will end in 1 day. Click <b>here</b> to continue selling!";
            $url="http://www.botsphere.biz/etauke/pages/receipt.php";

         
        }
            else{
                $ALERT='Welcome to <b>Etauke</b> - You have '.$notify.' new orders';
                $url="http://www.botsphere.biz/etauke/pages/order.php";

        }



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="botstate.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Botsphere | Etauke</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

 <!-- Bootstrap core CSS     -->
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
        .fontt{ font-size: 20pt; }
    </style>


</head>
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

       <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.botsphere.biz/etauke/pages/dashboard.php" class="simple-text">


          <img src="<?php echo $logo; ?>" height="32" width="32" class="img-circle" alt="logo">  <?php echo $merchant_name; ?></a>
            </div>

           <ul class="nav">
                <li>
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

                    <a href="list.php">
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
                    <a href="order.php">
                        <i class="ti-shopping-cart-full"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li>
                    <a href="history.php">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                        <p>Transaction History</p>
                    </a>
                </li>
                <li>
                    <a href="tutorial.php">
                        <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        <p>Tutorial</p>
                    </a>
                </li>
                                <li>
                                        <a href="mailto: hello@botsphere.biz?subject=Car SalesBot">
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
                    <a class="navbar-brand" href="#">Dashboard</a>

                </div>
    <!--            <div id="countdown">
  <div id='tiles'></div>
  <div class="labels">
    <li>Days</li>
    <li>Hours</li>
    <li>Mins</li>
    <li>Secs</li>
  </div>
</div>-->
                    
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
                    <div class="col-lg-3 col-sm-6">
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
                                                  <?php
                                                      //$sql="SELECT COUNT(id) as cc FROM orders";
                                                      //$row = mysql_query($sql) or die(mysql_error());
                                                      //$name = mysql_fetch_array($row);
                                                      $sqlSalesCount = mysql_query("SELECT COUNT(b.uid) from payment b,checkout c where b.chkid=c.chkid and b.mid=c.mid and b.mid='$merchant_id' and b.status in ('4','5')");
                                                      $res = mysql_fetch_assoc($sqlSalesCount);
                                                      print $res['COUNT(b.uid)'];
                                                  ?>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p class="text-center">
                                                <small>Revenue</small><br/>
                                                <b class="fontt"> RM
                                                  <?php
                                                      //$sql="SELECT COUNT(id) as cc FROM orders";
                                                      //$row = mysql_query($sql) or die(mysql_error());
                                                      //$name = mysql_fetch_array($row);
                                                      $sqlRevenue = mysql_query("SELECT sum(c.harga*c.qty) from payment b,checkout c where b.chkid=c.chkid and b.mid=c.mid and b.mid='$merchant_id' and b.status in ('4','5')");
                                                      $res = mysql_fetch_assoc($sqlRevenue);
                                                      print $res['sum(c.harga*c.qty)'];
                                                  ?>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <div class="numbers">
                                            <p class="text-center">
                                                <small>Customer Count</small><br/>
                                                <b class="fontt">
                                                <!-- update -->
                                                  <?php
                                                      include('db.php');
                                                      //$sql="SELECT COUNT(id) as cc FROM orders";
                                                      //$row = mysql_query($sql) or die(mysql_error());
                                                      //$name = mysql_fetch_array($row);
                                                      $ssql = mysql_query("SELECT COUNT(b.uid) from payment b,checkout c where b.chkid=c.chkid and b.mid=c.mid and b.mid='$merchant_id'");

                                                      $row = mysql_fetch_array($ssql);
                                                      print $row['COUNT(b.uid)'];
                                                  ?>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-sharethis" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p class="text-left">
                                                <small><b><font  color="red">Share this link on your Facebook posts, WhatsApp, WeChat and all your advertising channel:</b> m.me/Taukebot?ref=<?php echo "$merchant_name"; ?></small></font><br/>
                                                <b class="fontt">

                                                </b>
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
                                                <!-- update 27/2 -->
                                                    <!--?php
                                                      include('db.php');
                                                      $sqlAllPrice = mysql_query("SELECT ROUND(SUM(c.harga) * 0.05,2) from payment b,checkout c where b.chkid=c.chkid and b.mid='$merchant_id'");
                                                      //$res = mysql_fetch_array($sqlAllPrice);
                                                      if($res = mysql_fetch_array($sqlAllPrice))
                                                      {
                                                        $ress = $res['ROUND(SUM(c.harga) * 0.05,2)'];
                                                      }
                                                      echo $ress;
                                                      //$ress = $res['total'];
                                                      /*
                                                      $sqlPrice = mysql_query("SELECT price FROM orders");
                                                      $countt = $res['COUNT([price])'];
                                                      //$cut = 50;
                                                      //$countt = count($res);
                                                        while (mysql_fetch_array($sqlPrice)) {
                                                            for(i = 0; i < $countt; i++){

                                                                $calc = $res['price'] * ( 50 / 100 );
                                                                $result = $result + $calc;
                                                                }
                                                            }
                                                        }*/

                                                        print($res['SUM(price)']);
                                                  ?>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div-->
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
              <table id="example2" class="table table-striped">
                <thead>
                <tr>

                                      <!--th width="1%"  align="left"></th-->
                                      <th width="1%"  align="left"></th>
                                      <th width="25%" align="left">Date</th>
                                        <th width="50%" align="left">Details</th>
                                        <th width="20%"  align="left">Receipt no.</th>
                                        <th width="30%"  align="left">Product</th>
                                                                            <th width="5%"  align="left">Amount</th>
                                        <th width="2%"  align="left">Delivery</th>
                                        <th width="1%"  align="left">Quantity</th>
                                                                            <th width="2%"  align="left">Status</th>
                                        <th width="1%"  align="left">Payment</th>






                </thead>
                <tbody>
                </tr>

<?php
     $sql="select b.uid,FROM_unixtime(b.dtime),b.nama_penuh,b.chkid,b.talipon,b.alamat,c.items,c.proid,c.harga*c.qty,c.qty,b.paytype,b.status,b.attachment from payment b,checkout c where b.chkid=c.chkid and b.mid=c.mid and b.mid='$merchant_id' and b.status in ('4','5')  order by b.dtime desc limit 5";

     $result = mysql_query($sql) or die(mysql_error());
     $i=0;
     while($row = mysql_fetch_array($result)){
         $i++;

            $id=$i;
            $name=$row['nama_penuh'];
            $date=$row['FROM_unixtime(b.dtime)'];
            $phone=$row['talipon'];
        $Address=$row['alamat'];
            $trackid=$row['chkid'];
        $product_name=$row['items'];
        $product_code=$row['proid'];
        $price=$row['c.harga*c.qty'];
        $quantity=$row['qty'];
        $status=$row['status'];
        $resit=$row['attachment'];
        $type=$row['paytype'];



            $statuspay = $status;

            if ($statuspay=="4" || $typepay=="Pos") {
                $statuspay='pending';
            } elseif ($statuspay=="5" || $typepay=="Pos") {
                $statuspay='completed';
            }  else {
                $statuspay='pending';
            }

            $typepay = $type;

            if ($typepay=="Pos") {
                $typepay=$resit;
            } else {
                $typepay='http://celcom.mobsocial.net/etauke-new/images/cod.jpg';
            }


            echo "<tbody>";
        echo "<tr>";
            echo "<td width=1% align=left>$id</td>";
            echo "<td width=25% align=left>$date</td>";
            echo "<td width=50% align=left>$name <br/> $phone <br/> $Address</td>";
        echo "<td width=20% align=left>$trackid</td>";
        echo "<td width=30% align=left>$product_name <br/> ($product_code)</td>";
        echo "<td width=5% align=center>$price</td>";
            echo "<td width=2% align=center>$type</td>";
            echo "<td width=1% align=center>$quantity</td>";
            echo "<td width=1% align=center>$statuspay</td>";
        echo "<td width=2% align=left ><img src=\"$typepay\" width=\"80\" height=\"80\"></td>";
        echo "</tr>";

}


?>
                </tbody>
                            </table>
                                           </div>
                                        </div>
                                    </div>
                <!--<div class="row">
                <div class="col-md-6">
                      <div class="card">
                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2015 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Shirts
                                        <i class="fa fa-circle text-warning"></i> Shoes
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


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
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Free Trial Expired</h4>
            </div>
            <div class="modal-body">
                <p>3 more days - Your free trial will end in 3 days. Click here to continue selling!</p>

                <form>
                   
                    <button type="button" class="btn btn-primary" onclick="location.href='receipt.php'">Make Payment</button>

                </form>
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


    <script src="enjoyhint/enjoyhint.min.js"></script>

    
    
<!--<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-bell',
                message: "Welcome to <b>Etauke</b> - You have <?php echo $notify; ?> new orders"

            },{
                type: 'success',
                timer: 1000000
            });

        });
    </script>-->
    
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-bell',
                message: "<?php echo $ALERT; ?>",
                url: "<?php echo $url; ?>"

            },{
                type: 'success',
                timer: 10000
            });

        });
    </script>
    
    
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


<!-- <script src="/etauke/hint-sequence.js"></script>
</body>
</html>
