<!DOCTYPE html>
<html>
    <head>
        <style media="all"><?php include_once __DIR__ . '/../Styles/UploadFormStyles.css'; ?></style>
    </head>
    <body>
        <div>
        <h3>Upload transaction files from 'CSV samples' folder</h3>
        <form action="/" method="post" enctype="multipart/form-data">
        <input type="file" name="transactions" />
        <button class="button" type="submit">Upload file</button>
        </form>
        </div>
    </body>
</html>

