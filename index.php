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
$data = json_encode($dataBaseService->fetchTypesData());
//
echo "\n\n echo data: \n\n";
echo $data;

$decoded = json_decode($data);
echo "\n\n print_r decoded: \n\n";
print_r($decoded);
//
//
//echo "\n\n output :  \n\n";
//
//print_r($decoded[0]->id); // prints first obj's id : "10"
//print_r($decoded[0]->name); // prints first obj's id : "anti-aging"

//foreach ($decoded)




//
//echo "\n\n simdi :  \n\n";
//
//foreach ($decoded as $item) {
//    print_r($item);
//}

//    $array = ($dataBaseService->fetchTypesData());
//    print_r($array);





