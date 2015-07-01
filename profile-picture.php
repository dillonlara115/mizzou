<!DOCTYPE html>
<html>
<head>
    <title>Add/Edit Profile Picture</title>
</head>
<body>

<h4 style="font-size: 14px;">Image should be 150x150px</h4>

  <form enctype="multipart/form-data" method="post" action="upload.php">
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