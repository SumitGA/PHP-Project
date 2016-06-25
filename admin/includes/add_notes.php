<h2>Add Notes</h2>
<form action="process/process_add_notes.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="605" height="159" border="1">
    <tr>
      <th width="163" height="31" scope="row">Subject</th>
      <td width="426"><p>
        <label for="subject"></label>
        <input type="text" name="subject" id="subject">
        <br>
      </p></td>
    </tr>
    <tr>
      <th height="24" scope="row">Faculty</th>
      <td><input type="radio" name="radio" id="bsccsit" value="0" />
      <label for="bsccsit">Bsc. CSIT</label></br>
      <input type="radio" name="radio" id="bim" value="1" />
      <label for="bim">BIM</label></br>
      <input type="radio" name="radio" id="bsw" value="2" />
      <label for="bsw">BSW</label></td>
    </tr>
    <tr>
      <th height="24" scope="row">Semester</th>
      <td><label for="semester"></label>
      <input type="text" name="semester" id="semester"></td>
    </tr>
    <tr>
      <th height="29" scope="row">Select File</th>
      <td><label for="upload"></label>
      <input type="file" name="upload" id="upload"></td>
    </tr>
    <tr>
      <th height="37" colspan="2" scope="row"><input type="submit" name="addnote" id="addnote" value="Add Note">
      <input type="reset" name="reset" id="reset" value="Reset"></th>
    </tr>
  </table>
</form>
