<?php
session_start();
include('dbimicf.php');
//include("checksession.php");
// include('analyticstracking.php');


$_SESSION['userid'] = "admin";
$userid = $_SESSION['userid'];
// $action=$_REQUEST['action'];
// $merchant_id=$_SESSION['merchant_id'];
// $merchant_name=$_SESSION['merchant_name'];


$sql="select * from visitors";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result)){

//  $id=$row['id'];
 $username   = $row['name'];
 $hp         = $row['contact'];
 $email      = $row['email'];
 $noChild    = $row['nochild'];
 $age        = $row['age'];
 $nationality= $row['bumi'];
 $sources    = $row['source'];

}

// $sql="select count(b.uid) from payment b,checkout c where b.chkid=c.chkid and b.mid='$merchant_id' and FROM_unixtime(b.dtime) like 'now()%' order by b.dtime desc";
// $result = mysql_query($sql) or die(mysql_error());
// while($row = mysql_fetch_array($result)){

//  $notify=$row['count(b.uid)'];

// }
// //===============================================================================================
// date_default_timezone_set("Asia/Kuala_Lumpur");
// function writeLog($data)
// {
//     $timenow = date('Y-m-d H:s:i');
//     $myFile = "test.log";
//     $fh = fopen($myFile, 'a') or die("can't open file");
//     fwrite($fh, $timenow." - ".$data."\n");
//     fclose($fh);
// }
// function main(){
//     $nama=$_REQUEST['nama'];
//     $hp=$_REQUEST['hp'];
//     $model=$_REQUEST['modelCar'];
//     $date=$_REQUEST['FROM_unixtime(b.dtime)'];
//     $location=$_REQUEST['location'];
//     writeLog("$nama - $hp - $model - $date - $location");
// }
            //main();

