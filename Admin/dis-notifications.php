<?php
include '../conn/conn.php';

session_start();
if(!isset($_SESSION['aid']))
{
    header("location:logout.php");
}

        ?>
<script>
function confirm_delete()
{
	var x=confirm("Are You Sure You Want To Remove??");
	if(x)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/bulona/demo/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:20:31 GMT -->
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
  <!--Data Tables -->
  <link href="../assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!-- animate CSS-->
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../assets/css/app-style.css" rel="stylesheet"/>
 
<script src="ajax.js" type="text/javascript"></script>
<script src="jquery-3.4.1.js" type="text/javascript"></script>

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
<?php include './themepart/header.php';?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    
    <!-- End Breadcrumb-->
      <!-- End Row-->


      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Notifications Data</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Notification</th>
                        <th>From</th>
                        
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="notifications-data">
                    <tr>
                        
                    </tr>
                    
                </tbody>
                
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

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

  <!--Data Tables js-->
  <script src="../assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="../assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>
  <script src="../assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="../assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>
    <script>
     $(document).ready(function() {
      //Default data table
       
      setInterval(function(){
            
            
            display();
            notification_display();
            count();
            
        },500);
        
        function display()
        {
            $.ajax({
               url: "display-notification-data.php",
               type:"POST",
               success:function(data)
               {
                   $('#notifications-data').html(data);
               }
            });
        }
        
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
                  $('#notif-count').html(data);
               }
            });
        }
      
      } );
      
      

    </script>
	
</body>

<!-- Mirrored from codervent.com/bulona/demo/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:21:02 GMT -->
</html>
