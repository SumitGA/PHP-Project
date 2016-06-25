<?php
//load classes
require_once('class/connection.class.php');
require_once('class/notice.class.php');
//create and object 
$objnotice=new Notice();
//call the function 
$objnotice=$objnotice->view_notices('5');
/*echo "<pre>";
print_r($objnotice);
echo "</pre>";*/

 
?>


<div class="fl_right">
      <h2>Latest Notice from the Administration</h2>
      <ul>
      <?php if($objnotice>0){
	foreach($objnotice as $key=>$value){?>
        <li>
          <div class="imgholder"><a href="#"><img src="uploads/notice_images/<?php echo $value['image_link']; ?>" alt="" /></a></div>
          <p><strong><a href="#"><?php echo $value['notice_title']; ?></a></strong></p>
          <p><?php echo $value['notice_description']; ?></p>
        </li>
        <?php }}?>
        
        
      </ul>
    </div>