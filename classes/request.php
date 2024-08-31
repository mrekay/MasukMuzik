<?php

class request
{
public function get(){

}
public function post($paramName){
    return !empty($_POST[$paramName]) ?htmlspecialchars($_POST[$paramName]) : null;
}
}