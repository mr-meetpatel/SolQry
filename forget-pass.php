<?php
include './conn/conn.php';
session_start();

$user= mysqli_query($con, "select * from user_type_master");
if(isset($_POST['btn']))
{
    $email= mysqli_real_escape_string($con,$_POST['email']);
    
    if($_POST['user']==1)
    {
       $select= mysqli_query($con, "select * from admin_master where admin_email='{$email}'");
    $data= mysqli_fetch_array($select);
    if(mysqli_num_rows($select)==1)
    {
       $random=rand(100000,999999);
       $_SESSION['rand']=$random;
       $_SESSION['faid']=$data['admin_id'];
      // echo $random;
      header("location:admin-forget-password.php");
       
    }
    else
    {
        echo "<script>alert('Admin Email not exist in system');</script>";
    } 
    }
    elseif ($_POST['user']==2) {
      $select= mysqli_query($con, "select * from faculty_master where f_email='{$email}'");
      $data= mysqli_fetch_array($select);
      if(mysqli_num_rows($select)==1)
      {
         $random=rand(100000,999999);
         $_SESSION['rand']=$random;
        // echo $random;
        $_SESSION['ffid']=$data['f_id'];
         header("location:faculty-forget-password.php");
         
      }
      else
      {
          echo "<script>alert('Faculty Email not exist in system');</script>";
      } 
}
elseif($_POST['user']==3){
  $select= mysqli_query($con, "select * from student_master where stu_email='{$email}' ");
  $data= mysqli_fetch_array($select);
  if(mysqli_num_rows($select)==1)
  {
     $random=rand(100000,999999);
     $_SESSION['rand']=$random;
    // echo $random;
    $_SESSION['fsid']=$data['stu_id'];
     header("location:student-forget-password.php");
     
  }
  else
  {
      echo "<script>alert('Student Email not exist in system');</script>";
  } 
}
   elseif($_POST['user']==4){
    $select= mysqli_query($con, "select * from parent_master where admin_email='{$email}' ");
    $data= mysqli_fetch_array($select);
    if(mysqli_num_rows($select)==1)
    {
       $random=rand(100000,999999);
       $_SESSION['rand']=$random;
       $_SESSION['fpid']=$data['par_id'];
      // echo $random;
       header("location:parent-forget-password.php");
       
    }
    else
    {
        echo "<script>alert('Parent Email not exist in system');</script>";
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
		  <div class="card-title text-uppercase text-center py-3">Forget Password</div>
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
			  
			<div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-primary">
               
               
			  </div>
			 </div>
			
			</div>
                      <input type="submit" class="btn btn-primary btn-block" name="btn"value="Forget Password" >
			  
			  
			 
			 
			 </form>
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
  
</body>

<!-- Mirrored from codervent.com/bulona/demo/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:29 GMT -->
</html>
