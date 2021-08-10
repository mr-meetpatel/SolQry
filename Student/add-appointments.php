<?php
include '../conn/conn.php';
session_start();

$faculty= mysqli_query($con, "select * from faculty_master where b_id='{$_SESSION['sbid']}'");
//$facultydata=mysqli_fetch_array($faculty);
$user= mysqli_query($con, "select * from faculty_master where b_id='{$_SESSION['sbid']}'");
$userdata= mysqli_fetch_array($user);
date_default_timezone_set("Asia/Calcutta");

if(isset($_POST['btn']))
{
    $student= mysqli_query($con, "SELECT
    `appointment_master`.`app_id`
    , `faculty_master`.`f_name`
    , `faculty_master`.`f_id`
    , `appointment_master`.`stu_id`
    , `appointment_master`.`app_date`
    , `appointment_master`.`app_time`
    , `appointment_master`.`appiontment_details`
    , `appointment_master`.`app_status`
FROM
    `appointment_master`
    INNER JOIN `faculty_master` 
        ON (`appointment_master`.`f_id` = `faculty_master`.`f_id`) where `appointment_master`.`f_id`='{$userdata['f_id']}' and `appointment_master`.`app_status`='0' and `appointment_master`.`stu_id`='{$_SESSION['sid']}' ORDER BY  `appointment_master`.`app_id` DESC"); 
    $sdata= mysqli_fetch_array($student);
    
       $date= date('Y-m-d');
        if($sdata['f_id']==$_POST['fid'] && $sdata['app_date']==$date)
        {
            
            
            echo "<script>alert('You can\'t send appointment today pls try tomorrow');</script>";
        }
 else {
    $stuid= $_SESSION['sid'];
     $facultyid=$_POST['fid'];
      $app= mysqli_real_escape_string($con,$_POST['app']);
      
     $q= mysqli_query($con, "INSERT INTO `appointment_master` ( `stu_id`, `u_id`,`b_id`,`f_id`, `appiontment_details`) VALUES ( '{$stuid}','{$userdata['u_id']}','{$userdata['b_id']}', '{$facultyid}','{$app}');");
    $notifications= mysqli_query($con, "INSERT INTO `notification_master` ( `n_from`, `n_to`,`b_id`,`id`,`notification`, `status`) VALUES ( '3', 'Faculty','{$_SESSION['sbid']}','{$facultyid}','New Appointment Added', '1');");
     if($q)
     {
         echo "<script>alert('Appointment Send')</script>";
     } 
 }
    
 
     
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/bulona/demo/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:25 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <?php
  include './themepart/title.html';
  ?>
  <!--favicon-->
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
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
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

   <!--Start sidebar-wrapper-->
   <?php
     include './themepart/sidebar.php';
   ?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<?php 
include './themepart/header.php';
?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Add Appointment</h4>
		    
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <form id="personal-info" method="post">
                
                
                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                 Appointment Info
                </h4>
                <div class="form-group row">
                  <label for="input-6" class="col-sm-2 col-form-label">Faculty</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-6" name="fid" required>
                        <?php 
                        while($row= mysqli_fetch_array($faculty))
                        {
                           
                            echo "<option value='$row[f_id]'>$row[f_name]</option>";
                           
                        }
                        ?>
                        
                    </select>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Appointment Details</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-9" name="app" required></textarea>
                  </div>
                </div>
                <div class="form-footer">
                    <input type="reset" class="btn btn-danger" value="RESET">
                <input type="submit" class="btn btn-success" name="btn" value="APPLY">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->

      <!--End Row-->

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
  
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>

  <!--Form Validatin Script-->
    <script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script>

    $().ready(function() {

    $("#personal-info").validate();

   // validate signup form on keyup and submit
    $("#signupForm").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
             contactnumber: {
                required: true,
                minlength: 10
            },
            topic: {
                required: "#newsletter:checked",
                minlength: 2
            },
            agree: "required"
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            contactnumber: "Please enter your 10 digit number",
            agree: "Please accept our policy",
            topic: "Please select at least 2 topics"
        }
    });

});

    </script>
	
</body>

<!-- Mirrored from codervent.com/bulona/demo/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:26 GMT -->
</html>
