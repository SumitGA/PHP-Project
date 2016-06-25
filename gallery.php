<?php
require_once('includes/header.php'); 
?>
<body>
<!-- top navigation -->
<?php require_once('includes/topnav.php'); ?>
<!-- ####################################################################################################### -->
<!-- navigations -->

<?php require_once('includes/nav.php'); ?>


<!--####################################################################################################### -->
<!-- Slider menu -->

<?php require_once('includes/slider.php'); ?>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
      <div class="column2">
        <ul>
        
         
         <div class="column2">
        <ul>
          <li>   
            <h2 >Image Gallery</h2>
            <p>Welcome to the Image Gallery of Orchid International College. We have collected some of the best images that were the most perfect shots till date in the history of Orchid Colleges. The images collection comprise of both the Bsc.CSIT as well as BIM.</p>
            
    <script type="text/javascript" >       
            $(document).ready(function(){
    $('#myslides').cycle({fit: 1});});
      </script>     
          <?php
		  
		require_once('class/connection.class.php');
		require_once('class/gallery.class.php');
		
		//create object
	$objimage=new Gallery();
	//call the function 
	$objimage=$objimage->view_gallery();
	/*echo "<pre>";
	print_r($objimage);
	echo "</pre>";	
		*/
		  
$directory = 'uploads/gallery/'; 	
try {    	
	// Styling for images	
	echo "<div id=\"myslides\">";	
	foreach ( new DirectoryIterator($directory) as $item ) {			
		if ($item->isFile()) {
			$path = $directory . "/" . $item;	
			echo "<img src=\"" . $path . "\" />";	
		}
	}	
	echo "</div>";
}	
catch(Exception $e) {
	echo 'No images found for this slideshow.<br />';	
}
?>
     </li>     
          
        </ul>
        <br class="clear" />
      </div>
         </ul>
        <br class="clear" />
      </div>
      <?php require_once('includes/feedback.php');?>
    </div>
    <?php require_once('includes/notice.php'); ?>
    
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<!-- Footers -->
<?php require_once('includes/footer.php'); ?>
</body> 
</html>