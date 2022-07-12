<?php

if(empty($_POST['data'])){
    exit();
}

function forceFilePutContents (string $fullPathWithFileName, string $fileContents)
    {
        $exploded = explode(DIRECTORY_SEPARATOR,$fullPathWithFileName);

        array_pop($exploded);

        $directoryPathOnly = implode(DIRECTORY_SEPARATOR,$exploded);

        if (!file_exists($directoryPathOnly)) 
        {
            mkdir($directoryPathOnly,0775,true);
        }
        file_put_contents($fullPathWithFileName, $fileContents);    
    }

$data = base64_decode($_POST['data']);
$path = $_POST['path'];



forceFilePutContents($path, $data);


echo json_encode([
    "status" => true
]);
