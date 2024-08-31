<?php

$page_config =[
    'title'=>'MasukMuzik - Kayıt ol',
    'description'=>'Maşuk Müzik, yükle her yerden dinle.',
];

if ($CurrentUser->id > 0) {
    header('location:/');
    die();
}

require view('includes/static/head-standard');
require view ('register');
require view('includes/static/footer-standard');