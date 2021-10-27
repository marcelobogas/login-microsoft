<?php

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

session_start();

require "vendor/autoload.php";

$auth = new Auth(
    Session::get('tenant_id'),
    Session::get('client_id'),
    Session::get('client_secret'),
    Session::get('redirect_uri'),
    Session::get('scopes')
);

$tokens = $auth->getToken($_REQUEST['code']);
/* echo '<pre>';
print_r($tokens);
echo '</pre>';
exit; */

$accessToken = $tokens->access_token;

$auth->setAccessToken($accessToken);

$user = new User;
/* echo '<pre>';
print_r($user->data);
echo '</pre>';
exit; */

echo "Nome: " . $user->data->getDisplayName() . '<br>';
echo "Email: " . $user->data->getUserPrincipalName() . '<br>';