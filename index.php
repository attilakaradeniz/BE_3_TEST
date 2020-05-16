<?php
include "config/config.php";


    $inputController = new UserInputsController();
    $inputController->route();
    //$inputController->sendResult();
    //$getTypes = new StoreTypesModel();
    //$getTypes->getProducts();

    //echo "\n\n  fetchTypesData: \n\n";
    //
    $dataBaseService = new DatabaseService();
    $dataTypes = json_encode($dataBaseService->fetchTypesData());
    //

    echo "\n\n\n\n\n\n\n\n\n\n\n";




    echo "\n\n echo data with TYPES DATA: \n\n";
    echo $dataTypes;

    echo "\n\n echo data with PRODUCTS DATA: \n\n";
    $dataProducts = json_encode($dataBaseService->fetchProductsData());
    echo $dataProducts;


    $decoded = json_decode($dataTypes);
    echo "\n\n print_r decoded: \n\n";
    print_r($decoded);
    //
    //
    //echo "\n\n output :  \n\n";
    //
    //
    echo "\n\n \$decoded[0]->id: \n\n";
    print_r($decoded[0]->id); // prints first obj's id : "10"

    echo "\n\n \$decoded[0]->name: \n\n";
    print_r($decoded[0]->name); // prints first obj's id : "anti-aging"

    //foreach ($decoded)



    //
    //echo "\n\n simdi :  \n\n";
    //
    //foreach ($decoded as $item) {
    //    print_r($item);
    //}

    //    $array = ($dataBaseService->fetchTypesData());
    //    print_r($array);





