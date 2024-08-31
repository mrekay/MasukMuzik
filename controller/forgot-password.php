<?php

$page_config =[
    'title'=>'MasukMuzik - parolamı unuttum',
    'description'=>'Maşuk Müzik, yükle her yerden dinle.',
];

if ($CurrentUser->id > 0) {
    header('location:/');
    die();
}

require view('includes/static/head-standard');
require view ('forgot-password');
require view('includes/static/footer-standard');