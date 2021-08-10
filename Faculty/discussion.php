<?php
include '../conn/conn.php';
session_start();
if(!isset($_SESSION['fid']))
{
    header("location:logout.php");
}
$fname=mysqli_query($con,"select f_name from faculty_master where f_id='{$_SESSION['fid']}'");
$fnamedata=mysqli_fetch_array($fname);
$diss=mysqli_query($con,"select * from discussion_forum_master where f_id='{$_SESSION['fid']}' and diss_id='{$_GET['disid']}'");
$dissdata=mysqli_fetch_array($diss);

if(isset($_POST['send'])){
  $msg=mysqli_real_escape_string($con,$_POST['txt']);
  $msg=mysqli_query($con,"INSERT INTO `discussion_master`(`diss_id`,`stu_id`, `dis_msg`) VALUES ('{$_GET['disid']}','0','{$msg}')") or die(mysqli_error($con));
  
}
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
      

      <div class="row">
	   <div class="col-12 col-lg-12">
	    <div class="card">
			<div class="card-body">
				<div class="card-title"><?php echo $dissdata['diss_title'];?>
				  
				</div>
				<h6><?php echo $fnamedata['f_name'];?></h6>
				<p><?php echo $dissdata['diss_query'];?></p>
        <p><?php echo $dissdata['diss_date']?></p>

                <!-- <div class="card-footer">
              <a href="javascript:void();" class="card-link">Add Comment</a>
              <a href="javascript:void();" class="card-link">Reply</a>
           </div> -->
			</div>
		</div>
	   </div>
  </div>
  <hr>
	<div id="new-comment">
    
</div>
  
<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <form id="personal-info" method="post">
                
                
                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                 Add Comment
                </h4>
                
               
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Your Answer</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-9" name="txt" required></textarea>
                  </div>
                </div>
                <div class="form-footer">
                    <input type="reset" class="btn btn-danger" value="RESET">
                <input type="submit" class="btn btn-success" name="send" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<br>
	<!--End Row-->
	
   <!--End Row-->


  <!--End Row-->


    <!--End Row-->
	
    
	<!--<div class="row">
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
		 </div>-->
	     <!--  <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                  <thead>
                   <tr>
                     
                     <th>Product</th>
                     <th>Amount</th>
                     <th>Status</th>
                     <th>Completion</th>
                     <th>Date</th>
                   </tr>
                   </thead>
           <tbody><tr>
                    <td>
                      
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
	</div><!--End Row-->

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
    <script src="ajax.js" type="text/javascript"></script>
<script src="jquery-3.4.1.js" type="text/javascript"></script>
  <script>
     $(document).ready(function() {
      //Default data table
      
      setInterval(function(){
            
            
            notification_display();
            count();
            
        },500);
        setInterval(function(){
            
            
           
            new_data();
        },1000);
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
       
         function new_data()
        {
          $.ajax({
               url: "display-student-discussion-data.php",
               type:"POST",
               data:{disid:<?php echo $_GET['disid'];?>},
               success:function(data)
               {
                  $('#new-comment').html(data);
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
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
  <!-- Index js -->
  <script src="../assets/js/index.js"></script>

  
</body>

<!-- Mirrored from codervent.com/bulona/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:01:24 GMT -->
</html>
