
<html>
<head>
   <title>Upload Form</title>
</head>
<body>
   <form action="index.php/upload/do_upload" method="post" enctype="multipart/form-data">
      <!-- INPUT FILE UPLOAD dibuat "multiple" -->
      <input type="file" name="upload[]" size="20" >
      <input type="file" name="upload2[]" size="20" >
      <input type="submit" value="Upload">
   </form>
 
</body>
</html>