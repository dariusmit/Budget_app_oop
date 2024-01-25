<?php

declare(strict_types=1);

namespace Drago\Mvc1\Models;

use PDO;

class DbModel {

    public function importToDB($contents) {

        try {
            $db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        $base_db_queries = [
        "CREATE DATABASE IF NOT EXISTS transactions",
        "USE transactions",
        "CREATE TABLE IF NOT EXISTS transactions(
            id_ int NULL,
            date_ DATE, 
            check_ INT, 
            description_ VARCHAR(255),
            amount_ FLOAT(8, 2),
            PRIMARY KEY (id_))"
        ];

        IF($_FILES == TRUE) {

            $db->beginTransaction();

            foreach ($base_db_queries as $query) {
    
                $db->query($query);
        
            }
    
            $id = 1;
  
            foreach ($contents as $value) {
                foreach ($value as $value1) {
                    
                    $date = date('Y-m-d', strtotime($value['Date']));
                    $check = intval($value['Check']);
                    $desc = $value['Description'];
                    $amount = floatval(str_replace(['$', ','], '', $value['Amount']));
    
                    if ($id <= count($contents)) {
                        $contents_db_query = "INSERT IGNORE INTO transactions (id_, date_, check_, description_, amount_) VALUES ('$id', '$date', '$check', '$desc', '$amount')";
                        $db->query($contents_db_query);
                        $id = $id + 1;
                    }
    
                    break;
    
                }
            }

        }

    }

}