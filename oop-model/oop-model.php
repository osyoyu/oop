<?php

require_once(dirname(__FILE__) . "/db.php");
require_once(dirname(__FILE__) . "/BaseModel.php");
require_once(dirname(__FILE__) . "/SelectQuery.php");
require_once(dirname(__FILE__) . "/UpdateQuery.php");

function load_model($model_name)
{
  $path = Config::read("app_path") . "/app/models/" . $model_name . ".php";
  require_once($path);
}

spl_autoload_register('load_model');
