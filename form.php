<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload form</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="lastname">Name:</label>
        <input type="text" name="name" id="name">
        <label for="imageUpload">Upload a profile picture:</label>
        <input type="file" name="avatar" id="imageUpload" />
        <button type="submit" name="submit">Upload</button>

    </form>
</body>

</html>