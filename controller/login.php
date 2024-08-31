<?php

$page_config =[
    'title'=>'MasukMuzik - Giriş Yap',
    'description'=>'Maşuk Müzik, yükle her yerden dinle.',
];

if ($CurrentUser->id > 0) {
    header('location:/');
    die();
}

require view('includes/static/head-standard');
require view ('login');
require view('includes/static/footer-standard');