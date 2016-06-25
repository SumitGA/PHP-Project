<h1>Add Slider </h1>

<form action="process/process_add_sliders.php" method="post" enctype="multipart/form-data">
  
  <table width="483" height="139" border="1">
    <tr>
      <th height="33" scope="row">Choose Image</th>
      <td><label for="slider_title"></label>
        <label for="image2"></label>
      <input type="file" name="image" id="image2" /></td>
    </tr>
    <tr>
      <th height="29" scope="row">Slider Title</th>
      <td><label for="slider_description"></label>
        <label for="slider_title2"></label>
      <input type="text" name="slider_title" id="slider_title2" /></td>
    </tr>
    <tr>
      <th height="29" scope="row">Slider Description</th>
      <td><label for="image"></label>
        <label for="slider_description2"></label>
      <textarea name="slider_description" id="slider_description2" cols="45" rows="5"></textarea><label for="image"></label></td>
    </tr>
    <tr>
      <th height="36" colspan="2" scope="row"><input type="submit" name="add_slider" id="add_slider" value="ADD Slider">
      <input type="reset" name="reset" id="reset" value="Reset"></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>