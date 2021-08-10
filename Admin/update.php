<?php

include '../conn/conn.php';
session_start();
date_default_timezone_set("Asia/Calcutta");
$date=date("Y-m-d");
$select= mysqli_query($con, "select * from events where f_id='{$_SESSION['aid']}' and u_id=1 order by id desc");
if(isset($_POST['title']))
{
$id=$_POST['title'];
//$end=$_POST['end'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$update=mysqli_query($con, "update events set start_event_time='{$start_time}',end_event_time='{$end_time}' where id={$id}") or die(mysqli_error($con));
if($update)
{
    echo "<script>alert('Updated..');</script>";
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
  <?php include './themepart/title.html';?>
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
   <?php include './themepart/sidebar.php';?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<?php include './themepart/header.php'?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Add/Update Event Form</h4>
		    
	   </div>
	   
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <form id="myForm" method="post" enctype="multipart/form-data">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-user-circle-o"></i>
                   Event Info
                </h4>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Your Events</label>
                  <div class="col-sm-10">
                      <select name="title" id="eventid" class="form-control" onchange="loadTime(this.value)">
                          <option value="0">Select Event</option>
                          <?php
                          while($row= mysqli_fetch_array($select))
                          {
                              echo "<option value='{$row['id']}'>$row[title]</option>";
                          }
                          ?>
                      </select>
                  </div>
                </div>
                    
                <div class="time-data">
                    
                    </div>
                
                
               

               
                
                
               
                    
                
                              
                
                
              </form>
              
            </div>
          </div>
        </div>
      </div><!--End Row-->

      

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
  <!--Sweet Alert-->
  <script src="../assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>                     
  <!--Form Validatin Script-->
    <script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script>

//    $().ready(function() {
//
//    $("#personal-info").validate();
//
//   // validate signup form on keyup and submit
//    $("#signupForm").validate({
//        rules: {
//            firstname: "required",
//            lastname: "required",
//            username: {
//                required: true,
//                minlength: 2
//            },
//            password: {
//                required: true,
//                minlength: 5
//            },
//            confirm_password: {
//                required: true,
//                minlength: 5,
//                equalTo: "#password"
//            },
//            email: {
//                required: true,
//                email: true
//            },
//             contactnumber: {
//                required: true,
//                minlength: 10
//            },
//            topic: {
//                required: "#newsletter:checked",
//                minlength: 2
//            },
//            agree: "required"
//        },
//        messages: {
//            firstname: "Please enter your firstname",
//            lastname: "Please enter your lastname",
//            username: {
//                required: "Please enter a username",
//                minlength: "Your username must consist of at least 2 characters"
//            },
//            password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long"
//            },
//            confirm_password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long",
//                equalTo: "Please enter the same password as above"
//            },
//            email: "Please enter a valid email address",
//            contactnumber: "Please enter your 10 digit number",
//            agree: "Please accept our policy",
//            topic: "Please select at least 2 topics"
//        }
//    });

//});

    </script>
	<script>
    function addEventTime(){
      var req_error=0;
    if(document.getElementById("stime").value==""){
      
      requireFieldError("Start Time is Required...",document.getElementById("stime"));
      
      req_error=1;
      return false;
    }
    
    
    if(document.getElementById("etime").value==""){
      requireFieldError("End Time is Required...",document.getElementById("etime"));
     
      req_error=1;
      return false;
    }
    
   if(req_error==0){
      var eventid=document.getElementById("eventid").value;
      var stime = document.getElementById("stime").value;
      var etime=document.getElementById("etime").value;
      if(stime<etime){
        $.ajax({
                   url:"update-event-data.php",
                   type:"POST",
                   data:{eventid:eventid,stime:stime,etime:etime},
                   success:function(data)
                   {
                    
                    if(data=="Your Event Time Updated!"){
                      swal({
                    title:"Event Updated!!",
                    text:data,
                    icon:"success",
                    button:true,
                   
                })
                .then((x)=>{
                   if(x){
                    document.getElementById("myForm").reset();
                    
                   } 
                });
                      
                    }
                
                    else
                    swal("Fail To Update!!", data, "error");
                   }
                  });
      }
      else{
        requireFieldError("Start Time Should Smaller End Time",document.getElementById("stime"));
      }
   }
    
    }
    function requireFieldError(msg,obj){
      swal({
                    title:"Registration Fail!!",
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
      
      
      function loadTime(eid){
        $.ajax({
               url: "display-time.php",
               type:"POST",
               data:{eid:eid},
               success:function(data)
               {
                  $('.time-data').html(data);
               }
            });
      }
    </script>
</body>

<!-- Mirrored from codervent.com/bulona/demo/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:26 GMT -->
</html>
