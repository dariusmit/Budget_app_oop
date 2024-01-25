<?php

declare(strict_types=1);

namespace Drago\Mvc1\Controllers;

use Drago\Mvc1\Models\DataModel;
use Drago\Mvc1\Models\TotalsModel;

class RenderController {

    public function render($contents, $totals) {

        require __DIR__ . '/../Views/TableView.php';

    }

}