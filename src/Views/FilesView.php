<!DOCTYPE html>
<html>
    <head>
        <style media="all"><?php include_once __DIR__ . '/../Styles/FilesViewStyles.css'; ?></style>
    </head>
    <body>
        <div>
        <h3>Already uploaded files:</h3>
            <?php
                if (count(scandir(STORAGE_PATH)) == 0 || count(scandir(STORAGE_PATH)) == 2) {
                    echo 'Failų nėra.';
                } else {
                    foreach ($filesNames as $file) {
                        echo basename($file) . '</br>';
                    }
                }
            ?>
        </form>
        </div>
    </body>
</html>

