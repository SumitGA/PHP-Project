 
  <?php 
  //load the function 
  require_once("functions/db_connect.php");
  //prepare the sql 
  $sql="SELECT * FROM students_feedback ORDER BY feedback_id DESC";
  //execute the sql 
  $res=mysqli_query($conxn,$sql)or trigger_error($conxn);
  $feedback_list = array();

//decisive paramters

$numRows = mysqli_num_rows($res);

//loop through the records 
if($numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($res)){
		array_push($feedback_list,$row);
	} //loop ends
}//if ends
	
	
  ?>

      
     <div class="column2">
    <h2>Student's feedback!</h2> 
    <div class="slider">
  <?php if($feedback_list >0){
	   foreach($feedback_list as $key=>$value){ ?>  
   


<img class="imgl" src="uploads/<?php echo $value['image_link']; ?>" alt="" height="80px" width="80">
<p><b><u><?php echo $value['student_name']; ?></u></b></p>
<p><?php echo $value['feedback']; ?></p>
<p align="right"><?php echo $value['email']; ?></P>

 <br />  
 <hr />
 

<?php }}?>
</div>	   
   



        
      </div>
      

  
     