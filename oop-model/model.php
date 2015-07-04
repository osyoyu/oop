<?php

require_once(dirname(__FILE__) . "/BaseModel.php");

function load_model($model_name)
{
  $path = Config::$app_path . "/app/models/" . $model_name . ".php";
  require_once($path);
}

spl_autoload_register('load_model');
