<?php

function view($view){
    return 'view/' . $view . '.php';
}
function controller($controller){
    return 'controller/' . $controller . '.php';
}
function modal($modal,$folder=""){
    return 'view/includes/modals/'.$folder.'/' . $modal . '.php';
}

function _print($text,$isJson = false){
    if ($isJson){
        header('Content-Type: application/json');
        echo json_encode($text);
    }else{
        echo "<pre>";
        print_r($text);
        echo "</pre>";
    }
}

function route($index)
{
    $url = $_SERVER['REQUEST_URI'];
    $url = trim($url, '/');
    $parts = explode('?', $url);
    $url = $parts[0];
    $parts = explode('/', $url);
    if (empty($parts[0])) $parts[0] = "index";
    return $parts[$index] ?? '';
}

function returnErrorMessage($message,$errorCode= 400,$data =[]){
    http_response_code($errorCode);
    _print(["message"=>$message,"data"=>$data,"errorCode"=>$errorCode],true);
    die();
}

function returnSuccessMessage($message,$data = []){
    _print(["message"=>$message,"data"=>$data],true);
    die();
}