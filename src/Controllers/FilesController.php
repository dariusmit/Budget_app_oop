<?php

declare(strict_types=1);

namespace Drago\Mvc1\Controllers;

class FilesController {

    public static function showFiles($filesNames) {

        require __DIR__ . '/../Views/FilesView.php';
 
    }

}