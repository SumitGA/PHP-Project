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
         <?php
	  //load the class
	  require_once("class/connection.class.php");
	  require_once("class/notes.class.php");
	  //get the value passed to the url 
	  $semester=isset($_GET['semester'])? $_GET['semester'] : '';
	 
	 
	  //create an object
	  $objnotes=new Note();
	  $objnotes->setSemester($semester);
	  $objnotes->setFaculty(1);
	  //call the method
	  $objnotes=$objnotes->view_notes();
	
	    
	  ?>
    <h2>Download Notes</h2>
      
       
      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
      
          <tr>
            <th>Subject</th>
            <th>Faculty</th>
            <th>Semester</th>
            <th>Download </th>
           
          </tr>
          
        </thead>
        
        <tbody>
       
          <tr>
           <?php if($objnotes >0){ 
		foreach($objnotes as $key=>$value){?>
            <td><?php echo $value['subject'];?></td>
            <td><?php if($value['faculty']==0){echo "Bsc.CSIT";}  elseif($value['faculty']==1) { echo "BIM" ;} elseif($value['faculty']==2){echo "BSW"; }?></td>
            <td><?php echo $value['semester']; ?></td>
       		<td><a href="uploads/notes/<?php echo $value['content_link']; ?>">Download</a></td>
          </tr>
       
          <?php }} ?>
        </tbody>
      </table>
    
    
    </ul>
        <br class="clear" />
      </div>
   
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