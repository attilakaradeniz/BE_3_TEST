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
                case 'listTypes' :
                    echo "case: listTypes\n";
                    echo "\n";
                    echo '--';
                    echo "\n";
                    echo "\n";

//            foreach ($db->connect()->query("SELECT id, name FROM  product_types ORDER BY name") as $item){
                    foreach ($db->connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $item) {
                        array_push($this->arrayListTypes, $item);
                       //print_r($this->arrayListTypes);
                    }
                    //print_r($this->arrayListTypes[0]['name']);



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


                case 'listProductsByTypeId' :
                    echo "case: listProductTypesId\n";
                    echo "\n";
                    echo '--';
                    echo "\n";
                    echo "\n";

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
