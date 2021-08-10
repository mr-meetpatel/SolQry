<?php
include '../conn/conn.php';
session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}
$aname=mysqli_query($con,"select admin_name from admin_master where admin_id='{$_SESSION['aid']}'");
$anamedata= mysqli_fetch_array($aname);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/bulona/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2019 23:59:35 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <?php include './themepart/title.html';?>
  <!--favicon-->
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon"/>
  <!-- Vector CSS -->
  <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>

   <!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner"><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <?php include './themepart/sidebar.php';?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->

<?php include './themepart/header.php';?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

     <div class="row mt-3">
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-deepblue">
           <div class="card-body">
              <h5 class="text-white mb-0"><?php
              $count= mysqli_query($con, "select count('f_id') from faculty_master where b_id='{$_SESSION['b_id']}' and staus=1") or die(mysqli_error($con)) ;
              $countdata= mysqli_fetch_array($count);
              echo $countdata[0];
              
              ?> <span class="float-right"><i class="fa fa-laptop"></i></span></h5>
                <div class="progress my-3" style="height:3px;">
                  
                </div>
              <p class="mb-0 text-white small-font">Faculties</p>
            </div>
         </div> 
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-orange">
           <div class="card-body">
              <h5 class="text-white mb-0"><?php
              $count= mysqli_query($con, "select count('stu_id') from student_master where b_id='{$_SESSION['b_id']}' and status=1");
              $countdata= mysqli_fetch_array($count);
              echo $countdata[0];
              
              ?> <span class="float-right"><i class="fa fa-child"></i></span></h5>
                <div class="progress my-3" style="height:3px;">
                   
                </div>
              <p class="mb-0 text-white small-font">Students</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-ohhappiness">
            <div class="card-body">
              <h5 class="text-white mb-0"><?php
              $date= date("Y-m-d");
              $count= mysqli_query($con, "select count('app_id') from appointment_master where b_id='{$_SESSION['b_id']}' and u_id=1 and f_id='{$_SESSION['aid']}' and app_date={$date} and app_status=1");
              $countdata= mysqli_fetch_array($count);
              echo $countdata[0];
              
              ?><span class="float-right"><i class="fa fa-bar-chart"></i></span></h5>
                <div class="progress my-3" style="height:3px;">
                   <!-- <div class="progress-bar" style="width:55%"></div> -->
                </div>
              <p class="mb-0 text-white small-font">Appointments</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-ibiza">
            <div class="card-body">
              <h5 class="text-white mb-0"><?php
              
              $count= mysqli_query($con, "select count('sub_id') from subject_master where b_id='{$_SESSION['b_id']}'");
              $countdata= mysqli_fetch_array($count);
              echo $countdata[0];
              
              ?><span class="float-right"><i class="zmdi zmdi-assignment-alert"></i></span></h5>
                <div class="progress my-3" style="height:3px;">
                   <!-- <div class="progress-bar" style="width:55%"></div> -->
                </div>
              <p class="mb-0 text-white small-font">No of Subjects</p>
            </div>
         </div>
       </div>
     </div><!--End Row-->

	  
	
	
	
<!--	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header border-0">Recent Order Tables
		  <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>
              </div>
             </div>
		 </div>
	       <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                  <thead>
                   <tr>
                     <th>Photo</th>
                     <th>Product</th>
                     <th>Amount</th>
                     <th>Status</th>
                     <th>Completion</th>
                     <th>Date</th>
                   </tr>
                   </thead>
           <tbody><tr>
                    <td>
                      <img alt="Image placeholder" src="../assets/images/products/01.png" class="product-img">
                    </td>
          <td>Headphone GL</td>
                    <td>$1,840 USD</td>
                    <td>
                      <span class="badge-dot">
                        <i class="bg-danger"></i> pending
                      </span>
                    </td>
                    <td>
             <div class="progress shadow" style="height: 4px;">
                          <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 60%"></div>
                       </div>
                    </td>
          <td>10 July 2018</td>
                   </tr>
         
                 </tbody></table>
               </div>
	   </div>
	 </div>
	</div>End Row-->

      <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	

  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
      </ul>
      
     </div>
   </div>
  <!--end color cwitcher-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="../assets/js/jquery.loading-indicator.html"></script>
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="../assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Vector map JavaScript -->
  <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Easy Pie Chart JS -->
  <script src="../assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
  <!-- Sparkline JS -->
  <script src="../assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
  <script src="../assets/plugins/jquery-knob/excanvas.js"></script>
  <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
    
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
  <!-- Index js -->
  <script src="../assets/js/index.js"></script>
  <!--Notification.js-->
   <script src="../assets/plugins/notifications/js/lobibox.min.js"></script>
  <script src="../assets/plugins/notifications/js/notifications.min.js"></script>
  <script src="../assets/plugins/notifications/js/notification-custom-script.js"></script>
  <script src="ajax.js" type="text/javascript"></script>
   <script src="jquery-3.4.1.js" type="text/javascript"></script>
<!--Sweet Alert-->
  <script src="../assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script>
     $(document).ready(function() {
      //Default data table
      
      setInterval(function(){
            
            
            notification_display();
            count();
            
        },500);
       
        function notification_display()
        {
            $.ajax({
               url: "notif_details.php",
               type:"POST",
               success:function(data)
               {
                  $('#notif-data').html(data);
               }
            });
        }
        
        function count()
        {
            $.ajax({
               url: "notif_count.php",
               type:"POST",
               success:function(data)
               {
                  $('.notif-count').html(data);
               }
            });
        }
      
      } );
       
      
      

    </script>
 
  
</body>

<!-- Mirrored from codervent.com/bulona/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:01:24 GMT -->
</html>
