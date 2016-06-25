<?php require_once('includes/header.php'); ?>
<?php require_once('includes/topnav.php'); ?>
<?php require_once('includes/nav.php'); ?>
<?php require_once('includes/slider.php'); ?>

<div class="wrapper col3">
<div id="homecontent">

<!-- containded informations -->

<p><p><p>
<form method="post"  id="userForm" action="process/process_apply_online.php" >
<p align="justify">
<h2 style="padding:5px;">Apply Online</h2>
<div class="hr"></div>
<div id="respond">
<table width = 98% cellspacing=0 cellpadding=0 border=0>
<tr><td>
<p align="justify">
<table border=1 bordercolor=#781D7D cellspacing=0 cellpadding=0 align=center width=65%>
<tr><th colspan=2><h2 align="center"><b>Online Admission Form</b><h2></th></tr>
	<tr>
		<td colspan=2>
<p align="justify">We are now running the two IT coureses of Bachelor level i.e.BIM and BSCcsIT and we have also recently launcheda new course i.e.BSW if anybody like to Join this college please Fill up this online Form</p></td>
	</tr>
    
	<tr>
		<td><p align="left">Last Name (*)</p></td>
		<td><p align="left"><input type="text" value="" size="20"  name=lname /></p></td>
	</tr>
	<tr>
		<td><p align="left">First Name (*)</p></td>
		<td><p align="left"><input type="text" value="" size="20"  name=fname id="fname" /></td>
	</tr>
	<tr>
		<td> <p align="left">Address</td>
		<td><p align="left"><input type="text" value="" size="20"  name="address" id="address" /></td>
	</tr>
	<tr>
		<td><p align="left">Phone No. (*)</td>
		<td><p align="left"><input type="text" value="" size="20"  name="phnumber" id="phnumber" /></td>
	</tr>
	<tr>
		<td><p align="left">Mobile No. (*)</td>
		<td><p align="left"><input type="text" value="" size="20"  name="mobnumber" id="mobnumber" /></td>
	</tr>
	<tr>
		<td><p align="left">Email Address (*)</td>
		<td><p align="left"><input type="text" value="" size="20"  name="email" id="email" /></td>
	</tr>
	<tr>
		<td><p align="left">College Name</td>
		<td><p align="left"><textarea cols="50" rows="5" name="colname" id="colname" >From where your have completed plus 2</textarea></td>
	</tr>
	<tr>
		<td><p align="left">Plus 2 Background</td>
		<td><p align="left">
		<input  name="plus2" type="radio" value="0" id="plus2"  />
		<label for="plus2">Management</label>
		<input  name="plus2" type="radio" value="1" id="plus21"  />
		<label for="plus21">Science</label>
		<input  name="plus2" type="radio" value="2" id="plus22"  />
		<label for="plus22">Humanities</label>
		<input  name="plus2" type="radio" value="3" id="plus23"  />
		<label for="plus23">Others</label>
		</p>
		</td>
	</tr>
	<tr>
		<td><p align="left">Board</td>
		<td><p align="left">
			<input  name="board" type="radio" value="0" id="board0"  />
			<label for="board0">HSEB</label>
			<input  name="board" type="radio" value="1" id="board1" />
			<label for="board1">GCE , A Level</label>
			<input  name="board" type="radio" value="2" id="board2"  />
			<label for="board2">Other </label>
		</p>
		</td>
	</tr>
	<tr>
		<td><p align="left">Program you Like to Join</td>
		<td><p align="left"><input  name="prgm" type="radio" value="0 " id="pgm0"  />
		<label for="pgm0">BIM </label>
		<input  name="prgm" type="radio" value="1" id="pgm1"  />
		<label for="pgm1">BScCSIT</label>
        <input  name="prgm" type="radio" value="2" id="pgm2"  />
		<label for="pgm2">BSW</label>
		</p>
		</td>
	</tr>
	<tr>
		<td><p align="left">How you know about this college?</td>
		<td><p align="left"><textarea cols="50" rows="5" name="abtcol" id="abtcol" ></textarea>
		</td>
	</tr>
	<tr>
		<td colspan=2 align=center>
		<input type="submit" value="Submit" name="submit" id="submit"  />
		&nbsp;&nbsp;
		<input type="reset" value="Reset" name="reset"  />
		</td>
	</tr>
</table>

</form>


</p>
</td>
</tr>
</table>
</div>


</p>

</div>
</div>
</div>




<?php require_once('includes/footer.php'); ?>