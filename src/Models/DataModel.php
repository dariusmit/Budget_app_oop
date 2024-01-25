<?php

declare(strict_types=1);

namespace Drago\Mvc1\Models;

use Drago\Mvc1\Controllers\RenderController;
use Drago\Mvc1\Controllers\FilesController;
use Drago\Mvc1\Models\AmountsModel;
use Drago\Mvc1\Models\TotalsModel;

class DataModel {

    private array $fileArray = [];
    private array $filesNames = [];
    private array $contents = [];
    
    private object $amountsModel;
    private object $totalsModel;
    private object $renderController;
    private object $filesController;

    public function readFiles($fileArray) {

        if (count(scandir(STORAGE_PATH)) == 0 || count(scandir(STORAGE_PATH)) == 2) {
        } else {
            
        // Skanuojam direktorija ir sukuriam failu masyva.
        foreach (scandir(STORAGE_PATH) as $file) {
            if (is_dir($file)) {
                continue;
            }
            $this->filesNames[] = STORAGE_PATH . $file;
        }
            
        // Skanuojam failu masyva ir sukuriam ju turinio masyva.
        foreach ($this->filesNames as $file) {
            $file = fopen($file, 'r');
            while (!feof($file)) {
                $contentsPre[] = fgetcsv($file);
            }
            array_pop($contentsPre);
            fclose($file);
        }

        // Sukuriam etikeciu masyva ir pasalinam jas is turinio  masyvo.
        foreach ($contentsPre as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if ($value1 == 'Date') {
                    $keys = $value;
                    unset($contentsPre[$key]);
                }
            }
        }

        $contentsPre = array_values($contentsPre); // Is naujo sudedam indeksus masyvui, kad butu nuo 0.

        // Uzdedam etiketes reikiamoje vietoje.
        foreach ($contentsPre as $value) {
            $this->contents[] = array_combine($keys, $value);
        }

        unset($contentsPre); // Sunaikinam nebereikalinga masyva.

        }
            
    }

    public function getContents() {
        return $this->contents;
    }

    public function getFilesNames() {
        return $this->filesNames;
    }

    public function parseData() {

        $this->amountsModel = new AmountsModel();
        $this->totalsModel = new TotalsModel();

        $this->amountsModel->makeAmountsArray($this->contents);
        $this->totalsModel->calcTotals($this->amountsModel->getAmounts());

    }

    public function callRender() {

        $this->renderController = new RenderController();
        $this->filesController = new FilesController();

        $this->filesController -> showFiles($this->getfilesNames());
        $this->renderController -> render($this->contents, $this->totalsModel->getTotals());

    }

}