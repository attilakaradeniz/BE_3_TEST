



<?php
include "config/config.php";


$inputController = new UserInputsController();
$inputController->route();
$inputController->sendResult();
$getTypes = new StoreTypesModel();
$getTypes->getProducts();

echo "\n\n   fetchTypesData: \n\n";

$dataBaseService = new DatabaseService();
$data = json_encode($dataBaseService->fetchTypesData());
echo $data;
$decoded = json_decode($data);
//echo $decoded[0]->;


echo "\n\n output :  \n\n";

print_r($decoded[0]->id); // prints first obj's id : "10"

echo "\n\n simdi :  \n\n";

foreach ($decoded as $item) {
    print_r($item);
}

//    $array = ($dataBaseService->fetchTypesData());
//    print_r($array);





