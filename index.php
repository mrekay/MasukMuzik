<?php
require_once __DIR__.'/libs/initialize.php';

$route = route(0) ?? "index";

if (!in_array($route, ['login','index','forgot-password','register','app']) && $CurrentUser->id <=0)
{
    header('Location:/login');
    die;
}

require_once controller($route);