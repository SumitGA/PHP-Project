<h2>Add Admin</h2>
<form action="process/process_add_admins.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="571" height="245" border="1">
    <tr>
      <th height="36" scope="row">User Name</th>
      <td><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <th height="39" scope="row">Password </th>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <th height="41" scope="row">Email</th>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <th height="37" scope="row">Phone</th>
      <td><label for="phone"></label>
      <input type="text" name="phone" id="phone" /></td>
    </tr>
    <tr>
      <th height="38" scope="row">Choose Image</th>
      <th height="38" scope="row"><label for="choose_image"></label>
      <input type="file" name="choose_image" id="choose_image" /></th>
    </tr>
    <tr>
      <th height="38" colspan="2" scope="row"><label for="image"></label>
        <input type="submit" name="cmdsubmit" id="cmdsubmit" value="Add Admin" />
      <input type="reset" name="reset" id="reset" value="Reset" /></th>
    </tr>
  </table>
</form>
