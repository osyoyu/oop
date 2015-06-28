<?php

require_once("app/models/BaseModel.php");

function load_model($model_name)
{
  $path = APP_PATH . "/models/" . $model_name . ".php";
  require_once($path);
}

spl_autoload_register('load_model');
