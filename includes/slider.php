<?php 
//load the classes
require_once("class/connection.class.php");
require_once("class/slider.class.php");

//prepare the objects 
$objslider=new Slider();

//call the method
$slider_list=$objslider->view_sliders();

?>

<div class="wrapper col2">

  <div id="featured_slide">
  <?php foreach($slider_list as $key=>$value){ ?>
    <div class="featured_box"><a href="#"><img src="uploads/sliders_images/<?php echo $value['image_link']; ?>" alt="" /></a>
      <div class="floater">
        <h2><?php echo $value['slider_title']; ?> </h2>
        <p><?php if(strlen($value['slider_description'])>25){ echo substr($value['slider_description'],0,450); ?></p>
        
        <?php }else{ ?>
        <p><?php echo $value['slider_description']; }?></p>
      </div>
    </div>
    <?php }?>
   
  </div>
</div>