<?php

defined('K313DIR') or die;

function k313_login($file, $cook, $keys, $salt, $hash)
{
  $pass = array( );
  $i = 0;
  foreach ($keys as $k) {
    if (isset ($_POST[$k]) && is_string($_POST[$k])) {
      if (isset ($salt[$i])) array_push($pass, $_POST[$k], $salt[$i]);
      else array_push($pass, $_POST[$k]);
      ++$i;
    }
    else return ;
  }
  //echo password_hash(implode('', $pass), PASSWORD_DEFAULT);
  if (password_verify(implode('', $pass), $hash)) {
    if (isset ($_POST['time']) && is_string($t = $_POST['time'])) $time = time( ) + $t;
    if (empty ($time)) $time = time( ) + 3600;
    $sid = $time.substr(str_shuffle('1234567890poiuztrewqasdfghjklmnbvcxy1QAYXSW23EDCVFR45TGBNHZ67UJMKI89OLP0987654321QWERTZUIOPLKJHGFDSAYXCVBNMyaqwsxcderfvbgtzhnmjuiklop'), rand(0, 60), rand(32, 63));
    setcookie($cook, $sid, $time);
    $salt = implode('', $salt);
    $f = fopen($file, 'at');
    if ($f && flock($f, LOCK_EX)) {
      fputs($f, PHP_EOL.$time.md5($sid.$salt.$_SERVER['REMOTE_ADDR']).sha1($sid.$salt.$_SERVER['HTTP_USER_AGENT']));
    }
    header('Location: .');
  }
  exit;
}
