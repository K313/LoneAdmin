<?php

ob_start( );

error_reporting(0);
//ini_set('display_errors', '1');

require_once __DIR__.'/.ht_loneAdmin_7ej29swa';

if (false === k313_loneAdmin(
  array ('logas', 'passas', 'cookas', 'cmdas'),
  '$2y$10$VeqMtvbSli.jG1SDd5C1WeqzbQLGe7vPqEDQg3XYYL1PgOJbaaGKi',
  
  '.ht_sess_file_sh749fjf7485',
  '.ht_log_include_8wz488ei2qa',
  '.ht_sess_include_o8uw5qm1p'
))
  echo '<!DOCTYPE html><html><head><meta charset="UTF-8" /><title>Lone Admin</title></head>',
  '<body><script type="application/javascript" src="login.js"></script></body></html>';


