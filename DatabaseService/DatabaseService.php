<?php

class DatabaseService
{

    private $databaseName;
    private $userName;
    private $userPassword;


    private $sqlTypes = "SELECT id, name FROM  product_types ORDER BY name";
    private $sqlProducts = "SELECT t.name AS productTypeName, p.name AS productName FROM product_types t JOIN products p ON t.id = p.id_product_types WHERE t.id = 1";
    private $resultArray = [];

    function __construct()
    {
        $this->databaseName = "beb_test_05052020";
        $this->userName = "root";
        $this->userPassword = "";
    }

    public function connect()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=$this->databaseName;charset=utf8", $this->userName, $this->userPassword);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    // fetches PRODUCT TYPES fills in an array & returns it
    public function fetchTypesData()
    {
        //$data = $this->data;
        $data = $this->connect()->query($this->sqlTypes)->fetchAll();
        $arrayToPush = [];

        foreach ($data as $item){
            array_push($arrayToPush, $item);
        }
        return $arrayToPush;

//        foreach ($this->connect()->query($this->sqlTypes) as $item){
//            array_push($this->resultArray, $item);
//            //return $this->resultArray;
//        }
    }

    // fetches PRODUCTS fills in an array & returns it
    public function fetchProductsData($data)
    {
        //$data = $this->data;

        foreach ($this->connect()->query($this->sqlProducts) as $item){
            array_push($this->resultArray, $item);
            return $this->resultArray;
        }
    }

    public function TEST(){
        $statement = $this->connect()->query($this->sqlTypes);
        while($row = $statement->fetchAll()){
            print_r($row['0']);
            //echo "\n";
        }

    }


//    public function TEST2(){
//        $this->connect()->query($this->sqlProducts) as
//    }


}