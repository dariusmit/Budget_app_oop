<?php

declare(strict_types=1);

namespace Drago\Mvc1\Controllers;

use Drago\Mvc1\Models\DataModel;
use Drago\Mvc1\Models\DbModel;

class Controller {

    public function connectModel() {

        $dataModel = new DataModel(); 
        $dbModel = new DbModel();

        $dataModel->readFiles($_FILES);
        $dataModel->parseData();
        $dataModel->callRender();
        $dbModel->importToDB($dataModel->getContents());

    }

}