<?php
include '../conn/conn.php';
session_start();

/*if(isset($_POST['btn']))
{
    $name= strtoupper(mysqli_real_escape_string($con,$_POST['name']));
    $gender= mysqli_real_escape_string($con,$_POST['gender']);
    $phn= mysqli_real_escape_string($con,$_POST['phn']);
    
    //$branch= mysqli_real_escape_string($con,$_POST['branch']);
    
    
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $pass= sha1(mysqli_real_escape_string($con,$_POST['pass']));
    $cpass= sha1(mysqli_real_escape_string($con,$_POST['cpass']));
    
    $checkphn=mysqli_query($con,"select * from faculty_master where f_phn='{$phn}'");
    $checkphndata= mysqli_fetch_array($checkphn);
   $checkphnrow= mysqli_num_rows($checkphn);
    $checkemail=mysqli_query($con,"select * from faculty_master where f_email='{$phn}'");
    $checkemaildata= mysqli_fetch_array($checkemail);
    $checkemailrow= mysqli_num_rows($checkemail);
    if($checkphnrow!=0)
    {
        $sweet_error=1;
        $reason="Check Phone Number Correctly...";
        
    }
    if($checkemailrow!=0)
    {
        $sweet_error=1;
        $reason="Check Email Id Correctly...";
    }
    if(!isset($sweet_error)){
       if($pass==$cpass )
    {
        
            
                
                   $q= mysqli_query($con,"INSERT INTO `faculty_master` (`u_id`, `b_id`, `f_name`, `f_gender`, `f_phn`, `f_email`, `f_pass`,  `staus`) VALUES ( '2', '{$_SESSION['b_id']}', '{$name}', '{$gender}', '{$phn}', '$email', '{$pass}',  '1');");
                   if($q)
                   {
                       // echo "<script>alert('Signup Successfully');window.location='add-faculty.php';</script>";
                      $sweet_success=1;
                       //echo  "<script>sweet_success();</script>";
                       
                   }
                   else {
                       $sweet_error=1;
                        //echo "<script>sweet_alert();</script>";
                        
                   }
               
              
        
            
    }
    else {
    // echo "<script>alert('Password and Confirm Password not match')</script>"; 
        $passerror=1;
    } 
    }
    
}*/
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
            <h4 class="page-title">Add Faculty Form</h4>
		    
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
                   Personal Info
                </h4>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="name" name="name">
                  </div>
                </div>  
                    
                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                      <input type="radio" id="gender" name="gender" value="male" checked/>
                <label for="inline-radio-primary">Male</label>
                <input type="radio" id="gender" name="gender" value="female" />
                <label for="inline-radio-primary">Female</label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phn" name="phn">
                  </div>
                </div>
                    
               

                
                    
                
                
               
                    
                
                                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                LOGIN  REQUIREMENTS
                </h4>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" id="pass" name="pass" >
                  </div>
                </div>
               <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" id="cpass" name="cpass" >
                  </div>
                </div>
                
                
              </form>
              <div class="form-footer">
                    
                    <button type="submit" class="btn btn-success" id="btn" name="btn" onclick="insertFacaultyData()"  value="submit" id="alert-success"><i class="fa fa-check-square-o" ></i> SAVE</button> 
                </div>
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
    function insertFacaultyData(){
      var req_error=0;
    if(document.getElementById("name").value==""){
      
      requireFieldError("Name is Required...",document.getElementById("name"));
      
      req_error=1;
      return false;
    }
    
    
    if(document.getElementById("phn").value==""){
      requireFieldError("Phone Number is Required...",document.getElementById("phn"));
     
      req_error=1;
      return false;
    }
    if(document.getElementById("email").value==""){
      requireFieldError("Email is Required...",document.getElementById("email"));
      req_error=1;
      return false;
    }
    if(document.getElementById("pass").value==""){
      requireFieldError("Password is Required...",document.getElementById("pass"));
      req_error=1;
      return false;
    }
    if(document.getElementById("cpass").value==""){
      requireFieldError("Confirm Password is Required...",document.getElementById("cpass"));
      req_error=1;
      return false;
    }
    if(req_error==0){
      var name=document.getElementById("name").value;
      var gender = document.getElementById("gender").value
      var phn=document.getElementById("phn").value
      var email=document.getElementById("email").value
      var pass=document.getElementById("pass").value
      var cpass=document.getElementById("cpass").value
      if(pass==cpass){
        $.ajax({
                   url:"insert-faculty-data.php",
                   type:"POST",
                   data:{name:name,gender:gender,phn:phn,email:email,pass:pass,cpass:cpass},
                   success:function(data)
                   {
                    
                    if(data=="Registration Successfull..."){
                      swal({
                    title:"Registration Successfully!!",
                    text:"Your Data is Saved...",
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
                    swal("Registration Fail!!", data, "error");
                   }
                  });
      }
      else{
        
        requireFieldError("Password & Confirm password are not matching", document.getElementById("cpass"))
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
    function sweet_success(){
                  swal("Registration Successfull!!", "", "success");
              }
              function sweet_alert(){
                  swal("Registration Fail!!", "", "error");
              }
              function sweet_error(){
                  swal("Registration Fail!!", "Password and Confirm Password Not Match...", "error");
              }
    </script>
   
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

<!-- Mirrored from codervent.com/bulona/demo/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:26 GMT -->
</html>
