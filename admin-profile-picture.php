<!DOCTYPE html>
<html>
<head>
    <title>Add/Edit Administrator Profile Picture</title>
</head>
<body>
  <form enctype="multipart/form-data" method="post" action="admin-upload.php">
    <div class="row">
      <label for="fileToUpload">Select a File to Upload</label><br />
      <input type="file" name="fileToUpload" id="fileToUpload" />
    </div>
    <div class="row">
      <input type="submit" value="Upload" />
    </div>
  </form>
</body>
</html>