<?php

$action_file = route(1);
if (empty ($action_file)) {returnErrorMessage("Geçersiz İstek");}
if (!file_exists('actions/' . $action_file . '.php')) {returnErrorMessage("Geçersiz Varış Noktası");}
$action = route(2);
if (empty ($action)) {returnErrorMessage("Varış Noktasında Geçersiz İşlem");}
require_once 'actions/' . $action_file . '.php';