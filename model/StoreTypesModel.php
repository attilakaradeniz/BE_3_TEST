<?php

class StoreTypesModel extends DatabaseService {

    private $modelTypesArray = [];
    private $sqlTypes = "SELECT id, name FROM  product_types ORDER BY name";
    private $typeModelDatabase;


    public function fetchTypesData(){
        $this->typeModelDatabase = new DatabaseService();
        $this->typeModelDatabase->connect();
        foreach ($this->typeModelDatabase->connect()->query($this->sqlTypes)->fetchAll(PDO::FETCH_ASSOC) as $item) {
            array_push($this->modelTypesArray, $item);

        }
        //print_r($this->modelTypesArray);

//////////////////////////////////////////////////////////////////////////////////////////
        // down below is for TEST reason
        foreach ($this->modelTypesArray as $item) {
            echo "{\n";
            echo "\"productType\": ";
            echo "\"";
            print_r($item['name']);
            echo "\"";
            echo ",";
            echo "\n";
            // here url
            echo "\"url\": ";
            echo "\"";
//                        echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
//                        echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            echo "\",\n";
            echo "}";
            echo ",\n";
        }

        echo "\n";
    }
//////////////////////////////////////////////////////////////////////////////////////////
    public function getProducts(){
        $this->TEST();

    }

}
