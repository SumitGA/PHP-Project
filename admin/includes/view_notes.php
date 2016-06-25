<?php 
//load the class
require_once("../class/connection.class.php");
require_once("../class/notes.class.php");

//create an object
$objnotes=new Note();
//call the method
$note_list=$objnotes->view_notes();
//display the result

?>


<table width="635" height="126" border="1">
  <tr>
    <th width="86" height="35" scope="col">Content Id</th>
    <th width="117" scope="col">Uploaded Date</th>
    <th width="73" scope="col">Faculty</th>
    <th width="89" scope="col">Semester</th>
    <th width="96" scope="col">Subject</th>
    
    <th width="69" scope="col">Delete</th>
  </tr>
  <?php if($note_list >0){ 
foreach($note_list as $key=>$value){?>

  <tr>
   <td height="44"><?php echo $value['contentid']; ?></td>
    <td><?php echo $value['uploaded_date']; ?></td>
    <td><span class="label label-success"><?php if($value['faculty']==0){echo "Bsc.CSIT";} ?></span><span class="label label-success"><?php if($value['faculty']==1) { echo "BIM" ;} ?></span><span class="label label-danger"><?php if($value['faculty']==2){echo "BSW"; }?></td>
    <td><?php echo $value['semester']; ?></td>
    <td><?php echo $value['subject']; ?></td>
    
    <td><a href="index.php?menu=notes&action=delete_notes&id=<?php echo $value['contentid']; ?>">Delete</td>
  </tr>
  <tr>
  <?php }}else{?>
    <td height="37" colspan="7">No Records</td>
  </tr>
  <?php }?>
</table>
<p>&nbsp;</p>
