<?php
include '../conn/conn.php';
$branch= mysqli_query($con, "select * from branch_master");
if(isset($_POST['btn']))
{
    $name= strtoupper(mysqli_real_escape_string($con,$_POST['name']));
    $gender= mysqli_real_escape_string($con,$_POST['gender']);
    $phn= mysqli_real_escape_string($con,$_POST['phn']);
    
    $branch= mysqli_real_escape_string($con,$_POST['branch']);
    
    
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $pass= sha1(mysqli_real_escape_string($con,$_POST['pass']));
    $cpass= sha1(mysqli_real_escape_string($con,$_POST['cpass']));
    
    if($pass==$cpass)
    {
        
            
                
                   $q= mysqli_query($con,"INSERT INTO `admin_master` ( `b_id`, `u_id`, `admin_name`,`admin_gender` ,`admin_email`, `admin_pass`,  `admin_phn`) VALUES ( '{$branch}', '1', '{$name}', '{$gender}','{$email}', '{$pass}',  '{$phn}');") or die(mysqli_error($con));
                   if($q)
                   {
                        echo "<script>alert('Signup Successfully')</script>";
                   }
                   else {
                        echo "<script>alert('Signup UnSuccessfully')</script>";
                   }
                
               
        
            
    }
    else {
     echo "<script>alert('Password and Confirm Password not match')</script>";   
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
   <?php //include './themepart/sidebar.php';?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<?php //include './themepart/header.php'?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Admin Form</h4>
		    
	   </div>
	   
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
                <form id="personal-info" method="post" enctype="multipart/form-data">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-user-circle-o"></i>
                   Personal Info
                </h4>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-1" name="name" required>
                  </div>
                </div>
                    
                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                      <input type="radio" id="inline-radio-primary" name="gender" value="male" checked/>
                <label for="inline-radio-primary">Male</label>
                <input type="radio" id="inline-radio-primary" name="gender" value="female" />
                <label for="inline-radio-primary">Female</label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-4" name="phn" required>
                  </div>
                </div>
                    
               

                <div class="form-group row">
                  <label for="input-6" class="col-sm-2 col-form-label">Branch</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-6" name="branch" required>
                        <?php 
                        while($row= mysqli_fetch_array($branch))
                        {
                            echo "<option value='$row[b_id]'>$row[b_name]</option>";
                        }
                        ?>
                        
                    </select>
                  </div>
                </div>
                    
                
                
                
                    
                
                                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                LOGIN  REQUIREMENTS
                </h4>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="input-3" name="email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" id="input-3" name="pass" required>
                  </div>
                </div>
               <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" id="input-3" name="cpass" required>
                  </div>
                </div>
                
                <div class="form-footer">
                    <button type="submit" class="btn btn-danger" ><i class="fa fa-times"></i> CANCEL</button>
                    <button type="submit" class="btn btn-success" name="btn" value="submit"><i class="fa fa-check-square-o" ></i> SAVE</button>
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
	
</body>

<!-- Mirrored from codervent.com/bulona/demo/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:26 GMT -->
</html>