if(isset($_POST['remove']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  $cid=$_POST['remove'];
  //$cid=$_POST['id'];
  //if($action=='remove'){
  $sql="delete from visitors where username=$cid";
  mysql_query($sql) or die ('Failed :'.mysql_error().'\n');
  //}
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="botstate.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>MICF | Etauke</title>

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

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="assets/css/styles1.css" />

  <!-- EXPORT CSV -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

  <!-- Font Awesome -->

  <!--  Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="assets/css/themify-icons.css" rel="stylesheet">
  
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


            <img src="<?php echo $logo; ?>" height="32" width="32" class="img-circle" alt="logo">  <?php echo $userid; ?></a>
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

                <a href="visitors.php">
                  <i class="ti-layout-accordion-list"></i>
                  <p>Visitors</p>
                </a>
              </li>
              <!--  <li>
                    <a href="inventory.php">
                        <i class="fa fa-edit fa-fw"></i>
                        <p>Inventory</p>
                    </a>
                  </li> -->

                <!--li>
                    <a href="tutorial.php">
                        <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        <p>Tutorial</p>
                    </a>
                  </li-->

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
	<!--			<div id="countdown">
  <div id='tiles'></div>
  <div class="labels">
    <li>Days</li>
    <li>Hours</li>
    <li>Mins</li>
    <li>Secs</li>
  </div>
</div>-->

<div class="collapse navbar-collapse">


</div>
</div>
</nav>
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-3 col-sm-6 col-md-offset-4">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-4" align="center">
                <div class="icon-big icon-warning text-center">
                  <i class="ti-money" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-xs-8">
                <div class="numbers">
                  <p class="text-center">
                    <small>Number of visitors</small><br/>
                    <b class="fontt">
                      <?php
                      $sqlvist="select count(name) from visitors";
                      $row = mysql_query($sqlvist) or die(mysql_error());
                      while($rowa = mysql_fetch_array($row)){
                        $countvist = $rowa['count(name)'];
                      }
                      echo "$countvist";
                      ?>
                    </b>
                  </p>
                </div>
              </div>
              <div class="col-xs-8">
                <p class="text-center">
                  <div id="getting-started"></div> 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div> 


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
                <div class="form-group col-md-6 label-info">
                  <form method="post" action="dashboard.php"><br/>
                    <input type="text" name="name" placeholder="name" class="form-control"><br/>
                    <input type="text" name="contact" placeholder="contact" class="form-control"><br/>
                    <input type="email" name="email" placeholder="email" class="form-control"><br/>
                    <input type="number" name="nochild" placeholder="nochild" class="form-control"><br/>
                    <input type="text" name="age" placeholder="age" class="form-control"><br/>
                    <input type="text" name="bumi" placeholder="bumi" class="form-control"><br/>
                    <input type="text" name="source" placeholder="source" class="form-control"><br/>

                    <input type="submit" class="btn-success btn-block" name="submitt" value="submit">
                  </form>

                  <?php
                  if (isset($_POST['submitt'])){
                   $usernamee   = $_POST['name'];
                   $hpp         = $_POST['contact'];
                   $emaill      = $_POST['email'];
                   $noChildd    = $_POST['nochild'];
                   $ager        = $_POST['age'];
                   $nationalityy= $_POST['bumi'];
                   $sourcess    = $_POST['source'];
                   $timestampp  = date('d-m-Y');
                   $sqla="insert into visitors (name,contact,email,nochild,age,bumi,source,timestamp)
                   values ('$usernamee','$hpp','$emaill','$noChildd','$ager','$nationalityy','$sourcess','$timestampp')";
                   $results = mysql_query($sqla) or die(mysql_error());
                 } 
                 ?>
               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- test -->
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form name="remove" action="dashboard.php" method="POST" onsubmit="return confirm('Are you sure?');">
              <table id="datatable" class="table table-striped">
                <thead>
                  <tr>

                    <!--th width="1%"  align="left"></th-->
                    <th align="left"></th>
                    <th align="left"></th>
                    <th align="left">Name</th>
                    <th align="left">Phone</th>
                    <th align="left">Email</th>
                    <th align="left">No of Child</th>
                    <th align="left">Age</th>
                    <th align="left">Nationality</th>
                    <th align="left">MICF?</th> 
                  </tr> 
                </thead>
                <tbody>

                 <?php 
                 $sql="select name, contact, email, nochild, age, bumi, source, timestamp from visitors order by timestamp ";
                 $resulta = mysql_query($sql) or die(mysql_error());
                 $i  = $ff = $xi = 0;
                 $xi = $mon = $tue = $wed = $thu = $fri = $sat = $sun = 0;
                 $dayCritical = "NULL";
                                     // $countday = array ('mon','tue','wed','thu','fri','sat','sun');
                 $countday2= array (1,2,3,4,5,6,7);
                 while($row = mysql_fetch_array($resulta)){
                   $i++;
                   $id=$i;
                   $xi = 0;
                   $username   = $row['name'];
                   $hp         = $row['contact'];
                   $email      = $row['email'];
                   $noChild    = $row['nochild'];
                   $age        = $row['age'];
                   $nationality= $row['bumi'];
                   $sources    = $row['source'];
                   $timestamp  = $row['timestamp'];

                   $dayFinder = $timestamp;
                                        $weekday = date('l', strtotime($dayFinder)); // note: first arg to date() is lower-case L
                                        //echo $weekday; // SHOULD display Wednesday
                                        // $timestamp  = $row['timestamp'];
                                        $dayArray = $weekday; 

                                        if($dayArray == 'Monday'){
                                          //$mon = $xi = 0;
                                          $xi++;
                                          $mon = $mon + $xi + $xi;
                                        }
                                        else if($dayArray == "Tuesday"){
                                          $xi++;
                                          $tue = $tue + $xi;
                                        }
                                        else if($dayArray == 'Wednesday'){
                                          $xi++;
                                          $wed = $wed + $xi;
                                        }
                                        else if($dayArray == 'Thursday'){
                                          $xi++;
                                          $thu = $thu + $xi;
                                        }
                                        else if($dayArray == 'Friday'){
                                          $xi++;
                                          $fri = $fri + $xi;
                                        }
                                        else if($dayArray == 'Saturday'){
                                          $xi++;
                                          $sat = $sat + $xi;
                                        }
                                        else if($dayArray == 'Sunday'){
                                          $xi++;
                                          $sun = $sun + $xi;
                                        } 
                                        ?>
                                        <tr>
                                          <!-- // <td align=left><input type="Checkbox" name="deletecheck" value="<?php echo "$email";?>"></td> -->
                                          <td align=left><button id="btnn" class="btnn" value="<?php $username ?>"><span class="glyphicon glyphicon-trash"></span></button></td>
                                          <td align=left><?php echo $id ?></td>
                                          <td align=left><?php echo $username ?></td>
                                          <td align=left><?php echo $hp ?></td>
                                          <td align=left><?php echo $email ?></td>
                                          <td align=left><?php echo $noChild ?></td>
                                          <td align=left><?php echo $age ?></td>
                                          <td align=left><?php echo $nationality ?></td>
                                          <td><?php echo $sources ?></td> 
                                        </tr>
                                        <?php 
                                      }
                                      ?>
                                    </tbody>
                                  </table>
                                  </form>
                                </div> 
                              </div>
                            </div>

                            <div class="row" align="center">
                              <div class="col-xs-12 col-sm-12">
                                <div class="box">
                                  <div class="box-header">
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body">
                                    <div class="box-body">
                                      <div id="container"></div>
                                    </div>
                                  </div>
                                </div>
                              </div> 
                              <!-- MONDAY -->
                              <div class="col-lg-3 col-sm-6 ">
                                <div class="card">
                                  <div class="content">
                                    <div class="row">
                                      <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                          <i class="ti-user" aria-hidden="true"></i>
                                          <h1 class="count">
                                            <?php 

                                            echo $mon;

                                            ?>
                                          </h1>
                                        </div>
                                      </div>
                                      <div class="col-xs-7">
                                        <p align="center">
                                          MONDAY                          
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>  
                              <!-- TUESDAY -->
                              <div class="col-lg-3 col-sm-6 ">
                                <div class="card">
                                  <div class="content">
                                    <div class="row">
                                      <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                          <i class="ti-user" aria-hidden="true"></i>
                                          <h1 class="count">
                                            <?php 

                                            echo "$tue";

                                            ?>
                                          </h1>
                                        </div>
                                      </div>
                                      <div class="col-xs-7">
                                        <p align="center">
                                          TUESDAY                             
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>  
                              <!-- WEDNESDAY -->
                              <div class="row col-md-offset-2" align="center">
                                <div class="col-lg-3 col-sm-6 ">
                                  <div class="card">
                                    <div class="content">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="col-sm-12">
                                            <p align="center">
                                              WEDNESDAY                           
                                            </p>
                                          </div>
                                          <div class="icon-big icon-danger text-center">
                                            <!-- <i class="ti-user" aria-hidden="true"></i> -->
                                            <h1 class="count">
                                              <?php 

                                              echo "$wed";

                                              ?>
                                            </h1>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div> 
                                <!-- THURSDAY -->
                                <div class="col-lg-3 col-sm-6 ">
                                  <div class="card">
                                    <div class="content">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="col-sm-12">
                                            <p align="center">
                                              THURSDAY                         
                                            </p>
                                          </div>
                                          <div class="icon-big icon-danger text-center">
                                            <!-- <i class="ti-user" aria-hidden="true"></i> -->
                                            <h1 class="count">
                                              <?php 

                                              echo "$thu";

                                              ?>
                                            </h1>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div> 
                                <!-- FRIDAY -->
                                <div class="col-lg-3 col-sm-6 ">
                                  <div class="card">
                                    <div class="content">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class"col-sm-12">
                                            <p align="center">
                                              FRIDAY                            
                                            </p>
                                          </div>
                                          <div class="icon-big icon-danger text-center">
                                            <!-- <i class="ti-user" aria-hidden="true"></i> -->
                                            <h1 class="count">
                                              <?php 

                                              echo "$fri";

                                              ?>
                                            </h1>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- SATURDAY -->
                              <div class="row col-md-offset-4" align="center">
                                <div class="col-lg-3 col-sm-6 "  style="margin-left: -4em;">
                                  <div class="card">
                                    <div class="content">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="col-sm-12">
                                            <p align="center">
                                              SATURDAY                         
                                            </p>
                                          </div>
                                          <div class="icon-big icon-danger text-center">
                                            <!-- <i class="ti-user" aria-hidden="true"></i> -->
                                            <h1 class="count">
                                              <?php 

                                              echo "$sat";

                                              ?>
                                            </h1>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div> 
                                <!-- SUNDAY -->
                                <div class="col-lg-3 col-sm-6 " style="margin-left: 4em;">
                                  <div class="card">
                                    <div class="content">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="col-sm-12">
                                            <p align="center">
                                              SUNDAY                           
                                            </p>
                                          </div>
                                          <div class="icon-big icon-danger text-center">
                                            <!-- <i class="ti-user" aria-hidden="true"></i> -->
                                            <h1 class="count">
                                              <?php 

                                              echo "$sun";

                                              ?>
                                            </h1>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
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
              </div>
            </body>

            <!--   Core JS Files   -->
            <script
            src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
            <!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
            <!-- DATATABLE -->
            <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
            <!-- BOOTSTRRAP -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- COUNTDOWN -->
            <script src="https://cdn.jsdelivr.net/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>

            <!--  HighChart -->
            <?php
            $metasql = "select timestamp from visitors";
            ?>

            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>

            <!-- EXPORT CSV -->
            <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
            <!-- dynatable -->
            <script src=""></script>
            <!-- <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> -->

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
            <!--  -->
            <script src="assets/js/jquery.countdown.js"></script>
            <!-- for copy link -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.1/clipboard.min.js"></script>
            <script src="enjoyhint/enjoyhint.min.js"></script>

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
           <!-- ========================================= -->

           <script> 
    $('#getting-started').countdown('2017/08/01', function(event) {
      $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
    });
          </script>
        </script>

        <!-- ======================================= -->

        <script>
          $('.count').each(function () {
            $(this).prop('Counter',0).animate({
              Counter: $(this).text()
            }, {
              duration: 400,
              easing: 'swing',
              step: function (now) {
                $(this).text(Math.ceil(now));
              }
            });
          });
        </script>

        <script type="text/javascript">

          // $('#btnn').click(function() {
          //   var vaue=$(this).attr("value");
          //   alert(vaue);
          // });
        </script>  
        <!-- ================= -->
        <script type="text/javascript">
        
          var table = $('#datatable').DataTable({
            ordering: 'true',
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ],
          } ); 

          $('#datatable tbody').on( 'click', '#btnn', function () {
            table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
            // deleterow();
          } );

        </script>

        <!-- ========================================= -->
        <script>
          chart = function () {
            Highcharts.chart('containerr', {
              data: {
                table: 'datatable'
              },
              chart: {
                type: 'line'
              },
              title: {
                text: 'Total Visitors'
              },
              yAxis: {
                title: {
                  text: 'Units'
                }
              },
              tooltip: {
                formatter: function () {
                  return '<b>' + this.series.name + '</b><br/>' + this.point.y + ' ' + this.point.name.toLowerCase();
                }
              }
            });
          }
        </script>

        </html>

        <!-- <script src="/etauke/hint-sequence.js"></script>
      </body-->
