<?php
include '../conn/conn.php';
session_start();
if(!isset($_GET['aaid']))
{
    header("location:dis-appointments.php");
}
$faculty= mysqli_query($con, "SELECT
    `appointment_master`.`app_id`
    , `student_master`.`stu_name`
    , `student_master`.`stu_id`
    , `appointment_master`.`appiontment_details`
    , `appointment_master`.`f_id`
    , `appointment_master`.`app_status`
FROM
    `student_master`
    INNER JOIN `appointment_master` 
        ON (`student_master`.`stu_id` = `appointment_master`.`stu_id`) where `appointment_master`.`app_id`='{$_GET['aaid']}' ;") or die(mysqli_error($con));
$facultydata= mysqli_fetch_array($faculty);

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
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
                <form id="myForm" method="post">
                
                
                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                 Appointment Info
                </h4>
                <div class="form-group row">
                  <label for="input-6" class="col-sm-2 col-form-label">Student Name</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="input-4" name="name" readonly="true" value="<?php echo $facultydata['stu_name']?>" required>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Appointment Details</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-9" name="app"  readonly="true" required><?php echo $facultydata['appiontment_details']?></textarea>
                  </div>
                </div>
                    
                   <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Appointment Date</label>
                  <div class="col-sm-10">
                      <input type="date"  class="form-control" id="app-date" name="app-date" min="<?php echo date('Y-m-d');?>" required="">
                  </div>
                </div>
                    
                    <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Appointment Time</label>
                  <div class="col-sm-10">
                      <input type="time" name="app-time" id="app-time" class="form-control">
                  </div>
                </div>
                
              </form>
              <div class="form-footer">
                    
                <button type="submit" onclick="appointmentAccept()" class="btn btn-success" name="btn" value="APPLY">Save</button>
                </div>
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
  <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="../assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
    <script>
      function appointmentAccept(){
        var req_error=0;
        if(document.getElementById("app-date").value==""){
          req_error=1;
          requireFieldError("Appointment Date is Required",document.getElementById("app-date"));
          return false;
        }
        if(document.getElementById("app-time").value==""){
          req_error=1;
          requireFieldError("Appointment Time is Required",document.getElementById("app-time"));
          return false;
        }

        if(req_error==0){
          var date=document.getElementById("app-date").value;
          var time=document.getElementById("app-time").value;
          $.ajax({
                   url:"insert-appointment-accept-data.php",
                   type:"POST",
                   data:{aaid:<?php echo $_GET['aaid'];?>,sid:<?php echo $facultydata['stu_id'];?>,status:1,date:date,time:time},
                   success:function(data)
                   {
                    
                    if(data=="Appointment Accept."){
                      swal({
                    title:"Appointment Accepted!!",
                    text:"Your Data is Saved...",
                    icon:"success",
                    button:true,
                   
                })
                .then((x)=>{
                   if(x){
                    document.getElementById("myForm").reset();
                    window.location="dis-appointments.php";
                   } 
                });
                      
                    }
                
                    else
                    swal("Fail!!", data, "error");
                   }
                  });
        }

      }
      function requireFieldError(msg,obj){
      swal({
                    title:"Fail!!",
                    text:msg,
                    icon:"error",
                    button:true,
                   
                })
                .then((x)=>{
                   if(x){
                    
                    obj.focus();
                    
                   } 
                });
    }
//     $().ready(function() {

//     $("#personal-info").validate();
    

//    // validate signup form on keyup and submit
//     $("#signupForm").validate({
//         rules: {
//             firstname: "required",
//             lastname: "required",
//             username: {
//                 required: true,
//                 minlength: 2
//             },
//             password: {
//                 required: true,
//                 minlength: 5
//             },
//             confirm_password: {
//                 required: true,
//                 minlength: 5,
//                 equalTo: "#password"
//             },
//             email: {
//                 required: true,
//                 email: true
//             },
//              contactnumber: {
//                 required: true,
//                 minlength: 10
//             },
//             topic: {
//                 required: "#newsletter:checked",
//                 minlength: 2
//             },
//             agree: "required"
//         },
//         messages: {
//             firstname: "Please enter your firstname",
//             lastname: "Please enter your lastname",
//             username: {
//                 required: "Please enter a username",
//                 minlength: "Your username must consist of at least 2 characters"
//             },
//             password: {
//                 required: "Please provide a password",
//                 minlength: "Your password must be at least 5 characters long"
//             },
//             confirm_password: {
//                 required: "Please provide a password",
//                 minlength: "Your password must be at least 5 characters long",
//                 equalTo: "Please enter the same password as above"
//             },
//             email: "Please enter a valid email address",
//             contactnumber: "Please enter your 10 digit number",
//             agree: "Please accept our policy",
//             topic: "Please select at least 2 topics"
//         }
//     });
    

// });

    </script>
    <script>
     
    </script>
</body>

<!-- Mirrored from codervent.com/bulona/demo/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:26 GMT -->
</html>
