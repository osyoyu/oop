<?php

function render($action, $binding = array())
{
  if (file_exists(Config::read("app_path") . "/app/views/layout.php"))
  {
    include(Config::read("app_path") . "/app/views/layout.php");
  }
  else
  {
    include(Config::read("app_path") . "/app/views/" . $action. ".php");
  }
}
