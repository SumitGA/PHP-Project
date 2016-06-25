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
          
         <h2>Provide us your Feedback</h2>
<form action="process/process_add_feedback.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="605" height="159" border="1">
    <tr>
      <th width="163" height="31" scope="row">Your Name</th>
      <td width="426"><p>
        <label for="name"></label>
        <input type="text" name="name" id="name">
        <br>
      </p></td>
    </tr>
    <tr>
      <th height="24" scope="row">Email</th>
      <td><label for="email"></label>
        <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <th height="24" scope="row">Feedback</th>
      <td><label for="semester"></label>
        <label for="feedback"></label>
        <textarea name="feedback" id="feedback" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <th height="29" scope="row">Select Image</th>
      <td><label for="image"></label>
      <input type="file" name="image" id="image"></td>
    </tr>
    <tr>
      <th height="37" colspan="2" scope="row"><input type="submit" name="addfeedback" id="addfeedback" value="Add Feedback">
      <input type="reset" name="reset" id="reset" value="Reset"></th>
    </tr>
  </table>
</form>

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