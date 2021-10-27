<?php

use myPHPnotes\Microsoft\Auth;

session_start();

require "vendor/autoload.php";

$tenant = "common";
$client_id = "";
$client_secret = "";
$callback = "http://localhost/callback.php";
$scopes = ['User.Read'];

$microsoft = new Auth($tenant, $client_id, $client_secret, $callback, $scopes);

header('location: ' . $microsoft->getAuthUrl());