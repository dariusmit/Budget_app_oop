<?php

declare(strict_types=1);

namespace Drago\Mvc1\Models;

class AmountsModel {

    private array $amounts = [];

    public function makeAmountsArray($contents) {

         foreach ($contents as $value) {
            foreach ($value as $value1) {

                $value['Amount'] = floatval(str_replace(['$', ','], '', $value['Amount']));
                $this->amounts[] = round($value['Amount'], 2);

                break;
                
            }
        }

    }

    public function getAmounts() {

        return $this->amounts;

    }

}