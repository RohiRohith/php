<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Page</title>
</head>
<body>

    <h2>Welcome to the Upload Page</h2>

    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" accept="image/*"><br>

        <input type="submit" value="Upload">
    </form>

    <a href="download_page.php">Download Image</a>

</body>
</html>
