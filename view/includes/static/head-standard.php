<?php

$page_config_standard = [
    'title' => "",
    'description' => "Maşuk Müzik, yükle her yerden dinle.",

];

$page_config = array_merge($page_config_standard, $page_config??[]);

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?=$page_config['description']?>">
    <title><?=$page_config['title']?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .content-container{
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
    <?php
    if (file_exists(view('includes/header/head-'.route(0))))
        require view('includes/header/head-'.route(0));
    ?>
</head>
<body class="bg-black">
<div class="content-container">
