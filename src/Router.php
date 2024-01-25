<?php

declare(strict_types=1);

namespace Drago\Mvc1;

use Drago\Mvc1\Controllers\UploadController;
use Drago\Mvc1\Controllers\Controller;
use Drago\Mvc1\Models\DataModel;

class Router {

    public function route($request) {

        switch ($request) {
            case '':
            case '/':
                $uploadController = new UploadController();
                $uploadController -> fileUpload();
                $controller = new Controller();
                $controller->connectModel();
                break;
        
            default:
                echo '404 - puslapis nerastas';
        }

    }

}