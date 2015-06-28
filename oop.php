<?php

define('APP_PATH', realpath(dirname(__FILE__). "/../"));

require_once(dirname(__FILE__) . "/lib/model.php");
require_once(dirname(__FILE__) . "/lib/render.php");

if (file_exists(APP_PATH . "/app/config.php"))
{
  require_once(APP_PATH . "/app/config.php");
}
