<?php

function k313_loneAdminInclude($incl_file, $config, $hash_or_sess, $lone_save, $salt, $lone_func_key)
{
  $trace = debug_backtrace( );
  if (isset ($trace[0]['file']) && __FILE__ === $trace[0]['file'])
    return include K313_LONE_ADMIN.$incl_file;
  else return 0;
}


function k313_loneAdmin($config, $pass_hash, $lone_save, $lone_login, $lone_sess)
{
  static $salt = 'w74/f sa Q@1 k%Dm1';
  
  if (define('K313_LONE_ADMIN', dirname(__FILE__).'/')) {
    $time = time( );
    $sfile = K313_LONE_ADMIN.$lone_save;
    if (is_file($sfile) && filesize($sfile) && isset ($config['session-name'])) {
      $sessname = $config['session-name'];
      $loneIncl = '';
      
      // if POST login
      if (isset ($config['login-keys'])
      && array_intersect($config['login-keys'], array_keys($_POST))) {
        if ($time - 15 > filemtime($sfile)) {
          $f = fopen($sfile, 'r+b');
          if ($f && flock($f, LOCK_EX)) {
            $mtime = (int)fread($f, 10);
            if (313 < $mtime && $mtime < $time - 15)
              $loneIncl = array ($lone_login, $config, $pass_hash, $f, $salt, 'lone-login-func');
            else return 6;
          }
          else return 5;
        }
        else return 4;
      }
      
      // if COOKIE session
      elseif (isset ($_COOKIE[$sessname])) {
        $sessid = $_COOKIE[$sessname];
        if (is_string($sessid) && 31 < strlen($sessid)) {
          $arr = file($sfile);
          if ($arr && 1 < ($i = count($arr))) {
            $md5 = md5($sessid.$salt.getenv('REMOTE_ADDR'));
            while (--$i > 0) {
              if ($time <= substr($arr[$i], 0, 10)) {
                if ($md5 === substr($arr[$i], 10, 32)) {
                  $loneIncl = array ($lone_sess, $config, $sessid, $lone_save, $salt, 'lone-session-func');
                  break;
                }
              }
              else return 10;
            }
          }
          else return 9;
        }
        else return 8;
      }
      else return 7;
      
      // check login or session
      if ($loneIncl) {
        $k = end($loneIncl);
        if (isset ($config[$k]) && ! $config[$k]) $allfuncs = get_defined_functions( );
        $func = call_user_func_array('k313_loneAdminInclude', $loneIncl);
        if (isset ($config[$k])) {
          if (isset ($allfuncs)) {
            if (isset ($allfuncs['user'])) {
              $count = count($allfuncs['user']);
              $allfuncs = get_defined_functions( );
              if ($count < count($allfuncs['user'])) $funcName = end($allfuncs['user']);
              else return 12;
            }
            else return 11;
          }
          else $funcName = $config[$k];
        }
        else $funcName = $func;
        
        if (is_callable($funcName, false, $func)) {
          array_shift($loneIncl);
          return call_user_func_array($func, $loneIncl);
        }
        else return 13;
      }
      else return 3;
    }
    else return 2;
  }
  else return 1;
}

return 313;
