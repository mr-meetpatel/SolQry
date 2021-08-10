<?php
include './conn/conn.php';
session_start();
$login;

$user= mysqli_query($con, "select * from user_type_master");
if(isset($_POST['btn']))
{
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $pass= sha1(mysqli_real_escape_string($con,$_POST['pass']));
    if($_POST['user']==1)
    {
       $select= mysqli_query($con, "select * from admin_master where admin_email='{$email}' and admin_pass='{$pass}'");
       $data= mysqli_fetch_array($select);
    if(mysqli_num_rows($select)==1)
    {
        $_SESSION['aemail']=$data['admin_email'];
        $_SESSION['aid']=$data['admin_id'];
        $_SESSION['b_id']=$data['b_id'];
        $login=1; 
        //echo "<script>alert('Welcome {$data['admin_name']}');window.location='Admin/index.php'</script>";
    }
    else
    {
        $login=0;
        //echo "<script>alert('Email or Password is Invalid pls check');window.location='login.php';</script>";
    } 
    }
    elseif ($_POST['user']==2) {
    $select= mysqli_query($con, "select * from faculty_master where f_email='{$email}' and f_pass='{$pass}' and staus=1");
    $data= mysqli_fetch_array($select);
     mysqli_query($con, "update faculty_master set is_active='0' where f_id='{$data['f_id']}'");
    if(mysqli_num_rows($select)==1)
    {
        $_SESSION['femail']=$data['f_email'];
        $_SESSION['fid']=$data['f_id'];
         $_SESSION['fb_id']=$data['b_id'];
         $login=2;
         mysqli_query($con, "update faculty_master set is_active='1' where f_id='{$data['f_id']}'");
       // echo "<script>alert('Welcome {$data['f_name']}');window.location='Faculty/index.php'</script>";
    }
    else
    { 
        $login=0;
        //echo "<script>alert('Email or Password is Invalid pls check');window.location='login.php'</script>";
    }
}
elseif($_POST['user']==3){
    $select= mysqli_query($con, "select * from student_master where stu_email='{$email}' and stu_pass='{$pass}' and status=1");
    $data= mysqli_fetch_array($select);
    if(mysqli_num_rows($select)==1)
    {
        $_SESSION['email']=$data['stu_email'];
        $_SESSION['sid']=$data['stu_id'];
        $_SESSION['sbid']=$data['b_id'];
        $login=3;
        mysqli_query($con, "update student_master set is_active='1' where stu_id='{$data['stu_id']}'");
        //echo "<script>alert('Welcome {$data['stu_name']}');window.location='Student/index.php'</script>";
    }
    else
    {
        $login=0;
        //echo "<script>alert('Email or Password is Invalid pls check');window.location='login.php'</script>";
    }
}
   
    
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/bulona/demo/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:29 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
<?php include './Student/themepart/title.html';?>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
                  <form method="post">
                        <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only" >User</label>
			   <div class="position-relative has-icon-right">
                               <select name="user" class="form-control" name="user">
                                   <?php while($row= mysqli_fetch_array($user))
                                   {
                                       echo "<option value='$row[u_id]'>$row[u_name]</option>";
                                   }
                                       ?>
                               </select>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only" >Email</label>
			   <div class="position-relative has-icon-right">
                               <input type="email" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Email" name="email">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" name="pass">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-primary">
               
               
			  </div>
			 </div>
			 <div class="form-group col-6 text-right">
			  <a href="forget-pass.php">Reset Password</a>
			 </div>
			</div>
                      <input type="submit" class="btn btn-primary btn-block" name="btn" value="Sign In" >
			  
			  
			 
			 
			 </form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
                      <!-- <p class="text-dark mb-0">Student Do not have an account? <a href="Student/stu-reg.php"> Sign Up here</a></p> -->
                     <!-- <p class="text-dark mb-0">Parent Do not have an account? <a href="Parent/par-reg.php"> Sign Up here</a></p>-->

                 </div>
	     </div>
    
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
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!--Sweet Alert-->
  <script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script>
        
    function asweet_success(){
        
                swal({
                    title:"Login Sucessfull!!",
                    text:"Welcome Admin,Have A Nice Day",
                    icon:"success",
                    button:true,
                   
                })
                .then((x)=>{
                   if(x){
                         
                    window.location='Admin/index.php'  
                   } 
                });

                  //window.location='Admin/index.php';
 
              }
              function fsweet_success(){
                swal({
                    title:"Login Sucessfull!!",
                    text:"Welcome Faculty,Have A Nice Day",
                    icon:"success",
                    button:true,
                    
                })
                .then((x)=>{
                   if(x){
                      
                       window.location='Faculty/index.php'
                   } 
                });

              }
              function ssweet_success(){
                 swal({
                    title:"Login Sucessfull!!",
                    text:"Welcome Student,Have A Nice Day",
                    icon:"success",
                    button:true,
                    
                })
                .then((x)=>{
                   if(x){
                       window.location='Student/index.php'
                   } 
                });
              }
              function sweet_alert(){
                  swal("Login Fail!!", "Email or Password is invalid pls check!!", "error");
                  
              }
              
              
    </script>
    <?php
    if(isset($login))
    {
        if($login==1){
            $data= mysqli_fetch_array($select);
            echo "<script>asweet_success();</script>";
        }
        else if($login==2)
        {
            echo "<script>fsweet_success();</script>";
        }
         else if($login==3)
        {
            echo "<script>ssweet_success();</script>";
        }
        else  {
            echo "<script>sweet_alert();</script>";
        }
    }
    ?>
    
</body>

<!-- Mirrored from codervent.com/bulona/demo/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:29 GMT -->
</html>
