<?php
ini_set('file_uploads', 'on');
ini_set('upload_max_filesize','100M');
ini_set('post_max_size','100M');
session_start();

spl_autoload_register(function ($class_name) {
    $file = 'classes/' . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
require_once './libs/functions.php';


$req = new request();
$db = new database('localhost', '', '', '');
$CurrentUser = new user();

/* login check */
if (session::get("login") == true){
    $CurrentUser->id = session::get("user_id");
    $CurrentUser->select();

}