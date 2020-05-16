<?php

class UserInputsController
{
    private $action;
    private $view;
    private $arrayListTypes =[];
    private $arrayListProducts = [];

    public function __construct()
    {
        $this->view = new JsonView();
        $storeTypes = new StoreTypesModel();
    }








    public function route()
    {
        $db = new DatabaseService();
        $db->connect();

        $sql = "SELECT id, name FROM  product_types ORDER BY name";
        $sql2 = "SELECT t.name AS productTypeName, p.name AS productName FROM product_types t JOIN products p ON t.id = p.id_product_types WHERE t.id = 1";
//        echo $db->TEST();

        if(isset($_GET['action'])){
            $this->action = $_GET['action'];

            switch ($this->action) {
                case 'listTypes' :     //////////////////////////// CASE LIST TYPES ///////////////////////////////////////////////////////////////////////////////////
                    ///
                    ///
                    ///

                    $modelTypes = new StoreTypesModel();
                    $modelTypes->fetchTypesData();



                    echo "case: listTypes\n";
                    echo "\n";
                    echo '--';
                    echo "\n\n";


                    foreach ($db->connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $item) {
                        array_push($this->arrayListTypes, $item);

                    }

//print_r($this->arrayListTypes);


                    //print_r($this->arrayListTypes);

                    //print_r($this->arrayTEST[0]['productTypeName']);
//////////////////////////////////////////////////////////////////////////////////////////
                    // down below is for TEST reason
                    foreach ($this->arrayListTypes as $item) {
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    break;


                case 'listProductsByTypeId' : ///////////////////////////////// CASE LIST PRODUCTS BY TYPE ID ////////////////////////////////////////////////////////////
                    echo "case: listProductTypesId\n";
                    echo "\n";
                    echo '--';
                    echo "\n\n";


                    $typeId = filter_input(INPUT_GET, "typeId", FILTER_SANITIZE_STRING);

                    print_r($typeId); // TEST
                    echo "\n\n";

                    $sqlID = $typeId;
                    $sql3 = "SELECT t.name AS productTypeName, p.name AS productName FROM product_types t JOIN products p ON t.id = p.id_product_types WHERE t.id = $sqlID";


                    // this works fine
                    foreach ($db->connect()->query($sql3)->fetchAll(PDO::FETCH_ASSOC) as $item) {
                        array_push($this->arrayListProducts, $item);
                    }
                    //print_r($this->arrayListProducts);
                    ///////////////////////////////////////////////////////////////////////////////////////////

//                    foreach ($this->arrayListProducts as $item){
//                        echo "{\n";
//                        echo "\"productType\": ";
//                        print_r($item['productTypeName']);
//                        echo ",\n";
//                        echo "\"products\": ";
//                        print_r($item['productName']);
//                        echo ",\n";
//
//
//                        print_r("prodddd : " . $this->arrayListProducts[0]['productTypeName']);
////                        foreach ($item['productTypeName'] as $products){
////                            print_r($products);
////                            echo "\n";
////                        }
////                        foreach ($this->arrayListProducts[1] as $item[0]) {
////                            print_r($item['productName']);
////
////                        }
////                        echo "\"";
//
//
//                    }
                    // HATA

                    print_r("{");
                    print_r("\n\n\"productType\": \"" . $this->arrayListProducts[0]['productTypeName']. "\",");
                    print_r("\n\"products\": [\n");
                    echo "\n";
                    foreach ($this->arrayListProducts as $item){
                        echo "{\n\"name\" : ";
                        print_r("\"" . $item['productName'] . "\"");
                        echo "\n}, ";
                    }
                    print_r("\n],\n");
                    print_r("url\": " .$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                    print_r("\n\n}");

                    ///////////////////////////////////////////////////////////////////////////////////////////

                    break;
//                    foreach ($db->connect()->query($sql2) as $item) {
//                        print_r($item);
//                        echo "\n";
//
//                    }

                default:("choose yor action");
            }//switch end

        }
        else {
            echo 'you have to choose your action';
        }
    }

    public function sendResult(){

        if(isset($_GET['action'])){

            $send = new stdClass();
            $send->action = $this->action;
            $send->result = $this->arrayListTypes;



        $this->view->output($this->arrayListTypes);

    }}


}
