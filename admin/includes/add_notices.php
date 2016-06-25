<h2>Add Notices</h2>
<form action="process/process_add_notices.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="534" height="124" border="1">
    <tr>
      <th height="26" scope="row">Notice Title</th>
      <td><label for="title"></label>
      <input type="text" name="title" id="title"></td>
    </tr>
    <tr>
      <th height="27" scope="row">Notice Description</th>
      <td><label for="description"></label>
      <textarea name="description" id="description" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <th height="30" scope="row">Image Upload</th>
      <td><label for="image"></label>
      <input type="file" name="image" id="image"></td>
    </tr>
    <tr>
      <th height="29" colspan="2" scope="row"><input type="submit" name="cmdsubmit" id="cmdsubmit" value="Add Notice">
      <input type="reset" name="reset" id="reset" value="Reset"></th>
    </tr>
  </table>
</form>
