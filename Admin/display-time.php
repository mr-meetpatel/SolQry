<?php
include '../conn/conn.php';

session_start();
if(isset($_POST['eid']) && $_POST['eid']!=0){

$data=mysqli_query($con,"select * from events where id='{$_POST['eid']}'");
$data_row=mysqli_fetch_array($data);
?>
<div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Event Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="input-4" name="start_date" min="<?php echo  date('Y-m-d');?>" value="<?php echo $data_row['start_event'];?>" required>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Start Event time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" id="input-4" name="start_time" value="<?php echo $data_row['start_event_time'];?>"  required>
                  </div>
                </div>
                    
               
                    
                    <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">End Event time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" id="input-4" name="end_time" value="<?php echo $data_row['end_event_time'];?>" required>
                  </div>
                </div>
                <div class="form-footer">
                    <!-- <button type="submit" class="btn btn-danger" ><i class="fa fa-times"></i> CANCEL</button> -->
                    <button type="submit" class="btn btn-success" name="btn" value="submit"><i class="fa fa-check-square-o" ></i> SAVE</button>
                </div>
<?php
}
?>