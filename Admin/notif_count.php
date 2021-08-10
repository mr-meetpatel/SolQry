 <?php 
 include '../conn/conn.php';
 session_start();
 $countnotification= mysqli_query($con, "select count('n_id') from notification_master where status='1' and n_to='Admin' and b_id='{$_SESSION['b_id']}' and id='{$_SESSION['aid']}'");
    $countdata= mysqli_fetch_array($countnotification);
    
    
    if($countdata[0]>0)
    {
      echo $countdata[0];  
    }
 else {
echo $countdata[0];        
}
 
   
?>
    