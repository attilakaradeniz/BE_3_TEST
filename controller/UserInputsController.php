<?php

class UserInputsController
{
    private $action;
    private $view;
    private $arrayListTypes =[];

    public function __construct()
    {
        $this->view = new JsonView();
    }

    public function route()
    {
        $db = new DatabaseService();
        $db->connect();

        if(isset($_GET['action'])){
            $this->action = $_GET['action'];

            switch ($this->action) {
                case 'listTypes' :     //////////////////////////// CASE LIST TYPES ///////////////////////////////////////////////////////////////////////////////////

                    $modelTypes = new StoreTypesModel();
                    $modelTypes->fetchTypesData();

                    break;

                case 'listProductsByTypeId' : ///////////////////////////////// CASE LIST PRODUCTS BY TYPE ID /////////////////////////////////////////////////////////

               $modelProducts = new StoreProductsModel();
                $modelProducts->fetchProductsData();

                    break;

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
