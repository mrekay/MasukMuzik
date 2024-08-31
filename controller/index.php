<?php


require view('includes/static/head-standard');
require view ('index');
require modal('edit-profile', 'user');
require modal('upload-music', 'music');
require modal('create-playlist', 'playlist');
require view('includes/static/footer-standard');