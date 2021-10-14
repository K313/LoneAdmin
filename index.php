<?php

ob_start( );

error_reporting(1);
ini_set('display_errors', 1);

require_once dirname(__FILE__).'/loneAdmin.php';

$err = k313_loneAdmin(
  array (
    'login-keys' => array ('login', 'password', 'tocken', 'send'),
    'session-name' => 'cookey',
    'command-key' => 'cmdkey',
    
    'session-method' => 'sessmeth', // 'cookie|post|get|javascript'
    'session-expire' => 'sessexp',
    'session-path' => 'sesspath',
    'session-domain' => 'sessdom',
    'session-secure' => 'sesssec',
    'session-httponly' => 'honly',
    
    'lone-salt' => '$ww8/.d?fr@A',
    'login-filters' => array ('ip' => '127.0.0.1|23.99.106.*'),
    'lone-login-func' => '',
    'lone-session-func' => '',
    'lone-login-location' => '.',
    'lone-config-ini' => 'loneConfig.ini'
  ),
  '', // '$2y$10$zWsj2.IJYQvpgaM.Y6BWROijupr0gGJpElw.LG9kV8Vz34jOvWE5K',
  
  'loneSave.txt',
  'loneLogin.php',
  'loneSession.php'
);

if (! error_reporting( )) $err = 0;

//json_encode - (PHP 5 >= 5.2.0, PECL json:1.2.0-1.2.1)
//if (count($_POST)) echo json_encode(array ('logged' => false, 'function' => 'k313_loneAdmin', 'error' => $err));
if (count($_POST)) echo '{"logged":false, "function":"k313_loneAdmin", "error":"',$err,'"}';
else echo '<!DOCTYPE html><html><head><meta charset="UTF-8" /><title>Lone Admin</title></head>',
  '<body><script type="application/javascript" src="loneLogin.js"></script></body></html>';
