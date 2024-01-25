<?php

declare(strict_types=1);

namespace Drago\Mvc1\Controllers;

class UploadController {

    public function fileUpload() {

        require __DIR__ . '/../Views/UploadView.php';

        if(isset($_FILES['transactions'])) {
            $errors     = array();
            $maxsize    = 2097152;
            $acceptable = array('text/csv');
        
            if(($_FILES['transactions']['size'] >= $maxsize) || ($_FILES["transactions"]["size"] == 0)) {
                $errors[] = 'Failas per didelis. Dydis negali viršyti 2MB.';
            }
        
            if(!in_array(mime_content_type($_FILES['transactions']['tmp_name']), $acceptable) && (!empty(mime_content_type($_FILES['transactions']['tmp_name'])))) {
                $errors[] = 'Netinkamas failas. Galima įkelti tik CSV failus sukurtus pagal šabloną.';
            }
        
            if(count($errors) === 0) {
                move_uploaded_file(
                    $_FILES['transactions']['tmp_name'],
                    STORAGE_PATH . '/' . $_FILES['transactions']['name']
                );
            } else {
                foreach($errors as $error) {
                    echo '<script>alert("'.$error.'");</script>';
                }
            }
        }
 
    }

}
